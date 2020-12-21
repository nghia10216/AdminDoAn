<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BoMon;
use App\Models\Nganh;
use App\Models\ThongTinNganh;
use Illuminate\Support\Str;

class ThongTinNganhController extends Controller
{
    public function getDanhSach()
    {
        $thongtinnganh = ThongTinNganh::all();
        return view('admin.thongtinnganh.danhsach', ['thongtinnganhdata' => $thongtinnganh]);
    }

    public function getThem()
    {
        $nganh = Nganh::all();
        return view('admin.thongtinnganh.them', ['nganhdata' => $nganh]);
    }

    public function postThem(Request $request)
    {

        $this->validate(
            $request,
            [
                'AnhGioiThieu' => 'image|mimes:jpeg,jpg,png',
                'TrinhDoDaoTao' => 'required',
                'HinhThucDaoTao' => 'required',
                'ThoiGianDaoTao' => 'required',
                'ThoiGianTuyenSinhNopHoSo' => 'required',
                'ThoiGianXetTuyenVaNhapHoc' => 'required',
                'HinhThucTuyenSinh' => 'required',
                'ToHopMonXetTuyen' => 'required',
                'DiemChuanCacNam' => 'required',
                'ChiTieu' => 'required',
                'HocPhi' => 'required',
                'idNganh' => 'required|unique:ThongTinNganh,idNganh',

            ],
            [
                'AnhGioiThieu.image' => 'File bạn chọn không phải hình ảnh',
                'AnhGioiThieu.mimes' => 'Hình ảnh phải có đuôi JPG, PNG',
                'TrinhDoDaoTao.required' => 'Bạn chưa nhập Trình độ đào tạo',
                'HinhThucDaoTao.required' => 'Bạn chưa nhập Hình thức đào tạo',
                'ThoiGianDaoTao.required' => 'Bạn chưa nhập Thời gian đào tạo',
                'ThoiGianTuyenSinhNopHoSo.required' => 'Bạn chưa nhập Thời gian tuyển sinh và nộp hồ sơ',
                'ThoiGianXetTuyenVaNhapHoc.required' => 'Bạn chưa nhập Thời gian xét tuyển và nhập học',
                'HinhThucTuyenSinh.required' => 'Bạn chưa nhập Hình thức tuyển sinh',
                'ToHopMonXetTuyen.required' => 'Bạn chưa nhập Tổ hợp môn xét tuyển',
                'DiemChuanCacNam.required' => 'Bạn chưa nhập Điểm chuẩn các năm',
                'ChiTieu.required' => 'Bạn chưa nhập Chỉ tiêu',
                'HocPhi.required' => 'Bạn chưa nhập Học phí',

                'idNganh.required' => 'Bạn phải chọn Ngành',
                'idNganh.unique' => 'Ngành bạn chọn đã trùng',

            ]
        );

        $thongtinnganh = new thongtinnganh;
        $thongtinnganh->TrinhDoDaoTao = $request->TrinhDoDaoTao;
        $thongtinnganh->HinhThucDaoTao = $request->HinhThucDaoTao;
        $thongtinnganh->ThoiGianDaoTao = $request->ThoiGianDaoTao;
        $thongtinnganh->ThoiGianTuyenSinhNopHoSo = $request->ThoiGianTuyenSinhNopHoSo;
        $thongtinnganh->ThoiGianXetTuyenVaNhapHoc = $request->ThoiGianXetTuyenVaNhapHoc;
        $thongtinnganh->HinhThucTuyenSinh = $request->HinhThucTuyenSinh;
        $thongtinnganh->ToHopMonXetTuyen = $request->ToHopMonXetTuyen;
        $thongtinnganh->DiemChuanCacNam = $request->DiemChuanCacNam;
        $thongtinnganh->ChiTieu = $request->ChiTieu;
        $thongtinnganh->HocPhi = $request->HocPhi;

        if ($request->hasFile('AnhGioiThieu')) {
            $file = $request->file('AnhGioiThieu');
            $name = $file->getClientOriginalName();
            $filename = Str::random(4) . "_" . $name;

            while (file_exists("upload/anhgioithieu/" . $filename)) {
                $filename = Str::random(4) . "_" . $name;
            }

            $getfilename =  str_replace(' ', '_', $filename);

            $file->move("upload/anhgioithieu", $getfilename);
            $thongtinnganh->AnhGioiThieu = $getfilename;
        } else {
            $thongtinnganh->AnhGioiThieu = "";
        }


        $thongtinnganh->idNganh = $request->idNganh;

        $thongtinnganh->save();

        return redirect('admin/thongtinnganh/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $nganh = Nganh::all();
        $thongtinnganh = ThongTinNganh::find($id);
        return view('admin.thongtinnganh.sua', ['nganhdata' => $nganh, 'thongtinnganhdata' => $thongtinnganh]);
    }

    public function postSua(Request $request, $id)
    {


        $this->validate(
            $request,
            [
                'AnhGioiThieu' => 'image|mimes:jpeg,jpg,png',
                'TrinhDoDaoTao' => 'required',
                'HinhThucDaoTao' => 'required',
                'ThoiGianDaoTao' => 'required',
                'ThoiGianTuyenSinhNopHoSo' => 'required',
                'ThoiGianXetTuyenVaNhapHoc' => 'required',
                'HinhThucTuyenSinh' => 'required',
                'ToHopMonXetTuyen' => 'required',
                'DiemChuanCacNam' => 'required',
                'ChiTieu' => 'required',
                'HocPhi' => 'required',
                'idNganh' => 'required|unique:ThongTinNganh,idNganh,' . $id,

            ],
            [
                'AnhGioiThieu.image' => 'File bạn chọn không phải hình ảnh',
                'AnhGioiThieu.mimes' => 'Hình ảnh phải có đuôi JPG, PNG',
                'TrinhDoDaoTao.required' => 'Bạn chưa nhập Trình độ đào tạo',
                'HinhThucDaoTao.required' => 'Bạn chưa nhập Hình thức đào tạo',
                'ThoiGianDaoTao.required' => 'Bạn chưa nhập Thời gian đào tạo',
                'ThoiGianTuyenSinhNopHoSo.required' => 'Bạn chưa nhập Thời gian tuyển sinh và nộp hồ sơ',
                'ThoiGianXetTuyenVaNhapHoc.required' => 'Bạn chưa nhập Thời gian xét tuyển và nhập học',
                'HinhThucTuyenSinh.required' => 'Bạn chưa nhập Hình thức tuyển sinh',
                'ToHopMonXetTuyen.required' => 'Bạn chưa nhập Tổ hợp môn xét tuyển',
                'DiemChuanCacNam.required' => 'Bạn chưa nhập Điểm chuẩn các năm',
                'ChiTieu.required' => 'Bạn chưa nhập Chỉ tiêu',
                'HocPhi.required' => 'Bạn chưa nhập Học phí',

                'idNganh.required' => 'Bạn phải chọn Ngành',
                'idNganh.unique' => 'Ngành bạn chọn đã trùng',

            ]
        );

        $thongtinnganh = ThongTinNganh::find($id);
        $thongtinnganh->TrinhDoDaoTao = $request->TrinhDoDaoTao;
        $thongtinnganh->HinhThucDaoTao = $request->HinhThucDaoTao;
        $thongtinnganh->ThoiGianDaoTao = $request->ThoiGianDaoTao;
        $thongtinnganh->ThoiGianTuyenSinhNopHoSo = $request->ThoiGianTuyenSinhNopHoSo;
        $thongtinnganh->ThoiGianXetTuyenVaNhapHoc = $request->ThoiGianXetTuyenVaNhapHoc;
        $thongtinnganh->HinhThucTuyenSinh = $request->HinhThucTuyenSinh;
        $thongtinnganh->ToHopMonXetTuyen = $request->ToHopMonXetTuyen;
        $thongtinnganh->DiemChuanCacNam = $request->DiemChuanCacNam;
        $thongtinnganh->ChiTieu = $request->ChiTieu;
        $thongtinnganh->HocPhi = $request->HocPhi;

        if ($request->hasFile('AnhGioiThieu')) {
            $file = $request->file('AnhGioiThieu');
            $name = $file->getClientOriginalName();
            $filename = Str::random(4) . "_" . $name;

            while (file_exists("upload/anhgioithieu/" . $filename)) {
                $filename = Str::random(4) . "_" . $name;
            }

            $getfilename =  str_replace(' ', '_', $filename);

            $file->move("upload/anhgioithieu", $getfilename);

            if ($thongtinnganh->AnhGioiThieu != "") {
                unlink("upload/anhgioithieu/" . $thongtinnganh->AnhGioiThieu);
            }
            $thongtinnganh->AnhGioiThieu = $getfilename;
        } 

        $thongtinnganh->idNganh = $request->idNganh;

        $thongtinnganh->save();


        return redirect('admin/thongtinnganh/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $thongtinnganh = ThongTinNganh::find($id);
        $thongtinnganh->delete();

        return redirect('admin/thongtinnganh/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
