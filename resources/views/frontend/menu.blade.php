@extends('frontend.layouts.app')
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
                                                    <button type="button" class="btn btn-sm btn-outline-danger">Satın Al</button>
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
