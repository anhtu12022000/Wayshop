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
                    <!-- left column -->
                    <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Form add product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="col-lg-12 row" id="myForm" action="{{url('admin/products/add-product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Loại</label>
                                    <select name="cate_id" class="form-control">
                                        @foreach ($data['Cate'] as $item)
                                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" type="number" name="price" value="{{old('price')}}" placeholder="Please " />
                                    <span class="text-danger"> {{$errors->first('price')}} </span>
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input class="form-control" type="number" name="quantity" value="{{old('quantity')}}" placeholder="Please " />
                                    <span class="text-danger"> {{$errors->first('quantity')}} </span>
                                </div>
                                <div class="form-group">
                                    <label>Short Detail</label>
                                    <textarea name="description" placeholder="Mô tả ngắn" class="form-control" id="" cols="30" rows="10">{{old('description')}}</textarea>
                                    <span class="text-danger"> {{$errors->first('description')}} </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" value="{{old('name')}}" placeholder="Please Enter Name" />
                                    <span class="text-danger"> {{$errors->first('name')}} </span>
                                </div>
                                <div class="form-group">
                                    <label>Sale</label>
                                    <input class="form-control" type="number" name="sale" value="{{old('sale')}}" placeholder="Please " />
                                    <span class="text-danger"> {{$errors->first('sale')}} </span>
                                </div>
                                <div class="form-group">
                                    <label>Images</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" onchange="encodeImageFileAsURL(this)" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="text-danger"> {{$errors->first('img')}} </span>
                                </div>
                                <div class="form-group preview-img mt-5 text-center">
                                    <img src="{{ asset('admin_assets/dist/img/default.png') }}" class="preview-image img-fluid" alt="Ảnh đại diện sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Image Detail</label>
                                    <input type="file" class="form-control" id="imageDetail" name="imageDetail[]" multiple onchange="previewImg(event);" />
                                    <div class="box-preview-img"></div>
                                </div>
                                <script>
                                    function previewImg(event) {
                                        // Gán giá trị các file vào biến files
                                        var files = document.getElementById('imageDetail').files; 
                                    
                                        // Show khung chứa ảnh xem trước
                                        $('.form-group .box-preview-img').show();
                                    
                                        // Thêm chữ "Xem trước" vào khung
                                        $('.form-group .box-preview-img').html('<p>Xem trước</p>');
                                    
                                        // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
                                        for (i = 0; i < files.length; i++)
                                        {
                                            // Thêm thẻ img theo i
                                            $('.form-group .box-preview-img').append('<img style="border: 1px solid #000; padding: 3px;" width="20%" src="" class="+i+">');
                                    
                                            // Thêm src vào mỗi thẻ img theo id = i
                                            $('.form-group .box-preview-img img:eq('+i+')').attr('src', window.webkitURL.createObjectURL(event.target.files[i]));
                                        }   
                                    }
                                </script>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Detail</label>
                                    <textarea class="textarea" name="detail" placeholder="Place some text here" >{{old('detail')}}</textarea>
                                    <span class="text-danger"> {{$errors->first('detail')}} </span>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-info">Add Product</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="{{ url('admin/products') }}" class="btn btn-danger">Hủy</a>
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
                    name: {
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
                    name: {
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
