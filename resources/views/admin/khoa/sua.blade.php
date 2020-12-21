@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khoa
                <small>{{$khoadata->TenKhoa}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if (session('thongbao'))
                    <div class="alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                
                <form action="admin/khoa/sua/{{$khoadata->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label>Tên khoa</label>
                    <input class="form-control" name="TenKhoa" placeholder="Nhập tên khoa" value="{{$khoadata->TenKhoa}}"/>
                    </div>

                     {{-- insert Hinh --}}
                     <div class="form-group">  
                        <label>Logo Khoa</label>
                        <p><img width="400px" src="upload/logokhoa/{{$khoadata->LogoKhoa}}"></p>
                        <input type="file" name="LogoKhoa" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại</label>
                    <input class="form-control" name="SDT" placeholder="Nhập số điện thoại" value="{{$khoadata->SDT}}"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="Email" placeholder="Nhập email" value="{{$khoadata->Email}}"/>
                    </div>
                   
                    <div class="form-group">
                        <label>Giới thiệu khoa</label>
                        <textarea name="GioiThieuKhoa" id = "demo" class="form-control ckeditor" rows="5">
                            {{$khoadata->GioiThieuKhoa}}
                        </textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection

@section('script')
<script>
    $(document).ready(function() {
        var idTheLoai = $('#TheLoai').val();
            $.get("admin/ajax/loaitin/"+idTheLoai, function(data) {
                $("#LoaiTin").html(data);
            });
        $("#TheLoai").change(function() {
            var idTheLoai = $(this).val();
            $.get("admin/ajax/loaitin/"+idTheLoai, function(data) {
                $("#LoaiTin").html(data);
            });
        });
    });
</script>
@endsection