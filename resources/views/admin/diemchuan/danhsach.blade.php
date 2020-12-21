@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Điểm chuẩn
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
                        <th>Tổ hợp</th>
                        <th>Điểm trúng tuyển</th>
                        <th>Điều kiện phụ</th>
                        <th>Ngành</th>

                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diemchuandata as $diemchuan)
                    <tr class="odd gradeX" align="center">
                        <td>{{$diemchuan->id}}</td>
                        <td>{{$diemchuan->ToHop}}</td>
                        <td>{{$diemchuan->DiemTrungTuyen}}</td>
                        <td>{{$diemchuan->DieuKienPhu}}</td>


                        <td>{{$diemchuan->nganh->TenNganh}}</td>
                        {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/diemchuan/xoa/{{$diemchuan->id}}">
                        Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/diemchuan/sua/{{$diemchuan->id}}">Sửa</a></td> --}}

                        <td class="center"><a class="btn btn-danger" href="admin/diemchuan/xoa/{{$diemchuan->id}}">
                                <i class="fa fa-trash-o  fa-fw"></i> Xóa</a></td>
                        <td class="center"><a class="btn btn-success" href="admin/diemchuan/sua/{{$diemchuan->id}}">
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