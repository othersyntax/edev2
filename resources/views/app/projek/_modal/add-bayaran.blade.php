<div class="modal inmodal" id="addModalBayaran" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{-- <i class="fa fa-cogs modal-icon"></i> --}}
                <h4 class="modal-title">Maklumat Belanja</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="projek_uti_id_add">
                <div class="form-group">
                    <label>No Rujukan</label>
                    <input type="tetx" class="form-control" id="no_rujukan_add">
                </div>
                <div class="form-group">
                    <label>Perihal</label>
                    <input type="text" class="form-control" id="perihal_add">
                </div>
                <div class="form-group" id="data_2">
                    <label>Tarikh</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="tarikh_add" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Amun (RM)</label>
                    <input type="number" class="form-control" id="perihal_add">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary updateUtiliti">Tambah</button>
            </div>
        </div>
    </div>
</div>
