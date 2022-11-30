<?php

namespace App\Http\Controllers;
use App\PerusahaanModel;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'perusahaan'  => 'required',
      ]);
  
      if ($validator->fails()) {
        return response()->json($validator->errors());
      }
  
      $data= new Perusahaan();
      $data -> perusahaan   = $request -> perusahaan;
      
  
      $data->save();
      $data = Perusahaan::where('id_perusahaan', '=', $perusahaan->id_perusahaan)->first();
  
      return Response()->json([
        'success' => true,
        'message' => 'Data berhasil ditambahkan',
        'data' => $perusahaan
      ]);
    }
    public function getAll()
    {
        $data = Perusahaan::get();
        return response()->json(['data' => $data]);
    }
    public function getById(request $request, $id)
    {
        $perusahaan = Perusahaan::where('id_perusahaan', $id)->first();
        return Response()->json($perusahaan);
    }
    public function destroy($id)
    {
        $delete = Perusahaan::where('id_perusahaan', '=', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil di hapus');
}
}
