@extends('backend.layouts.app')

@section('title', 'Create Property')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.properties.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>CREATE PROPERTY</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
                            <label class="form-label">Property Title</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" maxlength="7" name="code" title="Code must be 7 characters long" class="form-control" value="{{old('code')}}" required>
                            <label class="form-label">Code</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="price" value="{{old('price')}}" required>
                            <label class="form-label">Price</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="bedroom" value="{{old('bedroom')}}" required>
                            <label class="form-label">Bedroom</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="bathroom" value="{{old('bathroom')}}" required>
                            <label class="form-label">Bathroom</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="living" value="{{old('living')}}" required>
                            <label class="form-label">Living</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="kitchen" value="{{old('kitchen')}}" required>
                            <label class="form-label">Kitchen</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="store_rooms" value="{{old('store_rooms')}}" required>
                            <label class="form-label">Store Room</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="floors">
                            <label class="form-label">Floors</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="parking" value="{{old('parking')}}" required>
                            <label class="form-label">Parking</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="build_year">
                            <label class="form-label">Build Year</label>
                        </div>
                        <div class="help-info">B.S.</div>

                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="build_type">
                            <label class="form-label">Build Type</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="city" value="{{old('city')}}" required>
                            <label class="form-label">City</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="address" value="{{old('address')}}" required>
                            <label class="form-label">Address</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="house_area">
                            <label class="form-label">House Area</label>
                        </div>
                        <div class="help-info">Square Feet</div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="flat_area">
                            <label class="form-label">Flat Area</label>
                        </div>
                        <div class="help-info">Square Feet</div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="land_area">
                            <label class="form-label">Land Area</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="featured" name="featured" class="filled-in" value="1" />
                        <label for="featured">Featured</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="assured" name="assured" class="filled-in" value="1" />
                        <label for="assured">Assured</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="negotiable" name="negotiable" class="filled-in" value="1" />
                        <label for="negotiable">Negotiable</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="ready_to_use" name="ready_to_use" class="filled-in" value="1" />
                        <label for="ready_to_use">Ready to use</label>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="contact_name" value="{{old('contact_name')}}" required>
                            <label class="form-label">Contact Name</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="contact_number" value="{{old('contact_number')}}" required>
                            <label class="form-label">Contact Number</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="alt_contact_number">
                            <label class="form-label">Alt. Contact Number</label>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="tinymce">Description</label>
                        <textarea name="description" id="tinymce">{{old('description')}}</textarea>
                    </div>

                    <hr>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="property_face">
                            <label class="form-label">Property face</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="road_access">
                            <label class="form-label">Road Access</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tinymce-nearby">Nearby</label>
                        <textarea name="nearby" id="tinymce-nearby">{{old('nearby')}}</textarea>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>GALLERY IMAGE</h2>
                </div>
                <div class="body">
                    <input id="input-id" type="file" name="gallaryimage[]" class="file" data-preview-file-type="text" multiple>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>SELECT</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line {{$errors->has('purpose') ? 'focused error' : ''}}">
                            <label>Select Purpose</label>
                            <select name="purpose" class="form-control show-tick">
                                <option value="">-- Please select --</option>
                                <option value="sale">Sale</option>
                                <option value="rent">Rent</option>
                                <option value="rent">Lease</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line {{$errors->has('type') ? 'focused error' : ''}}">
                            <label>Select type</label>
                            <select name="type" class="form-control show-tick">
                                <option value="">-- Please select --</option>
                                <option value="bungalow">Bungalow</option>
                                <option value="house">House</option>
                                <option value="land">Land</option>
                                <option value="rent">Rent</option>
                                <option value="apartment">Apartment</option>
                                <option value="colony">Colony</option>
                                <option value="flat">Flat</option>
                            </select>
                        </div>
                    </div>

                    <h5>Features</h5>
                    <div class="form-group demo-checkbox">
                        @foreach($features as $feature)
                            <input type="checkbox" id="features-{{$feature->id}}" name="features[]" class="filled-in chk-col-indigo" value="{{$feature->id}}" />
                            <label for="features-{{$feature->id}}">{{$feature->name}}</label>
                        @endforeach
                    </div>

                    <h5>Amenities</h5>
                    <div class="form-group demo-checkbox">
                        @foreach($amenities as $amenity)
                            <input type="checkbox" id="amenities-{{$amenity->id}}" name="amenities[]" class="filled-in chk-col-indigo" value="{{$amenity->id}}" />
                            <label for="amenities-{{$amenity->id}}">{{$amenity->name}}</label>
                        @endforeach
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="video">
                            <label class="form-label">Video</label>
                        </div>
                        <div class="help-info">Youtube Link</div>
                    </div>

                    <div class="clearfix">
                        <h5>Google Map</h5>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="location_latitude" class="form-control"/>
                                <label class="form-label">Latitude</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="location_longitude" class="form-control"/>
                                <label class="form-label">Longitude</label>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="card">
                <div class="header bg-indigo">
                    <h2>FLOOR PLAN</h2>
                </div>
                <div class="body">
                    <div class="form-group">
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

    <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{asset('backend/plugins/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
            $("#input-id").fileinput();
        });

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
