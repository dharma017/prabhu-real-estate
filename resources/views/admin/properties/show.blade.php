@extends('backend.layouts.app')

@section('title', 'Show Property')

@push('styles')


@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW PROPERTY</h2>
                </div>

                <div class="header">
                    <h2>
                        {{$property->title}}
                        <br>
                        <small>Posted By <strong>{{$property->user->name}}</strong> on {{$property->created_at->toFormattedDateString()}}</small>
                        <small>Code : {{$property->code}}</small>

                    </h2>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Price : </strong>
                            <span class="right"> {{@money_format_nep($property->price)}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Bedroom : </strong>
                            <span class="right">{{$property->bedroom}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Bathroom : </strong>
                            <span class="right">{{$property->bathroom}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Living : </strong>
                            <span class="right">{{$property->living}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Kitchen : </strong>
                            <span class="right">{{$property->kitchen}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Store Room : </strong>
                            <span class="right">{{$property->store_rooms}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Floors : </strong>
                            <span class="right">{{$property->floors}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Parking : </strong>
                            <span class="right">{{$property->parking}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Build Year : </strong>
                            <span class="right">{{$property->build_year}} B.S.</span>
                        </li>

                        <li class="list-group-item">
                            <strong>Build Type : </strong>
                            <span class="right">{{$property->build_type}}</span>
                        </li>

                        <li class="list-group-item">
                            <strong>City : </strong>
                            <span class="right">{{$property->city}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Address : </strong>
                            <span class="right">{{$property->address}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>House Area : </strong>
                            <span class="right">{{$property->house_area}} Square Feet</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Flat Area : </strong>
                            <span class="right">{{$property->flat_area}} Square Feet</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Land Area : </strong>
                            <span class="right">{{$property->land_area}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Contact Name : </strong>
                            <span class="right">{{$property->contact_name}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Contact Number : </strong>
                            <span class="right">{{$property->contact_number}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Alt. Contact Number : </strong>
                            <span class="right">{{$property->alt_contact_number}}</span>
                        </li>

                    </ul>
                </div>

                <div class="body">
                    <h5>Description</h5>
                    {!!$property->description!!}
                </div>

            </div> 
            <div class="card">
                <div class="header">
                    <h2>MAP</h2>
                </div>
                <div class="body">
                    <div id="gmap_markers" class="gmap"></div>
                </div>
            </div>

            @if($property->floor_plan)
            <div class="card">
                <div class="header">
                    <h2>FLOOR PLAN</h2>
                </div>
                @if($property->floor_plan && $property->floor_plan != 'default.png')
                <div class="body">
                    <img class="img-responsive" src="{{Storage::url('property/'.$property->floor_plan)}}" alt="{{$property->title}}">
                </div>
                @endif
            </div>
            @endif

            @if($videoembed)
            <div class="card">
                <div class="header">
                    <h2>PROPERTY VIDEO</h2>
                </div>
                <div class="body text-center">
                    {!! $videoembed !!}
                </div>
            </div>
            @endif

            @if(!$property->gallery->isEmpty())
            <div class="card">
                <div class="header bg-red">
                    <h2>GALLERY IMAGE</h2>
                </div>
                <div class="body">
                    <div class="gallery-box">
                        @foreach($property->gallery as $gallery)
                        <div class="gallery-image">
                            <img class="img-responsive" src="{{Storage::url('property/gallery/'.$gallery->name)}}" alt="{{$property->title}}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            {{-- COMMENTS --}}
            <div class="card">
                <div class="header">
                    <h2>{{ $property->comments_count }} Comments</h2>
                </div>
                <div class="body">

                    @foreach($property->comments as $comment)
                    
                        @if($comment->parent_id == NULL)
                            <div class="comment">
                                <div class="author-image">
                                    <span style="background-image:url({{ Storage::url('users/'.$comment->users->image) }});"></span>
                                </div>
                                <div class="content">
                                    <div class="author-name">
                                        <strong>{{ $comment->users->name }}</strong>
                                        <span class="right">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="author-comment">
                                        {{ $comment->body }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @foreach($comment->children as $comment)
                            <div class="comment children">
                                <div class="author-image">
                                    <span style="background-image:url({{ Storage::url('users/'.$comment->users->image) }});"></span>
                                </div>
                                <div class="content">
                                    <div class="author-name">
                                        <strong>{{ $comment->users->name }}</strong>
                                        <span class="right">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="author-comment">
                                        {{ $comment->body }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endforeach
                    
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-cyan">
                    <h2>TYPE</h2>
                </div>
                <div class="body">
                    <strong class="label bg-red">{{$property->type}}</strong> for <strong class="label bg-blue">{{$property->purpose}}</strong>
                </div>
            </div>
            <div class="card">
                <div class="header bg-green">
                    <h2>FEATURES</h2>
                </div>
                <div class="body">
                    @foreach($property->features as $feature)
                        <span class="label bg-green">{{$feature->name}}</span>
                    @endforeach
                </div>
            </div>

            <div class="card">
                <div class="header bg-amber">
                    <h2>FEATURED IMAGE</h2>
                </div>
                <div class="body">

                    <img class="img-responsive thumbnail" src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}">
                    
                    <a href="{{route('admin.properties.index')}}" class="btn btn-danger btn-lg waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>BACK</span>
                    </a>
                    <a href="{{route('admin.properties.edit',$property->slug)}}" class="btn btn-info btn-lg waves-effect">
                        <i class="material-icons">edit</i>
                        <span>EDIT</span>
                    </a>

                </div>
            </div>
        </div>

    </div>


@endsection


@push('scripts')

    <script src="https://maps.google.com/maps/api/js?v=3&sensor=false"></script>
    <script src="{{ asset('backend/plugins/gmaps/gmaps.js') }}"></script>
    <script>
        //Markers
        var markers = new GMaps({
            div: '#gmap_markers',
            lat: '<?php echo $property->location_latitude; ?>',
            lng: '<?php echo $property->location_longitude; ?>'
        });
        markers.addMarker({
            lat: '<?php echo $property->location_latitude; ?>',
            lng: '<?php echo $property->location_longitude; ?>',
            title: '<?php echo $property->title; ?>',
        });
        
    </script>


@endpush
