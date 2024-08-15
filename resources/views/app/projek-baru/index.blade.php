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
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <span class="label label-success float-right">{{ date('Y')+1 }}</span>
                <h5>SILING PERUNTUKAN  (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="siling"></b></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title bg-info">
                <h5>BAKI SILING (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="baki"></b></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title bg-success">
                <h5>JUMLAH PERMOHONAN  (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="jumlah"></b></h1>
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
                <form action="/permohonan/baru/senarai" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Pemilik</label>
                                {{ Form::select('cari-program', dropdownProgram(), session('program'), ['class'=>'form-control', 'id'=>'cari-program']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Negeri</label>
                                {{ Form::select('cari-negeri', dropdownNegeri(), session('negeri'), ['class'=>'form-control', 'id'=>'cari-negeri']) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Fasiliti</label>
                                <span id="list-fasiliti">
                                    {{ Form::select('cari-fasiliti', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'cari-fasiliti']) }}
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Pelaksana</label>
                                {{ Form::select('cari-pelaksana', dropdownPelaksana(), session('pelaksana'), ['class'=>'form-control', 'id'=>'cari-pelaksana']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kategori Projek</label>
                                {{ Form::select('cari-kategori', dropdownProjekKategori(), session('kategori'), ['class'=>'form-control', 'id'=>'cari-kategori']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Status Permohonan</label>
                                {{ Form::select('cari-status', [''=>'--Sila Pilih--', '1'=>'Aktif', '2'=>'Proses'], session('status'), ['class'=>'form-control', 'id'=>'cari-status']) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Projek</label>
                                {{ Form::text('cari-projek', session('projek'), ['class'=>'form-control', 'id'=>'cari-projek']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <a href="/permohonan/baru/main" class="btn btn-default">Set Semula</a>
                            <button class="btn btn-primary float-right" id="carian" value="Carian">Carian</button>
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
                <h5>Senarai Projek</h5>
                <div class="ibox-tools">
                    @if(cekSiling(auth()->user()->program_id))
                        <button type="button" class="btn btn-sm btn-warning" id="emelPemakluman">
                            <span id="emelButton"></span> Hantar Permohonan
                        </button>
                        <a href="/permohonan/baru/tambah" class="btn btn-sm btn-primary">
                            Tambah
                        </a>
                    @endif
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">Selesai</th>
                                <th width="10%">Kategori</th>
                                <th width="16%">Pemilik</th>
                                <th width="16%">Fasiliti</th>
                                <th width="30%">Projek</th>
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
        getFasiliti(cariNegeri, 'cari-fasilti', '#list-fasiliti');
    });

       // LOAD DATA WHEN OPEN THIS PAGE
    fetchPermohonan();

    // HANTE EMEL PEMAKLUMAN
    $(document).on('click', '#emelPemakluman', function (e) {
        e.preventDefault();
        document.getElementById("emelButton").classList.add("loading");
        document.getElementById("emelButton").classList.add("open-circle");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "/permohonan/baru/emel",
            data: null,
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
                        text: response.message,
                        type: "success"
                    });
                    document.getElementById("emelButton").classList.remove("loading");
                    document.getElementById("emelButton").classList.remove("open-circle");
                }
            }
        });
    });

    // SEARCH BUTTON CLICK
    $('#carian').click(function(e){
            e.preventDefault();
            let cariProgram = $('#cari-program').val();
            let cariNegeri = $('#cari-negeri').val();
            let cariFasiliti = $('#cari-fasiliti').val();
            let cariPelaksana = $('#cari-pelaksana').val();
            let cariKategori = $('#cari-kategori').val();
            let cariStatus = $('#cari-status').val();
            let cariProjek = $('#cari-projek').val();
            fetchPermohonan(cariProgram, cariNegeri, cariFasiliti, cariPelaksana, cariKategori, cariStatus, cariProjek);
        });

    function fetchPermohonan(cariProgram, cariNegeri, cariFasiliti, cariPelaksana, cariKategori, cariStatus, cariProjek){
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
                fasiliti:cariFasiliti,
                pelaksana:cariPelaksana,
                kategori_id:cariKategori,
                status:cariStatus,
                projek:cariProjek
            },
            dataType: "json",
            success: function (response) {
                $('tbody').html("");
                if (response.length==0) {
                    alert('kosong');
                }
                else{
                    $.each(response.data.projek, function (key, item) {
                        // Statussprojek
                        if(item.proj_status_complete == 1){
                            text = 'fa-close text-danger';
                        }
                        else {
                            text = 'fa-check text-navy';
                        }
                        // Status Rekod
                        if(item.proj_status == 1){
                            status = '<span class="badge badge-primary">Aktif</span>';
                        }
                        else {
                            status = '<span class="badge badge-warning">Proses</span>';
                        }

                        $('tbody').append('<tr>\
                            <td class="text-center"><i class="fa '+text+'"></i></td>\
                            <td>' + item.pro_kat_short_nama + '</td>\
                            <td>' + item.prog_name + '</td>\
                            <td>' + item.fas_name + '</td>\
                            <td>' + item.proj_nama + '</td>\
                            <td class="text-right">' + financial(item.proj_kos_mohon) + '</td>\
                            <td>' + status + '</td>\
                            <td><a href="/permohonan/baru/papar/'+item.projek_id+'" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>\
                            <a href="/permohonan/baru/ubah/'+item.projek_id+'" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a>\
                            <a href="/projek/padam/'+item.projek_id+'/delete" class="btn btn-default btn-xs" title="Padam"><i class="fa fa-close text-danger"></i></a></td>\
                        \</tr>');
                    });
                    if(response.data.baki < 0){
                        baki = '<span class="text-danger">'+financial(response.data.baki)+'</span>';
                    }
                    else{
                        baki = financial(response.data.baki);
                    }
                    $('#siling').html(financial(response.data.siling));
                    $('#baki').html(baki);
                    $('#jumlah').html(financial(response.data.jumlah));
                }
            }
        });
    }

    function financial(x) {
        return Number.parseFloat(x).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

   //GET DAERAH DROPDOWN HTML AJAXCONTROLLER
   function getFasiliti(cariNegeri='0', inputname='0', list='0', select='99') {
        let url = "/ajax/ajax-fasiliti/" + cariNegeri + "/" + inputname + "/" + select;
        $.get(url, function(data) {
            $(list).html(data);
        });
    }

    setTimeout(() => {
        $('#msg').hide('slow');
    }, 3000);
});

</script>
@endsection
