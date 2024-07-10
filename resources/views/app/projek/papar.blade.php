@extends('layouts.main')
@section('title')
    Kemaskini Projek
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Papar Projek</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Projek</a>
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
    <div class="col-lg-8">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Maklumat Projek</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Kod Subprojek</label><br>
                            <b>{{ $projek->proj_kod_agensi }}-{{ $projek->proj_kod_projek }}-{{ $projek->proj_kod_middle }}-{{ $projek->proj_kod_group }}</b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Negeri</label><br>
                            <b>{{ $projek->proj_negeri }}</b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Bulan dan Tahun</label><br>
                            <b>{{ $projek->proj_bulan }}, {{ $projek->proj_tahun }}</b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Program</label><br>
                            <b>{{ $projek->proj_program }}</b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Kos Sebenar (RM)</label><br>
                            <b>@duit($projek->proj_kos_sebenar)</b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Nama Projek</label><br>
                            <b>{{ $projek->proj_nama }}</b>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="text-uppercase">Keterangan</label><br>
                            <b>{{ $projek->proj_butiran }}</b>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="text-uppercase">Catatan</label><br>
                            <b>{{ $projek->proj_catatan }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Maklumat Pengesahan</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Kod Subprojek</label><br>
                            <b>{{ $projek->proj_kod_agensi }}-{{ $projek->proj_kod_projek }}-{{ $projek->proj_kod_middle }}-{{ $projek->proj_kod_group }}</b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Negeri</label><br>
                            <b>{{ $projek->proj_negeri }}</b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Bulan dan Tahun</label><br>
                            <b>{{ $projek->proj_bulan }}, {{ $projek->proj_tahun }}</b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Program</label><br>
                            <b>{{ $projek->proj_program }}</b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Kos Sebenar (RM)</label><br>
                            <b>@duit($projek->proj_kos_sebenar)</b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Nama Projek</label><br>
                            <b>{{ $projek->proj_nama }}</b>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="text-uppercase">Keterangan</label><br>
                            <b>{{ $projek->proj_butiran }}</b>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="text-uppercase">Catatan</label><br>
                            <b>{{ $projek->proj_catatan }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Audit Trail</h5>
            </div>
            <div class="ibox-content inspinia-timeline">
                <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <div class="vertical-timeline-content">
                            <h2>Meeting</h2>
                            <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the sale.
                            </p>
                            <a href="#" class="btn btn-sm btn-primary"> More info</a>
                            <span class="vertical-date">
                                Today <br/>
                                <small>Dec 24</small>
                            </span>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon blue-bg">
                            <i class="fa fa-file-text"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Send documents to Mike</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                            <a href="#" class="btn btn-sm btn-success"> Download document </a>
                            <span class="vertical-date">
                                Today <br/>
                                <small>Dec 24</small>
                            </span>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon lazur-bg">
                            <i class="fa fa-coffee"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Coffee Break</h2>
                            <p>Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
                            <a href="#" class="btn btn-sm btn-info">Read more</a>
                            <span class="vertical-date"> Yesterday <br/><small>Dec 23</small></span>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon yellow-bg">
                            <i class="fa fa-phone"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Phone with Jeronimo</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                            <span class="vertical-date">Yesterday <br/><small>Dec 23</small></span>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon lazur-bg">
                            <i class="fa fa-user-md"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Go to the doctor dr Smith</h2>
                            <p>Find some issue and go to doctor. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. </p>
                            <span class="vertical-date">Yesterday <br/><small>Dec 23</small></span>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-comments"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Chat with Monica and Sandra</h2>
                            <p>Web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>
                            <span class="vertical-date">Yesterday <br/><small>Dec 23</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
@endsection
