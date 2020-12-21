@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ngành
                    <small>{{$nganhdata->TenNganh}}</small>
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

                <form action="admin/nganh/sua/{{$nganhdata->id}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Khoa</label>
                        <select class="form-control" name="idKhoa">
                            @foreach ($khoadata as $khoa)
                            <option @if ($nganhdata->idKhoa == $khoa->id)
                                {{"selected"}}
                                @endif
                                value="{{$khoa->id}}">{{$khoa->TenKhoa}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mã ngành</label>
                        <input class="form-control" name="MaNganh" placeholder="Nhập mã ngành"
                            value="{{$nganhdata->MaNganh}}" />
                    </div>

                    <div class="form-group">
                        <label>Tên ngành</label>
                        <input class="form-control" name="TenNganh" placeholder="Nhập tên ngành"
                            value="{{$nganhdata->TenNganh}}" />
                    </div>

                    <div class="form-group">
                        <label>Băng tốt nghiệp</label>
                        <input class="form-control" name="BangTotNghiep" placeholder="Nhập bằng tốt nghiệp"
                            value="{{$nganhdata->BangTotNghiep}}" />
                    </div>

                    <div class="form-group">
                        <label>Công việc và nơi làm việc</label>
                        <textarea name="CongViecVaNoiLamViec" id="demo" class="form-control ckeditor" rows="5">
                            {{$nganhdata->CongViecVaNoiLamViec}}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Giới thiệu ngành</label>
                        <textarea name="GioiThieuNganh" id="demo" class="form-control ckeditor" rows="5">
                            {{$nganhdata->GioiThieuNganh}}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Khung chương trình đào tạo</label>
                        <p>{{$nganhdata->KhungChuongTrinhDaoTao}}</p>

                        <input type="file" class="form-control" name="KhungChuongTrinhDaoTao"
                            placeholder="Nhập khung chương trình đào tạo" />
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