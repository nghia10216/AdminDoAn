<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Nganh;
use Illuminate\Http\Request;

class NganhApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Nganh::get(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nganh = Nganh::find($id);
        if (is_null($nganh)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($nganh, 200);
    }
}
