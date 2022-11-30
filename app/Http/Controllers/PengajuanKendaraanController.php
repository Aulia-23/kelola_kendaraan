<?php

namespace App\Http\Controllers;
use App\PengajuanKendaraanModel;
use Illuminate\Http\Request;

class PengajuanKendaraanController extends Controller
{
    public function index() {

        $data = DB::table('pengajuan_kendaraan')->get();
        return view('PengajuanKendaraan/index',compact('data'));
        return view('PengajuanKendaraan/indexatasan',compact('data'));
    }
    public function store(Request $request)
  {
    $validator = Validator::make($request->all(),[
        'id_kendaraan'  => 'required',
        'id_pegawai'  => 'required',
        'id_perusahaan'  => 'required',
        'id_driver'  => 'required',
        'id_atasan'  => 'required',
        'tujuan_kendaraan'  => 'required',
        'Bahanbakar'  => 'required',
        'jadwal_servis'  => 'required',
        'tgl_pinjam'  => 'required',
        'tgl_kembali'  => 'required',
        'status'  => 'required',
       
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors());
    }

    $data = new Pengajuankendaraan();
    $data -> id_kendaraan   = $request -> id_kendaraan;
    $data -> id_pegawai   = $request -> id_pegawai;
    $data -> id_perusahaan   = $request -> id_perusahaan;
    $data -> id_driver   = $request -> id_driver;
    $data -> id_atasan   = $request -> id_atasan;
    $data -> tujuan_kendaraan   = $request -> tujuan_kendaraan;
    $data -> Bahanbakar   = $request -> Bahanbakar;
    $data -> jadwal_servis   = $request -> jadwal_servis;
    $data -> tgl_pinjam   = $request -> tgl_pinjam;
    $data -> tgl_kembali  = $request -> tgl_kembali;
    $data -> status  = $request -> status;


    $data->save();

      return redirect()->back()->with('success','Data berhasil ditambahkan');

    
  }

  public function getAll()
  {
       $data= PengajuanKendaraan::all();


       return view('PengajuanKendaraan.index',['data']);
       return view('PengajuanKendaraan.indexatasan',['data']);
  }

  public function getById($id)
  {
     $data = PengajuanKendaraan::where('id_pengajuan', '=', $id)->first();
        
     return view('PengajuanKendaraan.index',['data']);
     return view('PengajuanKendaraan.indexatasan',['data']);
  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(),[
        'id_kendaraan'  => 'required',
        'id_pegawai'  => 'required',
        'id_perusahaan'  => 'required',
        'id_driver'  => 'required',
        'id_atasan'  => 'required',
        'tujuan_kendaraan'  => 'required',
        'Bahanbakar'  => 'required',
        'jadwal_servis'  => 'required',
        'tgl_pinjam'  => 'required',
        'tgl_kembali'  => 'required',
        'status'  => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors());
    }

     $data = PengajuanKendaraan::where('id', '=', $id)->first();
     $data -> id_kendaraan   = $request -> id_kendaraan;
     $data -> id_pegawai   = $request -> id_pegawai;
     $data -> id_perusahaan   = $request -> id_perusahaan;
     $data -> id_driver   = $request -> id_driver;
     $data -> id_atasan   = $request -> id_atasan;
     $data -> tujuan_kendaraan   = $request -> tujuan_kendaraan;
     $data -> Bahanbakar   = $request -> Bahanbakar;
     $data -> jadwal_servis   = $request -> jadwal_servis;
     $data -> tgl_pinjam   = $request -> tgl_pinjam;
     $data -> tgl_kembali  = $request -> tgl_kembali;
     $data -> status  = $request -> status;

    
     $data->save();

     return redirect()->back()->with('success','Data berhasil diupdate');
  }

 public function destroy($id)
    {
        $delete = PengajuanKendaraan::where('id', '=', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil di hapus');
}
}
