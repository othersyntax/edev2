@extends('layouts.main')
@section('title')
    Permohonan Projek
@endsection
@section('custom-css')
    <link href="{{ asset("/template/css/plugins/footable/footable.core.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
    <!-- Text spinners style -->
    <link href="{{ asset("/template/css/plugins/textSpinners/spinners.css") }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Permohonan Projek</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Projek</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Luar Siling</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
{{-- @inject('SilingTrait', 'App\Traits\Projek\SilingTrait') --}}
<div class="row">
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <span class="label label-success float-right">{{ date('Y')+1 }}</span>
                <h5>SILING PERUNTUKAN (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="siling">@duit(0)</b></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title bg-info">
                <h5>JUMLAH PERMOHONAN (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="kecemasan">@duit(0)</b></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title bg-success">
                <h5>JUMLAH (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="jumlah"></b>@duit(0)</h1>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Tapisan Projek</h5>
            </div>
            <div class="ibox-content">
                <form action="/pengurusan/kecemasan/main" method="post">
                    @csrf
                    <div class="row">
			<div class="col-sm-3">
                            <div class="form-group">
                                <label>Pemilik</label>
                                {{ Form::select('program', dropdownProgram(), session('program'), ['class'=>'form-control', 'id'=>'program']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tahun</label>
                                {{ Form::select('tahun', [''=>'--Sila pilih--', '2024'=>'2024', '2025'=>'2025'], session('tahun'), ['class'=>'form-control', 'id'=>'tahun']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Negeri</label>
                                {{ Form::select('negeri', dropdownNegeri(), session('negeri'), ['class'=>'form-control', 'id'=>'negeri']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Daerah</label>
                                <span id="list-daerah">
                                    {{ Form::select('daerah', [''=>'--Sila pilih--'], session('daerah'), ['class'=>'form-control', 'id'=>'daerah']) }}
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Fasiliti</label>
                                <span id="list-fasiliti">
                                    {{ Form::select('fasiliti', [''=>'--Sila pilih--'], session('fasiliti'), ['class'=>'form-control', 'id'=>'fasiliti']) }}
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Subsetia</label>
                                {{ Form::select('subsetia', [''=>'--Sila Pilih--','1001'=>'1001', '4001'=>'4001', '4003'=>'4003','5003'=>'5003'], session('subsetia'), ['class'=>'form-control', 'id'=>'subsetia']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kategori Projek</label>
                                {{ Form::select('kategori', dropdownProjekKategori('xsiling'), session('kategori'), ['class'=>'form-control', 'id'=>'kategori']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Program</label>
                                {{ Form::select('projekProgram', dropdownProjekProgram(), session('projekProgram'), ['class'=>'form-control', 'id'=>'projekProgram']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Pelaksana</label>
                                {{ Form::select('pelaksana', [''=>'--Sila pilih--', '1'=>'Pemilik', '2'=>'BPKj' , '3'=>'JKR'], session('pelaksana'), ['class'=>'form-control', 'id'=>'pelaksana']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Status Permohonan</label>
                                {{ Form::select('status', [''=>'--Sila Pilih--', '1'=>'Baharu', '2'=>'Pengesahan', '3'=>'Perakuan', '4'=>'Proses'], session('status'), ['class'=>'form-control', 'id'=>'status']) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Projek</label>
                                {{ Form::text('projek', session('projek'), ['class'=>'form-control', 'id'=>'cari-projek']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <a href="/permohonan/semak/main" class="btn btn-xs btn-outline btn-primary dim"><i class="fa fa-refresh"></i> Set Semula</a>
                                    <a href="/permohonan/semak/pdf/" class="btn btn-xs btn-outline btn-success dim"><i class="fa fa-print"></i> Cetak</a>
                                    <button class="btn btn-xs btn-primary float-right" id="carian" value="Carian"><i class="fa fa-search"></i> Carian</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>SENARAI PERMOHONAN</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-stripped toggle-arrow-tiny" >
                        <thead>
                            <tr>
                                <th width="8%" class="text-center">Bil.</th>
                                <th width="10%">Kategori</th>
                                <th width="15%">Pemilik</th>
                                <th width="15%">Fasiliti</th>
                                <th width="25%">Projek</th>
                                <th width="10%" class="text-right">Amaun (RM)</th>
                                <th width="7%">Status</th>
                                <th width="10%" class="text-left">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($projek->count()>0)
                            @php
                                $bil = $projek->firstItem();
                            @endphp
                                @foreach ($projek as $proj)
                                    @php
					                    if($proj->proj_status<4){
                                            $text='';
                                        }
                                        else if($proj->proj_status==4){
                                            $text='class="text-success"';
                                        }
                                        else if($proj->proj_status==5){
                                            $text='class="text-primary"';
                                        }
					                    else if($proj->proj_status==7){
                                            $text='class="text-primary"';
                                        }

                                        else{
                                            $text='class="text-danger"';
                                        }

                                        if($proj->proj_status==1){
                                            $status = '<span class="badge badge-primary">'.getStatusMohonProjek($proj->proj_status).'</span>';
					                        $button = '<a href="/pengurusan/kecemasan/ubah/'.encrypt($proj->projek_id).'" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a><a href="#" class="btn btn-default btn-xs" title="Cetak"><i class="fa fa-print text-muted"></i></a>';
                                        }
                                        else if($proj->proj_status==2 || $proj->proj_status==3){
                                            $status = '<span class="badge badge-success">'.getStatusMohonProjek($proj->proj_status).'</span>';
					                        $button = '<a href="/pengurusan/kecemasan/ubah/'.encrypt($proj->projek_id).'" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a><a href="#" class="btn btn-default btn-xs" title="Cetak"><i class="fa fa-print text-muted"></i></a>';
                                        }
                                        else if($proj->proj_status==4){
                                            $status = '<span class="badge badge-warning">'.getStatusMohonProjek($proj->proj_status).'</span>';
					                        $button = '<a href="/pengurusan/kecemasan/ubah/'.encrypt($proj->projek_id).'" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a><a href="#" class="btn btn-default btn-xs" title="Cetak"><i class="fa fa-print text-muted"></i></a>';
                                        }
                                        elseif($proj->proj_status==5){
                                            $status = '<span class="badge badge-info">'.getStatusMohonProjek($proj->proj_status).'</span>';
					                        $button = '<a href="/pengurusan/kecemasan/ubah/'.encrypt($proj->projek_id).'" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil"></i></a><a href="/permohonan/kecemasan/pdf/'.encrypt($proj->proj_pemilik).'" class="btn btn-default btn-xs" title="Cetak"><i class="fa fa-print text-warning"></i></a> <a href="/pengurusan/kecemasan/salur-waran/'.encrypt($proj->projek_id).'" class="btn btn-default btn-xs" title="Salur Waran"><i class="fa fa-credit-card text-info"></i></a>';
                                        }
					                    elseif($proj->proj_status==7){
                                            $status = '<span class="badge badge-success">'.getStatusMohonProjek($proj->proj_status).'</span>';
					                        $button = '<a href="/pengurusan/kecemasan/ubah/'.encrypt($proj->projek_id).'" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil"></i></a><a href="/permohonan/kecemasan/pdf/'.encrypt($proj->proj_pemilik).'" class="btn btn-default btn-xs" title="Cetak"><i class="fa fa-print text-warning"></i></a>';

                                        }
                                        else{
                                            $status = '<span class="badge badge-danger">'.getStatusMohonProjek($proj->proj_status).'</span>';
					                        $button = '<a href="/pengurusan/kecemasan/ubah/'.encrypt($proj->projek_id).'" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a><a href="#" class="btn btn-default btn-xs" title="Cetak"><i class="fa fa-print text-muted"></i></a>';

                                        }

                                    @endphp

                                    <tr {!! $text !!}>
                                        <td class="text-center">{{  $bil++ }}</td>
                                        <td>{{ $proj->pro_kat_short_nama}}</td>
                                        <td>{{ $proj->prog_name}}</td>
                                        <td>{{ $proj->fas_name}}</td>
                                        <td>{!! $proj->proj_nama_admin !!}</td>
                                        <td class="text-right">
                                            @duit( $proj->proj_kos_lulus)<br>
                                            @if ($proj->proj_kos_mohon <> $proj->proj_kos_lulus)
                                                <small class="text-warning"><i class="fa fa-bell"></i> Kos asal RM @duit( $proj->proj_kos_mohon)</small>
                                            @endif

                                        </td>
                                        <td>{!! $status !!}</td>
                                        <td class="text-left">
                                            {!! $button !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="font-italic text-small text-center">Tiada Rekod</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                    {{ $projek->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('custom-js')
<!-- Date range picker -->
<script src="{{ asset("/template/js/plugins/dataTables/datatables.min.js") }}"></script>
<script>
@if(Session::has('msg'))
    var title = "{{ Session::get('title') }}";
    var mesej = "{{ Session::get('msg') }}";
    var type = "{{ Session::get('type') }}";
    swal({
        title: title,
        text: mesej,
        type: type
    });
@endif

$(document).ready(function(){

    //SET DEFAULT
    let cariNegeri1 = $('#negeri').val();
    // alert(cariNegeri1);
    getFasiliti(cariNegeri1, 'fasilti', '#list-fasiliti');
    //ON CHANGE NEGERI DROPDOWN EVENT
    $('#negeri').on('change', function() {
        var cariNegeri = $(this).val();
        getFasiliti(cariNegeri, 'daerah',  '#list-daerah');
    });

    //GET DAERAH DROPDOWN HTML AJAXCONTROLLER
    function getFasiliti(parID='0', inputname='0', list='0', select='99') {
        let url = "/ajax/ajax-daerah/" + parID + "/" + inputname + "/" + select;
        $.get(url, function(data) {
            $(list).html(data);
            $('#daerah').on('change', function() {
                var daerahID = $(this).val();
                var list = '#list-fasiliti';
                var inputname = 'fasiliti';
                let url = "/ajax/ajax-fasiliti/" + daerahID + "/" + inputname + "/" + select;
                $.get(url, function(data) {
                    $(list).html(data);
                    // $('#proj_fasiliti_id').on('change', function() {});
                    // alert('AA');
                    $('#proj_parlimen').val('P02 - Tiada Rekod');
                    $('#proj_dun').val('N22 - Tiada Rekod');
                });
            });
        });
    }



    setTimeout(() => {
        $('#msg').hide('slow');
    }, 3000);

});


</script>
@endsection
