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
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>
                        Roles
                        @can('create role')
                        <a href="{{ url('roles/create') }}" class="btn btn-primary float-end">Add Role</a>
                        @endcan
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th width="40%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-warning">
                                        Add / Edit Role Permission
                                    </a>

                                    @can('update role')
                                    <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-success">
                                        Edit
                                    </a>
                                    @endcan

                                    @can('delete role')
                                    <a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger mx-2">
                                        Delete
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
    </div>
</div>
@endsection