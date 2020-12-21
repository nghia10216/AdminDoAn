<?php

namespace App\Http\Controllers;

use App\Models\BoMon;
use App\Models\Khoa;
use App\Models\Nganh;

use Illuminate\Http\Request;

class BoMonController extends Controller
{
    public function getDanhSach()
    {
        $bomon = BoMon::all();
        return view('admin.bomon.danhsach', ['bomondata' => $bomon]);
    }

    public function getThem()
    {
        $khoa = Khoa::all();
        return view('admin.bomon.them', ['khoadata' => $khoa]);
    }

    public function postThem(Request $request)
    {

        $this->validate(
            $request,
            [
                'TenBoMon' => 'required|unique:BoMon,TenBoMon|min:3|max:100',
                'idKhoa' => 'required',

                'GioiThieuBoMon' => 'required',
            ],
            [
                'TenBoMon.required' => 'Bạn chưa nhập Tên bộ môn',
                'TenBoMon.unique' => 'Tên bộ môn đã tồn tại',
                'TenBoMon.min' => 'Tên bộ môn phải có độ dài từ 3 cho đến 100 ký tự',
                'TenBoMon.max' => 'Tên bộ môn phải có độ dài từ 3 cho đến 100 ký tự',

                'idKhoa.required' => 'Bạn phải chọn Khoa',
                'GioiThieuBoMon.required' => 'Bạn chưa nhập giới thiệu bộ môn',

            ]
        );

        $bomon = new BoMon;
        $bomon->TenBoMon = $request->TenBoMon;
        $bomon->GioiThieuBoMon = $request->GioiThieuBoMon;

        $bomon->idKhoa = $request->idKhoa;

        $bomon->save();

        return redirect('admin/bomon/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $khoa = Khoa::all();
        $bomon = BoMon::find($id);
        return view('admin.bomon.sua', ['khoadata' => $khoa, 'bomondata' => $bomon]);
    }

    public function postSua(Request $request, $id)
    {



        $this->validate(
            $request,
            [
                'TenBoMon' => 'required|min:3|max:100|unique:BoMon,TenBoMon,' . $id,
                'idKhoa' => 'required',

                'GioiThieuBoMon' => 'required',
            ],
            [
                'TenBoMon.required' => 'Bạn chưa nhập Tên bộ môn',
                'TenBoMon.unique' => 'Tên bộ môn đã tồn tại',
                'TenBoMon.min' => 'Tên bộ môn phải có độ dài từ 3 cho đến 100 ký tự',
                'TenBoMon.max' => 'Tên bộ môn phải có độ dài từ 3 cho đến 100 ký tự',

                'idKhoa.required' => 'Bạn phải chọn Khoa',

                'GioiThieuBoMon.required' => 'Bạn chưa nhập giới thiệu bộ môn',

            ]
        );

        $bomon = BoMon::find($id);
        $bomon->TenBoMon = $request->TenBoMon;
        $bomon->GioiThieuBoMon = $request->GioiThieuBoMon;

        $bomon->idKhoa = $request->idKhoa;

        $bomon->save();

        return redirect('admin/bomon/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $bomon = BoMon::find($id);
        $bomon->delete();

        return redirect('admin/bomon/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
