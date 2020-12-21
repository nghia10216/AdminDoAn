<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\HoiDap;
use Illuminate\Http\Request;
use App\Models\Khoa;
use Illuminate\Support\Facades\Validator;

class HoiDapApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(HoiDap::get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'CauHoi' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $request['CauTraLoi'] = "";
        $hoidap = HoiDap::create($request->all());
        return response()->json($hoidap, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hoidap = HoiDap::where('idUser', $id)->get();
        if (is_null($hoidap)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($hoidap, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hoidap = HoiDap::find($id);
        if (is_null($hoidap)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        $hoidap->update($request->all());
        return response()->json($hoidap, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hoidap = HoiDap::find($id);
        if (is_null($hoidap)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        $hoidap->delete();
        return response()->json("Xóa thành công", 204);
    }
}
