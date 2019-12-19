@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-basket"></i></div>
                    <div class="num" data-start="0" data-end="{{ $orderCount }}" data-postfix="" data-duration="1500" data-delay="0">0</div>

                    <h3>Siparişler</h3>
                    <p>toplam sipariş sayısı</p>
                </div>

            </div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="{{ $reservationCount }}" data-postfix="" data-duration="1500" data-delay="200">0</div>

                    <h3>Rezervasyonlar</h3>
                    <p>toplam rezervasyon sayısı</p>
                </div>

            </div>

            <div class="clear visible-xs"></div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-aqua">
                    <div class="icon"><i class="entypo-bag"></i></div>
                    <div class="num" data-start="0" data-end="{{ $productCount }}" data-postfix="" data-duration="1500" data-delay="400">0</div>

                    <h3>Ürünler</h3>
                    <p>toplam ürün sayısı</p>
                </div>

            </div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="entypo-chart-line"></i></div>
                    <div class="num" data-start="0" data-end="{{ $contactCount }}" data-postfix="" data-duration="1500" data-delay="600">0</div>

                    <h3>Gelen Kutusu</h3>
                    <p>toplam mesaj sayısı</p>
                </div>

            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Son Siparişler</div>
                    </div>
                    <div class="panel-body with-table">
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad Soyad</th>
                                <th>Telefon</th>
                                <th>Toplam Tutar</th>
                                <th>Durumu</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $order->first_name." ".$order->last_name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->order_total }}</td>
                                    <td>{{ $order->statusTypes($order->status_id)['name'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Son Rezervasyonlar</div>
                    </div>
                    <div class="panel-body with-table">
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad Soyad</th>
                                <th>Telefon</th>
                                <th>Tür</th>
                                <th>Tarih</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $key => $reservation)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $reservation->name }}</td>
                                    <td>{{ $reservation->phone }}</td>
                                    <td>{{ $reservation->type }}</td>
                                    <td>{{ $reservation->date }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="main">

            &copy; <script>
                document.write(new Date().getFullYear())
            </script> <strong>CADA Food Order System</strong>

        </footer>
    </div>
@endsection
