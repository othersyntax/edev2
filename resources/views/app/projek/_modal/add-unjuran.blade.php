<div class="modal inmodal" id="ModalAddUnjuran" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{-- <i class="fa fa-cogs modal-icon"></i> --}}
                <h4 class="modal-title">Maklumat Unjuran</h4>
                <small class="font-bold">Sila nyatakan cadangan unjuran kewangan pelaksanaan projek</small>
                {{-- <h5>Anggaran Kos (RM) : RM 1,500,000.00</h5> --}}
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <ul id="save_msgList_unjuran"></ul>
                </div>
                <input type="hidden" id="unjuran_id">
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="tetx" class="form-control" id="proj_unjur_tahun">
                </div>
                <div class="form-group">
                    <label>Siling Tahunan (RM)</label>
                    <input type="number" class="form-control" id="proj_unjur_siling">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary addUnjuran">Simpan</button>
            </div>
        </div>
    </div>
</div>
