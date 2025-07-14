@extends('layouts.main')
@section('title')
    Semak Permohonan
@endsection
@section('custom-css')
    <!-- Text spinners style -->
    <link href="{{ asset("/template/css/plugins/textSpinners/spinners.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/dataTables/datatables.min.css") }}" rel="stylesheet">
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
                <strong>Permohonan</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
{{-- @inject('SilingTrait', 'App\Traits\Projek\SilingTrait') --}}
<div class="row">
    <div class="col-sm-12">
        <div class="ibox ">
            <div class="ibox-content">
            PROGRAM / BAHAGIAN / INSTITUSI / JKN : <strong>{{ Str::upper(getProgram($pemilik)) }}</strong>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <span class="label label-success float-right">{{ date('Y')+1 }}</span>
                <h5>Jumlah Siling (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b>@duit($siling)</b></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="ibox ">
            <div class="ibox-title bg-success">
                <h5>Jumlah Permohonan (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b>@duit($jumlah)</b></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="ibox ">
            <div class="ibox-title bg-info">
                <h5>Jumlah Diluluskan (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b>@duit($lulus)</b></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="ibox ">
            <div class="ibox-title bg-warning">
                <h5>KIV (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b>@duit($tolak)</b></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="ibox ">
            <div class="ibox-content">
                <div>
                    <h1 class="no-margins text-right text-info"><b>RM @duit(100000000)</b></h1>
                </div>
                <small>Siling Peruntukan BP00600 Tahun 2025</small>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="ibox ">
            <div class="ibox-content">
                <div>
                    <h1 class="no-margins text-right text-info"><b>RM @duit(23500000)</b></h1>
                </div>
                <small>Baki Belum Agih</small>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        @php
            $peratusJKN = $lulusJKN > 0 ? ($lulusJKN / $silingSemua) * 100 : 0;
            $bakiJKN = $silingSemua - $lulusJKN;
            $lulusProg = $lulusSemua - $lulusJKN;
            $peratusProgram = $lulusProg > 0 ? ($lulusProg / 17000000) * 100 : 0;
            $bakiProgram = 17000000 - $lulusProg;
        @endphp
        <div class="ibox ">
            <div class="ibox-content">
                <div>
                    <p class="text-warning float-right font-bold">RM @duit($bakiJKN)</p>
                    <p class="text-info font-bold">RM @duit($silingSemua)</p>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" role="progressbar" style="width: {{ number_format($peratusJKN, 2) }}%" aria-valuenow="{{ number_format($peratusJKN, 2) }}" aria-valuemin="0" aria-valuemax="{{ $silingSemua }}">@duit($lulusJKN )</div>
                </div>
                <small>Siling JKN</small>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="ibox ">
            <div class="ibox-content">
                <div>
                    <p class="text-warning float-right font-bold">RM @duit($bakiProgram)</p>
                    <p class="text-info font-bold">RM @duit(17000000)</p>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-warning" role="progressbar" style="width: {{ number_format($peratusProgram, 2) }}%" aria-valuenow="{{ number_format($peratusProgram, 2) }}" aria-valuemin="0" aria-valuemax="17000000">@duit($lulusProg)</div>
                </div>
                <small>Siling Program / Bahagian / Institusi</small>
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
                <form action="/permohonan/semak/main/{{ $pemilik }}" method="post">
                    @csrf
                    <div class="row">
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
                                {{ Form::select('kategori', dropdownProjekKategori('siling'), session('kategori'), ['class'=>'form-control', 'id'=>'kategori']) }}
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
                                    <a href="/permohonan/semak/pdf/{{ $pemilik }}" class="btn btn-xs btn-outline btn-success dim"><i class="fa fa-print"></i> Cetak</a>
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
                <div class="ibox-tools">
                    <button type="button" class="btn btn-sm btn-warning" id="salurWaran">
                        <span id="salurButton"></span> Salur Waran
                    </button>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-stripped toggle-arrow-tiny" >
                        <thead>
                            <tr>
                                <th width="3%" class="text-center">#</th>
                                <th width="5%" class="text-center">Susunan</th>
                                <th width="10%">Kategori</th>
                                <th width="15%">Pemilik</th>
                                <th width="15%">Fasiliti</th>
                                <th width="25%">Projek</th>
                                <th width="10%" class="text-right">Amaun (RM)</th>
                                <th width="7%">Status</th>
                                <th width="10%" class="text-center">Tindakan</th>
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
                                        else if($proj->proj_status==5 || $proj->proj_status==7){
                                            $text='class="text-primary"';
                                        }
                                        else{
                                            $text='class="text-danger"';
                                        }

                                        if($proj->proj_status==1){
                                            $status = '<span class="badge badge-primary">'.getStatusMohonProjek($proj->proj_status).'</span>';
                                        }
                                        else if($proj->proj_status==2 || $proj->proj_status==3){
                                            $status = '<span class="badge badge-success">'.getStatusMohonProjek($proj->proj_status).'</span>';
                                        }
                                        else if($proj->proj_status==4){
                                            $status = '<span class="badge badge-warning">'.getStatusMohonProjek($proj->proj_status).'</span>';
                                        }
                                        elseif($proj->proj_status==5 || $proj->proj_status==7){
                                            $status = '<span class="badge badge-info">'.getStatusMohonProjek($proj->proj_status).'</span>';
                                        }
                                        else{
                                            $status = '<span class="badge badge-danger">'.getStatusMohonProjek($proj->proj_status).'</span>';
                                        }

                                        $button = '<a href="/permohonan/semak/papar/'.$proj->projek_id.'" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-success"></i></a><a href="/permohonan/semak/ubah/'.$proj->projek_id.'" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a><a href="/permohonan/semak/salur-waran" class="btn btn-default btn-xs" title="Salur Waran"><i class="fa fa-credit-card text-warning"></i></a>';
                                    @endphp

                                    <tr {!! $text !!}>
                                        <td class="text-center">
                                            <input type="checkbox" class="salur-checkbox" data-id="{{ $proj->projek_id }}"
                                            @if ($proj->proj_status <> 5)
                                                disabled
                                            @endif
                                            >
                                        </td>
                                        <td class="text-center">{{ $proj->proj_sort}}</td>
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
                                        <td class="text-center">{!! $button !!}</td>
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

    // HANTAR EMEL PEMAKLUMAN
    $(document).on('click', '#salurWaran', function (e) {
        e.preventDefault();

        document.getElementById("salurButton").classList.add("loading");
        document.getElementById("salurButton").classList.add("open-circle");

        let selectedProjek = [];
        $('.salur-checkbox:checked').each(function() {
            let projekID = $(this).data('id');

            // Push user details to array
            selectedProjek.push({
                id: projekID
            });
        });
        // alert(selectedProjek);
        // alert(selectedProjek.data("events").toSource());
        // alert(JSON.stringify(selectedProjek, null, 4));

        if (selectedProjek.length > 0) {
            $.ajax({
                url: '/permohonan/semak/salur-waran',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token
                    projek: selectedProjek
                },
                success: function (response) {
                    if (response.status == 400) {
                        swal("Gagal", response.message, "error");
                    } else {
                        // fetchSiling();
                        swal({
                            title: "Salur Waran",
                            text: response.message,
                            type: "success"
                        });
                        document.getElementById("salurButton").classList.remove("loading");
                        document.getElementById("salurButton").classList.remove("open-circle");
                    }
                }
            });
        }
        else{
            document.getElementById("salurButton").classList.remove("loading");
            document.getElementById("salurButton").classList.remove("open-circle");
            swal("Tiada Rekod", "Sila pilih sekurang-kurangnya satu rekod", "error");
        }
    });

    // function fetchSiling(sil_program_id_cari='', sil_status_cari=''){
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //         type: "post",
    //         url: "/siling/showList",
    //         data:{
    //             sil_program_id:sil_program_id_cari,
    //             sil_status:sil_status_cari
    //         },
    //         dataType: "json",
    //         success: function (response) {
    //             // var sil-status="";
    //     let bil =1;
    //             $('tbody').html("");
    //             $.each(response.siling, function (key, item) {
    //                 let amount = financial(item.sil_amount);
    //                 let baki = financial(item.sil_balance);
    //                 let Starikh = new Date(item.sil_sdate);
    //                 let Etarikh = new Date(item.sil_edate);
    //                 let status = "";
    //                 let emel = "";
    //                 if(item.sil_status == 1){
    //                     status = '<span class="badge badge-primary">Buka</span>';
    //                 }
    //                 else {
    //                     status = '<span class="badge badge-warning">Tutup</span>';
    //                 }
    //                 if(item.sil_emel==1){
    //                     emel = '<button type="button" value="' + item.siling_id + '" class="btn btn-default btn-xs emel" title="Emel"><i class="fa fa-envelope text-warning"></i></button>';
    //                 }
    //                 else{
    //                     emel = '<button type="button" class="btn btn-default btn-xs emel" title="Telah Emel"><i class="fa fa-envelope text-primary"></i></button>'
    //                 }

    //                 $('tbody').append('<tr>\
    //                     <td class="text-right"><input type="checkbox" class="siling-checkbox" data-id="'+ item.siling_id +'" data-program="'+ item.program_id +'"></td>\
    //                     <td>' + bil + '</td>\
    //                     <td>' + item.prog_name + '</td>\
    //                     <td>Fasa ' + item.sil_bil + '</td>\
    //                     <td>' + Starikh.toLocaleDateString() + '</td>\
    //                     <td>' + Etarikh.toLocaleDateString() + '</td>\
    //                     <td class="text-right">' + amount + '</td>\
    //                     <td class="text-right">' + baki + '</td>\
    //                     <td>' + status + '</td>\
    //                     <td><button type="button" value="' + item.siling_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>'+ emel +'\
    //                     <button type="button" value="' + item.siling_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
    //                 \</tr>');
    //     bil++;
    //             });
    //         }
    //     });
    // }

    setTimeout(() => {
        $('#msg').hide('slow');
    }, 3000);

});


</script>
@endsection
