<?php

namespace App\Http\Controllers\Admin;

use App\Amenity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;
use App\Feature;
use App\PropertyImageGallery;
use App\Comment;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Toastr;
use Auth;
use File;

class PropertyController extends Controller
{

    public function index()
    {
        $properties = Property::latest()->withCount('comments')->get();

        return view('admin.properties.index', compact('properties'));
    }


    public function create()
    {
        $features = Feature::all();
        $amenities = Amenity::all();

        return view('admin.properties.create', compact('features', 'amenities'));
    }


    public function store(Request $request)
    {
        // echo '<pre>';print_r($request);exit;
        $request->validate([
            'title' => 'required|unique:properties|max:255',
            'price' => 'required',
            'purpose' => 'required',
            'code' => 'required|unique:properties|max:7',
            'type' => 'required',
            'city' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'floor_plan' => 'image|mimes:jpeg,jpg,png',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if ( ! Storage::disk('public')->exists('property')) {
                Storage::disk('public')->makeDirectory('property');
            }
            $propertyimage = Image::make($image)->save();
            Storage::disk('public')->put('property/' . $imagename, $propertyimage);

        }

        $floor_plan = $request->file('floor_plan');
        if (isset($floor_plan)) {
            $currentDate = Carbon::now()->toDateString();
            $imagefloorplan = 'floor-plan-' . $currentDate . '-' . uniqid() . '.' . $floor_plan->getClientOriginalExtension();

            if ( ! Storage::disk('public')->exists('property')) {
                Storage::disk('public')->makeDirectory('property');
            }
            $propertyfloorplan = Image::make($floor_plan)->save();
            Storage::disk('public')->put('property/' . $imagefloorplan, $propertyfloorplan);

        } else {
            $imagefloorplan = 'default.png';
        }

        $property = new Property();
        $property->title = $request->title;
        $property->slug = $slug;
        $property->code = $request->code;
        $property->price = $request->price;
        $property->purpose = $request->purpose;
        $property->type = $request->type;
        $property->image = $imagename;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->living = $request->living;
        $property->kitchen = $request->kitchen;
        $property->store_rooms = $request->store_rooms;
        $property->floors = $request->floors;
        $property->parking = $request->parking;
        $property->city = $request->city;
        $property->city_slug = str_slug($request->city);
        $property->address = $request->address;
        $property->build_year = $request->build_year;
        $property->build_type = $request->build_type;
        $property->area = $request->area;
        $property->land_area = $request->land_area;

        if (isset($request->featured)) {
            $property->featured = true;
        }

        if (isset($request->negotiable)) {
            $property->negotiable = true;
        }

        if (isset($request->ready_to_use)) {
            $property->ready_to_use = true;
        }

        if (isset($request->assured)) {
            $property->assured = true;
        }

        $property->available = true;

        $property->agent_id = Auth::id();
        $property->contact_name = $request->contact_name;
        $property->contact_number = $request->contact_number;
        $property->alt_contact_number = $request->alt_contact_number;
        $property->description = $request->description;
        $property->video = $request->video;
        $property->floor_plan = $imagefloorplan;
        $property->location_latitude = $request->location_latitude;
        $property->location_longitude = $request->location_longitude;
        $property->property_face = $request->property_face;
        $property->road_access = $request->road_access;
        $property->nearby = $request->nearby;
        $property->view_count = 0;
        $property->save();

        $property->features()->attach($request->features);
        $property->amenities()->attach($request->amenities);


        $gallary = $request->file('gallaryimage');

        if ($gallary) {
            foreach ($gallary as $images) {
                $currentDate = Carbon::now()->toDateString();
                $galimage['name'] = 'gallary-' . $currentDate . '-' . uniqid() . '.' . $images->getClientOriginalExtension();
                $galimage['size'] = $images->getClientSize();
                $galimage['property_id'] = $property->id;

                if ( ! Storage::disk('public')->exists('property/gallery')) {
                    Storage::disk('public')->makeDirectory('property/gallery');
                }
                $propertyimage = Image::make($images)->save();
                Storage::disk('public')->put('property/gallery/' . $galimage['name'], $propertyimage);

                $property->gallery()->create($galimage);
            }
        }

        Toastr::success('message', 'Property created successfully.');

        return redirect()->route('admin.properties.index');
    }


    public function show(Property $property)
    {
        $property = Property::withCount('comments')->find($property->id);

        $videoembed = $this->convertYoutube($property->video, 560, 315);

        return view('admin.properties.show', compact('property', 'videoembed'));
    }


    public function edit(Property $property)
    {
        $features = Feature::all();
        $amenities = Amenity::all();
        $property = Property::find($property->id);

        $videoembed = $this->convertYoutube($property->video);

        return view('admin.properties.edit', compact('property', 'features', 'videoembed', 'amenities'));
    }


    public function update(Request $request, $property)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'purpose' => 'required',
            'code' => 'required|max:7',
            'type' => 'required',
            'city' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png',
            'floor_plan' => 'image|mimes:jpeg,jpg,png',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        $property = Property::find($property->id);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if ( ! Storage::disk('public')->exists('property')) {
                Storage::disk('public')->makeDirectory('property');
            }
            if (Storage::disk('public')->exists('property/' . $property->image)) {
                Storage::disk('public')->delete('property/' . $property->image);
            }
            $propertyimage = Image::make($image)->save();
            Storage::disk('public')->put('property/' . $imagename, $propertyimage);

        } else {
            $imagename = $property->image;
        }


