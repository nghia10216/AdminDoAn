<?php

namespace App\Http\Controllers;

use App\Models\BoMon;
use App\Models\DiemChuan;
use App\Models\Nganh;

use Illuminate\Http\Request;

class DiemChuanController extends Controller
{
    public function getDanhSach()
    {
        $diemchuan = DiemChuan::all();
        return view('admin.diemchuan.danhsach', ['diemchuandata' => $diemchuan]);
    }

    public function getThem()
    {
        $nganh = Nganh::all();
        return view('admin.diemchuan.them', ['nganhdata' => $nganh]);
    }

    public function postThem(Request $request)
    {

        $this->validate(
            $request,
            [
                'ToHop' => 'required',
                'DiemTrungTuyen' => 'required',

                'idNganh' => 'required|unique:DiemChuan,idNganh',

            ],
            [
                'ToHop.required' => 'Bạn chưa nhập Tổ hợp',
                'DiemTrungTuyen.required' => 'Bạn chưa nhập điểm trúng tuyển',
                'idNganh.required' => 'Bạn phải chọn Ngành',
                'idNganh.unique' => 'Ngành bạn chọn đã trùng',

            ]
        );

        $diemchuan = new DiemChuan;
        $diemchuan->ToHop = $request->ToHop;
        $diemchuan->DiemTrungTuyen = $request->DiemTrungTuyen;
        $diemchuan->DieuKienPhu = $request->DieuKienPhu;

        $diemchuan->idNganh = $request->idNganh;

        $diemchuan->save();

        return redirect('admin/diemchuan/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $nganh = Nganh::all();
        $diemchuan = DiemChuan::find($id);
        return view('admin.diemchuan.sua', ['diemchuandata' => $diemchuan, 'nganhdata' => $nganh]);
    }

    public function postSua(Request $request, $id)
    {



        $this->validate(
            $request,
            [
                'ToHop' => 'required',
                'DiemTrungTuyen' => 'required',

                'idNganh' => 'required|unique:DiemChuan,idNganh,' . $id,

            ],
            [
                'ToHop.required' => 'Bạn chưa nhập Tổ hợp',
                'DiemTrungTuyen.required' => 'Bạn chưa nhập điểm trúng tuyển',
                'idNganh.required' => 'Bạn phải chọn Ngành',
                'idNganh.unique' => 'Ngành bạn chọn đã trùng',

            ]
        );

        $diemchuan = DiemChuan::find($id);
        $diemchuan->ToHop = $request->ToHop;
        $diemchuan->DiemTrungTuyen = $request->DiemTrungTuyen;
        $diemchuan->DieuKienPhu = $request->DieuKienPhu;

        $diemchuan->idNganh = $request->idNganh;

        $diemchuan->save();


        return redirect('admin/diemchuan/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $diemchuan = DiemChuan::find($id);
        $diemchuan->delete();

        return redirect('admin/diemchuan/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
