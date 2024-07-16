@extends('layouts.main')
@section('title')
    Permohonan
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Permohonan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Permohonan</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Utama</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Tapisan Permohonan</h5>
            </div>
            <div class="ibox-content">
                <form action="/permohonan/senarai" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Jabatan Kesihatan</label>
                                {{ Form::select('negeri', dropdownNegeri2(), session('negeri'), ['class'=>'form-control', 'id'=>'negeri']) }}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Program</label>
                                <span id="list-daerah">
                                    {{ Form::select('fasiliti', dropdownFasiliti(), session('fasiliti'), ['class'=>'form-control', 'id'=>'fasiliti']) }}
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Institusi</label>
                                <span id="list-daerah">
                                    {{ Form::text('program', session('program'), ['class'=>'form-control', 'id'=>'program']) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <a href="/permohonan/senarai" class="btn btn-default">Set Semula</a>
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
                <h5>Senarai Permohonan</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
                                <th width="10%" class="text-center">#ID</th>
                                <th width="55%">Permohonan</th>
                                <th width="15%">Program</th>
                                <th data-hide="all">Sub-Projek Kod</th>
                                <th data-hide="all">Negeri</th>
                                <th data-hide="all">Bulan</th>
                                <th data-hide="all">Tahun</th>
                                <th width="10%">Status</th>
                                <th width="10%" class="text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permohonan as $perm)
                            <tr>
                                <td data-toggle="true">{{ $perm->projek_id }}</td>
                                <td>{{ $perm->proj_nama }}</td>
                                <td>{{ $perm->proj_program }}</td>
                                <td>{{ $perm->proj_kod_projek }}-{{ $proj->proj_kod_group }}</td>
                                <td>{{ $perm->proj_negeri }}</td>
                                <td>{{ $perm->proj_bulan }}</td>
                                <td>{{ $perm->proj_tahun }}</td>
                                <td>{{ getStatus($perm->proj_status) }}</td>
                                <td class="text-center">
                                    <a href="/permohonan/papar/{{ $perm->projek_id }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                                    <a href="/permohonan/ubah/{{ $perm->projek_id }}" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a>
                                    <a href="/permohonan/padam/{{ $perm->projek_id }}/delete" class="btn btn-default btn-xs" title="Padam"><i class="fa fa-close text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $permohonan->links() }}
            </div>
        </div>
    </div>

</div>

<div class="content-wrapper">

</div>
@endsection

@section('custom-js')
<!-- FooTable -->
<script src="{{ asset("/template/js/plugins/footable/footable.all.min.js") }}"></script>
<script>
    $(document).ready(function() {
        $('.footable').footable();
        $('.footable2').footable();
    });
</script>
@endsection
