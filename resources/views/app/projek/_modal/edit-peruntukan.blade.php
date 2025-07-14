<div class="modal inmodal" id="ModalEditPeruntukan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
        <form action="/projek/papar/peruntukan" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{-- <i class="fa fa-cogs modal-icon"></i> --}}
                <h4 class="modal-title">Kemaskini Peruntukan</h4>
                <small class="font-bold">Sila masukkan maklumat peruntukan</small>
                {{-- <h5>Anggaran Kos (RM) : RM 1,500,000.00</h5> --}}
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <ul id="save_msgList_peruntukan2"></ul>
                </div>
                <input type="hidden" id="peruntukan_id2">
                <div class="text-right">
                    <h2 id="duiDiluluskanMod" class="no-margins text-right text-success"></h2>
                    <small class="font-bold">Peruntukan Diluluskan</small>
                </div>
                <input type="hidden" name="amaunLulus" id="amaunLulus">
                {{-- <div class="form-group">
                    <label>Kos Sebenar (RM)</label>
                    {{ Form::number('peru_amaun', null, ['class'=>'form-control', 'id'=>'peru_amaun']) }}
                </div> --}}
                <div class="form-group">
                    <label>Tanggungan (RM)</label>
                    {{ Form::number('peru_amaun', null, ['class'=>'form-control', 'id'=>'peru_amaun']) }}
                </div>
                <div class="form-group">
                    <label>Penjimatan (RM)</label>
                    <div id="mod-edit-peruntukan-jimat">@duit(0)</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary addPeruntukan">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
