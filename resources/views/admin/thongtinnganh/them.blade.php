@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin ngành
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

                <form action="admin/thongtinnganh/them" method="POST" enctype="multipart/form-data">
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
                        <label>Trình độ đào tạo</label>
                        <input class="form-control" name="TrinhDoDaoTao" placeholder="Nhập trình độ đào tạo" />
                    </div>

                    <div class="form-group">
                        <label>Hình thức đào tạo</label>
                        <input class="form-control" name="HinhThucDaoTao" placeholder="Nhập hình thức đào tạo" />
                    </div>

                    <div class="form-group">
                        <label>Thời gian đào tạo</label>
                        <input class="form-control" name="ThoiGianDaoTao" placeholder="Nhập thời gian đào tạo tạo" />
                    </div>

                    <div class="form-group">
                        <label>Thời gian tuyển sinh và nộp hồ sơ</label>
                        <input class="form-control" name="ThoiGianTuyenSinhNopHoSo"
                            placeholder="Nhập thời gian tuyển sinh và nộp hồ sơ" />
                    </div>

                    <div class="form-group">
                        <label>Thời gian xét tuyển và nhập học</label>
                        <input class="form-control" name="ThoiGianXetTuyenVaNhapHoc"
                            placeholder="Nhập thòi gian xét tuyển và nhập học" />
                    </div>

                    <div class="form-group">
                        <label>Hình thức tuyển sinh</label>
                        <input class="form-control" name="HinhThucTuyenSinh" placeholder="Nhập hình thức tuyển sinh" />
                    </div>

                    <div class="form-group">
                        <label>Tổ hợp môn xét tuyển</label>
                        <input class="form-control" name="ToHopMonXetTuyen" placeholder="Nhập tổ hợp môn xét tuyển" />
                    </div>

                    <div class="form-group">
                        <label>Điểm chuẩn các năm</label>
                        <input class="form-control" name="DiemChuanCacNam" placeholder="Nhập điểm chuẩn các năm" />
                    </div>

                    <div class="form-group">
                        <label>Chỉ tiêu</label>
                        <input class="form-control" name="ChiTieu" placeholder="Nhập chỉ tiêu" />
                    </div>

                    <div class="form-group">
                        <label>Học phí</label>
                        <input class="form-control" name="HocPhi" placeholder="Nhập học phí" />
                    </div>

                     {{-- insert Hinh --}}
                     <div class="form-group">
                        <label>Ảnh giới thiệu</label>
                        <input type="file" name="AnhGioiThieu" class="form-control">
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