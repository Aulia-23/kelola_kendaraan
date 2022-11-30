<?php

namespace App\Http\Controllers;
use App\PegawaiModel;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index() {

        $pegawai = DB::table('pegawai')->get();
        return view('Pegawai/index',compact('pegawai'));
       
    }
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'nama'  => 'required',
      ]);
  
      if ($validator->fails()) {
        return response()->json($validator->errors());
      }
  
      $pegawai = new pegawai();
      $pegawai ->nama_pegawai= $request->nama_pegawai;
      $pegawai ->no_ktp= $request->no_ktp;
      $pegawai ->no_hp= $request->no_hp;
      $pegawai ->status= $request->status;
  
      $pegawai->save();
      return redirect()->back()->with('success','Data berhasil ditambah');
    }
      public function getAll()
    {
        $pegawai = Pegawai::get();
        return response()->json([
            'success' => true,
            'data' => $pegawai
        ]);
    }
    public function getById($id)
    {
        $pegawai = Pegawai::where('id_pegawai', '=', $id)->first();
        
        return response()->json([
            'success' => true,
            'data' => $pegawai
        ]);
    }
    public function destroy($id)
    {
        $delete = Pegawai::where('id', '=', $id)->delete();

      return redirect()->back()->with('success', 'Data berhasil di hapus');
    }
}
