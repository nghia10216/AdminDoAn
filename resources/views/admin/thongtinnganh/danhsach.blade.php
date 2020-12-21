@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin ngành
                    <small>danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if (session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr style="background: #83b7e3" align="center">
                        <th>ID</th>
                        <th>Trình độ đào tạo</th>
                        <th>Hình thức đào tạo</th>
                        <th>Thời gian đào tạo</th>
                        <th>Thời gian tuyển sinh nộp hồ sơ</th>
                        <th>Thời gian xét tuyển và nhập học</th>
                        <th>hình thức tuyển sinh</th>
                        <th>Tôt hợp môn xét tuyển</th>
                        <th>Điểm chuẩn các năm</th>
                        <th>Chỉ tiêu</th>
                        <th>Học phí</th>
                        <th>Ảnh giới thiệu</th>
                        <th>Ngành</th>

                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($thongtinnganhdata as $thongtinnganh)
                    <tr class="odd gradeX" align="center">
                        <td>{{$thongtinnganh->id}}</td>
                        <td>{{$thongtinnganh->TrinhDoDaoTao}}</td>
                        <td>{{$thongtinnganh->HinhThucDaoTao}}</td>
                        <td>{{$thongtinnganh->ThoiGianDaoTao}}</td>
                        <td>{{$thongtinnganh->ThoiGianTuyenSinhNopHoSo}}</td>
                        <td>{{$thongtinnganh->ThoiGianXetTuyenVaNhapHoc}}</td>
                        <td>{{$thongtinnganh->HinhThucTuyenSinh}}</td>
                        <td>{{$thongtinnganh->ToHopMonXetTuyen}}</td>
                        <td>{{$thongtinnganh->DiemChuanCacNam}}</td>
                        <td>{{$thongtinnganh->ChiTieu}}</td>
                        <td>{{$thongtinnganh->HocPhi}}</td>
                        <td><img width="100px" src="upload/anhgioithieu/{{$thongtinnganh->AnhGioiThieu}}" alt=""></td>
                        <td>{{$thongtinnganh->nganh->TenNganh}}</td>
                        {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/thongtinnganh/xoa/{{$thongtinnganh->id}}">
                        Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/thongtinnganh/sua/{{$thongtinnganh->id}}">Edit</a></td> --}}

                        <td class="center"><a class="btn btn-danger" href="admin/thongtinnganh/xoa/{{$thongtinnganh->id}}">
                                <i class="fa fa-trash-o  fa-fw"></i> Xóa</a></td>
                        <td class="center"><a class="btn btn-success" href="admin/thongtinnganh/sua/{{$thongtinnganh->id}}">
                                <i class="fa fa-pencil fa-fw"></i> Sửa</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection