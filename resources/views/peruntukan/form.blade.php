<div class="row">
    <div class="col-md-6">
        <label>Butiran</label>
        <select name="butiran_id" class="form-control" required>
            <option value="">-- Pilih Butiran --</option>
            @foreach($butirans as $b)
                <option value="{{ $b->butiran_id }}"
                    {{ old('butiran_id', $peruntukan->butiran_id ?? '') == $b->butiran_id ? 'selected' : '' }}>
                    {{ $b->kod_full }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label>Tahun</label>
        <input type="number" name="tahun" class="form-control" value="{{ old('tahun', $peruntukan->tahun ?? '') }}">
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-3">
        <label>Kod Agensi</label>
        <input type="text" id="kod_agensi" name="kod_agensi" class="form-control"
               value="{{ old('kod_agensi', $peruntukan->kod_agensi ?? '') }}">
    </div>
    <div class="col-md-3">
        <label>Kod Projek</label>
        <input type="text" id="kod_projek" name="kod_projek" class="form-control"
               value="{{ old('kod_projek', $peruntukan->kod_projek ?? '') }}">
    </div>
    <div class="col-md-3">
        <label>Kod Setia</label>
        <input type="text" id="kod_setia" name="kod_setia" class="form-control"
               value="{{ old('kod_setia', $peruntukan->kod_setia ?? '') }}">
    </div>
    <div class="col-md-3">
        <label>Kod Subsetia</label>
        <input type="text" id="kod_subsetia" name="kod_subsetia" class="form-control"
               value="{{ old('kod_subsetia', $peruntukan->kod_subsetia ?? '') }}">
    </div>
</div>
<div class="mt-2">
    <label>Keterangan</label>
    <textarea name="keterangan" class="form-control">{{ old('keterangan', $peruntukan->keterangan ?? '') }}</textarea>
</div>

<div class="mt-2">
    <label>Inisiatif</label>
    <input type="text" name="inisiatif" class="form-control" value="{{ old('inisiatif', $peruntukan->inisiatif ?? '') }}">
    <small>Cth: Fasa 1 / Klinik Daif / Wad </small>
</div>
<div class="row mt-2">
    <div class="col-md-6">
        <label>Amaun (RM)</label>
        <input type="number" step="0.01" name="amaun" class="form-control"
               value="{{ old('amaun', $peruntukan->amaun ?? '') }}">
    </div>
</div>

{{-- Hidden Field kod_full --}}
<input type="hidden" id="kod_full" name="kod_full"
       value="{{ old('kod_full', $peruntukan->kod_full ?? '') }}">

{{-- Auto-generate kod_full via JS --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    function updateKodFull() {
        const agensi = document.getElementById('kod_agensi').value.trim();
        const projek = document.getElementById('kod_projek').value.trim();
        const setia = document.getElementById('kod_setia').value.trim();
        const subsetia = document.getElementById('kod_subsetia').value.trim();

        // Anda boleh ubah format gabungan di bawah
        const kodFull = [agensi, projek, setia, subsetia].filter(Boolean).join('-');
        document.getElementById('kod_full').value = kodFull;
    }

    // Bila user ubah mana-mana kod → update automatik
    ['kod_agensi', 'kod_projek', 'kod_setia', 'kod_subsetia'].forEach(id => {
        document.getElementById(id).addEventListener('input', updateKodFull);
    });

    // Panggil sekali untuk inisialisasi nilai semasa (edit form)
    updateKodFull();
});
</script>
