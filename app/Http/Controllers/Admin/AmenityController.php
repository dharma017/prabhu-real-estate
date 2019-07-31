<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Amenity;
use Toastr;

class AmenityController extends Controller
{

    public function index()
    {
        $amenities = Amenity::latest()->get();

        return view('admin.amenities.index',compact('amenities'));
    }


    public function create()
    {
        return view('admin.amenities.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:amenities|max:255'
        ]);

        $tag = new Amenity();
        $tag->name = $request->name;
        $tag->save();

        Toastr::success('message', 'Amenity created successfully.');
        return redirect()->route('admin.amenities.index');
    }


    public function edit($id)
    {
        $amenity = Amenity::find($id);

        return view('admin.amenities.edit',compact('amenity'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $amenity = Amenity::find($id);
        $amenity->name = $request->name;
        $amenity->save();

        Toastr::success('message', 'Amenity updated successfully.');
        return redirect()->route('admin.amenities.index');
    }


    public function destroy($id)
    {
        $amenity = Amenity::find($id);
        $amenity->delete();
        $amenity->amenities()->detach();

        Toastr::success('message', 'Amenity deleted successfully.');
        return back();
    }
}
