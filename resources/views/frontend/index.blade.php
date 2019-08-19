@extends('frontend.layouts.app')

@section('content')

<!-- SERVICE SECTION -->

{{--    <section class="section grey lighten-4 center">--}}
    {{--        <div class="container">--}}
        {{--            <div class="row">--}}
            {{--                <h4 class="section-heading">Services</h4>--}}
        {{--            </div>--}}
        {{--            <div class="row">--}}
            {{--                @foreach($services as $service)--}}
            {{--                    <div class="col s12 m3">--}}
                {{--                        <div class="card-panel">--}}
                    {{--                            <i class="material-icons large indigo-text">{{ $service->icon }}</i>--}}
                    {{--                            <h5>{{ $service->title }}</h5>--}}
                    {{--                            <p>{{ $service->description }}</p>--}}
                {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                @endforeach--}}
        {{--            </div>--}}
    {{--        </div>--}}
{{--    </section>--}}


<!-- FEATURED SECTION -->

<section class="section section-properties section-special">
    <div class="container">
        <div class="row">
            <h4 class="section-heading">Special Listing</h4>
        </div>
        <div class="row">
            @foreach($special_properties as $property)
            <div class="col s12 m3">
                <div class="card property__block property__block--for-{{ $property->purpose }} property__block--{{ $property->type }} property__block--type-{{ ucfirst($property->type) }}">
                    <a href="{{ route('property.show',$property->slug) }}" data-position="bottom" data-tooltip="{{ $property->title }}" class="tooltipped">
                        <div class="card-image">
                            @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                            <span class="card-image-bg">
                                <img src="{{Storage::url('property/'.$property->image)}}" alt="" class="img-responsive" />
                            </span>
                            @else
                            <span class="card-image-bg"><span>
                            @endif

                            <div class="property__block-type">
                                <div class="rh_label rh_label__property">
                                    <div class="rh_label__wrap">
                                        {{ ucfirst($property->type) }}
                                    </div>
                                </div>
                            </div>

                            <div class="property__block-label">For {{ $property->purpose }}</div>

                        </div>

                        <div class="card-content property-content">
                            <h3>{{ $property->title }}</h3>

                            <h5>
                                {{@money_format_nep($property->price)}}
                                <div class="right" id="propertyrating-{{$property->id}}"></div>
                            </h5>
                        </div>
                        <div class="card-action property-action">
                            <span class="btn-flat count-bed">
                                <i class="small-icons icon-bed"></i>
                                <strong>{{ $property->bedroom}}</strong>
                            </span>
                            <span class="btn-flat count-bathroom">
                                <i class="small-icons icon-bathroom"></i>
                                <strong>{{ $property->bathroom}}</strong>
                            </span>
                            <span class="btn-flat count-area">
                                <i class="small-icons icon-area"></i>
                                <strong>{{ $property->area}}</strong> sq.ft.
                            </span>
                             <span class="btn-flat count-visit">
                                <i class="material-icons">visibility</i>
                                <strong>{{ $property->view_count}}</strong>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col text-right">
                <a href="{{ route('property.feature', 'special-listing') }}" class="waves-effect waves-light btn right">View All</a>
            </div>
        </div>
    </div>

</section>

<section class="section section-properties section-top">
    <div class="container">
        <div class="row">
            <h4 class="section-heading">Top Listing</h4>
        </div>
        <div class="row">
            @foreach($top_properties as $property)
            <div class="col s12 m3">
                <div class="card property__block property__block--for-{{ $property->purpose }} property__block--{{ $property->type }} property__block--type-{{ ucfirst($property->type) }}">
                    <a href="{{ route('property.show',$property->slug) }}" class=" tooltipped" data-position="bottom" data-tooltip="{{ $property->title }}">
                        <div class="card-image">
                            @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                            <span class="card-image-bg">
                                <img src="{{Storage::url('property/'.$property->image)}}" alt="" class="img-responsive" />
                            </span>
                            @else
                            <span class="card-image-bg"><span>
                            @endif

                            <div class="property__block-type">
                                <div class="rh_label rh_label__property">
                                    <div class="rh_label__wrap">
                                        {{ ucfirst($property->type) }}
                                    </div>
                                </div>
                            </div>

                            <div class="property__block-label">For {{ $property->purpose }}</div>

                        </div>
                        <div class="card-content property-content">
                            <h3>{{ $property->title }}</h3>


                            <h5>
                                {{@money_format_nep($property->price)}}
                                <div class="right" id="propertyrating-{{$property->id}}"></div>
                            </h5>
                        </div>
                        <div class="card-action property-action">
                            <span class="btn-flat count-bed">
                                <i class="small-icons icon-bed"></i>
                                <strong>{{ $property->bedroom}}</strong>
                            </span>
                            <span class="btn-flat count-bathroom">
                                <i class="small-icons icon-bathroom"></i>
                                <strong>{{ $property->bathroom}}</strong>
                            </span>
                            <span class="btn-flat count-area">
                                <i class="small-icons icon-area"></i>
                                <strong>{{ $property->area}}</strong> sq.ft.
                            </span>
                             <span class="btn-flat count-visit">
                                <i class="material-icons">visibility</i>
                                <strong>{{ $property->view_count}}</strong>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col text-right">
                <a href="{{ route('property.feature', 'top-listing') }}" class="waves-effect waves-light btn right">View All</a>
            </div>
        </div>
    </div>
