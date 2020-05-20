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
                <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
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
                        <h3 class="card-title">DataTable with default features</h3><a href="{{ url('admin/products/add-product') }}" class="btn btn-info float-right">Thêm</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>SDT</th>
                                <th>Total</th>
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
                                        <td><img src="{{ $value['image'] }}" width="60" alt=""></td>
                                        <td>{{ number_format($value['price']) }} VNĐ</td>
                                        <td>{{ number_format($value['sale'])}} VNĐ</td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/products/edit',$value->id) }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('admin/products/edit-product',$value['id']) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="{{ url('admin/products/del-product',$value['id']) }}" onclick="return confirm('Bạn có muốn xóa không?');" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>SDT</th>
                                <th>Total</th>
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
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
