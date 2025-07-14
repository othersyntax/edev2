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
                <strong>Baharu</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
{{-- @inject('SilingTrait', 'App\Traits\Projek\SilingTrait') --}}
<div class="row">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <span id="siling-tahun" class="label label-success float-right">2024</span>
                <h5>SILING (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="siling">0.00</b></h1>
                <div class="stat-percent font-bold text-success" id="siling-tarikh">
                </div>
                <small>Tempoh</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-info">
                <h5>REVOTE / SAMBUNGAN</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="sambung">0.00</b></h1>
                <div class="stat-percent font-bold text-success peratusSambung">
                    0%
                </div>
                <small>Peratusan</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-info">
                <h5>BAKI SILING (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="baki">0.00</b></h1>
                <div class="stat-percent font-bold text-success peratusBaki">
                    0%
                </div>
                <small>Peratusan</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-success">
                <h5>JUMLAH (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="jumlah">0.00</b></h1>
                <div class="stat-percent font-bold text-success peratusMohon">
                    0%
                </div>
                <small>Peratusan</small>
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
                {{-- <form action="/permohonan/baru/senarai" method="post">
                    @csrf --}}
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Pemilik</label>
                                {{ Form::select('cari-program', dropdownProgram(), auth()->user()->program_id, ['class'=>'form-control', 'id'=>'cari-program', 'disabled'=>true]) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Negeri</label>
                                {{ Form::select('cari-negeri', dropdownNegeri(), null, ['class'=>'form-control', 'id'=>'cari-negeri']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Daerah</label>
                                <span id="list-daerah">
                                    {{ Form::select('cari-daerah', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'cari-daerah']) }}
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Fasiliti</label>
                                <span id="list-fasiliti">
                                    {{ Form::select('cari-fasiliti', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'cari-fasiliti']) }}
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Subsetia</label>
                                {{ Form::select('subsetia', [''=>'--Sila Pilih--','1001'=>'1001', '4001'=>'4001', '4003'=>'4003', '5003'=>'5003'], session('subsetia'), ['class'=>'form-control', 'id'=>'subsetia']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kategori Projek</label>
                                {{ Form::select('cari-kategori', dropdownProjekKategori('siling'), null, ['class'=>'form-control', 'id'=>'cari-kategori']) }}
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
                                {{ Form::select('cari-pelaksana', ['1'=>'Pemilik', '2'=>'BPKj' , '3'=>'JKR'], null, ['class'=>'form-control', 'id'=>'cari-pelaksana']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Status Permohonan</label>
                                {{ Form::select('cari-status', [''=>'--Sila Pilih--', '1'=>'Baharu', '2'=>'Pengesahan', '3'=>'Perakuan', '4'=>'Proses'], null, ['class'=>'form-control', 'id'=>'cari-status']) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Projek</label>
                                {{ Form::text('cari-projek', null, ['class'=>'form-control', 'id'=>'cari-projek']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <a href="/permohonan/baru/main" class="btn btn-xs btn-outline btn-primary dim"><i class="fa fa-refresh"></i> Set Semula</a>
                            <a href="/permohonan/baru/main/excel" class="btn btn-xs btn-outline btn-success dim"><i class="fa fa-paste"></i> Eksport</a>
                            <a href="/permohonan/baru/pdf" class="btn btn-xs btn-outline btn-success dim"><i class="fa fa-print"></i> Cetak</a>
                            <button class="btn btn-xs btn-primary float-right" id="carian" value="Carian"><i class="fa fa-search"></i> Carian</button>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Senarai Projek</h5>
                <div class="ibox-tools">
                    @if(cekSiling(auth()->user()->program_id))
                        @hasanyrole(['penyedia'])
                            <button type="button" class="btn btn-xs btn-warning" id="semakProjek">
                                <span id="semakButton"></span> Hantar Untuk Pengesahan <i class="fa fa-envelope"></i>
                            </button>
                            <a href="/permohonan/baru/revote-sambung" class="btn btn-xs btn-primary">
                                Tambah Revote / Sambungan <i class="fa fa-plus"></i>
                            </a>
                            <a href="/permohonan/baru/tambah" class="btn btn-xs btn-primary">
                                Tambah Baharu <i class="fa fa-plus"></i>
                            </a>
                        @endhasanyrole
                    @endif
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <input type="hidden" id="bil-rekod">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
				                <th width="6%">Susunan</th>
                                <th width="4%" class="text-center">Selesai</th>
                                <th width="10%">Kategori</th>
                                <th width="15%">Pemilik</th>
                                <th width="15%">Fasiliti</th>
                                <th width="27%">Projek</th>
                                <th width="10%" class="text-right">Amaun (RM)</th>
                                <th width="5%">Status</th>
                                <th width="8%" class="text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('custom-js')
<!-- Date range picker -->
<script src="{{ asset("/template/js/plugins/datapicker/bootstrap-datepicker.js") }}"></script>
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
    let cariNegeri1 = $('#cari-negeri').val();
    // alert(cariNegeri1);
    getFasiliti(cariNegeri1, 'cari-fasilti', '#list-fasiliti');
    //ON CHANGE NEGERI DROPDOWN EVENT
    $('#cari-negeri').on('change', function() {
        var cariNegeri = $(this).val();
        getFasiliti(cariNegeri, 'cari-daerah',  '#list-daerah');
    });

    // LOAD DATA WHEN OPEN THIS PAGE
    fetchPermohonan();


    // HANTAR UNTUK PERAKUAN
    $(document).on('click', '#sahProjek', function (e) {
        e.preventDefault();
        document.getElementById("sahButton").classList.add("loading");
        document.getElementById("sahButton").classList.add("open-circle");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "/permohonan/baru/maklum-pengesahan",
            data: null,
            success: function (response) {
                if (response.status == 400) {
                    swal("Gagal", response.message, "error");
                    document.getElementById("sahButton").classList.remove("loading");
                    document.getElementById("sahButton").classList.remove("open-circle");
                } else {
                    fetchPermohonan();
                    swal({
                        title: "Semakan Projek",
                        text: response.message,
                        type: "success"
                    });
                    document.getElementById("sahButton").classList.remove("loading");
                    document.getElementById("sahButton").classList.remove("open-circle");
                }
            }
        });
    });

    // HANTAR UNTUK PENGESAHAN
    $(document).on('click', '#semakProjek', function (e) {
        e.preventDefault();
        document.getElementById("semakButton").classList.add("loading");
        document.getElementById("semakButton").classList.add("open-circle");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "/permohonan/baru/semakan",
            data: null,
            success: function (response) {
                if (response.status == 400) {
                    swal("Gagal", response.message, "error");
                    document.getElementById("semakButton").classList.remove("loading");
                    document.getElementById("semakButton").classList.remove("open-circle");
                } else {
                    fetchPermohonan();
                    swal({
                        title: "Semakan Projek",
                        text: response.message,
                        type: "success"
                    });
                    document.getElementById("semakButton").classList.remove("loading");
                    document.getElementById("semakButton").classList.remove("open-circle");
                }
            }
        });
    });

    // HANTAR EMEL PEMAKLUMAN
    $(document).on('click', '#emelPemakluman', function (e) {
        e.preventDefault();
        document.getElementById("emelButton").classList.add("loading");
        document.getElementById("emelButton").classList.add("open-circle");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if ($('#bil-rekod').val()> 0) {
            $.ajax({
                type: "post",
                url: "/permohonan/baru/perakuan",
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        swal("Gagal", response.message, "error");
                        document.getElementById("emelButton").classList.remove("loading");
                        document.getElementById("emelButton").classList.remove("open-circle");
                    } else {
                        fetchPermohonan();
                        swal({
                            title: "Emel Pemakluman",
                            text: response.msg,
                            type: "success"
                        });
                        document.getElementById("emelButton").classList.remove("loading");
                        document.getElementById("emelButton").classList.remove("open-circle");
                    }
                }
            });
        }
        else{
            document.getElementById("emelButton").classList.remove("loading");
            document.getElementById("emelButton").classList.remove("open-circle");
            swal("Tiada Rekod", "Sila pastikan sekurang-kurangnya terdapat satu permohonan", "error");
        }
    });

    // SEARCH BUTTON CLICK
    $('#carian').on('click', function(e){
        // alert('aaa');
        e.preventDefault();
        let cariProgram = $('#cari-program').val();
        let cariNegeri = $('#cari-negeri').val();
        let cariDaerah = $('#cari-daerah').val();
        let cariFasiliti = $('#cari-fasiliti').val();
        let cariPelaksana = $('#cari-pelaksana').val();
        let cariKategori = $('#cari-kategori').val();
        let cariStatus = $('#cari-status').val();
        let cariProjek = $('#cari-projek').val();
        fetchPermohonan(cariProgram, cariNegeri, cariDaerah, cariFasiliti, cariPelaksana, cariKategori, cariStatus, cariProjek);
    });

    function fetchPermohonan(cariProgram, cariNegeri, cariDaerah, cariFasiliti, cariPelaksana, cariKategori, cariStatus, cariProjek){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/permohonan/baru/senarai",
            data:{
                program:cariProgram,
                negeri:cariNegeri,
                daerah:cariDaerah,
                fasiliti:cariFasiliti,
                pelaksana:cariPelaksana,
                kategori:cariKategori,
                status:cariStatus,
                projek:cariProjek
            },
            dataType: "json",
            success: function (response) {
                $('tbody').html("");
                if(response.data.projek.length>0) {
                    $.each(response.data.projek, function (key, item) {
                        // Statussprojek
                        if(item.proj_status_complete == 1){
                            text = 'fa-close text-danger';
                        }
                        else {
                            text = 'fa-check text-navy';
                        }
                        // Status Rekod
                        if(item.proj_status < 3){
                            status = '<span class="badge badge-primary">'+ statusProjek(item.proj_status) +'</span>';
                            button = '<a href="/permohonan/baru/papar/'+item.projek_id+'" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a><a href="/permohonan/baru/ubah/'+item.projek_id+'" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a><a href="/permohonan/baru/padam/'+item.projek_id+'" class="btn btn-default btn-xs" title="Padam"><i class="fa fa-close text-danger"></i></a>';
                        }
			            else if(item.proj_status == 4) {
                            status = '<span class="badge badge-warning">'+ statusProjek(item.proj_status) +'</span>';
                            button = '<a href="/permohonan/baru/papar/'+item.projek_id+'" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a> <i class="btn btn-default btn-xs fa fa-pencil text-mute"></i> <i class="btn btn-default btn-xs fa fa-close text-mute"></i>';
                        }
			            else if(item.proj_status == 5) {
                            status = '<span class="badge badge-success">'+ statusProjek(item.proj_status) +'</span>';
                            button = '<a href="/permohonan/baru/papar/'+item.projek_id+'" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a> <i class="btn btn-default btn-xs fa fa-pencil text-mute"></i> <i class="btn btn-default btn-xs fa fa-close text-mute"></i>';
                        }
                        else {
                            status = '<span class="badge badge-danger">'+ statusProjek(item.proj_status) +'</span>';
                            button = '<a href="/permohonan/baru/papar/'+item.projek_id+'" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a> <i class="btn btn-default btn-xs fa fa-pencil text-mute"></i> <i class="btn btn-default btn-xs fa fa-close text-mute"></i>';
                        }

                        $('tbody').append('<tr>\
			    <td class="text-center">' + item.proj_sort + '</td>\
                            <td class="text-center"><i class="fa '+text+'"></i></td>\
                            <td>' + item.pro_kat_short_nama + '</td>\
                            <td>' + item.prog_name + '</td>\
                            <td>' + item.fas_name + '</td>\
                            <td>' + item.proj_nama + '</td>\
                            <td class="text-right">' + financial(item.proj_kos_mohon) + '</td>\
                            <td>' + status + '</td>\
                            <td>'+button+'</td>\
                        \</tr>');
                    });
                }
                else{
                    $('tbody').html("");
                    $('tbody').append('<tr>\
                        <td colspan="8" class="font-italic text-small text-center">Tiada Rekod</td>\
                    \</tr>');
                }

                if(response.data.baki < 0){
                    baki = '<span class="text-danger">'+financial(response.data.baki)+'</span>';
                }
                else{
                    baki = financial(response.data.baki);
                }
		        let silingTarikh = response.data.silingMula + '-' + response.data.silingTamat;
                $('#bil-rekod').val(response.data.projek.length);
                $('#siling').html(financial(response.data.siling));
                $('#sambung').html(financial(response.data.sambung));
                $('#baki').html(baki);
                $('#jumlah').html(financial(response.data.jumlah));
                $('#siling-tarikh').html(silingTarikh);
		        $('#siling-tahun').html(response.data.silingTahun);
		        $('.peratusSambung').html(kiraPeratus(response.data.sambung, response.data.siling)+" %");
		        $('.peratusBaki').html(kiraPeratus(response.data.baki, response.data.siling)+" %");
		        $('.peratusMohon').html(kiraPeratus(response.data.jumlah, response.data.siling)+" %");
            }
        });
    }

    function financial(x) {
        return Number.parseFloat(x).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

   //GET DAERAH DROPDOWN HTML AJAXCONTROLLER
//    function getFasiliti(cariNegeri='0', inputname='0', list='0', select='99') {
//         let url = "/ajax/ajax-fasiliti/" + cariNegeri + "/" + inputname + "/" + select;
//         $.get(url, function(data) {
//             $(list).html(data);
//         });
//     }

    //GET DAERAH DROPDOWN HTML AJAXCONTROLLER
    function getFasiliti(parID='0', inputname='0', list='0', select='99') {
        let url = "/ajax/ajax-daerah/" + parID + "/" + inputname + "/" + select;
        $.get(url, function(data) {
            $(list).html(data);
            $('#cari-daerah').on('change', function() {
                var daerahID = $(this).val();
                var list = '#list-fasiliti';
                var inputname = 'cari-fasiliti';
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

    function statusProjek(id){
        if(id==1)
            return "Baharu";
        else if(id==2)
            return "Pengesahan";
        else if(id==3)
            return "Perakuan";
        else if(id==4)
                return "Proses";
        else if(id==5)
                return "Disyorkan";
        else if(id==6)
                return "Tidak Diluluskan";
        else if(id==7)
                return "Diluluskan";
        else
            return "Dibatalkan";
    }

    function kiraPeratus(part, whole) {
        if (whole === 0) return 0; // Avoid division by zero
        return ((part / whole) * 100).toFixed(2);
    }

    setTimeout(() => {
        $('#msg').hide('slow');
    }, 3000);
});

</script>
@endsection
