@extends('admin.layouts.master')
@section('css')
   <link rel="stylesheet" href="admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Bills</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Bills</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <div id="messchangeStatusOrder" style="display: none;" class="alert alert-success">Change Status Order Successfully</div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Grand total</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($data as $value)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $value['name'] }}</td>
                                        <td>{{ $value['phone'] }}</td>
                                        <td>{{ $value['address'] }}</td>
                                        <td>{{ $value['city'] }}</td>
                                        <td>{{ $value['country'] }}</td>
                                        <td>{{ $value['grand_total'] }}</td>
                                        <td>
                                            <select name="status" data-id="{{ $value['id'] }}" id="changeStatusOrder" class="
                                                @if ($value->order_status == 'Shipped')
                                                   badge badge-success
                                                @elseif ($value->order_status == 'Error')
                                                   badge badge-info
                                                @elseif ($value->order_status == 'Delivered')
                                                   badge badge-danger
                                                @else
                                                    badge badge-warning
                                                @endif">
                                                <option value="New">
                                                    New
                                                </option>
                                                <option @if ($value['order_status'] == 'Shipped')
                                                    selected="" 
                                                @endif value="Shipped">
                                                    Shipped
                                                </option>
                                                <option @if ($value['order_status'] == 'Delivered')
                                                    selected="" 
                                                @endif value="Delivered">
                                                    Delivered
                                                </option>
                                                <option @if ($value['order_status'] == 'Error')
                                                    selected="" 
                                                @endif value="Error">
                                                    Error
                                                </option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/bills/view-details/'.$value->id) }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                            <form method="POST" action="{{ url('admin/bills/del-bill/'.$value['id']) }}" onsubmit="return confirm('Are you sure delete bill by: {{ $value['name'] }}')">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>                                        
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Grand total</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <!-- DataTables -->
    <script src="admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- page script -->
    <style>
       
    </style>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });

        $('#changeStatusOrder').change(function () {
            $(this).css('cursor','not-allowed');
            $(this).attr('disabled', '');
            let id = $(this).attr('data-id');
            let status = $(this).val();
            $.ajax({
                header: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: `admin/bills/edit-order-status/${id}`,
                data: {
                    _token: '{!! csrf_token() !!}',
                    status: status
                },
                success: function (data) {
                    let color = '';
                    if (status == 'New') {
                        color = 'badge badge-warning';
                    } else if (status == 'Shipped') {
                        color = 'badge badge-success';
                    } else if (status == 'Delivered') {
                        color = 'badge badge-danger';
                    } else {
                        color = 'badge badge-info';
                    };
                    $('#messchangeStatusOrder').show();
                    $('#changeStatusOrder').removeClass().addClass(color);
                    $('#changeStatusOrder').removeAttr('style').removeAttr('disabled');
                    setTimeout(function() {
                        $('#messchangeStatusOrder').fadeOut('slow');
                    }, 2000);
                },
                error: function () {
                    alert('Error, Please try again!');
                }

            });
        }); 
    </script>
@endsection
