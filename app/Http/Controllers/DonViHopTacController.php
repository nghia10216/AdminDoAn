<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BoMon;
use App\Models\Khoa;
use App\Models\DonViHopTac;

use Illuminate\Support\Str;

class DonViHopTacController extends Controller
{
    public function getDanhSach()
    {
        $donvihoptac = DonViHopTac::all();
        return view('admin.donvihoptac.danhsach', ['donvihoptacdata' => $donvihoptac]);
    }

    public function getThem()
    {
        $khoa = Khoa::all();
        return view('admin.donvihoptac.them', ['khoadata' => $khoa]);
    }

    public function postThem(Request $request)
    {

        $this->validate(
            $request,
            [
                'Link' => 'image|mimes:jpeg,jpg,png',
                'TenDonVi' => 'required',
                'idKhoa' => 'required',
            ],
            [
                'Link.image' => 'File bạn chọn không phải hình ảnh',
                'Link.mimes' => 'Hình ảnh phải có đuôi JPG, PNG',

                'TenDonVi.required' => 'Bạn chưa nhập Tên đơn vị',
               
                'idKhoa.required' => 'Bạn phải chọn Khoa',

            ]
        );

        $donvihoptac = new DonViHopTac;
        $donvihoptac->TenDonVi = $request->TenDonVi;
     

        $donvihoptac->idKhoa = $request->idKhoa;

        if ($request->hasFile('Link')) {
            $file = $request->file('Link');
            $name = $file->getClientOriginalName();
            $filename = Str::random(4) . "_" . $name;

            while (file_exists("upload/donvihoptac/" . $filename)) {
                $filename = Str::random(4) . "_" . $name;
            }

            $getfilename =  str_replace(' ', '_', $filename);

            $file->move("upload/donvihoptac", $getfilename);
            $donvihoptac->Link = $getfilename;
        } else {
            $donvihoptac->Link = "";
        }

        $donvihoptac->save();

        return redirect('admin/donvihoptac/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $khoa = Khoa::all();
        $donvihoptac = DonViHopTac::find($id);
        return view('admin.donvihoptac.sua', ['khoadata' => $khoa, 'donvihoptacdata' => $donvihoptac]);
    }

    public function postSua(Request $request, $id)
    {


        $this->validate(
            $request,
            [
                'Link' => 'image|mimes:jpeg,jpg,png',
                'TenDonVi' => 'required',
                'idKhoa' => 'required',
            ],
            [
                'Link.image' => 'File bạn chọn không phải hình ảnh',
                'Link.mimes' => 'Hình ảnh phải có đuôi JPG, PNG',

                'TenDonVi.required' => 'Bạn chưa nhập Tên đơn vị',
               
                'idKhoa.required' => 'Bạn phải chọn Khoa',

            ]
        );

        $donvihoptac = DonViHopTac::find($id);
        $donvihoptac->TenDonVi = $request->TenDonVi;
     
        $donvihoptac->idKhoa = $request->idKhoa;

        if ($request->hasFile('Link')) {
            $file = $request->file('Link');
            $name = $file->getClientOriginalName();
            $filename = Str::random(4) . "_" . $name;

            while (file_exists("upload/donvihoptac/" . $filename)) {
                $filename = Str::random(4) . "_" . $name;
            }

            $getfilename =  str_replace(' ', '_', $filename);

            $file->move("upload/donvihoptac", $getfilename);

            if ($donvihoptac->Link != "") {
                unlink("upload/donvihoptac/" . $donvihoptac->Link);
            }
            $donvihoptac->Link = $getfilename;
        } 
        // else {
        //     $donvihoptac->Link = "";
        // }

        $donvihoptac->save();

        return redirect('admin/donvihoptac/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $donvihoptac = DonViHopTac::find($id);
        $donvihoptac->delete();

        return redirect('admin/donvihoptac/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
