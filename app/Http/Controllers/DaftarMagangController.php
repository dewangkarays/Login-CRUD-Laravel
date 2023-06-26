<?php

namespace App\Http\Controllers;

use PDF;
use App\daftar_magang;
use Illuminate\Http\Request;
use App\Exports\MagangExport;
use Maatwebsite\Excel\Facades\Excel;

class DaftarMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $data = daftar_magang::all();
        
        return view('magang.index',compact('data'));
    }

    public function tambahmagang()
    {
        return view ('magang.tambahdata');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertdata(Request $request)
    {
       
        // dd($request->all());
        $data = daftar_magang::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotomagang/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('magang.index')->with('success', 'Data Berhasil Ditambahkan');
        
    }
    public function halamanutama()
    {
       $data = daftar_magang::all();
        
        return view('magang.index',compact('data'));
    }
    
    public function home()
    {
        $data = user::all();
        
        return view('home',compact('data'));
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\daftar_magang  $daftar_magang
     * @return \Illuminate\Http\Response
     */
    public function tampilkandata($id)
    {
        $data = daftar_magang::find($id);
        // dd($data);
        return view('magang.tampildata', compact('data'));
    }
    public function datamagang()
    {
       
       
        return view('magang.tabeldatamagang');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\daftar_magang  $daftar_magang
     * @return \Illuminate\Http\Response
     */
    public function updatedata(Request $request, $id)
    {
        $data = daftar_magang::find($id);
        $data->update($request->all());
        return redirect()->route('magang.index')->with('success', 'Data Berhasil Diupdate');
    }

    public function deletedata($id)
    {
        $data = daftar_magang::find($id);
        $data->delete();
        return redirect()->route('magang.index')->with('danger', 'Data Berhasil Dihapus');
    }   

    public function exportpdf()
    {
        $data = daftar_magang::all(); 

        view()->share('data', $data);
        $pdf = PDF::loadview('magang.datamagang-pdf');
        return $pdf->download('datamahasiswa.pdf');

    }
   
    public function exportexcel()
    {
        return Excel::download(new MagangExport, 'datamagang.xlsx');

    }
    /**
    * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\daftar_magang  $daftar_magang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, daftar_magang $daftar_magang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\daftar_magang  $daftar_magang
     * @return \Illuminate\Http\Response
     */
    public function destroy(daftar_magang $daftar_magang)
    {
        //
    }
}
