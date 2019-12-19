@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-2" >
        <li>
            <a href="{{route('admin.home')}}"><i class="fa-home"></i>Yönetim Paneli</a>
        </li>
        <li class="active">

            <strong>Siparişler</strong>
        </li>
    </ol>

    <h2>Siparişler</h2>

    <br>

    @if(session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif

    <div class="row">
        <div id="DeleteModal" class="modal fade text-danger" role="dialog">
            <div class="modal-dialog ">
                <!-- Modal content-->
                <form action="" id="deleteForm" method="GET">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">SİPARİŞ SİLME İŞLEMİ</h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Bu siparişi silmek istediğinize emin misiniz?</p>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Hayır</button>
                                <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Evet</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">

            <table id="datatable" class="table table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Ad Soyad</th>
                    <th>E-Posta</th>
                    <th>Telefon</th>
                    <th>Adres</th>
                    <th>Toplam Tutar</th>
                    <th>Sipariş Durumu</th>
                    <th style="width: 200px;">İşlemler</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#datatable").DataTable({
                lengthMenu: [[10, 20, -1], [10, 20, "All"]],
                processing: true,
                serverSide: true,
                ajax:{
                    type:"POST",
                    headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url:'{{ route('admin.order.data') }}',
                },
                columns: [
                    {data:'id', name:'id', ordarable: true, searchable: false},
                    {data:'full_name', name:'full_name', ordarable: true, searchable: false},
                    {data:'email', name:'email', ordarable: true, searchable: false},
                    {data:'phone', name:'phone', ordarable: true, searchable: false},
                    {data:'address', name:'address', ordarable: true, searchable: false},
                    {data:'order_total', name:'order_total', ordarable: true, searchable: false},
                    {data:'status', name:'status', ordarable: true, searchable: false},
                    {data: 'button', name: 'button', orderable:false, searchable:false},
                ]

            });
        });
    </script>

    <script type="text/javascript">
        function deleteData(id)
        {
            var ida = id;
            var url = '{{ route("admin.order.destroy", ":ida") }}';
            url = url.replace(':ida', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>

@endsection
