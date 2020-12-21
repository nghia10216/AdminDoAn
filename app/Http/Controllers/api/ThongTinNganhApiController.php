<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ThongTinNganh;
use Illuminate\Http\Request;

class ThongTinNganhApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thongtinnganh = ThongTinNganh::with('nganh.hinhanhnganh')->get();
        return response()->json($thongtinnganh, 200);
       
       
        // $thongtinnganh = Thongtinnganh::with('nganh:TenNganh')->get();
        // return response()->json($thongtinnganh, 200);
        // $thongtinnganh = ThongTinNganh::with(array('nganh'=>function($query){
        //     $query->select('TenNganh');
        // }))->get();
        // return response()->json($thongtinnganh, 200);
     
//cach Long
        // $thongtinnganh = ThongTinNganh::with(array('nganh'=>function($query){
        //     $query->select('TenNganh');
        // }))->get();
        // return response()->json($thongtinnganh, 200);




        // $thongtinnganh = ThongTinNganh::get();
       
        // return response()->json($thongtinnganh, 200);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thongtinnganh = ThongTinNganh::find($id);
        if (is_null($thongtinnganh)) {
            return response()->json(["message" => "Record not found!"], 404);
        }

        return response()->json($thongtinnganh, 200);
    }
}
