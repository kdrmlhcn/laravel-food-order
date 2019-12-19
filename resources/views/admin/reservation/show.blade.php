@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-2" >
        <li>
            <a href="{{route('admin.home')}}"><i class="fa-home"></i>Yönetim Paneli</a>
        </li>
        <li class="active">

            <strong>Rezervasyon Detayı</strong>
        </li>
    </ol>

    <h2>Rezervasyon Detayı</h2>
    <br />
    @if(session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Rezervasyon Detayı
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <form enctype="multipart/form-data" method="GET" class="form-horizontal validate">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Ad Soyad </label>
                                <div class="col-sm-5">
                                    <input type="text" class="slug-name form-control" value="{{ $reservation->name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Telefon Numarası </label>
                                <div class="col-sm-5">
                                    <input type="phone" class="slug-url form-control" value="{{ $reservation->phone }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">E-Posta </label>
                                <div class="col-sm-5">
                                    <input type="email" class="slug-url form-control" value="{{ $reservation->email }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Rezervasyon Türü </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="{{ $reservation->type }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Rezervasyon Tarihi </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="{{ $reservation->date }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Açıklama </label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" disabled>{{ $reservation->message }}</textarea>
                                </div>
                            </div>

                            <div class="form-group default-padding">
                                <a href="{{ route('admin.reservation.index') }}" class="btn btn-blue">
                                    <i class="entypo-logout left"></i>Geri Dön
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

