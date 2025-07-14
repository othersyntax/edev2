@extends('layouts.main')
@section('title')
    Kemaskini Projek
@endsection
@section('custom-css')
    <link href="{{ asset('/template/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('/template/css/plugins/footable/footable.core.css') }}" rel="stylesheet"> --}}
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
                <h5>TANGGUNGAN</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins  text-right">@duit($tangungan)</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-warning">
                <h5>KOS SEBENAR</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins  text-right">@duit($sebenar)</h1>
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
                <form id="filterForm" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Pemilik</label>
                                @hasanyrole('super-admin|admin|pembaca')
                                    {{ Form::select('program', dropdownProgram(), session('program'), ['class'=>'form-control', 'id'=>'program']) }}
                                @else
                                    {{ Form::select('program', dropdownProgram(), auth()->user()->program_id, ['class'=>'form-control', 'id'=>'program', 'readonly'=>'true']) }}
                                @endhasanyrole

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
                                {{ Form::select('subsetia', [''=>'--Sila Pilih--','1001'=>'1001', '4001'=>'4001', '4003'=>'4003', '5003'=>'5003'], session('subsetia'), ['class'=>'form-control', 'id'=>'subsetia']) }}
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
                            <!-- Export to Excel -->

                            {{-- <button type="button" onclick="submitForm('/post')">Export to Excel</button>
                            <button type="button" onclick="submitForm('{{ route('projek.senarai') }}')">Export to PDF</button> --}}
                            <a href="/projek/senarai" class="btn btn-xs btn-outline btn-primary dim"><i class="fa fa-refresh"></i> Set Semula</a>
                            {{-- <button type="submit" formaction="{{ route('projek.export') }}" class="btn btn-xs btn-primary">
                                Export to Excel
                            </button> --}}
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn  btn-xs btn-primary dropdown-toggle">Eksport</button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" type="submit" formaction="{{ route('projek.cetak') }}">Cetak</button></li>
                                    <li><button class="dropdown-item" type="submit" formaction="{{ route('projek.export') }}">Eksport</button></li>
                                </ul>
                            </div>

                            <!-- Export to PDF -->
                            <button type="submit" formaction="{{ route('projek.senarai') }}" class="btn btn-xs btn-primary float-right">
                                Carian
                            </button>
                            {{-- <input type="button" onclick="submitForm({{ route('projek.export') }})" class="btn btn-xs btn-outline btn-success dim"><i class="fa fa-paste"></i> Eksport</input> --}}
                            {{-- <input type="button" onclick="submitForm({{ route('projek.senarai') }})" class="btn btn-primary float-right" value="Carian"> --}}
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
                    <table class="table table-striped" data-page-size="30">
                        <thead>
                            <tr>
                                <th class="text-center">Bil.</th>
                                <th>Kategori</th>
                                <th>Tahun</th>
                                <th class="text-center">Subsetia</th>
                                <th>Pelaksana</th>
                                <th>Pemilik</th>
                                <th>Fasiliti</th>
                                <th>Projek</th>
                                <th class="text-right">Amaun</th>
                                <th>Status</th>
                                <th class="text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = $projek->firstItem();
                        @endphp
                        @if ($projek->count()>0)
                            @foreach ($projek as $proj)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $proj->pro_kat_short_nama }}<br>({{ $proj->proj_prog_nama }})</td>
                                <td>{{ $proj->proj_tahun }}</td>
                                <td class="text-center">{{ $proj->proj_kod_subsetia }}</td>
                                <td>{{ getPelaksana($proj->proj_pelaksana) }}</td>
                                <td>{{ $proj->prog_name }}</td>
                                <td>{{ $proj->fas_name }}</td>
                                <td>
                                    {!! $proj->proj_nama !!}
                                    @if ($proj->projt_projek_id)
                                        <br>
                                        <small class="text-success"> <a href="#" id="btnPapar" data-id="{{$proj->projek_id}}">Projek Telah Diselenggara</a></small>
                                    @endif
                                </td>
                                <td class="text-right">
                                     @duit($proj->proj_kos_lulus)<br>
                                     @if ($proj->proj_kos_sebenar > $proj->proj_kos_lulus)
                                         <span class="text-danger">@duit($proj->proj_kos_sebenar)</span>
                                     @else
                                         <span class="text-navy">@duit($proj->proj_kos_sebenar)</span>
                                     @endif

                                </td>
                                <td>
                                    @php
                                        if($proj->proj_status==1 || $proj->proj_status==2){
                                            $label = 'label-primary';
                                            $stt = 1;
                                        }
                                        // else if($proj->proj_status==2){
                                        //     $label = 'label-success';
                                        // }
                                        else if($proj->proj_status==3){
                                            $label = 'label-danger';
                                            $stt = $proj->proj_status;
                                        }
                                        else{
                                            $label = 'label-danger';
                                            $stt = $proj->proj_status;
                                        }
                                    @endphp
                                    <span class="label {{ $label }}">{{ getStatus($stt) }}</span>
                                </td>
                                <td class="text-center">
                                    @if ($proj->proj_status<>1)
                                        @hasanyrole('super-admin|admin')
                                            <a href="/projek/papar/{{ Crypt::encryptString($proj->projek_id) }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-mute"></i></a>
                                        @else
                                            <a href="/projek/papar/{{ Crypt::encryptString($proj->projek_id) }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                                        @endif
                                    @else
                                        <a href="/projek/papar/{{ Crypt::encryptString($proj->projek_id) }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                                        {{-- <a href="/projek/ubah/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a> --}}
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
                    </table>
                    <div class="text-center">{{ $projek->links() }}</div>
                </div>

            </div>
        </div>
    </div>

