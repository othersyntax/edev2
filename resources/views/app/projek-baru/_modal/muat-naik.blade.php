<div class="modal inmodal" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            {{-- <form method="post" enctype="multipart/form-data"> --}}
                <input type="hidden" name="projek_id" id="projek_id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-cogs modal-icon"></i>
                    <h4 class="modal-title">Maklumat Dokumen</h4>
                    <small class="font-bold">Dokumen yang dimuat naik mestilah dalam format PDF dan saiz tidak lebih 2MB</small>
                </div>
                <div class="col-lg-12">
                    <ul id="save_msgList"></ul>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Perihal</label>
                        <textarea class="form-control" name="proj_doc_perihal" id="proj_doc_perihal" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input id="proj_doc_fail" name="proj_doc_fail" type="file" class="custom-file-input">
                            <label for="logo" class="custom-file-label">Pilih dokumen...</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary btnMuatNaik">Muat naik</button>
                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
