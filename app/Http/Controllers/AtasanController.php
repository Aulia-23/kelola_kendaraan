<?php

namespace App\Http\Controllers;
use App\AtasanModel;
use Illuminate\Http\Request;

class AtasanController extends Controller
{
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'atasan'  => 'required',
      ]);
  
      if ($validator->fails()) {
        return response()->json($validator->errors());
      }
  
      $data= new Atasan();
      $data -> atasan   = $request -> atasan;
      
  
      $data->save();
      $data = Atasan::where('id_atasan', '=', $atasan->id_atasan)->first();
  
      return Response()->json([
        'success' => true,
        'message' => 'Data atasan berhasil ditambahkan',
        'data' => $atasan
      ]);
    }
    public function getAll()
    {
        $data = Atasan::get();
        return response()->json(['data' => $data]);
    }
    public function getById(request $request, $id)
    {
        $atasan = Atasan::where('id_atasan', $id)->first();
        return Response()->json($atasan);
    }
    public function destroy($id)
    {
        $delete = Atasan::where('id_atasan', '=', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil di hapus');
}
}
