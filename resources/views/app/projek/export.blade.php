
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <td colspan="15" style="text-align: center">SENARAI PROJEKBP00600 - NAIK TARAF, UBAH SUAI DAN PEMBAIKAN TAHUN 2025</td>
                            </tr>
                            <tr>
                                <th colspan="5">PROGRAM / BAHAGIAN / JKN / INSTITUSI:</th>
                                <th colspan="10">{{ strtoupper($header) }}</th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>TAHUN</th>
                                <th>KATEGORI</th>
                                <th>PROGRAM</th>
                                <th>NAMA PROJEK</th>
                                <th>SKOP KERJA</th>
                                <th>JUSTIFIKASI</th>
                                <th>ULASAN TEKNIKAL</th>
                                <th>MULA LAKSANA</th>
                                <th>AGENSI PELAKSANA</th>
                                <th>STRUKTUR</th>
                                <th>NEGERI</th>
                                <th>DAERAH</th>
                                <th>FASILITI</th>
                                <th>KOS DILULUSKAN</th>
                                <th>KOS SEBENAR</th>
                                <th>TANGUNGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projek as $proj)
                                 @php
                                    if($proj->proj_struktur==1)
                                        $struktur ='Ya';
                                    else
                                        $struktur ='Tidak'
                                @endphp
                                <tr>
                                    <td>{{ $proj->projek_id }}</td>
                                    <td>{{ $proj->proj_tahun }}</td>
                                    <td>{{ $proj->pro_kat_nama }}</td>
                                    <td>{{ $proj->proj_prog_nama }}</td>
                                    <td>{{ strip_tags($proj->proj_nama) }}</td>
                                    <td>{{ strip_tags($proj->proj_skop) }}</td>
                                    <td>{{ strip_tags($proj->proj_justifikasi) }}</td>
                                    <td>{{ $proj->proj_ulasan_teknikal }}</td>
                                    <td>{{ $proj->proj_laksana_mula }}</td>
                                    <td>{{ getPelaksana($proj->proj_pelaksana) }}</td>
                                    <td>{{ $struktur }}</td>
                                    <td>{{ $proj->neg_nama_negeri }}</td>
                                    <td>{{ $proj->dae_nama_daerah }}</td>
                                    <td>{{ $proj->fas_name }}</td>
                                    <td>{{ $proj->proj_kos_lulus }}</td>
                                    <td>{{ $proj->proj_kos_sebenar }}</td>
                                    <td>{{ $proj->proj_tangungan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

