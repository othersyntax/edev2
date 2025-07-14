<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projek\Projek;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index(){
        $projek = Projek::where('proj_pemilik', auth()->user()->program_id)->where('proj_tahun', date('Y'))->whereIn('proj_status', [1,2,5]);
        $projekLaksana = Projek::where('proj_pelaksana_agensi', auth()->user()->program_id)->where('proj_tahun', date('Y'))->where('proj_pelaksana', 4)->count('projek_id');
        $bilangan = $projek->count('projek_id');
        $data['bilangan'] = $bilangan;
        $data['laksana'] = abs($projekLaksana-$bilangan);
        $data['lulus'] = $projek->sum('proj_kos_lulus');
        $data['waran'] = $projek->sum('proj_kos_lulus');
        $data['belanja'] = $projek->sum('proj_kos_sebenar');

        $data['selesai'] = $projek->where('proj_status', 5)->count('projek_id');
        $data['belumLaksana'] = $projek->where('proj_kos_sebenar', 0)->count('projek_id');

        $task = Task::whereRaw('FIND_IN_SET(?, task_user_id)', [auth()->user()->id])->where('task_status', 1)->get();
        // dd($task);
        $data['mytask'] = $task;


        return view('app.index', $data);
    }
}
