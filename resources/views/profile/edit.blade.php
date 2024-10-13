@extends('layouts.main')
@section('title')
    Profil
@endsection
@yield('custom-css')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>{{ __('Profil') }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/profile">Profil</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Pengguna</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Maklumat Peribadi</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" src="{{ asset('/template/img/unknown.jpeg') }}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>{{ auth()->user()->name }}</strong></h4>
                        <p> {{ getRole(auth()->user()->role) }}</p>
                        <h5>
                            Maklumat Program / JKN / Bahagian / Institusi
                        </h5>
                        <p>
                            {{ getProgram(auth()->user()->program_id) }}
                        </p>
                        <div class="row m-t-2">
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $rolename)
                                    <div class="col-md-4">
                                        <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <div class="col-md-8">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Maklumat Profil</h5>
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
                    <div>
                        <div class="feed-activity-list">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Kemaskini Katalaluan</h5>
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
                    <div class="feed-activity-list">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@yield('custom-js')
