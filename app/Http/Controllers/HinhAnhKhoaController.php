<?php

namespace App\Http\Controllers;

use App\Models\HinhAnhKhoa;
use App\Models\Khoa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HinhAnhKhoaController extends Controller
{
    public function getDanhSach()
    {
        $hinhanhkhoa = HinhAnhKhoa::all();
        return view('admin.hinhanhkhoa.danhsach', ['hinhanhkhoadata' => $hinhanhkhoa]);
    }

    public function getThem()
    {
        $khoa = Khoa::all();
        return view('admin.hinhanhkhoa.them', ['khoadata' => $khoa]);
    }

    public function postThem(Request $request)
    {

        $this->validate(
            $request,
            [
                'Link' => 'image|mimes:jpeg,jpg,png',
                'TenAnh' => 'required',
                'idKhoa' => 'required',
            ],
            [
                'Link.image' => 'File bạn chọn không phải hình ảnh',
                'Link.mimes' => 'Hình ảnh phải có đuôi JPG, PNG',
               
                'TenAnh.required' => 'Bạn chưa nhập Tên ảnh',

                'idKhoa.required' => 'Bạn phải chọn Khoa',

            ]
        );

        $hinhanhkhoa = new HinhAnhKhoa;
        $hinhanhkhoa->TenAnh = $request->TenAnh;
        $hinhanhkhoa->idKhoa = $request->idKhoa;

        if ($request->hasFile('Link')) {
            $file = $request->file('Link');
            $name = $file->getClientOriginalName();
            $filename = Str::random(4) . "_" . $name;

            while (file_exists("upload/hinhanhkhoa/" . $filename)) {
                $filename = Str::random(4) . "_" . $name;
            }

            $getfilename =  str_replace(' ', '_', $filename);

            $file->move("upload/hinhanhkhoa", $getfilename);
            $hinhanhkhoa->Link = $getfilename;
        } else {
            $hinhanhkhoa->Link = "";
        }

        $hinhanhkhoa->save();

        return redirect('admin/hinhanhkhoa/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $khoa = Khoa::all();
        $hinhanhkhoa = HinhAnhKhoa::find($id);
        return view('admin.hinhanhkhoa.sua', ['khoadata' => $khoa, 'hinhanhkhoadata' => $hinhanhkhoa]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'Link' => 'image|mimes:jpeg,jpg,png',
                'TenAnh' => 'required',
                'idKhoa' => 'required',
            ],
            [
                'Link.image' => 'File bạn chọn không phải hình ảnh',
                'Link.mimes' => 'Hình ảnh phải có đuôi JPG, PNG',
                
                'TenAnh.required' => 'Bạn chưa nhập Tên ảnh',
               
                'idKhoa.required' => 'Bạn phải chọn Ngành',

            ]
        );

        $hinhanhkhoa = HinhAnhKhoa::find($id);
        $hinhanhkhoa->TenAnh = $request->TenAnh;
     

        $hinhanhkhoa->idKhoa = $request->idKhoa;

        if ($request->hasFile('Link')) {
            $file = $request->file('Link');
            $name = $file->getClientOriginalName();
            $filename = Str::random(4) . "_" . $name;

            while (file_exists("upload/hinhanhkhoa/" . $filename)) {
                $filename = Str::random(4) . "_" . $name;
            }

            $getfilename =  str_replace(' ', '_', $filename);

            $file->move("upload/hinhanhkhoa", $getfilename);

            if ($hinhanhkhoa->Link != "") {
                unlink("upload/hinhanhkhoa/" . $hinhanhkhoa->Link);
            }
            $hinhanhkhoa->Link = $getfilename;
        }
        // else {
        //     $hinhanhkhoa->Link = "";
        // }

        $hinhanhkhoa->save();

        return redirect('admin/hinhanhkhoa/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $hinhanhkhoa = HinhAnhKhoa::find($id);
        $hinhanhkhoa->delete();

        return redirect('admin/hinhanhkhoa/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
