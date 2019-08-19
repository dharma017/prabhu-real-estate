@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<section class="section section-properties">
	<div class="container">

		<div class="row">
			<h4 class="section-heading">Properties</h4>
		</div>

		{{--            <div class="row">--}}
			{{--                <div class="city-categories">--}}
				{{--                    @foreach($cities as $city)--}}
				{{--                        <div class="col s12 m3">--}}
					{{--                            <a href="{{ route('property.city',$city->city_slug) }}">--}}
						{{--                                <div class="city-category">--}}
							{{--                                    <span>{{ $city->city }}</span>--}}
						{{--                                </div>--}}
					{{--                            </a>--}}
				{{--                        </div>--}}
				{{--                    @endforeach--}}
			{{--                </div>--}}
		{{--            </div>--}}

		<div class="row">

			@foreach($properties as $property)
			<div class="col s12 m3">
                <div class="card property__block property__block--for-{{ $property->purpose }} property__block--{{ $property->type }} property__block--type-{{ ucfirst($property->type) }}">
                    <a href="{{ route('property.show',$property->slug) }}" title="{{ $property->title }}">
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
                                <!-- <div class="right" id="propertyrating-{{$property->id}}"></div> -->
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

			<div class="m-t-30 m-b-60 center">
				{{ $properties->links() }}
			</div>

		</div>
	</section>

	@endsection

	@section('scripts')

	<script>

		$(function(){
			var js_properties = <?php echo json_encode($properties); ?>;
			js_properties.data.forEach(element => {
				if(element.rating){
					var elmt = element.rating;
					var sum = 0;
					for( var i = 0; i < elmt.length; i++ ){
						sum += parseFloat( elmt[i].rating );
					}
					var avg = sum/elmt.length;
					if(isNaN(avg) == false){
						$("#propertyrating-"+element.id).rateYo({
							rating: avg,
							starWidth: "20px",
							readOnly: true
						});
					}else{
						$("#propertyrating-"+element.id).rateYo({
							rating: 0,
							starWidth: "20px",
							readOnly: true
						});
					}
				}
			});
		})
	</script>
	@endsection