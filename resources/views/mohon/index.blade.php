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
                <a href="#">Permohonan</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Senarai</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
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
    <div class="col-md-3 col-6 mb-2">
            <div class="card shadow-sm border-start border-warning border-3">
                <div class="card-body py-2">
                    <h5 class="fw-bold text-warning mb-0">{{ $summary['baru'] }}</h5>
                    <small class="text-muted">Baru</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-2">
            <div class="card shadow-sm border-start border-info border-3">
                <div class="card-body py-2">
                    <h5 class="fw-bold text-info mb-0">{{ $summary['disahkan'] }}</h5>
                    <small class="text-muted">Disahkan</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-2">
            <div class="card shadow-sm border-start border-success border-3">
                <div class="card-body py-2">
                    <h5 class="fw-bold text-success mb-0">{{ $summary['diperaku'] }}</h5>
                    <small class="text-muted">Diperaku</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-2">
            <div class="card shadow-sm border-start border-secondary border-3">
                <div class="card-body py-2">
                    <h5 class="fw-bold text-dark mb-0">{{ $summary['jumlah'] }}</h5>
                    <small class="text-muted">Jumlah Semua</small>
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
                <form method="GET" action="{{ route('projekmohon.index') }}">
                    @csrf
                    @include('_include.carian-form')
                    <button type="submit" class="btn btn-primary mt-3">Cari</button>
                    <a href="{{ route('siling.index') }}" class="btn btn-white mt-3">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Senarai Permohonan</h5>
                <div class="ibox-tools">
                    @if(cekSiling(auth()->user()->program_id))
                        @hasanyrole(['penyedia'])
                            <a href="{{ route('projekmohon.create') }}" class="btn btn-primary text-end">+ Permohonan Baharu</a>
                        @endhasanyrole
                    @endif
                </div>
            </div>

            <div class="ibox-content">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
				                <th width="6%">Susunan</th>
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
                            @forelse($permohonan as $index => $mohon)
                                <tr>
                                    <td>{{ $mohon->proj_sort }}</td></td>
                                    <td>{{ $mohon->kategori->pro_kat_short_nama }}</td>
                                    <td>{{ $mohon->pemilik->prog_name ?? '-' }}</td>
                                    <td>{{ $mohon->fasiliti->fas_name ?? '-' }}</td>
                                    <td>{{ $mohon->proj_nama }}</td>
                                    <td class="text-right">@duit($mohon->proj_amaun)</td>

                                    <td>
                                        @if($mohon->proj_status == 1)
                                            <span class="badge bg-warning text-dark">{{ $mohon->statusMohon->status }}</span>
                                        @elseif($mohon->status == 2)
                                            <span class="badge bg-info text-dark">{{ $mohon->statusMohon->status }}</span>
                                        @elseif($mohon->status == 3)
                                            <span class="badge bg-success">{{ $mohon->statusMohon->status }}</span>
                                        @elseif($mohon->status == 4)
                                            <span class="badge bg-success">{{ $mohon->statusMohon->status }}</span>
                                        @elseif($mohon->status == 5)
                                            <span class="badge bg-success">{{ $mohon->statusMohon->status }}</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak {{ $mohon->statusMohon->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Penyedia --}}
                                        @hasanyrole(['penyedia'])
                                            <a href="{{ route('projekmohon.show', $mohon->projek_id) }}"
                                            class="btn btn-sm btn-outline-info">Lihat</a>
                                        @endhasanyrole

                                        {{-- Pengesah --}}
                                        @hasanyrole(['pengesah'])
                                        @if($mohon->proj_status == 1)
                                            <form action="{{ route('projekmohon.submit', $mohon->projek_id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    Sahkan
                                                </button>
                                            </form>
                                        @endif
                                        @endhasanyrole
                                        {{-- Peraku --}}
                                        @hasanyrole(['peraku'])
                                        @if($mohon->proj_status == 2)
                                            <form action="{{ route('projekmohon.submit', $mohon->projek_id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    Peraku
                                                </button>
                                            </form>
                                        @endif
                                        @endhasanyrole
                                        {{-- Pentadbir Projek --}}
                                        @hasanyrole(['peraku'])
                                        @if($mohon->proj_status == 3)
                                            <a href="{{ route('projekmohon.show', $mohon->projek_id) }}"
                                            class="btn btn-sm btn-outline-secondary">Lihat</a>
                                        @endif
                                        @endhasanyrole
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="font-italic text-small text-center">
                                            Tiada rekod ditemui.
                                        </td>
                                    </tr>
                                @endforelse
                        </tbody>
                    </table>
                    {{-- Pagination --}}
                    @if ($permohonan->hasPages())
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div class="mb-2 mb-md-0">
                                    <small>
                                        Menunjukkan {{ $permohonan->firstItem() }} - {{ $permohonan->lastItem() }}
                                        daripada {{ $permohonan->total() }} rekod
                                    </small>
                                </div>
                                <div>
                                    {{ $permohonan->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
