@extends('front.master')

@section('content')

    <div class="container">
        <div class="heading wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
            <div class="row">
                <div class="text-center col-sm-12">
                    <h2 class="uppercase bold bottom-line">{!!$menu->name!!}</h2>
                     <p>{!!$menu->content!!}</p>
                </div>
            </div>
        </div>
    </div>

@endsection