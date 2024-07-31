<div class="modal inmodal" id="ModulAddSiling" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{-- <i class="fa fa-cogs modal-icon"></i> --}}
                <h4 class="modal-title">Penetapan Siling</h4>
                <small class="font-bold">Tambah maklumat siling bagi Program / Institusi / JKN</small>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <ul id="save_msgList"></ul>
                </div>
                <div class="form-group">
                    <label>Program / Institusi / JKN / Bahagian</label>
                    {{ Form::select('sil_program_id_add', dropdownProgram(), null, ['class'=>'form-control', 'id'=>'sil_program_id_add']) }}
                </div>
                <div class="form-group">
                    <label>Tahun</label>
                    {{ Form::text('sil_tahun_add', date('Y'), ['class'=>'form-control', 'id'=>'sil_tahun_add']) }}
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group" id="data_1">
                            <label>Tarikh Mula Kuatkuasa</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="sil_sdate_add" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Masa Mula</label>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" class="form-control" value="00:00" >
                                <span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group" id="data_2">
                            <label>Tarikh Tamat Kuatkuasa</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="sil_edate_add" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Masa Mula</label>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" class="form-control" value="23:59" >
                                <span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Amaun (RM) </label>
                    {{ Form::text('sil_amount_add', null, ['class'=>'form-control', 'id'=>'sil_amount_add']) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary simpanSiling">Tambah</button>
            </div>
        </div>
    </div>
</div>
