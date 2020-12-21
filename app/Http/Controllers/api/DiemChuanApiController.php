<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DiemChuan;
use Illuminate\Http\Request;

class DiemChuanApiController extends Controller
{
   
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diemchuan = DiemChuan::with('nganh.hinhanhnganh')->get();
        return response()->json($diemchuan, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diemchuan = DiemChuan::find($id);
        if (is_null($diemchuan)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($diemchuan, 200);
    }
}
