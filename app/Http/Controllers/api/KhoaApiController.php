<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Khoa;

class KhoaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json(Khoa::get(), 200);
    
        $khoa = Khoa::with('hinhanhkhoa','donvihoptac','nganh.hinhanhnganh','bomon')->get();
        return response()->json($khoa, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $khoa = Khoa::find($id);
        if (is_null($khoa)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($khoa, 200);
    }
}