</section>

<section class="section section-properties section-featured">
    <div class="container">
        <div class="row">
            <h4 class="section-heading">Featured Listing</h4>
        </div>
        <div class="row">
            @foreach($featured_properties as $property)
            <div class="col s12 m3">
                <div class="card property__block property__block--for-{{ $property->purpose }} property__block--{{ $property->type }} property__block--type-{{ ucfirst($property->type) }}">
                    <a href="{{ route('property.show',$property->slug) }}" class=" tooltipped" data-position="bottom" data-tooltip="{{ $property->title }}">
                        <div class="card-image">
                            @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                            <span class="card-image-bg">
                                <img src="{{Storage::url('property/'.$property->image)}}" alt="" class="img-responsive" />
                            </span>
                            @else
                            <span class="card-image-bg"><span>
                            @endif

                            <div class="property__block-type">
                                <div class="rh_label rh_label__property">
                                    <div class="rh_label__wrap">
                                        {{ ucfirst($property->type) }}
                                    </div>
                                </div>
                            </div>

                            <div class="property__block-label">For {{ $property->purpose }}</div>

                        </div>
                        <div class="card-content property-content">
                            <h3>{{ $property->title }}</h3>

                            <h5>
                                {{@money_format_nep($property->price)}}
                                <div class="right" id="propertyrating-{{$property->id}}"></div>
                            </h5>
                        </div>
                        <div class="card-action property-action">
                            <span class="btn-flat count-bed">
                                <i class="small-icons icon-bed"></i>
                                <strong>{{ $property->bedroom}}</strong>
                            </span>
                            <span class="btn-flat count-bathroom">
                                <i class="small-icons icon-bathroom"></i>
                                <strong>{{ $property->bathroom}}</strong>
                            </span>
                            <span class="btn-flat count-area">
                                <i class="small-icons icon-area"></i>
                                <strong>{{ $property->area}}</strong> sq.ft.
                            </span>
                             <span class="btn-flat count-visit">
                                <i class="material-icons">visibility</i>
                                <strong>{{ $property->view_count}}</strong>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col text-right">
                <a href="{{ route('property.feature', 'featured-listing') }}" class="waves-effect waves-light btn right">View All</a>
            </div>
        </div>
    </div>
</section>

