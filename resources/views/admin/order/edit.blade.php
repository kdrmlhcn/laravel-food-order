@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-2" >
        <li>
            <a href="{{route('admin.home')}}"><i class="fa-home"></i>Yönetim Paneli</a>
        </li>
        <li class="active">

            <strong>Sipariş Güncelle</strong>
        </li>
    </ol>

    <h2>Sipariş Güncelle</h2>
    <br />
    @if(session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Sipariş Güncelle
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <form enctype="multipart/form-data" action="{{route('admin.order.update', $order->id)}}" method="POST" class="form-horizontal validate">
                            @csrf

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Ad Soyad </label>
                                <div class="col-sm-5">
                                    <input type="text" class="slug-name form-control" value="{{ $order->first_name.$order->last_name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">E-Posta</label>
                                <div class="col-sm-5">
                                    <input type="phone" class="slug-url form-control" value="{{ $order->email }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Telefon </label>
                                <div class="col-sm-5">
                                    <input type="email" class="slug-url form-control" value="{{ $order->phone }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Adres </label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" disabled>{{ $order->address }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Ürünler </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="{{ $order->order_items }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Sipariş Notu </label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" disabled>{{ $order->comment }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Ödeme Tipi </label>
                                <div class="col-sm-5">
                                    <select class="form-control" disabled>
                                        @foreach($paymentTypes as $key => $paymentType)
                                            <option {{ $key == $order->payment_type ? 'selected' : '' }} value="{{ $key }}">{{ $paymentType }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Toplam Tutar </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="{{ $order->order_total }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Durumu </label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="status_id">
                                        @foreach($statuses as $key => $status)
                                            <option {{ $key == $order->status_id ? 'selected' : '' }} value="{{ $key }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group default-padding">
                                <button type="submit" class="btn btn-success">Güncelle</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

