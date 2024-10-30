<?php

namespace App\Exports;

use App\Models\Projek\Projek; // Memasukkan model Projek
use Maatwebsite\Excel\Concerns\FromCollection; // Menggunakan antaramuka FromCollection
use Maatwebsite\Excel\Concerns\WithHeadings;   // Menggunakan antaramuka WithHeadings

class ExportProjek implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Projek::all(); // Mengembalikan semua data dari model Projek
    }

    /**
    * Menambah tajuk untuk setiap kolum
    */
    public function headings(): array
    {
        return [
            // '',
            // '',
            // '',
            // '',
            'Bil.',          // Nama kolum pertama
            'Kategori',      
            'Program',       
            'Tahun',         
            'Tarikh Mula',   
            'Tarikh Tamat',  
            'Pelaksana',     
            'Pemilik',       
            'Fasiliti',      
            'Projek',        
            'Subsetia',      
            'Amaun (RM)',    
            'Status',        
            'Tindakan',      
        ];
    }
}
