@extends('frontend.v2.layouts.master')

@push('header')
@endpush

@section('content')
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Bảng báo giá
                </h1>	
                <p class="text-white link-nav"><a href="{{route('home')}}">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('home')}}"> Báo giá</a></p>
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->
<!-- Start menu-list Area -->
<section class="menu-list-area section-gap">
    <div class="container">
        <div class="row">
            <div class="menu-cat mx-auto">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pizza-tab" data-toggle="pill" href="#pizza" role="tab" aria-controls="pizza" aria-selected="true">Bảng giá</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" id="pills-burger-tab" data-toggle="pill" href="#pills-burger" role="tab" aria-controls="pills-burger" aria-selected="false">Tải về</a>
                  </li> --}}
                </ul>
            </div>
        </div>
        <div id="pills-tabContent" class="tab-content absolute">
            <div class="tab-pane fade show active" id="pizza" role="tabpanel" aria-labelledby="pizza-tab">
                <div class="single-menu-list row justify-content-between align-items-center">
                    <embed src="{{ asset('BGia.pdf') }}" width="100%" height="3500" alt="pdf" />
                    {{-- <table class="table">
                        <thead class="thead" style="background: #ab4444; border-color:#000; color: #000">
                          <tr>
                            <th scope="col">MS</th>
                            <th scope="col">TÊN BÁNH</th>
                            <th scope="col">SL TRỨNG</th>
                            <th scope="col">TRỌNG LƯỢNG(g)</th>
                            <th scope="col">GIÁ TIỀN</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($t1 as $item)
                            <tr>
                                <th scope="row">{{$item->ms}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->sltrung}}</td>
                                <td>{{$item->trongluong}}</td>
                                <td>{{number_format($item->giatien, 0, ',', '.')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    <hr/>
                    <br/>
                      <table class="table">
                        <thead class="thead" style="background:#f58220d9;color:#FFF;border-color:#FFF;">
                            <tr>
                            <th scope="col">MS</th>
                            <th scope="col">TÊN BÁNH</th>
                            <th scope="col">SL TRỨNG</th>
                            <th scope="col">TRỌNG LƯỢNG(g)</th>
                            <th scope="col">GIÁ TIỀN</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($t2 as $item)
                                <tr>
                                    <th scope="row">{{$item->ms}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->sltrung}}</td>
                                    <td>{{$item->trongluong}}</td>
                                    <td>{{number_format($item->giatien, 0, ',', '.')}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                      </table> --}}
                </div>
            </div>
              <div class="tab-pane fade" id="pills-burger" role="tabpanel" aria-labelledby="pills-burger-tab">
                <div class="single-menu-list row justify-content-between align-items-center text-center">
                    <div class="col-lg-12">
                        <a href="#"><h4>Nhấn vào nút bên dưới để tải báo giá về</h4></a>
                        <a target="_blank" href="{{asset('BGia.pdf')}}" class="genric-btn info circle arrow">Tải về<span class="lnr lnr-arrow-down"></span></a>
                        
                    </div>
                </div>
              </div>
        </div>
    </div>	
</section>
<!-- End menu-list Area -->
@stop
@push('footer')
@endpush