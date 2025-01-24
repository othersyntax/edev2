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
@php
    $silingLain = 17000000 - 0;
@endphp
<div class="row">
    <div class="col-sm-4">
        <div class="ibox ">
            <div class="ibox-title bg-info">
                <h5>Siling Program / Bahagian (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b>@duit($silingLain)</b></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox ">
            <div class="ibox-title bg-info">
                <h5>Siling JKN (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b>@duit($siling)</b></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox ">
            <div class="ibox-title bg-warning">
                <h5>Permohonan (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b>@duit($jumlah)</b></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="ibox ">
            <div class="ibox-content">
                <h2 class="no-margins text-right"><b>{{$bilBaharu}}</b></h2>
                <small>Bil. Projek Baharu</small>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="ibox ">
            <div class="ibox-content">
                <h2 class="no-margins text-right"><b>{{$bilRevote}}</b></h2>
                <small>Projek Revote / Sambungan</small>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox ">
            <div class="ibox-content">
                <h2 class="no-margins text-right"><b>@duit($jumBaharu)</b></h2>
                <small>Jum. Projek Baharu</small>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox ">
            <div class="ibox-content">
                <h2 class="no-margins text-right"><b>@duit($jumRevote)</b></h2>
                <small>Jum. Projek Revote / Sambungan</small>
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
                <form action="/permohonan/semak/senarai" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                {{ Form::select('kategori',[''=>'--Sila pilih--', 'Bahagian'=>'Bahagian', 'Institusi'=>'Institusi', 'JKN'=>'JKN'], session('kategori'), ['class'=>'form-control', 'id'=>'kategori']) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status</label>
                                {{ Form::select('status',[''=>'--Sila pilih--', '1'=>'Selesai', '2'=>'Belum Selesai'], session('status'), ['class'=>'form-control', 'id'=>'status']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <a href="/permohonan/semak/senarai" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-refresh"></i> Set Semula</a>
                                    <a href="/permohonan/kelulusan/senarai" class="btn btn-xs btn-outline btn-info"><i class="fa fa-pencil"></i> Angkat Kelulusan</a>
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
                <h5>Status Permohonan</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-stripped toggle-arrow-tiny" >
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">Bil</th>
                                <th width="5%" class="text-center">Selesai</th>
                                <th width="25%">Pemilik</th>
                                <th width="10%" class="text-right">Siling</th>
                                <th width="10%" class="text-right">Revote (RM)</th>
                                <th width="10%" class="text-right">Sambungan (RM)</th>
                                <th width="10%" class="text-right">Baharu (RM)</th>
                                <th width="10%" class="text-right">Jumlah (RM)</th>
                                <th width="15%" class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pemilik->count()>0)
                            @php
                                $bil = 1;
                            @endphp

                                @foreach ($pemilik as $pem)
                                    @php
                                        $revote = $pem->Revote + $pem->Sambungan;
                                        $baharu = $pem->Jumlah - $revote;
                                        if($pem->Flag>0){
                                            $text='<i class="fa fa-close text-danger">';
                                        }
                                        else{
                                            $text='<i class="fa fa-check text-navy">';
                                        }
                                    @endphp

                                    <tr>
                                        <td class="text-center">{{ $bil++ }}</td>
                                        <td class="text-center">{!! $text !!}</td>
                                        <td>{{ $pem->NamaPemilik }}</td>
                                        <td class="text-right">@duit(getSiling($pem->Pemilik))</td>
                                        <td class="text-right">@duit($pem->Revote)</td>
                                        <td class="text-right">@duit($pem->Sambungan)</td>
                                        <td class="text-right">@duit($baharu)</td>
                                        <td class="text-right">@duit($pem->Jumlah)</td>
                                        <td class="text-center">
                                            <span class="badge badge-primary">{{ $pem->Bilangan }}</span>
                                            <a href="/permohonan/semak/main/{{ $pem->Pemilik }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-success"></i></a>
                                            <button type="button" value="{{ $pem->Pemilik }}" class="btn btn-default btn-xs emelnotifikasi" title="Emel"><i class="fa fa-envelope text-warning"></i></button>
                                            @if ($pem->Flag==0)
                                            <a href="/permohonan/kelulusan/pdf/{{ $pem->Pemilik }}" target="_blank" class="btn btn-xs btn-outline btn-success dim"><i class="fa fa-print"></i> Cetak</a>
                                            @else
                                            <a href="#" class="btn btn-xs btn-outline btn-muted dim"><i class="fa fa-print"></i> Cetak</a>
                                            @endif

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
