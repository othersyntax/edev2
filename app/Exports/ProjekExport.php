<?php

namespace App\Exports;

use App\Models\Projek\Projek;
use App\Models\Pentadbiran\Program;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Auth;

class ProjekExport implements FromView
{

    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;

        // dd($filters);
    }

    public function view(): View
    {
        $role = Auth::user()->hasRole(['penyedia', 'user','peraku', 'pengesah']);
        $pemilik = $this->filters['program'];
        $tahun = $this->filters['tahun'];
        $negeri = $this->filters['negeri'];
        $daerah = $this->filters['daerah'];
        $fasiliti = $this->filters['fasiliti'];
        $subsetia = $this->filters['subsetia'];
        $kategori = $this->filters['kategori'];
        $projekProgram = $this->filters['projekProgram'];
        $pelaksana = $this->filters['pelaksana'];
        $status = $this->filters['status'];
        $projek = $this->filters['projek'];
        $query = \DB::table('tblprojek as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblfasiliti as d','a.proj_fasiliti_id','d.fasiliti_id')
                ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
                ->leftJoin('ddsa_kod_negeri as f','d.fas_negeri_id','f.neg_negeri_id')
                ->leftJoin('ddsa_kod_daerah as g','d.fas_daerah_id','g.dae_daerah_id')
                ->select('a.*', 'c.pro_kat_nama', 'd.fas_name','e.proj_prog_nama', 'f.neg_nama_negeri', 'g.dae_nama_daerah')
                ->where('c.pro_siling', 'Siling')
                ->where(function($q) use ( $role, $pemilik){
			            if($role){
                		    $q->where('a.proj_pemilik', $pemilik)->orWhere('a.proj_pelaksana_agensi', $pemilik);
                        }
                        else{
                            if (!empty($pemilik)) {
                                $q->where('a.proj_pemilik', $pemilik)->orWhere('a.proj_pelaksana_agensi', $pemilik);
                            }
                        }
                })
                ->where(function($q) use ( $tahun, $negeri, $daerah, $fasiliti, $subsetia, $kategori, $projekProgram, $pelaksana,  $status, $projek){
                    if (!empty($tahun)) {
                        $q->where('a.proj_tahun', $tahun);
                    }
                    if (!empty($negeri)) {
                        $q->where('a.proj_negeri', $negeri);
                    }
                    if (!empty($daerah)) {
                        $q->where('a.proj_daerah', $daerah);
                    }
                    if (!empty($fasiliti)) {
                        $q->where('a.proj_fasiliti_id', $fasiliti);
                    }
                    if (!empty($subsetia)) {
                        $q->where('a.proj_kod_subsetia', $subsetia);
                    }
                    if (!empty($kategori)) {
                        $q->where('a.proj_kod_subsetia', $kategori);
                    }
                    if (!empty($projekProgram)) {
                        $q->where('a.proj_program', $projekProgram);
                    }
                    if (!empty($pelaksana)) {
                        $q->where('a.proj_pelaksana', $pelaksana);
                    }
                    if (!empty($status)) {
                        $q->where('a.proj_status', $status);
                    }
                    if (!empty($projek)) {
                        $q->where('a.proj_nama', 'like', "%$projek%");
                    }
                })
                // ->where('a.proj_pemilik', auth()->user()->program_id)
                ->orderBy('a.projek_id', 'ASC');
                $projek = $query->get();



                // dd($projek);

            if (!empty($this->filters['program'])) {
                $head = Program::where('program_id', $this->filters['program'])->select('prog_name')->first();
                $header = $head->prog_name;
            }
            else{
                $header = 'Pelbagai';
            }
            $data['header'] = $header;
            $data['projek'] = $projek;
            return view('app.projek.export', $data);
    }
}
