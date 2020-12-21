@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ngành
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
                        <th>Mã ngành</th>
                        <th>Tên ngành</th>
                        <th>Bằng tốt nghiệp</th>
                        {{-- <th>Công việc và nơi làm việc</th>
                        <th>Giới thiệu ngành</th> --}}
                        <th>Khung chương trình đào tạo</th>
                        <th>Khoa</th>


                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nganhdata as $nganh)
                    <tr class="odd gradeX" align="center">
                        <td>{{$nganh->id}}</td>
                        <td>{{$nganh->MaNganh}}</td>
                        <td>{{$nganh->TenNganh}}</td>
                        <td>{{$nganh->BangTotNghiep}}</td>
                        {{-- <td>{{substr($nganh->CongViecVaNoiLamViec, 0, 50)}}...</td>
                        <td>{{substr($nganh->GioiThieuNganh,0, 50)}}...</td> --}}
                        <td>{{$nganh->KhungChuongTrinhDaoTao}}</td>

                        <td>{{$nganh->khoa->TenKhoa}}</td>
                        {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nganh/xoa/{{$nganh->id}}">
                        Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/nganh/sua/{{$nganh->id}}">Sửa</a></td> --}}

                        <td class="center"><a class="btn btn-danger" href="admin/nganh/xoa/{{$nganh->id}}">
                                <i class="fa fa-trash-o  fa-fw"></i> Xóa</a></td>
                        <td class="center"><a class="btn btn-success" href="admin/nganh/sua/{{$nganh->id}}">
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