<section class="section section-properties section-normal">
    <div class="container">
        <div class="row">
            <h4 class="section-heading">Normal Listing</h4>
        </div>
        <div class="row">
            @foreach($normal_properties as $property)
            <div class="col s12 m3">
                <div class="card property__block property__block--for-{{ $property->purpose }} property__block--{{ $property->type }} property__block--type-{{ ucfirst($property->type) }}">
                    <a href="{{ route('property.show',$property->slug) }}" class=" tooltipped" data-position="bottom" data-tooltip="{{ $property->title }}">
                        <div class="card-image">
                            @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                            <span class="card-image-bg">
                                <img src="{{Storage::url('property/'.$property->image)}}" alt="" class="img-responsive" />
                            </span>
                            @else
                            <span class="card-image-bg"><span>
                            @endif

                            <div class="property__block-type">
                                <div class="rh_label rh_label__property">
                                    <div class="rh_label__wrap">
                                        {{ ucfirst($property->type) }}
                                    </div>
                                </div>
                            </div>

                            <div class="property__block-label">For {{ $property->purpose }}</div>
                        </div>
                        <div class="card-content property-content">
                            <h3>{{ $property->title }}</h3>

                            <h5>
                                {{@money_format_nep($property->price)}}
                                <div class="right" id="propertyrating-{{$property->id}}"></div>
                            </h5>
                        </div>
                        <div class="card-action property-action">
                            <span class="btn-flat count-bed">
                                <i class="small-icons icon-bed"></i>
                                <strong>{{ $property->bedroom}}</strong>
                            </span>
                            <span class="btn-flat count-bathroom">
                                <i class="small-icons icon-bathroom"></i>
                                <strong>{{ $property->bathroom}}</strong>
                            </span>
                            <span class="btn-flat count-area">
                                <i class="small-icons icon-area"></i>
                                <strong>{{ $property->area}}</strong> sq.ft.
                            </span>
                             <span class="btn-flat count-visit">
                                <i class="material-icons">visibility</i>
                                <strong>{{ $property->view_count}}</strong>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


                    <!-- TESTIMONIALS SECTION -->

                    {{--    <section class="section grey lighten-3 center">--}}
                        {{--        <div class="container">--}}

                            {{--            <h4 class="section-heading">Testimonials</h4>--}}

                            {{--            <div class="carousel testimonials">--}}

                                {{--                @foreach($testimonials as $testimonial)--}}
                                {{--                    <div class="carousel-item testimonial-item" href="#{{$testimonial->id}}!">--}}
                                    {{--                        <div class="card testimonial-card">--}}
                                        {{--                            <span style="height:20px;display:block;"></span>--}}
                                        {{--                            <div class="card-image testimonial-image">--}}
                                            {{--                                <img src="{{Storage::url('testimonial/'.$testimonial->image)}}">--}}
                                        {{--                            </div>--}}
                                        {{--                            <div class="card-content">--}}
                                            {{--                                <span class="card-title">{{$testimonial->name}}</span>--}}
                                            {{--                                <p>--}}
                                                {{--                                    {{$testimonial->testimonial}}--}}
                                            {{--                                </p>--}}
                                        {{--                            </div>--}}
                                    {{--                        </div>--}}
                                {{--                    </div>--}}
                                {{--                @endforeach--}}

                            {{--            </div>--}}

                        {{--        </div>--}}

                    {{--    </section>--}}


                    <!-- BLOG SECTION -->

                    {{--    <section class="section center">--}}
                        {{--        <div class="row">--}}
                            {{--            <h4 class="section-heading">Recent Blog</h4>--}}
                        {{--        </div>--}}
                        {{--        <div class="container">--}}
                            {{--            <div class="row">--}}

                                {{--                @foreach($posts as $post)--}}
                                {{--                <div class="col s12 m3">--}}
                                    {{--                    <div class="card">--}}
                                        {{--                        <div class="card-image">--}}
                                            {{--                            @if(Storage::disk('public')->exists('posts/'.$post->image) && $post->image)--}}
                                            {{--                                <span class="card-image-bg" style="background-image:url({{Storage::url('posts/'.$post->image)}});"></span>--}}
                                            {{--                            @endif--}}
                                        {{--                        </div>--}}
                                        {{--                        <div class="card-content">--}}
                                            {{--                            <span class="card-title tooltipped" data-position="bottom" data-tooltip="{{$post->title}}">--}}
                                                {{--                                <a href="{{ route('blog.show',$post->slug) }}">{{ str_limit($post->title,18) }}</a>--}}
                                            {{--                            </span>--}}
                                            {{--                            {!! str_limit($post->body,120) !!}--}}
                                        {{--                        </div>--}}
                                        {{--                        <div class="card-action blog-action">--}}
                                            {{--                            <a href="{{ route('blog.author',$post->user->username) }}" class="btn-flat">--}}
                                                {{--                                <i class="material-icons">person</i>--}}
                                                {{--                                <span>{{$post->user->name}}</span>--}}
                                            {{--                            </a>--}}
                                            {{--                            @foreach($post->categories as $key => $category)--}}
                                            {{--                                <a href="{{ route('blog.categories',$category->slug) }}" class="btn-flat">--}}
                                                {{--                                    <i class="material-icons">folder</i>--}}
                                                {{--                                    <span>{{$category->name}}</span>--}}
                                            {{--                                </a>--}}
                                            {{--                            @endforeach--}}
                                            {{--                            @foreach($post->tags as $key => $tag)--}}
                                            {{--                                <a href="{{ route('blog.tags',$tag->slug) }}" class="btn-flat">--}}
                                                {{--                                    <i class="material-icons">label</i>--}}
                                                {{--                                    <span>{{$tag->name}}</span>--}}
                                            {{--                                </a>--}}
                                            {{--                            @endforeach--}}
                                            {{--                            <a href="#" class="btn-flat disabled">--}}
                                                {{--                                <i class="material-icons">watch_later</i>--}}
                                                {{--                                <span>{{$post->created_at->diffForHumans()}}</span>--}}
                                            {{--                            </a>--}}
                                        {{--                        </div>--}}
                                    {{--                    </div>--}}
                                {{--                </div>--}}
                                {{--                @endforeach--}}

                            {{--            </div>--}}
                        {{--        </div>--}}
                    {{--    </section>--}}

                    @endsection

                    @section('scripts')

                    @endsection