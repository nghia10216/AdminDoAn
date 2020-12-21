<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nganh;
use App\Models\HinhAnhNganh;
use App\Models\DiemChuan;
use App\Models\ThongTinNganh;
use App\Models\Khoa;
use Illuminate\Support\Str;


class NganhController extends Controller
{
    public function getDanhSach()
    {
        $nganh = Nganh::all();
        return view('admin.nganh.danhsach', ['nganhdata' => $nganh]);
    }

    public function getThem()
    {
        $khoa = Khoa::all();
        return view('admin.nganh.them', ['khoadata' => $khoa]);
    }

    public function postThem(Request $request)
    {

        $this->validate(
            $request,
            [
                'KhungChuongTrinhDaoTao' => 'max:10000|mimes:doc,docx,pdf',
                'MaNganh' => 'required|unique:Nganh,MaNganh|min:3|max:20',
                'TenNganh' => 'required|unique:Nganh,TenNganh|min:3|max:200',
                'idKhoa' => 'required',

                'BangTotNghiep' => 'required',
                'CongViecVaNoiLamViec' => 'required',
                'GioiThieuNganh' => 'required',
            ],
            [
                'KhungChuongTrinhDaoTao.mimes' => 'File bạn chọn phải có định dạng doc,docx,pdf',
                'MaNganh.required' => 'Bạn chưa nhập mã ngành',
                'MaNganh.unique' => 'Mã ngành đã tồn tại',
                'MaNganh.min' => 'Mã ngành phải có độ dài từ 3 cho đến 10 ký tự',
                'MaNganh.max' => 'Mã ngành phải có độ dài từ 3 cho đến 10 ký tự',

                'TenNganh.required' => 'Bạn chưa nhập tên ngành',
                'TenNganh.unique' => 'Tên ngành đã tồn tại',
                'TenNganh.min' => 'Tên ngành phải có độ dài từ 3 cho đến 200 ký tự',
                'TenNganh.max' => 'Tên ngành phải có độ dài từ 3 cho đến 200 ký tự',


                'idKhoa.required' => 'Bạn phải chọn Khoa',
                'BangTotNghiep.required' => 'Bạn chưa nhập bằng tốt nghiệp',
                'CongViecVaNoiLamViec.required' => 'Bạn chưa nhập công việc và nơi làm việc',
                'GioiThieuNganh.required' => 'Bạn chưa nhập giới thiệu ngành',

            ]
        );

        $nganh = new Nganh;
        $nganh->MaNganh = $request->MaNganh;
        $nganh->TenNganh = $request->TenNganh;
        $nganh->BangTotNghiep = $request->BangTotNghiep;
        $nganh->CongViecVaNoiLamViec = $request->CongViecVaNoiLamViec;
        $nganh->GioiThieuNganh = $request->GioiThieuNganh;
        $nganh->idKhoa = $request->idKhoa;


        if ($request->hasFile('KhungChuongTrinhDaoTao')) {
            $file = $request->file('KhungChuongTrinhDaoTao');
            $name = $file->getClientOriginalName();
            $filename = Str::random(4) . "_" . $name;

            while (file_exists("upload/khungchuongtrinhdaotao/" . $filename)) {
                $filename = Str::random(4) . "_" . $name;
            }


            $getfilename =  str_replace(' ', '_', $filename);

            $file->move("upload/khungchuongtrinhdaotao", $getfilename);
            $nganh->khungchuongtrinhdaotao = $getfilename;
        } else {
            $nganh->khungchuongtrinhdaotao = "";
        }

        $nganh->save();

        return redirect('admin/nganh/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $khoa = Khoa::all();
        $nganh = Nganh::find($id);
        return view('admin.nganh.sua', ['nganhdata' => $nganh, 'khoadata' => $khoa]);
    }

    public function postSua(Request $request, $id)
    {
        $nganh = Nganh::find($id);

        $this->validate(
            $request,
            [
                'KhungChuongTrinhDaoTao' => 'max:10000|mimes:doc,docx,pdf',
                'MaNganh' => 'required|min:3|max:20|unique:Nganh,MaNganh,' . $id,
                'TenNganh' => 'required|min:3|max:200|unique:Nganh,TenNganh,' . $id,
                'idKhoa' => 'required',
                'BangTotNghiep' => 'required',
                'CongViecVaNoiLamViec' => 'required',
                'GioiThieuNganh' => 'required',
            ],
            [
                'KhungChuongTrinhDaoTao.mimes' => 'File bạn chọn phải có định dạng doc,docx,pdf',
                'MaNganh.required' => 'Bạn chưa nhập mã ngành',
                'MaNganh.unique' => 'Mã ngành đã tồn tại',
                'MaNganh.min' => 'Mã ngành phải có độ dài từ 3 cho đến 10 ký tự',
                'MaNganh.max' => 'Mã ngành phải có độ dài từ 3 cho đến 10 ký tự',

                'TenNganh.required' => 'Bạn chưa nhập tên ngành',
                'TenNganh.unique' => 'Tên ngành đã tồn tại',
                'TenNganh.min' => 'Tên ngành phải có độ dài từ 3 cho đến 200 ký tự',
                'TenNganh.max' => 'Tên ngành phải có độ dài từ 3 cho đến 200 ký tự',


                'idKhoa.required' => 'Bạn phải chọn Khoa',
                'BangTotNghiep.required' => 'Bạn chưa nhập bằng tốt nghiệp',
                'CongViecVaNoiLamViec.required' => 'Bạn chưa nhập công việc và nơi làm việc',
                'GioiThieuNganh.required' => 'Bạn chưa nhập giới thiệu ngành',

            ]
        );

        $nganh->MaNganh = $request->MaNganh;
        $nganh->TenNganh = $request->TenNganh;
        $nganh->BangTotNghiep = $request->BangTotNghiep;
        $nganh->CongViecVaNoiLamViec = $request->CongViecVaNoiLamViec;
        $nganh->GioiThieuNganh = $request->GioiThieuNganh;
        $nganh->idKhoa = $request->idKhoa;

        if ($request->hasFile('KhungChuongTrinhDaoTao')) {
            $file = $request->file('KhungChuongTrinhDaoTao');
            $name = $file->getClientOriginalName();
            $filename = Str::random(4) . "_" . $name;

            while (file_exists("upload/khungchuongtrinhdaotao/" . $filename)) {
                $filename = Str::random(4) . "_" . $name;
            }

            $getfilename =  str_replace(' ', '_', $filename);

            $file->move("upload/khungchuongtrinhdaotao", $getfilename);

            if ($nganh->khungchuongtrinhdaotao != "") {
                unlink("upload/khungchuongtrinhdaotao/" . $nganh->khungchuongtrinhdaotao);
            }
            $nganh->khungchuongtrinhdaotao = $getfilename;
        } 
        // else {
        //     $nganh->khungchuongtrinhdaotao = "";
        // }

        $nganh->save();

        return redirect('admin/nganh/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $nganh = Nganh::find($id);


        $hinhanhnganh = HinhAnhNganh::where('idNganh', $id); 
        $hinhanhnganh->delete();
        $diemchuan = DiemChuan::where('idNganh', $id); 
        $diemchuan->delete();
        $thongtinnganh = ThongTinNganh::where('idNganh', $id); 
        $thongtinnganh->delete();

        $nganh->delete();

        return redirect('admin/nganh/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
