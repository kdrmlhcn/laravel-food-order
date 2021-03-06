@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-2" >
        <li>
            <a href="{{route('admin.home')}}"><i class="fa-home"></i>Yönetim Paneli</a>
        </li>
        <li class="active">

            <a href="#">Slayt Yönetimi</a>
        </li>
        <li class="active">

            <strong>Slayt Ekle</strong>
        </li>
    </ol>

    <h2>Slayt Yönetimi</h2>
    <br />
    @if(session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Yeni Slayt Ekle
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                                <form enctype="multipart/form-data" action="{{route('admin.slider.store')}}" method="POST" class="form-horizontal validate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">Slayt Başlığı </label>
                                        <div class="col-sm-5">
                                            <input type="text" class="slug-name form-control" name="title" value="">
                                            <span class="description">* Slayt başlığını giriniz</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">Slayt Açıklaması </label>
                                        <div class="col-sm-5">
                                            <textarea class="form-control" name="description"></textarea>
                                            <span class="description">* Slayt açıklaması giriniz</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">Slayt Fotoğrafı </label>
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

