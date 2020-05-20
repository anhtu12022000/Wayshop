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
                    <li class="breadcrumb-item active">Slider</li>
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
                        <h3 class="card-title">Form edit slider</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="col-lg-12 row" id="myForm" action="{{ url('admin/slides/edit-slides/'.$data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-8 row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" value="{{ $data->title }}" placeholder="Please Enter Title" class="@error('title') is-invalid @enderror" />
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Images</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                              <input type="file" onchange="encodeImageFileAsURL(this)" name="image" class="custom-file-input @error('image') is-invalid @enderror"  id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                          </div>
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group preview-img mt-3 text-center">
                                            <img width="200" height="200" src="{{ asset('/front_assets/img/slides/'.$data->image) }}" class="preview-image img-fluid" alt="Ảnh đại diện sản phẩm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-info">Edit Slider</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="{{ url('admin/slides/') }}" class="btn btn-danger">Hủy</a>
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
    <script>
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if(file === undefined){
                $(".preview-img img").attr('src', "images/default.jpg");
            }else{
                var reader = new FileReader();
                reader.onloadend = function() {
                    if(reader.result){
                        $(".preview-img img").attr('src', reader.result);
                    }
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection