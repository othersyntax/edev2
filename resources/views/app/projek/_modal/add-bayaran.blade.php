<div class="modal inmodal" id="addModalBayaran" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{-- <i class="fa fa-cogs modal-icon"></i> --}}
                <h4 class="modal-title">Maklumat Perbelanjaan</h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <ul id="save_msgList_kew"></ul>
                </div>
                <input type="hidden" id="bayaran_id_add">
                <div class="form-group">
                    <label>Perihal</label>
                    <input type="text" class="form-control" id="kew_perihal_add">
                </div>
                <div class="form-group">
                    <label>No. EFT</label>
                    <input type="tetx" class="form-control" id="kew_no_rujukan_add">
                </div>

                <div class="form-group" id="data_3">
                    <label>Tarikh</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="kew_tarikh_add" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Amaun (RM)</label>
                    <input type="number" class="form-control" id="kew_amount_add">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary addBayaran">Simpan</button>
            </div>
        </div>
    </div>
</div>
