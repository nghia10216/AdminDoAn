@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Điểm chuẩn
                    <small>Thêm</small>
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

                <form action="admin/diemchuan/them" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Ngành</label>
                        <select class="form-control" name="idNganh">
                            @foreach ($nganhdata as $nganh)
                            <option value="{{$nganh->id}}">{{$nganh->TenNganh}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tổ hợp</label>
                        <input class="form-control" name="ToHop" placeholder="Nhập tổ hợp" />
                    </div>

                    <div class="form-group">
                        <label>Điểm trúng tuyển</label>
                        <input class="form-control" name="DiemTrungTuyen" placeholder="Nhập điểm trúng tuyển" />
                    </div>

                    <div class="form-group">
                        <label>Điều kiện phụ</label>
                        <input class="form-control" name="DieuKienPhu" placeholder="Nhập điều kiện phụ" />
                    </div>


                    <button type="submit" class="btn btn-default">Thêm</button>
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