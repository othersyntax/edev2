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
        <h5>Carian Pengguna</h5>
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
        <form action="/akses/pengguna" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Program / Bahagian / JKN / Institusi</label>
                        {{ Form::select('program', dropdownProgram(), session('program'), ['class'=>'form-control', 'id'=>'program']) }}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Role</label>
                        {{ Form::select('role', [''=>'--Sila Pilih--', '1'=>'Pengguna', '2'=>'Pentadbir', '3'=>'Super Admin'], session('role'), ['class'=>'form-control', 'id'=>'role']) }}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Status</label>
                        {{ Form::select('statusUser', [''=>'--Sila Pilih--', '1'=>'Aktif', '2'=>'Tidak Aktif'], session('statusUser'), ['class'=>'form-control', 'id'=>'statusUser']) }}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nama</label>
                        {{ Form::text('nama', session('nama'), ['class'=>'form-control', 'id'=>'v']) }}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                    <a href="/akses/users" class="btn btn-default">Set Semula</a>
                    <input type="submit" class="btn btn-primary float-right" id="carian" value="Carian">
                </div>
            </div>
        </form>
    </div>
</div>
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
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="table-responsive">
                <table class="footable table table-stripped toggle-arrow-tiny">
                    <thead>
                        <tr>
                            <th width="8%">Role</th>
                            <th width="25%">Nama</th>
                            <th width="15%">E-mel</th>
                            <th width="20%">Program / Bahagian / JKN / Institusi</th>
                            <th width="10%">Status</th>
                            <th width="12%">Peranan</th>
                            <th width="10%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            @php
                                $badge = 'success';
                                if($user->role==1)
                                    $badge = 'success';
                                else if($user->role==2)
                                    $badge = 'primary';
                                else
                                    $badge = 'warning';
                            @endphp

                            <tr>
                                <td><span class="badge badge-{{ $badge }}">{{ getRole($user->role) }}</span></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->userProgram->prog_name }}</td>
                                <td>{{ $user->user_status ==1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $rolename)
                                            <label class="badge bg-primary mx-1">{{ ucfirst($rolename) }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @can('update user')
                                    <a href="{{ url('/akses/users/'.$user->id.'/edit') }}" class="btn btn-default btn-xs" title="Ubah"><i class="fa fa-pencil text-info"></i></a>
                                    @endcan

                                    @can('delete user')
                                    <a href="{{ url('/akses/users/'.$user->id.'/delete') }}" class="btn btn-default btn-xs" title="Padam"><i class="fa fa-close text-danger"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center font-italic"><span>Tiada Rekod</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center">{{ $users->links() }}</div>
        </div>
    </div>
</div>
@endsection
