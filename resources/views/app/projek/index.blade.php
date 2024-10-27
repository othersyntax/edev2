@extends('layouts.main')
@section('title')
    Kemaskini Projek
@endsection
@section('custom-css')
    <link href="{{ asset('/template/css/plugins/footable/footable.core.css') }}" rel="stylesheet">
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
                <h5>TANGUNGAN</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins  text-right">@duit($tangungan)</h1>
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
                <h5>JUMLAH DILULUSKAN</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins  text-right">@duit($lulus)</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <span class="label label-success float-right">{{ date('Y') }}</span>
                <h5>JUMLAH DIAGIHKAN</h5>
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
                                    {{ Form::select('daerah', [''=>'--Sila pilih--'], session('daerah'), ['class'=>'form-control', 'id'=>'daerah']) }}
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
                                <label>Subsetia</label>
                                {{ Form::select('subsetia', [''=>'--Sila Pilih--','1001'=>'1001', '4001'=>'4001', '4003'=>'4003',], session('subsetia'), ['class'=>'form-control', 'id'=>'subsetia']) }}
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
                                <label>Program</label>
                                {{ Form::select('projekProgram', dropdownProjekProgram(), session('projekProgram'), ['class'=>'form-control', 'id'=>'projekProgram']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Pelaksana</label>
                                {{ Form::select('pelaksana', ['0'=>'--Sila Pilih--','1'=>'Pemilik', '2'=>'BPKj' , '3'=>'JKR'], session('pelaksana'), ['class'=>'form-control', 'id'=>'proj_pelaksana']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Status</label>
                                {{ Form::select('status', [''=>'--Sila Pilih--', '1'=>'Aktif', '2'=>'Tukar Tajuk', '3'=>'Dibatalkan', '4'=>'Tarik Balik'], session('status'), ['class'=>'form-control', 'id'=>'status']) }}
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
                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center" data-toggle="true">Bil.</th>
                                <th data-hide="all">Projek ID</th>
                                <th data-hide="all">Kategori</th>
                                <th data-hide="all">Program</th>
                                <th data-hide="all">Tahun</th>
                                <th data-hide="all">Tarikh Mula</th>
                                <th data-hide="all">Tarikh Tamat</th>
                                <th data-hide="all">Pelaksana</th>
                                <th width="18%">Pemilik</th>
                                <th width="13%">Fasiliti</th>
                                <th width="32%">Projek</th>
                                <th width="7%" class="text-center">Subsetia</th>
                                <th width="10%" class="text-right">Amaun (RM)</th>
                                <th width="7%">Status</th>
                                <th width="8%" class="text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @if ($projek->count()>0)
                            @foreach ($projek as $proj)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $proj->projek_id }}</td>
                                <td>{{ $proj->pro_kat_short_nama }}</td>
                                <td>{{ $proj->proj_prog_nama }}</td>
                                <td>{{ $proj->proj_tahun }}</td>
                                <td>{{ date('d/m/Y', strtotime($proj->proj_laksana_mula)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($proj->proj_laksana_tamat)) }}</td>
                                <td>{{ getPelaksana($proj->proj_pelaksana) }}</td>
                                <td>{{ $proj->prog_name }}</td>
                                <td>{{ $proj->fas_name }}</td>
                                <td>{{ $proj->proj_nama }}</td>
                                <td class="text-center">{{ $proj->proj_kod_subsetia }}</td>
                                <td class="text-right">
                                     @duit($proj->proj_kos_lulus)<br>
                                    <span class="text-navy">@duit($proj->proj_kos_sebenar)</span>
                                </td>
                                <td>
                                    @php
                                        if($proj->proj_status==1){
                                            $label = 'label-primary';
                                        }
                                        else if($proj->proj_status==2){
                                            $label = 'label-success';
                                        }
                                        else if($proj->proj_status==3){
                                            $label = 'label-warning';
                                        }
                                        else{
                                            $label = 'label-danger';
                                        }
                                    @endphp
                                    <span class="label {{ $label }}">{{ getStatus($proj->proj_status) }}</span>
                                </td>
                                <td class="text-center">
                                    @if ($proj->proj_status<>1)
                                        @if (auth()->user()->role <>1)
                                            <a href="/projek/papar/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                                            <a href="/projek/ubah/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a>
                                        @else
                                        <a href="/projek/papar/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-mute"></i></a>
                                        @endif
                                    @else
                                        <a href="/projek/papar/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                                        <a href="/projek/ubah/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a>
                                    @endif

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
                        <tfoot>
                            <tr>
                                <td colspan="14">
                                    <ul class="pagination float-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                    </table>
                    {{-- <div class="text-center">{{ $projek->links() }}</div> --}}
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
@section('custom-js')
<!-- FooTable -->
<script src="{{ asset('/template/js/plugins/footable/footable.all.min.js') }}"></script>
<script>
    $('.footable').footable();
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
