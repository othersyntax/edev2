@extends('layouts.main')
@section('title')
    Kemaskini Projek
@endsection
@section('custom-css')
    <link href="{{ asset("/template/css/plugins/footable/footable.core.css") }}" rel="stylesheet">
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
                <h1 class="no-margins text-right"><b>@duit(1500000)</b></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title bg-info">
                <h5>BAKI SILING (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right">@duit($tolak)</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title bg-success">
                <h5>JUMLAH PERMOHONAN  (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right">@duit($jumlah)</h1>
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
                                <label>Mukim/Bandar</label>
                                <span id="list-mukim">
                                    {{ Form::select('cari-bandar', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'cari-bandar']) }}
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Fasiliti</label>
                                {{ Form::select('fasiliti', dropdownFasiliti(), session('fasiliti'), ['class'=>'form-control', 'id'=>'fasiliti']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Pelaksana</label>
                                {{ Form::select('pelaksana', dropdownPelaksana(), session('pelaksana'), ['class'=>'form-control', 'id'=>'pelaksana']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Fasiliti</label>
                                {{ Form::select('fasiliti', dropdownFasiliti(), session('fasiliti'), ['class'=>'form-control', 'id'=>'fasiliti']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kategori Projek</label>
                                {{ Form::select('kategori', dropdownProjekKategori(), session('kategori'), ['class'=>'form-control', 'id'=>'kategori']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Status Permohonan</label>
                                {{ Form::select('status', [''=>'--Sila Pilih--', '1'=>'Baru', '2'=>'Proses'], session('status'), ['class'=>'form-control', 'id'=>'status']) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Projek</label>
                                {{ Form::text('projek', session('projek'), ['class'=>'form-control', 'id'=>'projek']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <a href="/permohonan/baru/senarai" class="btn btn-default">Set Semula</a>
                            <input type="submit" class="btn btn-primary float-right" id="carian" value="Carian">
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
                                <th width="5%" class="text-center">Status</th>
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
<script>
$(document).ready(function(){
    //ON CHANGE NEGERI DROPDOWN EVENT
    $('#cari-negeri').on('change', function() {
        var cariNegeri = $(this).val();
        getDaerah(cariNegeri, 'cari-daerah', '#list-daerah');
    });

    $('#cari-daerah').on('change', function() {
        var cariDaerah = $(this).val();
        alert(cariDaerah);
        // getDaerah(cariNegeri, 'cari-daerah', '#list-daerah');
    });

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    // LOAD DATA WHEN OPEN THIS PAGE
    fetchPermohonan();
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

    function fetchPermohonan(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/permohonan/baru/senarai",
            // data:{
            //     sil_program_id:sil_program_id_cari,
            //     sil_status:sil_status_cari
            // },
            dataType: "json",
            success: function (response) {
                // var sil-status="";

                $('tbody').html("");
                $.each(response.projek, function (key, item) {
                    // let amount = financial(item.sil_amount);
                    // let baki = financial(item.sil_balance);
                    // let Starikh = new Date(item.sil_sdate);
                    // let Etarikh = new Date(item.sil_edate);
                    // let status = "";
                    // let emel = "";

                    if(item.proj_status_complete == 1){
                        text = 'fa-close text-danger';
                    }
                    else {
                        text = 'fa-check text-navy';
                    }

                    if(item.proj_status == 1){
                        status = '<span class="badge badge-primary">Aktif</span>';
                    }
                    else {
                        status = '<span class="badge badge-warning">Batal</span>';
                    }

                    $('tbody').append('<tr>\
                        <td class="text-center"><i class="fa '+text+'"></i></td>\
                        <td>' + item.pro_kat_short_nama + '</td>\
                        <td>' + item.prog_name + '</td>\
                        <td>' + item.fas_name + '</td>\
                        <td class="text-right">' + item.proj_nama + '</td>\
                        <td class="text-right">' + financial(item.proj_kos_mohon) + '</td>\
                        <td>' + status + '</td>\
                        <td><a href="/permohonan/baru/papar/'+item.projek_id+'" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>\
                        <a href="/projek/ubah/'+item.projek_id+'" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a>\
                        <a href="/projek/padam/'+item.projek_id+'/delete" class="btn btn-default btn-xs" title="Padam"><i class="fa fa-close text-danger"></i></a></td>\
                    \</tr>');
                });
            }
        });
    }

    function financial(x) {
        return Number.parseFloat(x).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    //GET DAERAH DROPDOWN HTML AJAXCONTROLLER
   //GET DAERAH DROPDOWN HTML AJAXCONTROLLER
   function getDaerah(cariNegeri, inputname, list, select='99') {
        let url = "/ajax/ajax-daerah/" + cariNegeri + "/" + inputname + "/" + select;
        $.get(url, function(data) {
            $(list).html(data);
            $('#cari-daerah').change(function() {
                let cariDerah = $(this).val();
                // alert(cariDerah);
                getMukim(cariDerah, 'cari-bandar', '#list-mukim');
            });
        });
    }

    function getMukim(cariDaerah, inputname, list, select='99') {
        let url = '/ajax/ajax-mukim/' + cariDaerah + '/' + inputname+ '/' + select;
        $.get(url, function(data) {
            $(list).html(data);
        });
    }
});

</script>
@endsection
