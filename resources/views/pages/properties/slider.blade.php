<!-- <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">

	<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
		<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{{ asset('frontend/images/spin.svg') }}" />
	</div>

	<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
		@foreach($property->gallery as $gallery)
		<div>
			<img data-u="image" src="{{Storage::url('property/gallery/'.$gallery->name)}}" />
			<img data-u="thumb" src="{{Storage::url('property/gallery/'.$gallery->name)}}" />
		</div>
		@endforeach
	</div>

	<div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#e8eaf6;" data-autocenter="1" data-scale-bottom="0.75">
		<div data-u="slides">
			<div data-u="prototype" class="p" style="width:190px;height:84px;">
				<div data-u="thumbnailtemplate" class="t"></div>
				<svg viewBox="0 0 16000 16000" class="cv">
					<circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
					<line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
					<line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
				</svg>
			</div>
		</div>
	</div>

	<div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
		<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
			<circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
			<polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
			<line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
		</svg>
	</div>
	<div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
		<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
			<circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
			<polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
			<line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
		</svg>
	</div>
</div> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css" />
<!-- Swiper -->
<div class="swiper-container gallery-top">
	<div class="swiper-wrapper">
		@foreach($property->gallery as $gallery)
			<div class="swiper-slide">
				<img data-u="image" src="{{Storage::url('property/gallery/'.$gallery->name)}}" />
			</div>
		@endforeach
	</div>
	<!-- Add Arrows -->
	<div class="swiper-button-next swiper-button-white"></div>
	<div class="swiper-button-prev swiper-button-white"></div>
</div>
<div class="swiper-container gallery-thumbs">
	<div class="swiper-wrapper">
		@foreach($property->gallery as $gallery)
			<div class="swiper-slide">
				<img data-u="thumb" src="{{Storage::url('property/gallery/'.$gallery->name)}}" />
			</div>
		@endforeach
	</div>
</div>