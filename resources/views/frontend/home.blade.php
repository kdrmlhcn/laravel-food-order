@extends('frontend.layouts.app')
@section('slider')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($slides as $key => $slide)
                <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{$key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($slides as $key => $slide)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                <img src="{{ asset('uploads/slides/'.$slide->image) }}" alt="{{ $slide->title ?? "CADA Food Order System" }}">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>{{ $slide->title ?? "" }}</h1>
                        <p>{{ $slide->description ?? "" }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection
@section('content')
    @if($categories)
        @foreach($categories as $category)
            <section class="section-product-categories">
                <h3 class="pre-title">
                    <span>{{ $category->name }}</span>
                </h3>
            </section>

            @if($category->products)
                <div class="album py-5 bg-red">
                    <div class="container">
                        <div class="row">
                            @foreach($category->products as $product)
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                        <img src="{{ asset('uploads/products/'.$product->image) }}" class="img-responsive" alt="{{ $product->name }}">
                                        <div class="card-body">
                                            <p class="card-text">{{ $product->name }}</p>
                                            <p class="card-text">{{ $product->description }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('frontend.add-to-cart', ['id' => $product->id]) }}" class="btn btn-sm btn-outline-danger">Sepete Ekle</a>
                                                </div>
                                                <small class="text-muted">{{ $product->price }} ₺</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
@endsection
