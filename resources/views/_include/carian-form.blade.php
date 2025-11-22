<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label>Pemilik</label>
            @hasanyrole('super-admin|admin|pembaca')
                {{ Form::select('program', dropdownProgram(), session('program'), ['class'=>'form-control', 'id'=>'program']) }}
            @else
                {{ Form::select('program', dropdownProgram(), auth()->user()->program_id, ['class'=>'form-control', 'id'=>'program', 'readonly'=>'true']) }}
            @endhasanyrole

        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Tahun</label>
            {{ Form::select('tahun', [''=>'--Sila pilih--', '2024'=>'2024', '2025'=>'2025', '2026'=>'2026'], session('tahun'), ['class'=>'form-control', 'id'=>'tahun']) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Negeri</label>
            {{ Form::select('negeri', dropdownNegeri(), session('negeri'), ['class'=>'form-control', 'id'=>'negeri']) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Daerah</label>
            <span id="list-daerah">
                {{ Form::select('daerah', [''=>'--Sila pilih--'], session('daerah'), ['class'=>'form-control', 'id'=>'daerah']) }}
            </span>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Fasiliti</label>
            <span id="list-fasiliti">
                {{ Form::select('fasiliti', [''=>'--Sila pilih--'], session('fasiliti'), ['class'=>'form-control', 'id'=>'fasiliti']) }}
            </span>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Subsetia</label>
            {{ Form::select('subsetia', [''=>'--Sila Pilih--','1001'=>'1001', '4001'=>'4001', '4003'=>'4003', '5003'=>'5003'], session('subsetia'), ['class'=>'form-control', 'id'=>'subsetia']) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Kategori Projek</label>
            {{ Form::select('kategori', dropdownProjekKategori(), session('kategori'), ['class'=>'form-control', 'id'=>'kategori']) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Program</label>
            {{ Form::select('projekProgram', dropdownProjekProgram(), session('projekProgram'), ['class'=>'form-control', 'id'=>'projekProgram']) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Pelaksana</label>
            {{ Form::select('pelaksana', ['0'=>'--Sila Pilih--','1'=>'Pemilik', '2'=>'BPKj' , '3'=>'JKR'], session('pelaksana'), ['class'=>'form-control', 'id'=>'proj_pelaksana']) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Status</label>
            {{ Form::select('status', [''=>'--Sila Pilih--', '1'=>'Aktif', '2'=>'Tukar Tajuk', '3'=>'Dibatalkan', '4'=>'Tarik Balik'], session('status'), ['class'=>'form-control', 'id'=>'status']) }}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Nama Projek</label>
            {{ Form::text('projek', session('projek'), ['class'=>'form-control', 'id'=>'projek']) }}
        </div>
    </div>
</div>

