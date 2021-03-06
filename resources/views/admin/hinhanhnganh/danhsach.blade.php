@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hình ảnh ngành
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
                        <th>Tên Ảnh</th>
                        <th>Link</th>
                        <th>Ngành</th>

                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hinhanhnganhdata as $hinhanhnganh)
                    <tr class="odd gradeX" align="center">
                        <td>{{$hinhanhnganh->id}}</td>
                        <td>{{$hinhanhnganh->TenAnh}}</td>
                        <td>
                            <p><img width="100px" src="upload/hinhanhnganh/{{$hinhanhnganh->Link}}" alt=""></p>
                            {{$hinhanhnganh->Link}}
                        </td>

                        <td>{{$hinhanhnganh->nganh->TenNganh}}</td>

                        {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hinhanhnganh/xoa/{{$hinhanhnganh->id}}">
                        Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/hinhanhnganh/sua/{{$hinhanhnganh->id}}">Sửa</a></td> --}}
                        <td class="center"><a class="btn btn-danger" href="admin/hinhanhnganh/xoa/{{$hinhanhnganh->id}}">
                                <i class="fa fa-trash-o  fa-fw"></i> Xóa</a></td>
                        <td class="center"><a class="btn btn-success" href="admin/hinhanhnganh/sua/{{$hinhanhnganh->id}}">
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