</div>
@include('app/projek/_modal/papar_selenggara')
@endsection
@section('custom-js')
<script src="{{ asset('/template/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('/template/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
<!-- FooTable -->
{{-- <script src="{{ asset('/template/js/plugins/footable/footable.all.min.js') }}"></script> --}}
<script>
     $('#btnPapar').click(function(e){
        e.preventDefault();
        var proj_id = $(this).data('id');
        $('#ModalPaparSelenggara').modal('show');
        $.ajax({
            type: "GET",
            url: "/projek/papar/selenggara/" + proj_id,
            success: function (response) {
                if (response.status == 404){
                    $('#myModal').modal('hide');
                    swal({
                        title: "Maklumat Selenggara",
                        text: response.message,
                        type: "danger"
                    });
                } else {
                    if(response.selenggara.projt_nama != '' || response.selenggara.projt_nama != null){
                        $('#projNama').show();
                        $('#dataNama').html(response.selenggara.projt_nama);
                    }
                    if(response.selenggara.projt_skop != '' || response.selenggara.projt_skop != null){
                        $('#projSkop').show();
                        $('#dataSkop').html(response.selenggara.projt_skop);
                    }
                    if(response.selenggara.projt_justifikasi != '' || response.selenggara.projt_justifikasi != null){
                        $('#projJustifkasi').show();
                        $('#dataJustifikasi').html(response.selenggara.projt_nama);
                    }
                    // $('#no_rujukan').val(response.utiliti.projuti_ref_no);
                    // $('#perihal').val(response.utiliti.projuti_perihal);
                    // $('#tarikh').val(tarikh1.toLocaleDateString());
                    // $('#catatan').val(response.utiliti.projuti_catatan);
                }
            }
        });
    });

    $(document).ready(function(){
        $('.dataTables-projek').DataTable({
            pageLength: 15,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                // { extend: 'copy'},
                // {extend: 'csv'},
                {extend: 'excel', title: 'SenaraiProjek'},
                {extend: 'pdf', title: 'SenaraiProjek'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    }
                }
            ]

        });


    });
    // $('.footable').footable();
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

        function submitForm(action) {
            alert('AA');
            // const form = document.getElementById('filterForm');
            // form.action = action;
            // form.submit();
        }
    }


    // $(document).ready(function() {
    //     $('.footable').footable();
    // });
</script>
@endsection
