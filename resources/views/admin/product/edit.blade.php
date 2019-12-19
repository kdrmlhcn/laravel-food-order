@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-2" >
        <li>
            <a href="{{route('admin.home')}}"><i class="fa-home"></i>Yönetim Paneli</a>
        </li>
        <li class="active">

            <a href="#">Ürün Yönetimi</a>
        </li>
        <li class="active">

            <strong>Ürün Düzenle</strong>
        </li>
    </ol>

    <h2>Ürün Yönetimi</h2>
    <br />
    @if(session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Ürün Düzenle
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <form enctype="multipart/form-data" action="{{route('admin.product.update', $product->id)}}" method="POST" class="form-horizontal validate">
                            @csrf
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Kategori </label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option {{ $category->id == $product->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Ürün Adı </label>
                                <div class="col-sm-5">
                                    <input type="text" class="slug-name form-control" name="name" value="{{ $product->name }}" required>
                                    <span class="description">* Ürün adını giriniz</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Ürün URL</label>
                                <div class="col-sm-5">
                                    <input type="text" class="slug-url form-control" name="slug" value="{{ $product->slug }}" required>
                                    <span class="description">* Ürün url giriniz</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Ürün Açıklaması </label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Fiyat </label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Ürün Fotoğrafı </label>
                                <div class="col-sm-5">
                                    <input type="file" name="image">
                                </div>
                            </div>

                            <div class="form-group default-padding">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery(function($) {
            $(".slug-url").slugify(".slug-name", {
                separator: '-'
            });
        });
    </script>


@endsection

