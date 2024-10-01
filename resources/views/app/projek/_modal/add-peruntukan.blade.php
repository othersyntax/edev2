<div class="modal inmodal" id="ModalAddPeruntukan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{-- <i class="fa fa-cogs modal-icon"></i> --}}
                <h4 class="modal-title">Maklumat Peruntukan</h4>
                <small class="font-bold">Sila masukkan maklumat peruntukan yang telah disalurkan</small>
                {{-- <h5>Anggaran Kos (RM) : RM 1,500,000.00</h5> --}}
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <ul id="save_msgList_peruntukan"></ul>
                </div>
                <input type="hidden" id="peruntukan_id">
                <div class="form-group">
                    <label>Jenis Peruntukan</label>
                    {{ Form::select('peru_jenis_peruntukan', ['1'=>'Asal', '2'=>'Tambahan'], null, ['class'=>'form-control', 'id'=>'peru_jenis_peruntukan']) }}
                </div>
                <div class="form-group" id="data_4">
                    <label>Tarikh</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="peru_date" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Amaun (RM)</label>
                    {{ Form::number('peru_amaun', null, ['class'=>'form-control', 'id'=>'peru_amaun']) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary addPeruntukan">Simpan</button>
            </div>
        </div>
    </div>
</div>
