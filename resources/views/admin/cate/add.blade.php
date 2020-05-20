@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Cate</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Form add Cate</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="col-lg-12 row" id="myForm" action="{{ url('admin/cate/add-cate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" value="{{old('name')}}" placeholder="Please Enter name" class="@error('name') is-invalid @enderror" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-info">Add Cate</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="{{ url('admin/cate/') }}" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    </div>
                    <!--/.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    <!-- /.content -->
    </div>
@endsection
@section('script')
    <script src="admin_assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin_assets/plugins/jquery-validation/additional-methods.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            
            $('#myForm').validate({
                rules: {
                    product_name: {
                        // required: true,
                        // email: true,
                    }
                    // ,
                    // password: {
                    //     required: true,
                    //     minlength: 5
                    // },
                    // terms: {
                    //     required: true
                    // },
                },
                messages: {
                    product_name: {
                        // required: "Bạn phải nhập thông tin này cho sản phẩm",
                        // email: "Please enter a vaild email address"
                    }
                    // ,
                    // password: {
                    //     required: "Please provide a password",
                    //     minlength: "Your password must be at least 5 characters long"
                    // },
                    // terms: "Please accept our terms"
                }
            });
        });
    </script>
@endsection