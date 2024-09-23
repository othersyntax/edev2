@extends('layouts.main')
@section('title')
    Pengguna
@endsection
@yield('custom-css')
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

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5><b>Untuk makluman dan perhatian :</b> <small>Pengguna akan menerima e-mel pemakluman setelah ID berjaya didaftarkan.</small></h5><br>
                <h5><small>Mohon baca arahan dalam e-mel dengan teliti.</small></h5><br><br>
                <h5><b>Sila tandakan " ✓ " pada yang berkaitan</b></h5>
            </div>
            <div class="ibox-content">
                <form role="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-4"><label> 
                                <input type="checkbox" value="option1" id="inlineCheckbox1"> Permohonan Baharu</label> <label class="checkbox-inline">
                            </div>
                            <div class="col-sm-4"><label> 
                                <input type="checkbox" value="option2" id="inlineCheckbox2"> Pengemaskinian ID </label> <label>
                            </div>
                            <div class="col-sm-4"><label> 
                                <input type="checkbox" value="option3" id="inlineCheckbox3"> Pembatalan ID </label><br><br>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="col-sm-9 ">
                            <div class="form-group">
                                <label><b>Nota : </b></label> {{--Untuk key Search--}}
                                <ol>
                                    <b><li>ID Baharu : Sila tanda " ✓ " pada peranan yang berkenaan. </li></b>
                                    <b><li>Pengemaskinian ID : Sila tanda " ✓ " pada peranan yang terkini (sedia ada dan tambahan). </li></b>
                                    <b><li>Pembatalan ID : Hanya masukkan Nama dan No. Kad Pengenalan di Maklumat Pengguna. </li></b>
                                  </ol>
                            </div>
                        </div>
                    </div>
                    

                </form>
            </div>
        </div>
    </div>
</div>


@endsection