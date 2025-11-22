<div class="row mt-2">
    <div class="col-md-6">
        <label>Peruntukan</label>
        <select name="sil_peruntukan_id" class="form-control" required>
            <option value="">-- Pilih --</option>
            @foreach($peruntukan as $p)
                <option value="{{ $p->peruntukan_id }}"
                    {{ old('sil_peruntukan_id', $data->sil_peruntukan_id ?? '') == $p->sil_peruntukan_id ? 'selected' : '' }}>
                    {{ $p->kod_subsetia }} - {{ $p->inisiatif }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label>Tahun</label>
        <input type="number" name="sil_tahun" class="form-control" value="{{ old('sil_tahun', $data->sil_tahun ?? '') }}" required>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-12">
        <label>Program / Bahagian / Institusi / JKN</label>
        <select name="sil_fasiliti_id" class="form-control" required>
            <option value="">-- Pilih --</option>
            @foreach($program as $pgm)
                <option value="{{ $pgm->program_id }}"
                    {{ old('sil_fasiliti_id', $data->sil_fasiliti_id ?? '') == $pgm->program_id ? 'selected' : '' }}>
                    {{ $pgm->prog_name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-6">
        <label>Tarikh Mula</label>
        <input type="date" name="sil_sdate" class="form-control" value="{{ old('sil_sdate', $data->sil_sdate ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label>Tarikh Tamat</label>
        <input type="date" name="sil_edate" class="form-control" value="{{ old('sil_edate', $data->sil_edate ?? '') }}" required>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-6">
        <label>Jumlah (RM)</label>
        <input type="number" name="sil_amount" step="1.00" class="form-control"  value="{{ old('sil_amount', $data->sil_amount ?? '') }}" required>
    </div>
</div>
