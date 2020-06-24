@extends('admin.layouts.master')
@section('css')
   <link rel="stylesheet" href="admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
                <h1>Contacts</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Contacts</li>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($data as $value)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $value['name'] }}</td>
                                        <td>{{ $value['email'] }}</td>
                                        <td>{{ $value['company'] }}</td>
                                        <td>{{ $value['subject'] }}</td>
                                        <th>{{ $value['message'] }}</td>
                                        <td>{{ $value['created_at'] }}</td>
                                        <td class="text-center">
                                            <a href="javascipt:void(0)" id="send" rel="{{ $value['email'] }}" class="btn btn-sm btn-warning"><i class="far fa-paper-plane"></i></a>
                                            <form method="POST" action="{{ url('admin/contacts/del-contact/'.$value['id']) }}" onsubmit="return confirm('Are you sure delete contact by: {{ $value['name'] }}')">
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
                                <th>Email</th>
                                <th>Company</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="form-group content" style="display: none;">
                        <label>Content</label>
                        <textarea class="textarea" name="detail" id="content" placeholder="Place some text here" >{{old('detail')}}</textarea>
                        <span class="text-danger"> {{$errors->first('detail')}} </span>


                        <button type="button" class="btn btn-danger" id="sending">Sending</button>
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
    <script src="admin_assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- page script -->
    <script>
        
        $(function () {
            $('.textarea').summernote();
        });

        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });

        let email = '';
        $('#send').click(function () {
            $('.content').fadeIn();
            email = $(this).attr('rel');
        });

        $('#sending').click(function () {
            if ( $('#content').val() == '' ) {
                alert('Please writing some content!');
                return false;
            } else {
                $.ajax({
                  header: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type: 'post',
                  url: `/resend-email`,
                  data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email: email,
                    content: $('#content').val(),
                  },
                  success: function (data) { 
                        alert('Sending mail Succesfully!');
                        window.reload();
                  },
                  error: function () {
                    alert('Error or Email fake, Please try again!');
                  }

                });
            };
        });

    </script>
@endsection