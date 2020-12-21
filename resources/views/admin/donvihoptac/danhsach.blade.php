@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn vị hợp tác
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
                        <th>Tên đơn vị hợp tác</th>
                        <th>Link</th>
                        <th>Khoa</th>

                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donvihoptacdata as $donvihoptac)
                    <tr class="odd gradeX" align="center">
                        <td>{{$donvihoptac->id}}</td>
                        <td>{{$donvihoptac->TenDonVi}}</td>
                        <td>
                            <p><img width="100px" src="upload/donvihoptac/{{$donvihoptac->Link}}" alt=""></p>
                            {{$donvihoptac->Link}}
                        </td>

                        <td>{{$donvihoptac->khoa->TenKhoa}}</td>
                        {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/donvihoptac/xoa/{{$donvihoptac->id}}">
                        Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/donvihoptac/sua/{{$donvihoptac->id}}">Sửa</a></td> --}}

                        <td class="center"><a class="btn btn-danger" href="admin/donvihoptac/xoa/{{$donvihoptac->id}}">
                                <i class="fa fa-trash-o  fa-fw"></i> Xóa</a></td>
                        <td class="center"><a class="btn btn-success" href="admin/donvihoptac/sua/{{$donvihoptac->id}}">
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