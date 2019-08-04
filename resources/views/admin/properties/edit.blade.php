@extends('backend.layouts.app')

@section('title', 'Edit Property')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.properties.update',$property->slug)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>Edit PROPERTY</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="title" class="form-control" value="{{$property->title}}" required>
                            <label class="form-label">Property Title</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" maxlength="7" name="code" title="Code must be 7 characters long" class="form-control" value="{{$property->code}}" required>
                            <label class="form-label">Code</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" name="price" class="form-control" value="{{$property->price}}" required>
                            <label class="form-label">Price</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="bedroom" value="{{$property->bedroom}}" required>
                            <label class="form-label">Bedroom</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="bathroom" value="{{$property->bathroom}}" required>
                            <label class="form-label">Bathroom</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="living" value="{{$property->living}}" required>
                            <label class="form-label">Living</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="kitchen" value="{{$property->kitchen}}" required>
                            <label class="form-label">Kitchen</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="store_rooms" value="{{$property->store_rooms}}" required>
                            <label class="form-label">Store Room</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="floors" value="{{$property->floors}}" >
                            <label class="form-label">Floors</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="parking" value="{{$property->parking}}" required>
                            <label class="form-label">Parking</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="build_year" value="{{$property->build_year}}">
                            <label class="form-label">Build Year</label>
                        </div>
                        <div class="help-info">B.S.</div>

                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="build_type" value="{{$property->build_type}}">
                            <label class="form-label">Build Type</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="city" value="{{$property->city}}" required>
                            <label class="form-label">City</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="address" value="{{$property->address}}" required>
                            <label class="form-label">Address</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="area" value="{{$property->area}}">
                            <label class="form-label">Area</label>
                        </div>
                        <div class="help-info">Square Feet</div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="land_area" value="{{$property->land_area}}">
                            <label class="form-label">Land Area</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="featured" name="featured" class="filled-in" value="1" {{ $property->featured ? 'checked' : '' }}/>
                        <label for="featured">Featured</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="assured" name="assured" class="filled-in" value="1" {{ $property->assured ? 'checked' : '' }}/>
                        <label for="assured">Assured</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="negotiable" name="negotiable" class="filled-in" value="1" {{ $property->negotiable ? 'checked' : '' }}/>
                        <label for="negotiable">Negotiable</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="ready_to_use" name="ready_to_use" class="filled-in" value="1" {{ $property->ready_to_use ? 'checked' : '' }}/>
                        <label for="ready_to_use">Ready to use</label>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="contact_name" value="{{$property->contact_name}}">
                            <label class="form-label">Contact Name</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="contact_number" value="{{$property->contact_number}}">
                            <label class="form-label">Contact Number</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="alt_contact_number" value="{{$property->alt_contact_number}}">
                            <label class="form-label">Alt. Contact Number</label>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="tinymce">Description</label>
                        <textarea name="description" id="tinymce">{{$property->description}}</textarea>
                    </div>

                    <hr>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="property_face" value="{{$property->property_face}}">
                            <label class="form-label">Property face</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="road_access" value="{{$property->road_access}}">
                            <label class="form-label">Road Access</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tinymce-nearby">Nearby</label>
                        <textarea name="nearby" id="tinymce-nearby">{{$property->nearby}}</textarea>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="header bg-red">
                    <h2>GALLERY IMAGE</h2>
                </div>
                <div class="body">
                    <div class="gallery-box" id="gallerybox">
                        @foreach($property->gallery as $gallery)
                        <div class="gallery-image-edit" id="gallery-{{$gallery->id}}">
                            <button type="button" data-id="{{$gallery->id}}" class="btn btn-danger btn-sm"><i class="material-icons">delete_forever</i></button>
                            <img class="img-responsive" src="{{Storage::url('property/gallery/'.$gallery->name)}}" alt="{{$gallery->name}}">
                        </div>
                        @endforeach
                    </div>
                    <div class="gallery-box">
                        <hr>
                        <input type="file" name="gallaryimage[]" value="UPLOAD" id="gallaryimageupload" multiple>
                        <button type="button" class="btn btn-info btn-lg right" id="galleryuploadbutton">UPLOAD GALLERY IMAGE</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>SELECT</h2>
                </div>
                <div class="body">
                    <div class="form-group">
                        <input type="checkbox" id="status" name="status" class="filled-in" value="1" {{ $property->status ? 'checked' : '' }}/>
                        <label for="status">Status</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="available" name="available" class="filled-in" value="1" {{ $property->available ? 'checked' : '' }}/>
                        <label for="available">Available</label>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line {{$errors->has('purpose') ? 'focused error' : ''}}">
                            <label>Select Purpose</label>
                            <select name="purpose" class="form-control show-tick">
                                <option value="">-- Please select --</option>
                                <option value="sale" {{ $property->purpose=='sale' ? 'selected' : '' }}>Sale</option>
                                <option value="rent" {{ $property->purpose=='rent' ? 'selected' : '' }}>Rent</option>
                                <option value="lease" {{ $property->purpose=='lease' ? 'selected' : '' }}>Lease</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line {{$errors->has('type') ? 'focused error' : ''}}">
                            <label>Select type</label>
                            <select name="type" class="form-control show-tick">
                                <option value="">-- Please select --</option>
                                <option value="bungalow" {{ $property->type=='bungalow' ? 'selected' : '' }}>Bungalow</option>
                                <option value="house" {{ $property->type=='house' ? 'selected' : '' }}>House</option>
                                <option value="land" {{ $property->type=='land' ? 'selected' : '' }}>Land</option>
                                <option value="rent" {{ $property->type=='rent' ? 'selected' : '' }}>Rent</option>
                                <option value="apartment" {{ $property->type=='apartment' ? 'selected' : '' }}>Apartment</option>
                                <option value="colony" {{ $property->type=='colony' ? 'selected' : '' }}>Colony</option>
                                <option value="flat" {{ $property->type=='flat' ? 'selected' : '' }}>Flat</option>
                            </select>
                        </div>
                    </div>

                    <h5>Features</h5>
                    <div class="form-group demo-checkbox">
                        @foreach($features as $feature)
                            <input type="checkbox" id="features-{{$feature->id}}" name="features[]" class="filled-in chk-col-indigo" value="{{$feature->id}}" 
                            @foreach($property->features as $checked)
                                {{ ($checked->id == $feature->id) ? 'checked' : '' }}
                            @endforeach
                            />
                            <label for="features-{{$feature->id}}">{{$feature->name}}</label>
                        @endforeach
                    </div>

                    <h5>Amenities</h5>
                    <div class="form-group demo-checkbox">
                        @foreach($amenities as $amenity)
                            <input type="checkbox" id="amenities-{{$amenity->id}}" name="amenities[]" class="filled-in chk-col-indigo" value="{{$amenity->id}}"
                            @foreach($property->amenities as $checked)
                                {{ ($checked->id == $amenity->id) ? 'checked' : '' }}
                                    @endforeach
                            />
                            <label for="amenities-{{$amenity->id}}">{{$amenity->name}}</label>
                        @endforeach
                    </div>

                    <div class="clearfix">
                        <h5>Google Map</h5>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="location_latitude" class="form-control" value="{{$property->location_latitude}}"/>
                                <label class="form-label">Latitude</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="location_longitude" class="form-control" value="{{$property->location_longitude}}"/>
                                <label class="form-label">Longitude</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="header bg-indigo">
                    <h2>PROPERTY VIDEO</h2>
                </div>
                <div class="body">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="video" value="{{$property->video}}">
                            <label class="form-label">Video</label>
                        </div>
                        <div class="help-info">Youtube Link</div>
                    </div>
                    <div class="embed-video center">
                        {!! $videoembed !!}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="header bg-indigo">
                    <h2>FLOOR PLAN</h2>
                </div>
                <div class="body">
                    <div class="form-group">
                        @if(Storage::disk('public')->exists('property/'.$property->floor_plan) && $property->floor_plan )
                            <img src="{{Storage::url('property/'.$property->floor_plan)}}" alt="{{$property->title}}" class="img-responsive img-rounded"> <br>
                        @endif
                        <input type="file" name="floor_plan">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="header bg-indigo">
                    <h2>FEATURED IMAGE</h2>
                </div>
                <div class="body">

                    <div class="form-group">
                        @if(Storage::disk('public')->exists('property/'.$property->image))
                            <img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}" class="img-responsive img-rounded"> <br>
                        @endif
                        <input type="file" name="image">
                    </div>

                    {{-- BUTTON --}}
                    <a href="{{route('admin.properties.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>BACK</span>
                    </a>

                    <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                        <i class="material-icons">save</i>
                        <span>SAVE</span>
                    </button>

                </div>
            </div>

        </div>
        </form>
    </div>
    

@endsection


@push('scripts')

    <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // DELETE PROPERTY GALLERY IMAGE
        $('.gallery-image-edit button').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var image = $('#gallery-'+id+' img').attr('alt');
            $.post("{{route('admin.gallery-delete')}}",{id:id,image:image},function(data){
                if(data.msg == true){
                    $('#gallery-'+id).remove();
                }
            });
        });

        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {

                            $('<div class="gallery-image-edit" id="gallery-perview-'+i+'"><img src="'+event.target.result+'" height="106" width="173"/></div>').appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallaryimageupload').on('change', function() {
                imagesPreview(this, 'div#gallerybox');
            });
        });

        $(document).on('click','#galleryuploadbutton',function(e){
            e.preventDefault();
            $('#gallaryimageupload').click();
        })

    </script>

    <script src="{{asset('backend/plugins/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('backend/plugins/tinymce')}}';
        });

        $(function () {
            tinymce.init({
                selector: "textarea#tinymce-nearby",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: '',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('backend/plugins/tinymce')}}';
        });
    </script>

@endpush
