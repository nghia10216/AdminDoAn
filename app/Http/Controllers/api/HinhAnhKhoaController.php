<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\HinhAnhKhoa;

class HinhAnhKhoaController extends Controller
{
    public function index()
    {
        return response()->json(HinhAnhKhoa::get(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hinhanhkhoa = HinhAnhKhoa::find($id);
        if (is_null($hinhanhkhoa)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($hinhanhkhoa, 200);
    }
}
