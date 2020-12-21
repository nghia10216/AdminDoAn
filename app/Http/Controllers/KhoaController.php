<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khoa;
use App\Models\BoMon;
use App\Models\Nganh;
use App\Models\HinhAnhKhoa;
use App\Models\DonViHopTac;
use Illuminate\Support\Str;

class KhoaController extends Controller
{
    public function getDanhSach()
    {
        $khoa = Khoa::all();
        return view('admin.khoa.danhsach', ['khoadata' => $khoa]);
    }

    public function getThem()
    {
        return view('admin.khoa.them');
    }

    public function postThem(Request $request)
    {

        $this->validate(
            $request,
            [
                'LogoKhoa' => 'image|mimes:jpeg,jpg,png',
                'TenKhoa' => 'required|unique:khoa,TenKhoa|min:3',
                'SDT' => 'required|unique:khoa,SDT|min:9',
                'Email' => 'required|email|unique:khoa,Email',

                'GioiThieuKhoa' => 'required',

            ],
            [
                'LogoKhoa.image' => 'File bạn chọn không phải hình ảnh',
                'LogoKhoa.mimes' => 'Hình ảnh phải có đuôi JPG, PNG',

                'TenKhoa.required' => 'Bạn chưa nhập tên khoa',
                'TenKhoa.unique' => 'Tên khoa đã tồn tại',
                'TenKhoa.min' => 'Tên khoa có độ dài ít nhắt 3 ký tự',

                'SDT.required' => 'Bạn chưa nhập số điện thoại',
                'SDT.unique' => 'Số điện thoại đã tồn tại',
                'SDT.min' => 'Số điện thoại có độ dài ít nhắt 9 ký tự',

                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định dạng email',
                'email.unique' => 'email đã tồn tại',

                'GioiThieuKhoa.required' => 'Bạn chưa nhập giới thiệu khoa',
            ]
        );

        $khoa = new Khoa;
        $khoa->TenKhoa = $request->TenKhoa;
        $khoa->SDT = $request->SDT;
        $khoa->Email = $request->Email;
        $khoa->GioiThieuKhoa = $request->GioiThieuKhoa;


        if ($request->hasFile('LogoKhoa')) {
            $file = $request->file('LogoKhoa');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4) . "_" . $name;

            while (file_exists("upload/logokhoa/" . $hinh)) {
                $hinh = Str::random(4) . "_" . $name;
            }

            $file->move("upload/logokhoa", $hinh);
            $khoa->LogoKhoa = $hinh;
        } else {
            $khoa->LogoKhoa = "";
        }

        $khoa->save();

        return redirect('admin/khoa/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $khoa = Khoa::find($id);
        return view('admin.khoa.sua', ['khoadata' => $khoa]);
    }

    public function postSua(Request $request, $id)
    {

        $khoa = Khoa::find($id);

        $this->validate(
            $request,
            [
                'LogoKhoa' => 'image|mimes:jpeg,jpg,png',
                'TenKhoa' => 'required|min:3,|unique:khoa,TenKhoa,' . $id,
                'SDT' => 'required|min:9|unique:khoa,SDT,' . $id,
                'Email' => 'required|email|unique:khoa,Email,' . $id,

                'GioiThieuKhoa' => 'required',

            ],
            [
                'LogoKhoa.image' => 'File bạn chọn không phải hình ảnh',
                'LogoKhoa.mimes' => 'Hình ảnh phải có đuôi JPG, PNG',

                'TenKhoa.required' => 'Bạn chưa nhập tên khoa',
                'TenKhoa.unique' => 'Tên khoa đã tồn tại',
                'TenKhoa.min' => 'Tên khoa có độ dài ít nhắt 3 ký tự',

                'SDT.required' => 'Bạn chưa nhập số điện thoại',
                'SDT.unique' => 'Số điện thoại đã tồn tại',
                'SDT.min' => 'Số điện thoại có độ dài ít nhắt 9 ký tự',

                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định dạng email',
                'email.unique' => 'email đã tồn tại',

                'GioiThieuKhoa.required' => 'Bạn chưa nhập giới thiệu khoa',
            ]
        );
        $khoa->TenKhoa = $request->TenKhoa;
        $khoa->SDT = $request->SDT;
        $khoa->Email = $request->Email;
        $khoa->GioiThieuKhoa = $request->GioiThieuKhoa;


        if ($request->hasFile('LogoKhoa')) {
            $file = $request->file('LogoKhoa');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4) . "_" . $name;

            while (file_exists("upload/logokhoa/" . $hinh)) {
                $hinh = Str::random(4) . "_" . $name;
            }
            $file->move("upload/logokhoa", $hinh);
            if ($khoa->LogoKhoa != "") {
                unlink("upload/logokhoa/" . $khoa->LogoKhoa);
            }
            $khoa->LogoKhoa = $hinh;
        }
        //  else {
        //     $khoa->LogoKhoa = "";
        // }

        $khoa->save();

        return redirect('admin/khoa/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $khoa = Khoa::find($id);

        $bomon = BoMon::where('idKhoa', $id); 
        $bomon->delete();
        $nganh = Nganh::where('idKhoa', $id); 
        $nganh->delete();
        $hinhanhkhoa = HinhAnhKhoa::where('idKhoa', $id); 
        $hinhanhkhoa->delete();
        $donvihoptac = DonViHopTac::where('idKhoa', $id); 
        $donvihoptac->delete();

        $khoa->delete();

        return redirect('admin/khoa/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
