@extends('layouts.main')
@section('title')
    Penetapan Siling
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Siling</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Siling</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Penetapan</strong>
            </li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Senarai Siling</h5>
                <div class="ibox-tools">
                    <button type="button" class="btn btn-sm btn-warning" id="emelPemakluman">
                        <span id="emelButton"></span> Emel Pemakluman
                    </button>
                    <a href="{{ route('siling.create') }}" class="btn btn-sm btn-primary">+ Tambah Siling</a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="4%"  class="text-center">Bil</th>
                                <th width="6%">Tahun</th>
                                <th width="10%">Peruntukan</th>
                                <th width="25%">Program / Bahagian / Institusi / JKN</th>
                                <th width="14%">Tempoh</th>
                                <th width="12%" class="text-right">Jumlah (RM)</th>
                                <th width="12%" class="text-right">Baki (RM)</th>
                                <th width="10%">Status</th>
                                <th width="7%">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $bil=1;
                            @endphp
                            @if ($senarai->count()>0)
                                @foreach($senarai as $item)
                                <tr>
                                    <td class="text-center">{{ $bil++ }}</td>
                                    <td>{{ $item->sil_tahun }}</td>
                                    <td>{{ $item->peruntukan->kod_subsetia." - ".$item->peruntukan->inisiatif ?? '-' }}</td>
                                    <td>{{ $item->program->prog_name ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->sil_sdate)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($item->sil_edate)->format('d-m-Y') }}</td>
                                    <td class="text-right">@duit($item->sil_amount)</td>
                                    <td class="text-right">@duit($item->sil_balance)</td>
                                    <td>{{ $item->sil_status==1 ? "Aktif": "Tidak Aktif"}}</td>
                                    <td>
                                        <a href="{{ route('siling.edit', $item->siling_id) }}" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></a>
                                        <form action="{{ route('siling.destroy', $item->siling_id) }}" method="POST" style="display:inline-block">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-default btn-xs" onclick="return confirm('Padam rekod ini?')" title="Padam"><i class="fa fa-close text-danger"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-center">Tiada rekod dijumpai.</td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-right">Jumlah Keseluruhan (RM)</th>
                                <th class="text-right">
                                    @php
                                        $jumlah = $senarai->sum('sil_amount');
                                        $baki = $senarai->sum('sil_balance');
                                    @endphp
                                    @duit($jumlah)
                                </th>
                                <th class="text-right">
                                    @duit($baki)
                                </th>
                                <th colspan="2"></th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')\
<!-- Date range picker -->
<script src="{{ asset("/template/js/plugins/datapicker/bootstrap-datepicker.js") }}"></script>

<!-- Clock picker -->
<script src="{{ asset("/template/js/plugins/clockpicker/clockpicker.js") }}"></script>
<script>
    $(document).ready(function(){
        $('#emelPemakluman').click(function(e){
            e.preventDefault();

            document.getElementById("emelButton").classList.add("loading");
            document.getElementById("emelButton").classList.add("open-circle");

            // let selectedProgram = [];
            // $('.siling-checkbox:checked').each(function() {
            //     // let silingID = $(this).data('id');
            //     // let programID = $(this).data('program');

            //     // Push user details to array
            //     // selectedProgram.push({
            //     //     id: silingID,
            //     //     program: programID
            //     // });
            // });

            // if (selectedProgram.length > 0) {
                $.ajax({
                    url: '/siling/senarai/emel',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Include CSRF token
                    },
                    success: function (response) {
                        if (response.status == 400) {
                            swal("Gagal", response.message, "error");
                        } else {
                            fetchSiling();
                            swal({
                                title: "Emel Pemakluman",
                                text: response.message,
                                type: "success"
                            });
                            document.getElementById("emelButton").classList.remove("loading");
                            document.getElementById("emelButton").classList.remove("open-circle");
                        }
                    }
                });
            // }
            // else{
            //     document.getElementById("emelButton").classList.remove("loading");
            //     document.getElementById("emelButton").classList.remove("open-circle");
            //     swal("Tiada Rekod", "Sila pilih sekurang-kurangnya satu rekod", "error");
            // }

        });
    });
</script>
@endsection
