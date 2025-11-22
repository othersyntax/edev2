@extends('layouts.main')
@section('title')
    Permohonan Projek
@endsection
@section('custom-css')
<style>
    .circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #e0e0e0;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        font-weight: bold;
        color: #777;
    }
    .circle.active {
        background-color: #28a745;
        color: #fff;
    }
    .progress-line {
        height: 4px;
        background-color: #e0e0e0;
        flex-grow: 1;
        margin: 0 10px;
        align-self: center;
    }
    .progress-line.active {
        background-color: #28a745;
    }
</style>
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
                <strong>Papar</strong>
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
                <h5>Papar Permohonan</h5>
            </div>
            <div class="ibox-content">
                {{-- 🧭 STATUS TIMELINE / PROGRESS BAR --}}
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center position-relative mb-2">
                        <div class="text-center flex-fill position-relative">
                            <div class="circle {{ $permohonan->status == 'Baru' || $permohonan->status == 'Disahkan' || $permohonan->status == 'Diperaku' ? 'active' : '' }}">
                                1
                            </div>
                            <small class="d-block mt-2 fw-bold">Baru</small>
                        </div>
                        <div class="progress-line {{ in_array($permohonan->status, ['Disahkan','Diperaku']) ? 'active' : '' }}"></div>
                        <div class="text-center flex-fill position-relative">
                            <div class="circle {{ $permohonan->status == 'Disahkan' || $permohonan->status == 'Diperaku' ? 'active' : '' }}">
                                2
                            </div>
                            <small class="d-block mt-2 fw-bold">Disahkan</small>
                        </div>
                        <div class="progress-line {{ $permohonan->status == 'Diperaku' ? 'active' : '' }}"></div>
                        <div class="text-center flex-fill position-relative">
                            <div class="circle {{ $permohonan->status == 'Diperaku' ? 'active' : '' }}">
                                3
                            </div>
                            <small class="d-block mt-2 fw-bold">Diperaku</small>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <p><strong>Nama Projek:</strong><br>{{ $permohonan->proj_nama }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Program:</strong><br>{{ $permohonan->siling->program_nama ?? '-' }}</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <p><strong>Amaun Mohon:</strong><br>RM{{ number_format($permohonan->proj_amaun,2) }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Status Semasa:</strong><br>
                            @if($permohonan->status == 'Baru')
                                <span class="badge bg-warning text-dark">Baru</span>
                            @elseif($permohonan->status == 'Disahkan')
                                <span class="badge bg-info text-dark">Disahkan</span>
                            @elseif($permohonan->status == 'Diperaku')
                                <span class="badge bg-success">Diperaku</span>
                            @endif
                        </p>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Dihantar oleh (Penyedia):</strong><br>{{ $permohonan->penyedia->name ?? '-' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Disahkan oleh (Pengesah):</strong><br>{{ $permohonan->pengesah->name ?? '-' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Diperaku oleh (Peraku):</strong><br>{{ $permohonan->peraku->name ?? '-' }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Tarikh Dicipta:</strong><br>{{ $permohonan->proj_created_at }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Tarikh Kemaskini:</strong><br>{{ $permohonan->proj_updated_at }}</p>
                    </div>
                </div>
                <div class="mt-4 text-end">
                    <a href="{{ route('projekmohon.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali ke Senarai
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
