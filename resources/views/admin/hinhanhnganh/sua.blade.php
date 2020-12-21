@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hình ảnh ngành
                    <small>{{$hinhanhnganhdata->TenAnh}}</small>
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

                <form action="admin/hinhanhnganh/sua/{{$hinhanhnganhdata->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Ngành</label>
                        <select class="form-control" name="idNganh">
                            @foreach ($nganhdata as $nganh)
                            <option @if ($hinhanhnganhdata->idNganh == $nganh->id)
                                {{"selected"}}
                                @endif
                                value="{{$nganh->id}}">{{$nganh->TenNganh}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên ảnh</label>
                    <input class="form-control" name="TenAnh" placeholder="Nhập tên ảnh" value="{{$hinhanhnganhdata->TenAnh}}" />
                    </div>

                    <div class="form-group">  
                        <label>Hình ảnh</label>
                        <p><img width="400px" src="upload/hinhanhnganh/{{$hinhanhnganhdata->Link}}"></p>
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