@extends('layouts.main')
@section('title')
    Maklumat Peruntukan
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
        <h2>Senarai Peruntukan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Peruntukan</strong>
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
                <h5>Senarai Program </h5>
                <div class="ibox-tools">
                    <a href="{{ route('peruntukan.create') }}" class="btn btn-primary float-right">+ Tambah Peruntukan</a>
                </div>
            </div>
            <div class="ibox-content">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Butiran</th>
                                <th>Kod</th>
                                <th>Keterangan</th>
                                <th>Inisiatif</th>
                                <th>Tahun</th>
                                <th class="text-right">Amaun (RM)</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $jum = 0;
                            @endphp
                            @foreach($peruntukans as $p)
                                <tr>
                                    <td>{{ $p->peruntukan_id }}</td>
                                    <td>{{ $p->butiran->kod_full ?? '-' }}</td>
                                    <td>{{ $p->kod_full }}</td>
                                    <td>{{ $p->keterangan }}</td>
                                    <td>{{ $p->inisiatif }}</td>
                                    <td>{{ $p->tahun }}</td>
                                    <td class="text-right">@duit($p->amaun)</td>
                                    <td>
                                        <a href="{{ route('peruntukan.edit', $p->peruntukan_id) }}" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a>
                                        <form action="{{ route('peruntukan.destroy', $p->peruntukan_id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-default btn-xs" onclick="return confirm('Padam rekod ini?')" title="Padam"><i class="fa fa-close text-danger"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $jum += $p->amaun;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6" class="text-right">Jumlah</th>
                                <th class="text-right">@duit($jum)</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
