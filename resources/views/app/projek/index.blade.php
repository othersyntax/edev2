@extends('layouts.main')
@section('title')
    Kemaskini Projek
@endsection
@section('custom-css')
    <link href="{{ asset("/template/css/plugins/footable/footable.core.css") }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Projek</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Projek</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Kemaskini</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">

    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-success">
                <h5>BELANJA</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins  text-right">@duit(275800)</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="ibox">
            <div class="ibox-title bg-info">
                <h5>PENJIMATAN</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins  text-right">@duit($jimat)</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-warning">
                <h5>JUMLAH BAKI</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins  text-right">@duit(106120)</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <span class="label label-success float-right">{{ date('Y') }}</span>
                <h5>JUMLAH DILULUSKAN</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right font-bold">@duit($jumlah)</h1>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Tapisan Projek</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                {{-- @php
                    if(auth()->user()->role==1){
                        $setProgram = auth()->user()->program_id;
                    }
                    else{
                        $setProgram = session('program');
                    }
                @endphp --}}
                <form action="/projek/senarai" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Pemilik</label>
                                {{ Form::select('program', dropdownProgram(), auth()->user()->program_id, ['class'=>'form-control', 'id'=>'program', 'disabled'=>'true']) }}
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
                                    {{ Form::select('daerah', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'daerah']) }}
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Fasiliti</label>
                                <span id="list-fasiliti">
                                    {{ Form::select('fasiliti', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'fasiliti']) }}
                                </span>
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
                                <label>Status</label>
                                {{ Form::select('status', [''=>'--Sila Pilih--', '1'=>'Aktif', '2'=>'Batal'], session('status'), ['class'=>'form-control', 'id'=>'status']) }}
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
                            <a href="/projek/senarai" class="btn btn-default">Set Semula</a>
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
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">#Bil</th>
                                <th width="10%">Kategori</th>
                                <th width="16%">Program</th>
                                <th width="16%">Fasiliti</th>
                                <th width="30%">Projek</th>
                                <th width="10%" class="text-right">Amaun (RM)</th>
                                <th width="5%">Status</th>
                                <th width="8%" class="text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($projek->count()>0)
                            @php
                                $bil = $projek->firstItem();
                            @endphp
                            @foreach ($projek as $proj)
                            <tr>
                                <td class="text-center">{{ $bil++ }} </td>
                                <td>{{ $proj->pro_kat_short_nama }}</td>
                                <td>{{ $proj->prog_name }}</td>
                                <td>{{ $proj->fas_name }}</td>
                                <td>{{ $proj->proj_nama }}</td>
                                <td class="text-right">
                                     @duit($proj->proj_kos_lulus)<br>
                                    <span class="text-navy">@duit($proj->proj_kos_sebenar)</span>
                                </td>
                                <td><span class="label {{ $proj->proj_status == 1 ? 'label-primary' : 'label-warning'}}">{{ getStatus($proj->proj_status) }}</span></td>
                                <td class="text-center">
                                    <a href="/projek/papar/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                                    <a href="/projek/ubah/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a>
                                    {{-- <a href="/projek/padam/{{ $proj->projek_id }}/delete" class="btn btn-default btn-xs" title="Padam"><i class="fa fa-close text-danger"></i></a> --}}
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center"><i>Tiada Rekod</i></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="text-center">{{ $projek->links() }}</div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('custom-js')
<!-- FooTable -->
<script src="{{ asset("/template/js/plugins/footable/footable.all.min.js") }}"></script>
<script>

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
                });
            });
        });
    }
    // $(document).ready(function() {
    //     $('.footable').footable();
    // });
</script>
@endsection