        $floor_plan = $request->file('floor_plan');
        if (isset($floor_plan)) {
            $currentDate = Carbon::now()->toDateString();
            $imagefloorplan = 'floor-plan-' . $currentDate . '-' . uniqid() . '.' . $floor_plan->getClientOriginalExtension();

            if ( ! Storage::disk('public')->exists('property')) {
                Storage::disk('public')->makeDirectory('property');
            }
            if (Storage::disk('public')->exists('property/' . $property->floor_plan)) {
                Storage::disk('public')->delete('property/' . $property->floor_plan);
            }

            $propertyfloorplan = Image::make($floor_plan)->save();
            Storage::disk('public')->put('property/' . $imagefloorplan, $propertyfloorplan);

        } else {
            $imagefloorplan = $property->floor_plan;
        }

        $property->title = $request->title;
        $property->slug = $slug;
        $property->code = $request->code;
        $property->price = $request->price;
        $property->purpose = $request->purpose;
        $property->type = $request->type;
        $property->image = $imagename;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->living = $request->living;
        $property->kitchen = $request->kitchen;
        $property->store_rooms = $request->store_rooms;
        $property->floors = $request->floors;
        $property->parking = $request->parking;
        $property->city = $request->city;
        $property->city_slug = str_slug($request->city);
        $property->address = $request->address;
        $property->build_year = $request->build_year;
        $property->build_type = $request->build_type;
        $property->area = $request->area;
        $property->land_area = $request->land_area;

        $property->available = $request->available == 1;

        if (isset($request->featured)) {
            $property->featured = true;
        }

        if (isset($request->negotiable)) {
            $property->negotiable = true;
        }

        if (isset($request->ready_to_use)) {
            $property->ready_to_use = true;
        }

        if (isset($request->assured)) {
            $property->assured = true;
        }

        $property->contact_name = $request->contact_name;
        $property->contact_number = $request->contact_number;
        $property->alt_contact_number = $request->alt_contact_number;
        $property->description = $request->description;
        $property->video = $request->video;
        $property->floor_plan = $imagefloorplan;
        $property->location_latitude = $request->location_latitude;
        $property->location_longitude = $request->location_longitude;
        $property->property_face = $request->property_face;
        $property->road_access = $request->road_access;
        $property->nearby = $request->nearby;

        $property->save();

        $property->features()->sync($request->features);
        $property->amenities()->sync($request->amenities);

        $gallary = $request->file('gallaryimage');
        if ($gallary) {
            foreach ($gallary as $images) {
                if (isset($images)) {
                    $currentDate = Carbon::now()->toDateString();
                    $galimage['name'] = 'gallary-' . $currentDate . '-' . uniqid() . '.' . $images->getClientOriginalExtension();
                    $galimage['size'] = $images->getClientSize();
                    $galimage['property_id'] = $property->id;

                    if ( ! Storage::disk('public')->exists('property/gallery')) {
                        Storage::disk('public')->makeDirectory('property/gallery');
                    }
                    $propertyimage = Image::make($images)->save();
                    Storage::disk('public')->put('property/gallery/' . $galimage['name'], $propertyimage);

                    $property->gallery()->create($galimage);
                }
            }
        }

        Toastr::success('message', 'Property updated successfully.');

        return redirect()->route('admin.properties.index');
    }


    public function destroy(Property $property)
    {
        $property = Property::find($property->id);

        if (Storage::disk('public')->exists('property/' . $property->image)) {
            Storage::disk('public')->delete('property/' . $property->image);
        }
        if (Storage::disk('public')->exists('property/' . $property->floor_plan)) {
            Storage::disk('public')->delete('property/' . $property->floor_plan);
        }

        $property->delete();

        $galleries = $property->gallery;
        if ($galleries) {
            foreach ($galleries as $key => $gallery) {
                if (Storage::disk('public')->exists('property/gallery/' . $gallery->name)) {
                    Storage::disk('public')->delete('property/gallery/' . $gallery->name);
                }
                PropertyImageGallery::destroy($gallery->id);
            }
        }

        $property->features()->detach();
        $property->amenities()->detach();
        $property->comments()->delete();

        Toastr::success('message', 'Property deleted successfully.');

        return back();
    }


    public function galleryImageDelete(Request $request)
    {

        $gallaryimg = PropertyImageGallery::find($request->id)->delete();

        if (Storage::disk('public')->exists('property/gallery/' . $request->image)) {
            Storage::disk('public')->delete('property/gallery/' . $request->image);
        }

        if ($request->ajax()) {

            return response()->json(['msg' => $gallaryimg]);
        }
    }

    // YOUTUBE LINK TO EMBED CODE
    private function convertYoutube($youtubelink, $w = 250, $h = 140)
    {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"$w\" height=\"$h\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allowfullscreen></iframe>",
            $youtubelink
        );
    }
}
