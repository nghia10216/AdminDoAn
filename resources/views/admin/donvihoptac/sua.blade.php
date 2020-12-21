@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn vị hợp tác
                    <small>{{$donvihoptacdata->TenDonVi}}</small>
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

                <form action="admin/donvihoptac/sua/{{$donvihoptacdata->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Khoa</label>
                        <select class="form-control" name="idKhoa">
                            @foreach ($khoadata as $khoa)
                            <option @if ($donvihoptacdata->idKhoa == $khoa->id)
                                {{"selected"}}
                                @endif
                                value="{{$khoa->id}}">{{$khoa->TenKhoa}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên đơn vị hợp tác</label>
                    <input class="form-control" name="TenDonVi" placeholder="Nhập tên đơn vị hợp tác" value="{{$donvihoptacdata->TenDonVi}}" />
                    </div>

                    <div class="form-group">  
                        <label>Hình ảnh</label>
                        <p><img width="400px" src="upload/donvihoptac/{{$donvihoptacdata->Link}}"></p>
                        <input type="file" name="Link" class="form-control">
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