@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m8">
                    <div class="contact-content">
                        <h4 class="contact-title">{!! $page->title !!}</h4>
                        {!! $page->description !!}
                    </div>
                </div> <!-- /.col -->


            </div>
        </div>
    </section>

@endsection
