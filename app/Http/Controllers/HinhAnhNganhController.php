<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nganh;
use App\Models\HinhAnhNganh;
use Illuminate\Support\Str;

class HinhAnhNganhController extends Controller
{
    public function getDanhSach()
    {
        $hinhanhnganh = HinhAnhNganh::all();
        return view('admin.hinhanhnganh.danhsach', ['hinhanhnganhdata' => $hinhanhnganh]);
    }

    public function getThem()
    {
        $nganh = Nganh::all();
        return view('admin.hinhanhnganh.them', ['nganhdata' => $nganh]);
    }

    public function postThem(Request $request)
    {

        $this->validate(
            $request,
            [
                'Link' => 'image|mimes:jpeg,jpg,png',
                'TenAnh' => 'required',
                'idNganh' => 'required',
            ],
            [
                'Link.image' => 'File bạn chọn không phải hình ảnh',
                'Link.mimes' => 'Hình ảnh phải có đuôi JPG, PNG',
               
                'TenAnh.required' => 'Bạn chưa nhập Tên ảnh',

                'idNganh.required' => 'Bạn phải chọn Ngành',

            ]
        );

        $hinhanhnganh = new HinhAnhNganh;
        $hinhanhnganh->TenAnh = $request->TenAnh;
     

        $hinhanhnganh->idNganh = $request->idNganh;

        if ($request->hasFile('Link')) {
            $file = $request->file('Link');
            $name = $file->getClientOriginalName();
            $filename = Str::random(4) . "_" . $name;

            while (file_exists("upload/hinhanhnganh/" . $filename)) {
                $filename = Str::random(4) . "_" . $name;
            }

            $getfilename =  str_replace(' ', '_', $filename);

            $file->move("upload/hinhanhnganh", $getfilename);
            $hinhanhnganh->Link = $getfilename;
        } else {
            $hinhanhnganh->Link = "";
        }

        $hinhanhnganh->save();

        return redirect('admin/hinhanhnganh/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $nganh = Nganh::all();
        $hinhanhnganh = HinhAnhNganh::find($id);
        return view('admin.hinhanhnganh.sua', ['nganhdata' => $nganh, 'hinhanhnganhdata' => $hinhanhnganh]);
    }

    public function postSua(Request $request, $id)
    {


        $this->validate(
            $request,
            [
                'Link' => 'image|mimes:jpeg,jpg,png',
                'TenAnh' => 'required',
                'idNganh' => 'required',
            ],
            [
                'Link.image' => 'File bạn chọn không phải hình ảnh',
                'Link.mimes' => 'Hình ảnh phải có đuôi JPG, PNG',
                
                'TenAnh.required' => 'Bạn chưa nhập Tên ảnh',
               
                'idNganh.required' => 'Bạn phải chọn Ngành',

            ]
        );

        $hinhanhnganh = HinhAnhNganh::find($id);
        $hinhanhnganh->TenAnh = $request->TenAnh;
     

        $hinhanhnganh->idNganh = $request->idNganh;

        if ($request->hasFile('Link')) {
            $file = $request->file('Link');
            $name = $file->getClientOriginalName();
            $filename = Str::random(4) . "_" . $name;

            while (file_exists("upload/hinhanhnganh/" . $filename)) {
                $filename = Str::random(4) . "_" . $name;
            }

            $getfilename =  str_replace(' ', '_', $filename);

            $file->move("upload/hinhanhnganh", $getfilename);

            if ($hinhanhnganh->Link != "") {
                unlink("upload/hinhanhnganh/" . $hinhanhnganh->Link);
            }
            $hinhanhnganh->Link = $getfilename;
        }
        // else {
        //     $hinhanhnganh->Link = "";
        // }

        $hinhanhnganh->save();

        return redirect('admin/hinhanhnganh/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $hinhanhnganh = HinhAnhNganh::find($id);
        $hinhanhnganh->delete();

        return redirect('admin/hinhanhnganh/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
