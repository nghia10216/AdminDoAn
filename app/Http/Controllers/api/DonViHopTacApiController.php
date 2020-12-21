<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonViHopTac;
use Illuminate\Http\Request;

class DonViHopTacApiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DonViHopTac::get(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donvihoptac = DonViHopTac::find($id);
        if (is_null($donvihoptac)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($donvihoptac, 200);
    }
}
