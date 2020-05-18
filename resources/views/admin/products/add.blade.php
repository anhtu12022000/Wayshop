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
                        <form class="col-lg-12 row" id="myForm" action="{{url('admin.products.add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-8 row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Loại</label>
                                        <select name="cate_id" class="form-control">
                                            @foreach ($data['Categories'] as $item)
                                                <option value="{{$item['id']}}">{{$item['cate_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" name="product_name" value="{{old('product_name')}}" placeholder="Please Enter Name" />
                                        <span class="text-danger"> {{$errors->first('product_name')}} </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input class="form-control" type="number" name="product_price" value="{{old('product_price')}}" placeholder="Please " />
                                        <span class="text-danger"> {{$errors->first('product_price')}} </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input class="form-control" type="number" name="product_quantity" value="{{old('product_quantity')}}" placeholder="Please " />
                                        <span class="text-danger"> {{$errors->first('product_quantity')}} </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Sale</label>
                                        <input class="form-control" type="number" name="product_sale" value="{{old('product_sale')}}" placeholder="Please " />
                                        <span class="text-danger"> {{$errors->first('product_sale')}} </span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Quà Tặng</label>
                                        <input class="form-control" type="number" name="product_gift" value="{{old('product_gift')}}" placeholder="Please " />
                                        <span class="text-danger"> {{$errors->first('product_gift')}} </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Short Detail</label>
                                        <textarea name="product_short_detail" placeholder="Mô tả ngắn" class="form-control" id="" cols="30" rows="10">{{old('product_short_detail')}}</textarea>
                                        <span class="text-danger"> {{$errors->first('product_slug')}} </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Images</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                              <input type="file" onchange="encodeImageFileAsURL(this)" name="product_img" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                          </div>
                                        <span class="text-danger"> {{$errors->first('product_img')}} </span>
                                        <div class="form-group preview-img mt-3 text-center">
                                            <img src="images/default.jpg" class="preview-image img-fluid" alt="Ảnh đại diện sản phẩm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Detail</label>
                                        <textarea class="textarea" name="product_detail" placeholder="Place some text here" >{{old('product_detail')}}</textarea>
                                        <span class="text-danger"> {{$errors->first('product_detail')}} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Màn Hình</label>
                                    <input class="form-control" type="text" name="man_hinh" value="{{old('man_hinh')}}" placeholder="Please " />
                                    <span class="text-danger"> {{$errors->first('man_hinh')}} </span>
                                </div>
                                <div class="form-group">
                                    <label>Hệ Điều Hành</label>
                                    <input class="form-control" type="text" name="hdh" value="{{old('hdh')}}" placeholder="Please " />
                                    <span class="text-danger"> {{$errors->first('hdh')}} </span>
                                </div>
                                <div class="form-group">
                                    <label>CPU</label>
                                    <input class="form-control" type="text" name="cpu" value="{{old('cpu')}}" placeholder="Please " />
                                    <span class="text-danger"> {{$errors->first('cpu')}} </span>
                                </div>
                                <div class="form-group">
                                    <label>RAM</label>
                                    <input class="form-control" type="text" name="ram" value="{{old('ram')}}" placeholder="Please " />
                                    <span class="text-danger"> {{$errors->first('ram')}} </span>
                                </div>
                                <div class="form-group">
                                    <label>ROM</label>
                                    <input class="form-control" type="text" name="rom" value="{{old('rom')}}" placeholder="Please " />
                                    <span class="text-danger"> {{$errors->first('rom')}} </span>
                                </div>
                                <div class="form-group">
                                    <label>Camera</label>
                                    <input class="form-control" type="text" name="camera" value="{{old('camera')}}" placeholder="Please " />
                                    <span class="text-danger"> {{$errors->first('camera')}} </span>
                                </div>
                                <div class="form-group">
                                    <label>Dung Lượng</label>
                                    <input class="form-control" type="text" name="pin" value="{{old('pin')}}" placeholder="Please " />
                                    <span class="text-danger"> {{$errors->first('pin')}} </span>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-info">Add Product</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="{{ url('admin/pots/add') }}" class="btn btn-danger">Hủy</a>
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