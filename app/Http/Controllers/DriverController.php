<?php

namespace App\Http\Controllers;
use App\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index() {

        $driver = DB::table('driver')->get();
        return view('Driver/index',compact('driver'));
       
    }
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'nama'  => 'required',
      ]);
  
      if ($validator->fails()) {
        return response()->json($validator->errors());
      }
  
      $driver = new Driver();
      $driver ->nama_driver= $request->nama_driver;
      $driver ->no_ktp= $request->no_ktp;
      $driver ->no_hp= $request->no_hp;
      $driver ->status= $request->status;
  
      $driver->save();
      return redirect()->back()->with('success','Data berhasil ditambah');
    }
      public function getAll()
    {
        $driver = Driver::get();
        return response()->json([
            'success' => true,
            'data' => $driver
        ]);
    }
    public function getById($id)
    {
        $driver = Driver::where('id_driver', '=', $id)->first();
        
        return response()->json([
            'success' => true,
            'data' => $driver
        ]);
    }
    public function destroy($id)
    {
        $delete = Driver::where('id', '=', $id)->delete();

      return redirect()->back()->with('success', 'Data berhasil di hapus');
    }
}
