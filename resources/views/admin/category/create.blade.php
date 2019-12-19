@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-2" >
        <li>
            <a href="{{route('admin.home')}}"><i class="fa-home"></i>Yönetim Paneli</a>
        </li>
        <li class="active">

            <a href="#">Kategori Yönetimi</a>
        </li>
        <li class="active">

            <strong>Kategori Ekle</strong>
        </li>
    </ol>

    <h2>Kategori Yönetimi</h2>
    <br />
    @if(session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Yeni Kategori Ekle
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                                <form enctype="multipart/form-data" action="{{route('admin.category.store')}}" method="POST" class="form-horizontal validate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">Kategori Adı </label>
                                        <div class="col-sm-5">
                                            <input type="text" class="slug-name form-control" name="name" value="" required>
                                            <span class="description">* Kategori adını giriniz</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">Kategori URL</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="slug-url form-control" name="slug" value="" required>
                                            <span class="description">* Kategori url giriniz</span>
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

