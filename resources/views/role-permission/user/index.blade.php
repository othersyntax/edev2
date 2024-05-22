@extends('layouts.main')
@section('title')
    Pengguna
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Pengguna</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Pengguna</strong>
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
                <a href="/akses/users/create" class="btn btn-primary float-end">Tambah</a>
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
                        <th class="text-center">#ID</th>
                        <th>Nama</th>
                        <th>E-mel</th>
                        <th>Peranan</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $rolename)
                                    <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @can('update user')
                            <a href="{{ url('/akses/users/'.$user->id.'/edit') }}" class="btn btn-xs btn-success">Ubah</a>
                            @endcan

                            @can('delete user')
                            <a href="{{ url('/akses/users/'.$user->id.'/delete') }}" class="btn btn-xs btn-danger mx-2">Padam</a>
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