@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khoa
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
                        <th>Tên khoa</th>
                        <th>LogoKhoa</th>
                        <th>SDT</th>
                        <th>Email</th>
                        {{-- <th>GioiThieuKhoa</th> --}}
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($khoadata as $khoa)
                    <tr class="odd gradeX" align="center">
                        <td>{{$khoa->id}}</td>
                        <td>{{$khoa->TenKhoa}}</td>
                        <td><img width="100px" src="upload/logoKhoa/{{$khoa->LogoKhoa}}" alt=""></td>
                        <td>{{$khoa->SDT}}</td>
                        <td>{{$khoa->Email}}</td>
                        {{-- <td>{{$khoa->GioiThieuKhoa}}</td> --}}
                        {{-- <td>{{substr($khoa->GioiThieuKhoa, 0, 50)}}...</td> --}}

                        {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khoa/xoa/{{$khoa->id}}">
                        Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/khoa/sua/{{$khoa->id}}">Sửa</a></td> --}}
                        <td class="center"><a class="btn btn-danger" href="admin/khoa/xoa/{{$khoa->id}}">
                                <i class="fa fa-trash-o  fa-fw"></i> Xóa</a></td>
                        <td class="center"><a class="btn btn-success" href="admin/khoa/sua/{{$khoa->id}}">
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