<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
    <thead>
        <tr>
            <th width="5%" class="text-center" data-toggle="true">Bil.</th>
            <th data-hide="all">Projek ID</th>
            <th data-hide="all">Kategori</th>
            <th data-hide="all">Program</th>
            <th data-hide="all">Tahun</th>
            <th data-hide="all">Tarikh Mula</th>
            <th data-hide="all">Tarikh Tamat</th>
            <th data-hide="all">Pelaksana</th>
            <th width="18%">Pemilik</th>
            <th width="13%">Fasiliti</th>
            <th width="32%">Projek</th>
            <th width="7%" class="text-center">Subsetia</th>
            <th width="10%" class="text-right">Amaun (RM)</th>
            <th width="7%">Status</th>
            <th width="8%" class="text-center">Tindakan</th>
        </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @if ($projek->count()>0)
        @foreach ($projek as $proj)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>{{ $proj->projek_id }}</td>
            <td>{{ $proj->pro_kat_short_nama }}</td>
            <td>{{ $proj->proj_prog_nama }}</td>
            <td>{{ $proj->proj_tahun }}</td>
            <td>{{ date('d/m/Y', strtotime($proj->proj_laksana_mula)) }}</td>
            <td>{{ date('d/m/Y', strtotime($proj->proj_laksana_tamat)) }}</td>
            <td>{{ getPelaksana($proj->proj_pelaksana) }}</td>
            <td>{{ $proj->prog_name }}</td>
            <td>{{ $proj->fas_name }}</td>
            <td>{{ $proj->proj_nama }}</td>
            <td class="text-center">{{ $proj->proj_kod_subsetia }}</td>
            <td class="text-right">
                 @duit($proj->proj_kos_lulus)<br>
                <span class="text-navy">@duit($proj->proj_kos_sebenar)</span>
            </td>
            <td>
                @php
                    if($proj->proj_status==1){
                        $label = 'label-primary';
                    }
                    else if($proj->proj_status==2){
                        $label = 'label-success';
                    }
                    else if($proj->proj_status==3){
                        $label = 'label-warning';
                    }
                    else{
                        $label = 'label-danger';
                    }
                @endphp
                <span class="label {{ $label }}">{{ getStatus($proj->proj_status) }}</span>
            </td>
            <td class="text-center">
                @if ($proj->proj_status<>1)
                    @if (auth()->user()->role <>1)
                        <a href="/projek/papar/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                        <a href="/projek/ubah/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a>
                    @else
                    <a href="/projek/papar/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                        <a href="#" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-mute"></i></a>
                    @endif
                @else
                    <a href="/projek/papar/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                    <a href="/projek/ubah/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a>
                @endif

                {{-- <a href="/projek/padam/{{ $proj->projek_id }}/delete" class="btn btn-default btn-xs" title="Padam"><i class="fa fa-close text-danger"></i></a> --}}
            </td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="8" class="text-center"><i>Tiada Rekod</i></td>
        </tr>
    @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="14">
                <ul class="pagination float-right"></ul>
            </td>
        </tr>
        </tfoot>
</table>