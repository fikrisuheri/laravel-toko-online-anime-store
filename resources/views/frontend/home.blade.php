@extends('layouts.frontend.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('me') }}/img/1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('me') }}/img/2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('me') }}/img/3.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
    <div class="col-md-12">
      <h2 class="section-title">Produk Terbaru</h2>
      <div class="row">
        @foreach ($data['new_product'] as $new_product)
        <div class="col-6 col-md-4 col-lg-3">
          <div class="card">
            <img class="card-img-top" src="{{ $new_product->thumbnails_path }}" alt="Card image cap">
            <div class="p-2">
              <span class="text-product">{{ $new_product->name }}</span><br>
              <span class="text-price">{{ $new_product->price_rupiah }}</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</div>
@endsection