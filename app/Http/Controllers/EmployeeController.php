<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;

class EmployeeController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Employee::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(5);
        } else{
            $data = Employee::paginate(5);
        }
        return view('pegawai', compact('data'));
    }

    public function createpegawai(){
        return view('createpegawai');
    }

    public function insertpegawai(Request $request){
        // dd($request->all());
        $data = Employee::create($request->all());
        //upload img
        if($request->hasFile('photo')){
            $request->file('photo')->move('photopegawai/', $request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilpegawai($id){
        $data = Employee::find($id);
        // dd($data);
        return view('tampilpegawai', compact('data'));
    }

    public function updatepegawai(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Update');
    }

    public function deletepegawai($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Hapus');
    }

    public function exportpdf(){
        $data = Employee::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('datapegawai-pdf');
        return $pdf->download('pegawai.pdf');
    }
}
