<?php

namespace App\Http\Controllers;

use App\user;
use App\role;
use Validator;
use App\daftar_magang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class SampleController extends Controller
{
//     public function index (Request $request)
//     {
//         function index (){
//        if($request->ajax())
//        {


//             $data = daftar_magang::latest()->get();
//             return DataTables::of($data)
//                ->addColumn('action', function($data){
//                         $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
//                         $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
//                         return $button;
//                 })
//                 ->rawColumns(['action'])
//                 ->make(true);
//             }
//             return view('magang.tes');
//     }
// }


// public function store(Request $request)
// {
//     $rules = array(
//         'nama'    =>  'required',
//         'email'     =>  'required',
//         'semester'     =>  'required',
//         'universitas'     =>  'required'
//     );

//     $error = Validator::make($request->all(), $rules);

//     if($error->fails())
//     {
//         return response()->json(['errors' => $error->errors()->all()]);
//     }

//     $form_data = array(
//         'nama'    =>  $request->nama,
//         'email'     =>  $request->email,
//         'semester'     =>  $request->semester,
//         'universitas'     =>  $request->universitas
//     );

//     daftar_magang::create($form_data);
    
// }

    public function index()
    {
        $data = user::all();
        return view('magang.tes', compact('data'));
    }

    public function getUsers()
    {
        $user = user::all();
        return datatables()->of($user)->addIndexColumn()->toJson();
        // return DataTables::of(user::query())
        
        // ->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-warning" }}')
        // ->setRowId(function ($user) {
        //     return $user->id;
        // })
        // ->setRowAttr([
        //     'align' => 'left',
        // ])
        //  ->make(true);
    }

    public function editmodal($id)
    {
        $data = daftar_magang::findOrFail($id);
        $fotoUrl = asset('fotomagang/'.$data->foto);
        
        return response()->json(['fotoUrl' => $fotoUrl]);
    }
    

    public function update(Request $request)
    {
        // dd($request); (ngecek variabel)
        $result = daftar_magang::where('id', $request->id)->update([
            
            'nama'      => $request->nama,
            'email'     => $request->email,
            'semester'        => $request->semester,
            'universitas'        => $request->universitas,
            'foto'        => $request->foto
        ]);

        if($result) {
            return response()->json([
                'message' => "Successfully!",
                "code"    => 200,
            ]);
        } else  {
            return response()->json([
                'message' => "Internal Server Error",
                "code"    => 500
            ]);
        }
    }

    public function deletedata(Request $request)
    {
        $result = daftar_magang::where('id', $request->id)->delete();
        if($result) {
            $request->session()->flash('danger', 'Data Berhasil Dihapus');
            return response()->json([
                'message' => "Successfully!",
                "code"    => 200,
            ]);
        } else  {
            return response()->json([
                'message' => "Internal Server Error",
                "code"    => 500
            ]);
        }
        
    }
    public function deletedataakun(Request $request)
    {
        $result = user::where('id', $request->id)->delete();
        if($result) {
            return response()->json([
                'message' => "Successfully!",
                "code"    => 200,
            ]);
        } else  {
            return response()->json([
                'message' => "Internal Server Error",
                "code"    => 500
            ]);
        }
        
    }
    
}