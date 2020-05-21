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
                <li class="breadcrumb-item active">user</li>
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
                        <h3 class="card-title">DataTable with default features</h3><a href="{{ url('admin/user/add') }}" class="btn btn-info float-right">Add</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-danger">{{session('success')}}</div>
                          @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th width="20%">Image</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Permission</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($data as $value)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $value['name'] }}</td>
                                        <td><img width="100%" src="{{ asset('/front_assets/img/user/'.$value['image']) }}" width="60" alt=""></td>
                                        <td>{{ $value['email'] }}</td>
                                        <td>{{ $value['phone'] }}</td>
                                        <td>{{ $value['address'] }}</td>
                                        <td>@if ($value['status'] == 1)
                                            Active
                                        @else
                                            Not Active
                                        @endif    
                                    </td>
                                    <td>@if (isset($value['roles'][0]->name))
                                        {{ $value['roles'][0]->name }}
                                    @endif</td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/user/edit-user/'.$value['id']) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{ url('admin/post/del-user/'.$value['id']) }}" onsubmit="return confirm('Are you sure delete post: {{ $value['title'] }}')">
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
                                <th>Image</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Address</th>
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