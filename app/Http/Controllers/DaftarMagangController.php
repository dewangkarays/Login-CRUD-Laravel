<?php

namespace App\Http\Controllers;

use PDF;
use App\user;
use App\daftar_magang;
use App\role;
use Illuminate\Http\Request;
use App\Exports\MagangExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

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
    // public function getMagang()
    // {
    //     $users = daftar_magang::all();

    //     return datatables()->of($users)->addIndexColumn()->toJson();
    // }

    public function tambahmagang()
    {
        $data = role::all();
        return view ('magang.tambahdata', compact('data'));

    }
    // public function manageakun()
    // {
    //    $data = user::all();
    // //    $data = user::withTrashed()->get(); menampilkan semua data yg sudah di softdelete
        
    //     return view('magang.manageakun',compact('data'));
    // }

    
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
    //    $data = daftar_magang::all();
        
    //     return view('magang.index',compact('data'));
    $data = daftar_magang::with('posisi')->get();
        // return DataTables::of(daftar_magang::query())
        return datatables()->of($data)->addIndexColumn()->toJson();
        // ->addIndexColumn()
        // ->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-warning" }}')
        // ->setRowId(function ($user) {
        //     return $user->id;
        // })
        // ->setRowAttr([ 'align' => 'left',])
        // ->addColumn('DT_RowIndex', function ($row) {
        //     // This callback function will generate the numbering for each row
        //     static $index = 0;
        //     return ++$index;
        // })
        // ->addColumn('image', function ($row) {
        //     return '<img src="' . asset('upload/foto/' . $row->foto) . '" alt="foto">';
        
        // })
        // ->rawColumns(['image', 'action'])
        
        //  ->toJson();
    }
    // MANAGE AKUN
    public function tabelakun()
    {
        $user = user::all();
        return view('magang.manageakun', compact('user'));
    }
    public function infoakun()
    {
         $user = user::all();
        // return DataTables::of(user::query())
        return datatables()->of($user)->addIndexColumn()->toJson();
        // ->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-warning" }}')
        // ->setRowId(function ($user) {
        //     return $user->id;
        // })
        // ->setRowAttr([ 'align' => 'left',])
        // ->addColumn('DT_RowIndex', function ($row) {
        //     // This callback function will generate the numbering for each row
        //     static $index = 0;
        //     return ++$index;
        // })
       
        //  ->make(true);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tes(Request $request)
    {
        return view('magang.tes');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\daftar_magang  $daftar_magang
     * @return \Illuminate\Http\Response
     */
    public function tampilkandata($id)
    {
        $jab = role::all();
        $data = daftar_magang::with('posisi')->findorfail($id);
        // dd($data);
        
        return view('magang.tampildata', compact('data','jab'));
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
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotomagang/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('magang.index')->with('success', 'Data Berhasil Diupdate');
    }

    public function deletedata($id)
    {
        $data = daftar_magang::find($id);
        $data->delete();
        return redirect()->route('magang.index')->with('danger', 'Data Berhasil Dihapus');
    }   

    public function deleteakun($id)
    {
        
        $data = user::find($id);
        // if($data !=null){
        $data->delete();
        // return view('magang.manageakun', compact('data'));
        // return view('magang.manageakun',compact('data'));
        // return redirect()->route('magang.manageakun')->with('success', 'Akun berhasil dihapus');
        // }
        return redirect('/manageakun')->with('danger', 'Akun Berhasil Dihapus');
        
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
        return Excel::download(
            new MagangExport(),
            'data-mahasiswa-magang.xlsx'
        );
        // return (new MagangExport)->download('invoices.xlsx');
        // return Excel::download(new MagangExport, 'datamagang.xlsx');

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

    public function foto()
    {
        //   dd($request); 
        $data = daftar_magang::paginate(5);
        
        return view('magang.foto', compact('data'));
    }
}
