@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" href="admin_assets/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="admin_assets/plugins/select2/css/select2.min.css">
@endsection
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
                    <li class="breadcrumb-item active">Edit Coupons</li>
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
                        <h3 class="card-title">Form add Coupons</h3>
                        </div>
                        <div>
                            @if (session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="col-lg-12 row" id="myForm" action="{{ url('admin/coupons/add-coupons/')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-8 row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Coupons Code</label>
                                        <input class="form-control" name="coupon_code" value="{{old('coupon_code')}}" placeholder="Please Enter Coupons Code" class="@error('coupon_code') is-invalid @enderror" />
                                        @error('coupon_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input class="form-control" name="amount" value="{{old('amount')}}" placeholder="Please Enter Amount" class="@error('amount') is-invalid @enderror" />
                                        @error('amount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Amount Type</label>
                                        <select name="amount_type" class="form-control" id="">
                                            <option value="percentage">Percentage</option>
                                            <option value="fixed">Fixed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Expiry Date</label>
                                        <input type="date" class="form-control" name="expiry_date" placeholder="Please Enter Expiry Date" class="@error('expiry_date') is-invalid @enderror" />
                                        @error('expiry_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-info">Add Coupons</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="{{ url('admin/post/') }}" class="btn btn-danger">Hủy</a>
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
    <script src="admin_assets/plugins/summernote/summernote-bs4.min.js"></script>

    <script>
        $(function () {
            $('.textarea').summernote();
        })
    </script>
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