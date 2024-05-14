@extends('layouts.main')
@section('title')
    Negeri
@endsection
@yield('custom-css')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Negeri</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Negeri</strong>
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
                <h5>Carian Maklumat Permohonan</h5>
            </div>
            <div class="ibox-content">
                <form role="form">
                    <div class="row">                    
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Carian</label>
                                <select class="form-control m-b" name="carian_type" id="carian_type">
                                    <option>Kod Negeri</option>
                                    <option>Negeri</option>
                                </select>
                            </div>                            
                        </div>
                        <div class="col-sm-9 ">
                            <div class="form-group">
                                <label>Katakunci</label>
                                <input type="text" id="carian_text" name="carian_text" placeholder="katakunci" class="form-control">
                            </div>
                        </div>                   
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <button class="btn btn-sm btn-primary float-right" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Senarai Negeri </h5>
                {{-- <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" class="dropdown-item">Config option 1</a>
                        </li>
                        <li><a href="#" class="dropdown-item">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div> --}}
            </div>
            <div class="ibox-content">
                {{-- <div class="row">
                    <div class="col-sm-5 m-b-xs"><select class="form-control-sm form-control input-s-sm inline">
                        <option value="0">Option 1</option>
                        <option value="1">Option 2</option>
                        <option value="2">Option 3</option>
                        <option value="3">Option 4</option>
                    </select>
                    </div>
                    <div class="col-sm-4 m-b-xs">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-sm btn-white ">
                                <input type="radio" name="options" id="option1" autocomplete="off" checked> Day
                            </label>
                            <label class="btn btn-sm btn-white active">
                                <input type="radio" name="options" id="option2" autocomplete="off"> Week
                            </label>
                            <label class="btn btn-sm btn-white">
                                <input type="radio" name="options" id="option3" autocomplete="off"> Month
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group"><input placeholder="Search" type="text" class="form-control form-control-sm"> <span class="input-group-append"> <button type="button" class="btn btn-sm btn-primary">Go!
                        </button> </span></div>

                    </div>
                </div> --}}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#ID</th>
                                <th class="text-center">Kod Negeri</th>
                                <th>Negeri</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($negeri as $neg)
                                <tr>
                                    <td class="text-center">{{ $neg->neg_negeri_id }}</td>
                                    <td class="text-center">{{ $neg->neg_kod_negeri }}</td>
                                    <td>{{ $neg->neg_nama_negeri }}</td>
                                    <td>{{ $neg->neg_status }}</td>
                                    <td>
                                        <a href="#"><i class="fa fa-pencil text-navy" title="Kemakini"></i></a>
                                        <a href="#"><i class="fa fa-close text-danger" title="Padam"></i></a>
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
@section('custom-js')
<script>
    $(document).ready(function(){
        // console.log("response");
        fetchNegeri();

        function fetchNegeri(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "/pentadbiran/negeri/ajax-all",
                // data:{
                //         carian_type:carian_type,
                //         carian_text:carian_text
                //     },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    // $('tbody').html("");
                    // $.each(response.fasiliti, function (key, item) {
                    //     $('tbody').append('<tr>\
                    //         <td>' + item.fas_ptj_code + '</td>\
                    //         <td>' + item.fas_name + '</td>\
                    //         <td>' + item.faskat_desc + '</td>\
                    //         <td>' + item.neg_nama_negeri + '</td>\
                    //         <td><button type="button" value="' + item.fasiliti_id + '" class="btn btn-primary editbtn btn-sm" title="Kemaskini"><i class="fas fa-edit"></i></button>\
                    //         <button type="button" value="' + item.fasiliti_id + '" class="btn btn-danger delbtn btn-sm" title="Padam"><i class="fas fa-trash"></i></button></td>\
                    //     \</tr>');
                    // });
                }
            });
    
        }
    });
</script>
@endsection