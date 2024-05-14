@extends('layouts.main')
@section('title')
    Permohonan
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Permohonan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Utama</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Permohonan</strong>
            </li>
        </ol>
    </div>
</div>    
@endsection
@section('content')


<div class="content-wrapper">
    
    <!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Senarai</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Utama</a></li>
            <li class="breadcrumb-item active">Permohonan</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
        <div class="container-fluid">
      <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/tanah/senarai">
                    <input type="hidden" name="_token" value="35jDfV5yGSAqRJ29C2ujOpXwX1unD8lqpbycZmoP">                        <div class="card card-purple card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ABC</label>
                                        <select class="form-control" id="neg_kod_negeri" name="neg_kod_negeri">
                                            <option value="" selected="selected">--Sila Pilih--</option>
                                            <option value="01">ABC</option>
                                            <option value="02">ABC</option>
                                            <option value="03">ABC</option>
                                            <option value="04">ABC</option>
                                            <option value="05">ABC</option>
                                            <option value="06">ABC</option>
                                            <option value="08">ABC</option>
                                            <option value="09">ABC</option>
                                            <option value="07">ABC</option>
                                            <option value="12">ABC</option>
                                            <option value="13">ABC</option>
                                            <option value="10">ABC</option>
                                            <option value="11">ABC</option>
                                            <option value="14">ABC</option>
                                            <option value="15">ABC</option>
                                            <option value="16">ABC</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label>ABC</label>
                                        <span id="list-daerah">
                                            <select class="form-control" id="dae_kod_daerah" name="dae_kod_daerah"><option value="" selected="selected">--Sila pilih--</option></select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label>ABC</label>
                                        <span id="list-mukim">
                                            <select class="form-control" id="ban_kod_bandar" name="ban_kod_bandar"><option value="" selected="selected">--Sila pilih--</option></select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label>ABC</label>
                                        <span id="list-mukim">
                                            <select class="form-control" id="ptj_id" name="ptj_id"><option value="" selected="selected">--Sila pilih--</option></select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ABC</label>
                                        <select class="form-control" name="jenis_hakmilik">
                                            <option value="" selected="selected">--Sila Pilih--</option>
                                            <option value="1">ABC</option>
                                            <option value="2">ABC</option>
                                            <option value="3">ABC</option>
                                            <option value="4">ABC</option>
                                            <option value="5">ABC</option>
                                            <option value="6">ABC</option></select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ABC</label>
                                        <input class="form-control" name="nolot" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ABC</label>
                                        <input class="form-control" name="tanah_desc" type="text">
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="/tanah/tambah" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                                    <a href="/tanah/senarai" class="btn bg-purple float-right ml-1">Reset</a>
                                    <input type="submit" class="btn btn-primary float-right ml-1" value="Carian">  
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row mt-2">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">Abc</th>
                        <th>Abc</th>
                        <th>Abc</th>
                        <th>Abc</th>
                        <th>Abc</th>
                        <th class="text-center">Abc</th>
                    </thead>
                    <tbody>
                                                                                                                        
                                
                                
                                                                                </tbody>
                </table>
                </div>
                <div class="row mt-2">
                    <nav>
    <ul class="pagination">
        
                        <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        
        
                        
            
            
                                                                                    <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">8</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">9</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">10</a></li>
                                                                                    
                                <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            
            
                                        
            
            
                                                                                    <li class="page-item"><a class="page-link" href="#">237</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">238</a></li>
                                                                    
        
                        <li class="page-item">
                <a class="page-link" href="#" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
            </li>
                </ul>
</nav>

                </div>
                
            </div>
        </div>
    </div>
</div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection