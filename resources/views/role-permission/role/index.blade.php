@extends('layouts.main')
@section('title')
    Peranan
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Peranan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Peranan</strong>
            </li>
        </ol>
    </div>
</div>    
@endsection

@section('content')
<div class="ibox ">
    <div class="ibox-title">
        <h4>Pengguna
        <div class="ibox-tools">
            @can('create permission')
                <a href="/akses/roles/create" class="btn btn-primary float-end">Tambah</a>
            @endcan
        </div>
           
        </h4>
    </div>
    <div class="ibox-content">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif  
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="10%" class="text-center">#ID</th>
                        <th width="50%">Peranan</th>
                        <th width="40%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td class="text-center">{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ url('/akses/roles/'.$role->id.'/give-permissions') }}" class="btn btn-xs btn-warning">
                                Tamah / Kemaskini Role Permission
                            </a>

                            @can('update role')
                            <a href="{{ url('/akses/roles/'.$role->id.'/edit') }}" class="btn btn-xs btn-success">
                                Ubah
                            </a>
                            @endcan

                            @can('delete role')
                            <a href="{{ url('/akses/roles/'.$role->id.'/delete') }}" class="btn btn-xs btn-danger">
                                Padam
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection