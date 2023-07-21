<?php

namespace App\Exports;

use App\daftar_magang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\FromCollection;

class MagangExport implements FromView
{  
use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */


    public function view(): View 
    {
        return view('magang.excel', [
            'data'=> daftar_magang::all()
        ]);
    }
    // public function query()
    // {
    //     return daftar_magang::query();
    //     // $data = daftar_magang::all(); 

    //     // view()->share('data', $data);
    //     // $Excel = Excel::loadview('magang.excel');
    // }
    // public function map($data): array
    // {
    //     return [
            
    //         $data->nama,
    //         $data->posisi->posisi,
    //         $data->email,
    //         $data->semester,
    //         $data->universitas,
            
    //     ];
    // }
    // public function headings(): array
    // {
    //     return [
    //         'Nama',
    //         'Posisi',
    //         'Email',
    //         'Semester',
    //         'Universitas',
    //     ];
    // }
}
    

