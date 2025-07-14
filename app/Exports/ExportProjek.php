<?php

namespace App\Exports;

use App\Models\Projek\Projek; // Memasukkan model Projek
use Maatwebsite\Excel\Concerns\FromCollection; // Menggunakan antaramuka FromCollection
use Maatwebsite\Excel\Concerns\WithHeadings;   // Menggunakan antaramuka WithHeadings.
use Auth;

class ExportProjek implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $role = Auth::user()->hasRole(['penyedia', 'user','peraku', 'pengesah']);
        // return Projek::all(); // Mengembalikan semua data dari model Projek
        $query = Projek::query();
        // ['negeri', 'daerah', 'fasiliti', 'subsetia', 'kategori', 'projekProgram', 'pelaksana', 'status', 'projek']
        // Apply filters
        if($role){
            $query->where('proj_pemilik', auth()->user()->program_id);
            $query->orWhere('proj_pelaksana_agensi', auth()->user()->program_id);
        }
        else{
            if (!empty($this->filters['program'])) {
                $query->where('proj_pemilik', $this->filters['program']);
                $query->orWhere('proj_pelaksana_agensi', $this->filters['program']);
            }
        }
        if (!empty($this->filters['negeri'])) {
            $query->where('proj_negeri', $this->filters['negeri']);
        }
        if (!empty($this->filters['daerah'])) {
            $query->where('proj_daerah', $this->filters['daerah']);
        }
        if (!empty($this->filters['fasiliti'])) {
            $query->where('proj_fasiliti_id', $this->filters['fasiliti']);
        }
        if (!empty($this->filters['subsetia'])) {
            $query->where('proj_kod_subsetia', $this->filters['subsetia']);
        }
        if (!empty($this->filters['kategori'])) {
            $query->where('proj_kategori_id', $this->filters['kategori']);
        }
        if (!empty($this->filters['projekProgram'])) {
            $query->where('proj_program', $this->filters['projekProgram']);
        }
        if (!empty($this->filters['pelaksana'])) {
            $query->where('proj_pelaksana', $this->filters['pelaksana']);
        }
        if (!empty($this->filters['status'])) {
            $query->where('proj_status', $this->filters['status']);
        }
        if (!empty($this->filters['projek'])) {
            $query->where('proj_nama', 'like', "%{$this->filters['projek']}%");
        }

        return $query->get();
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
