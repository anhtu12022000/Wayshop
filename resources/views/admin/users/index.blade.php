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
                        <div id="messageEn" style="display: none;" class="alert alert-success">Status Enabled</div>
                        <div id="messageDi" style="display: none;" class="alert alert-success">Status Disabled</div>
                        <div id="messChangeRole" style="display: none;" class="alert alert-success">Change Role Successfully</div>
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
                                        <td>   
                                            <input type="checkbox" class="CouponsStatus btn btn-success" rel="{{ $value['id'] }}" data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger" @if ($value['status'] == 1)
                                            checked="" 
                                            @endif/>
                                        </td>
                                    <td>
                                        <select name="roles" data-id="{{ $value['id'] }}" data-name="{{ $value['roles'][0]->name }}" class="form-control" id="changeRole">
                                            @foreach ($role as $item)
                                                <option @if ($value['roles'][0]->name == $item->name)
                                                    selected="" 
                                                @endif value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach 
                                        </select>
                                    </td>
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

        $('#changeRole').change(function () {
            let id = $(this).attr('data-id');
            let oldRole = $(this).attr('data-name');
            let newRole = $(this).val();
            $.ajax({
                header: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: 'admin/role/edit-role-user',
                data: {
                    _token: '{!! csrf_token() !!}',
                    oldRole: oldRole,
                    newRole: newRole,
                    id: id
                },
                success: function (data) {
                    $('#messChangeRole').show();
                    $('#changeRole').attr('data-name', newRole);
                    setTimeout(function() {
                        $('#messChangeRole').fadeOut('slow');
                    }, 2000);
                },
                error: function () {
                    alert('Error, Please try again!');
                }

            });
        });    

        $('.CouponsStatus').change(function () {
                let id = $(this).attr('rel');
                if ($(this).prop("checked") == true) {
                    $.ajax({
                        header: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'post',
                        url: 'admin/user/update-status',
                        data: {
                            _token: '{!! csrf_token() !!}',
                            status: 1,
                            id: id,
                            
                        },
                        success: function (data) {
                            $('#messageEn').show();
                            setTimeout(function() {
                                $('#messageEn').fadeOut('slow');
                            }, 2000);
                        },
                        error: function () {
                            alert('Error, Please try again!');
                        }

                    })
                } else {
                    $.ajax({
                        header: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'post',
                        url: 'admin/user/update-status',
                        data: {
                            _token: '{!! csrf_token() !!}',
                            status: 0,
                            id: id
                        },
                        success: function (data) {
                            $('#messageDi').show();
                            setTimeout(function() {
                                $('#messageDi').fadeOut('slow');
                            }, 2000);
                        },
                        error: function () {
                            alert('Error, Please try again!');
                        }

                    })
                }
            });

    </script>
@endsection
