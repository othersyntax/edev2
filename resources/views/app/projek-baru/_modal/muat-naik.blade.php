<div class="modal inmodal" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{-- <i class="fa fa-cogs modal-icon"></i> --}}
                <h4 class="modal-title">Maklumat Dokumen</h4>
                <small class="font-bold">Dokumen yang dimuat naik mestilah dalam format PDF dan saiz tidak lebih 2MB</small>
            </div>
            <div class="modal-body">
                <input type="hidden" id="projek_uti_id_add">
                <div class="form-group">
                    <label>Nama Dokumen</label>
                    <input type="tetx" class="form-control" id="no_rujukan_add">
                </div>
                <div class="form-group">
                    <label>Perihal</label>
                    <textarea class="form-control" name="perihal" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="custom-file">
                    <input id="logo" type="file" class="custom-file-input">
                    <label for="logo" class="custom-file-label">Pilih dokumen...</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary updateUtiliti">Muat naik</button>
            </div>
        </div>
    </div>
</div>
