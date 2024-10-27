<div class="modal inmodal" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{-- <i class="fa fa-cogs modal-icon"></i> --}}
                <h4 class="modal-title">Maklumat Penjimatan</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="bakul_jimat_id">
                <div class="col-lg-12">
                    <ul id="update_msgList"></ul>
                </div>
                <div class="form-group">
                    <label>Nama Projek</label>
                    <textarea  class="form-control" name="bj_title" id="bj_title"  rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label>Kod Subsetia</label>
                    <input type="text" class="form-control" id="bj_subsetia">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="bj_kategori" id="bj_kategori">
                        <option value="1">Penjimatan</option>
                        <option value="2">Tukar Tajuk</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Amaun (RM)</label>
                    <input type="text" class="form-control" id="bj_amount_jimat">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="bj_status" id="bj_status">
                        <option value="1">Aktif</option>
                        <option value="2">Telah Guna</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary ubahJimat">Simpan</button>
            </div>
        </div>
    </div>
</div>
