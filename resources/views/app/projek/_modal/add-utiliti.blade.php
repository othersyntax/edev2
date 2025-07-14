<div class="modal inmodal" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{-- <i class="fa fa-cogs modal-icon"></i> --}}
                <h4 class="modal-title">Maklumat Perkara Berbangkit</h4>
                <small class="font-bold">Aktviti dan surat-menyurat berkaitan dengan projek ini</small>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <ul id="save_msgList_aktiviti"></ul>
                </div>
                <div class="form-group">
                    <label>Perihal</label>
                    <input type="text" class="form-control" id="perihal_add">
                </div>
                {{-- <div class="form-group">
                    <label>No Rujukan</label>
                    <input type="text" class="form-control" id="no_rujukan_add">
                </div>
                <div class="form-group" id="data_2">
                    <label>Tarikh</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="tarikh_add" class="form-control">
                    </div>
                </div> --}}
                <div class="form-group">
                    <div class="custom-file">
                        <input id="proj_doc_fail" name="proj_doc_fail" type="file" class="custom-file-input">
                        <label for="logo" class="custom-file-label">Pilih dokumen...</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Catatan</label>
                    <textarea class="form-control" id="catatan_add"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary addUtiliti">Tambah</button>
            </div>
        </div>
    </div>
</div>
