@extends('layouts.main')
@section('title')
    Peranan
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Tambah Capaian Peranan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Had Capaian Peranan</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="ibox ">
            <div class="ibox-title">
                <h4>Tambah Had Capaian bagi Peranan : {{ $role->name }}</h4>
                <div class="ibox-tools">
                    <a href="{{ url('/akses/roles') }}" class="btn btn-danger float-end">Kembali</a>
                </div>
            </div>
            <div class="ibox-content">
                <form action="{{ url('/akses/roles/'.$role->id.'/give-permissions') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                @error('permission')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <label for="">Had Capaian</label>
                                @foreach ($permissions as $modul=>$permission)
                                <div class="row">
                                    <div class="col-12">
                                    <h4 class="text-uppercase">{{ getModul($modul) }}</h4>
                                    </div>
                                    @foreach ($permission as $item)
                                    <div class="col-md-3">
                                        <label>
                                            <input
                                                type="checkbox"
                                                name="permission[]"
                                                value="{{ $item->name }}"
                                                {{ in_array($item->id, $rolePermissions) ? 'checked':'' }}
                                            />
                                            {{ ucfirst($item->name) }}
                                        </label>
                                    </div>
                                    @endforeach
                                    <div class="col-12"><hr></div>
                                </div>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Kemaskini</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
