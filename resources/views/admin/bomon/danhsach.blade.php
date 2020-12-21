@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bộ môn
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
                        <th>Tên bộ môn</th>
                        {{-- <th>Giới thiệu bộ môn</th> --}}
                        <th>Khoa</th>

                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bomondata as $bomon)
                    <tr class="odd gradeX" align="center">
                        <td>{{$bomon->id}}</td>
                        <td>{{$bomon->TenBoMon}}</td>
                        {{-- <td>{{substr($bomon->GioiThieuBoMon,0, 50)}}...</td> --}}

                        <td>{{$bomon->khoa->TenKhoa}}</td>
                        {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bomon/xoa/{{$bomon->id}}">
                        Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/bomon/sua/{{$bomon->id}}">Sửa</a></td> --}}
                        <td class="center"><a class="btn btn-danger" href="admin/bomon/xoa/{{$bomon->id}}">
                                <i class="fa fa-trash-o  fa-fw"></i> Xóa</a></td>
                        <td class="center"><a class="btn btn-success" href="admin/bomon/sua/{{$bomon->id}}">
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