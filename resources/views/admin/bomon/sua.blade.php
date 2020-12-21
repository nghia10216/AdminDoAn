@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bộ môn
                    <small>{{$bomondata->TenBoMon}}</small>
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

                <form action="admin/bomon/sua/{{$bomondata->id}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Khoa</label>
                        <select class="form-control" name="idKhoa">
                            @foreach ($khoadata as $khoa)
                            <option @if ($bomondata->idKhoa == $khoa->id)
                                {{"selected"}}
                                @endif
                                value="{{$khoa->id}}">{{$khoa->TenKhoa}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên bộ môn</label>
                        <input class="form-control" name="TenBoMon" placeholder="Nhập tên bộ môn"
                            value="{{$bomondata->TenBoMon}}" />
                    </div>

                    <div class="form-group">
                        <label>Giới thiệu bộ môn</label>
                        <textarea name="GioiThieuBoMon" id="demo" class="form-control ckeditor" rows="5">
                            {{$bomondata->GioiThieuBoMon}}
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