<div class="modal inmodal" id="ModulEditSiling" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Penetapan Siling</h4>
                <small class="font-bold">Kemaskini maklumat penetapan siling</small>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <ul id="update_msgList"></ul>
                </div>
                <input type="hidden" id="siling_id_edit">
                <div class="form-group">
                    <label>Program / Institusi / JKN / Bahagian</label>
                    {{ Form::select('sil_program_id_edit', dropdownProgram(), null, ['class'=>'form-control', 'id'=>'sil_program_id_edit']) }}
                </div>
                <div class="form-group">
                    <label>Tahun</label>
                    {{ Form::text('sil_tahun_edit', date('Y'), ['class'=>'form-control', 'id'=>'sil_tahun_edit']) }}
                </div>
                <div class="form-group" id="data_1">
                    <label>Tarikh Mula Kuatkuasa</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="sil_sdate_edit" class="form-control">
                    </div>
                </div>
                <div class="form-group" id="data_2">
                    <label>Tarikh Tamat Kuatkuasa</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="sil_edate_edit" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Amaun (RM) </label>
                    {{ Form::text('sil_amount_edit', null, ['class'=>'form-control', 'id'=>'sil_amount_edit']) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary updateSiling">Kemaskini</button>
            </div>
        </div>
    </div>
</div>
