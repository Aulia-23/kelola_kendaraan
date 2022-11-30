<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KendaraanModel;
use Illuminate\Support\Facades\Validator;

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'id_perusahaan' => 'required',
            'nama_kendaraan' => 'required',
            'jenis_kendaraan' => 'required',
            'plat_kendaraan' => 'required',
            'bahan_bakar' => 'required',
            'jadwal_servis' => 'required',
        ]);

        $kendaraan = new Kendaraan;
        $kendaraan->id_perusahaan = $request->id_perusahaan;
        $kendaraan->nama_kendaraan = $request->nama_kendaraan;
        $kendaraan->jenis_kendaraan = $request->jenis_kendaraan;
        $kendaraan->plat_kendaraan = $request->plat_kendaraan;
        $kendaraan->bahan_bakar = $request->bahan_bakar;
        $kendaraan->jadwal_servis = $request->jadwal_servis;
        $kendaraan->save();

        $data = Kendaraan::where('id_kendaraan', '=', $kendaraan->id_kendaraan)->first();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Tambah data',
            'data' => $data
        ]);
    }
    public function getAll()
    {
        $data = Kendaraan::get();
        return response()->json(['data' => $data]);
    }
    public function getById(request $request, $id)
    {
        $kendaraan = Kendaraan::where('id_kendaraan', $id)->first();
        return Response()->json($kendaraan);
    }
    public function destroy($id)
    {
        $delete = Kendaraan::where('id', '=', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil di hapus');
}

    }
