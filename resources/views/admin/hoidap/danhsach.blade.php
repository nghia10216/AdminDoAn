@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hỏi đáp
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
                        <th>Câu hỏi</th>
                        <th>Câu trả lời</th>
                        <th>User</th>

                        <th>Xóa</th>
                        <th>Trả lời</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hoidapdata as $hoidap)
                    <tr class="odd gradeX" align="center">
                        <td>{{$hoidap->id}}</td>
                        <td>{{$hoidap->CauHoi}}</td>
                        <td>{{$hoidap->CauTraLoi}}</td>

                        {{-- <td>{{substr($nganh->CongViecVaNoiLamViec, 0, 50)}}...</td>
                        <td>{{substr($nganh->GioiThieuNganh,0, 50)}}...</td> --}}
                        <td>{{$hoidap->user->email}}</td>
                        {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoidap/xoa/{{$hoidap->id}}">
                        Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/hoidap/sua/{{$hoidap->id}}">Trả lời</a></td> --}}

                        <td class="center"><a class="btn btn-danger" href="admin/hoidap/xoa/{{$hoidap->id}}">
                                <i class="fa fa-trash-o  fa-fw"></i> Xóa</a></td>
                        <td class="center"><a class="btn btn-success" href="admin/hoidap/sua/{{$hoidap->id}}">
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