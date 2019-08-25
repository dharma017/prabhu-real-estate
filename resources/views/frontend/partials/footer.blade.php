<footer class="page-footer indigo darken-2">
    <div class="container">
        <div class="row">
            <div class="col m3 s6">
                <h5 class="white-text uppercase">About Us</h5>
                @if(isset($footersettings[0]) && $footersettings[0]['aboutus'])
                <p class="grey-text text-lighten-4">{{ $footersettings[0]['aboutus'] }}</p>
                @else
                <p class="grey-text text-lighten-4">Real estate company description goes here.</p>
                @endif
            </div>
            <div class="col m2 s6">
                <h5 class="white-text uppercase">Menu</h5>
                <ul>
                    {{--                    <li class="uppercase {{ Request::is('pricing') ? 'underline' : '' }}">--}}
                        {{--                        <a href="{{ route('pricing') }}" class="grey-text text-lighten-3">Pricing</a>--}}
                    {{--                    </li>--}}

                    {{--                    <li class="uppercase {{ Request::is('service-request') ? 'underline' : '' }}">--}}
                        {{--                        <a href="{{ route('service-request') }}" class="grey-text text-lighten-3">Service Request</a>--}}
                    {{--                    </li>--}}

                    {{--                    <li class="uppercase {{ Request::is('about-us') ? 'underline' : '' }}">--}}
                        {{--                        <a href="{{ route('about-us') }}" class="grey-text text-lighten-3">About Us</a>--}}
                    {{--                    </li>--}}

                    <li class="uppercase {{ Request::is('privacy-policy') ? 'underline' : '' }}">
                        <a href="{{ route('pages.show', 'privacy-policy') }}" class="grey-text text-lighten-3">Privacy</a>
                    </li>

                    <li class="uppercase {{ Request::is('terms-and-conditions') ? 'underline' : '' }}">
                        <a href="{{ route('pages.show', 'terms-and-conditions') }}" class="grey-text text-lighten-3">Terms Of Use</a>
                    </li>

                    {{--                    <li class="uppercase {{ Request::is('contact') ? 'underline' : '' }}">--}}
                        {{--                        <a href="{{ route('contact') }}" class="grey-text text-lighten-3">Contact Us</a>--}}
                    {{--                    </li>--}}
                </ul>
            </div>

            <div class="col m7 s12">
                {{--       <ul class="collection border0">

                 @foreach($footerproperties as $property)
                 <li class="collection-item transparent clearfix p-0 border0">
                    <span class="card-image-bg m-r-10" style="background-image:url({{Storage::url('property/'.$property->image)}});width:60px;height:45px;float:left;"></span>
                    <div class="float-left">
                        <h5 class="font-18 m-b-0 m-t-5">
                            <a href="{{ route('property.show',$property->slug) }}" class="white-text">{{ str_limit($property->title,40) }}</a>
                        </h5>
                        <p class="m-t-0 m-b-5 grey-text text-lighten-1">Bedroom: {{ $property->bedroom }} Bathroom: {{ $property->bathroom }} </p>
                    </div>
                </li>
                @endforeach
            </ul>

            @if(isset($footersettings[0]) && $footersettings[0]['facebook'])
            <a class="grey-text text-lighten-4 right" href="{{ $footersettings[0]['facebook'] }}" target="_blank">FACEBOOK</a>
            @endif
            @if(isset($footersettings[0]) && $footersettings[0]['twitter'])
            <a class="grey-text text-lighten-4 right m-r-10" href="{{ $footersettings[0]['twitter'] }}" target="_blank">TWITTER</a>
            @endif
            @if(isset($footersettings[0]) && $footersettings[0]['instagram'])
            <a class="grey-text text-lighten-4 right m-r-10" href="{{ $footersettings[0]['instagram'] }}" target="_blank">INSTAGRAM</a>
            @endif
            --}}

            <div class="text-center footer-contact">
                <h5 class="white-text uppercase">Contact our team</h5>
                <p>If you need further support to list or find properties, our team is ready to support.</p>
                <div class="row">
                    <div class="col col-md-8">
                        <div class="row">
                            <div class="col s6 m3 text-center">
                                <a href="tel:+977-1-4109200">
                                    <i class="fa fa-phone fa-3x"></i>
                                    <p>+977-1-4109200</p>
                                </a>
                            </div>

                            <div class="col s6 m3 text-center">
                                <a href="viber://add?number=+977-9851156029" title="Viber">
                                    <i class="fab fa-viber fa-3x"></i>
                                    <p>+977-9851156029</p>
                                </a>
                            </div>

                            <div class="col s6 m3 text-center">
                                <a href="mailto:info@prabhurealestate.com"><i class="fa fa-envelope fa-3x"></i>
                                    <p>info@prabhurealestate.com</p>
                                </a>
                            </div>

                            <div class="col s6 m3 text-center">
                                <a href="https://www.facebook.com/prabhurealestatenepal/?modal=admin_todo_tour" target="_blank">
                                    <i class="fab fa-facebook-square fa-3x"></i>
                                    <p> fb.com/prabhurealestatenepal</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-copyright">
    <div class="container text-center">
        @if(isset($footersettings[0]) && $footersettings[0]['footer'])
        {{ $footersettings[0]['footer'] }}
        @else
        © 2019 Developer Canvas Studio.
        @endif
    </div>
</div>
</footer>
