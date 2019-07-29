@extends('frontend.v2.layouts.master')


@section('content')
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Giới thiệu
                </h1>	
                <p class="text-white link-nav"><a href="{{route('home')}}">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('home')}}"> Giới thiệu</a></p>
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->
<!-- Start Sample Area -->
<section class="sample-text-area menu-list-area section-gap">
    <div class="container">
        <h3 class="text-heading">Bánh trung thu 2019</h3>
        <p class="sample-text">
            Every avid independent filmmaker has <b>Bold</b> about making that <i>Italic</i> interest documentary, or short film to show off their creative prowess. Many have great ideas and want to “wow” the<sup>Superscript</sup> scene, or video renters with their big project.  But once you have the<sub>Subscript</sub> “in the can” (no easy feat), how do you move from a <del>Strike</del> through of master DVDs with the <u>“Underline”</u> marked hand-written title inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs, with UPC barcodes and polywrap sitting on your doorstep?  You need to create eye-popping artwork and have your project replicated. Using a reputable full service DVD Replication company like PacificDisc, Inc. to partner with is certainly a helpful option to ensure a professional end result, but to help with your DVD replication project, here are 4 easy steps to follow for good DVD replication results: 

        </p>
    </div>
</section>
@stop