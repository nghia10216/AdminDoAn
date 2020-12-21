<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HinhAnhNganh;
use Illuminate\Http\Request;

class HinhAnhNganhApiController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(HinhAnhNganh::get(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hinhanhnganh = HinhAnhNganh::find($id);
        if (is_null($hinhanhnganh)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($hinhanhnganh, 200);
    }
}
