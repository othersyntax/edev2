@extends('layouts.main')
@section('title')
    Jenis Kerja
@endsection

@section('content')
<tbody>
@foreach($data as $row)
    <tr>
    <td>{{ $row->id }}</td>
    <td>{{ $row->jenis_kerja }}</td>
    <td>{{ $row->status }}</td>
    <td>
    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $row->id }}">Edit</button>
    <form action="{{ route('jeniskerja.destroy', $row->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
    </form>
    </td>
</tr>


<div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1">
<div class="modal-dialog">
<form method="POST" action="{{ route('jeniskerja.update', $row->id) }}">
@csrf
@method('PUT')
<div class="modal-content">
<div class="modal-header"><h5>Edit</h5></div>
<div class="modal-body">
<div class="mb-3">
<label>Jenis Kerja</label>
<input type="text" name="jenis_kerja" class="form-control" value="{{ $row->jenis_kerja }}">
</div>
<div class="mb-3">
<label>Status</label>
<select name="status" class="form-control">
<option value="Active" {{ $row->status=='Active'?'selected':'' }}>Active</option>
<option value="Inactive" {{ $row->status=='Inactive'?'selected':'' }}>Inactive</option>
</select>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Save</button>
</div>
</div>
</form>
</div>
</div>
@endforeach
</tbody>
</table>
</div>


<div class="modal fade" id="createModal" tabindex="-1">
<div class="modal-dialog">
<form method="POST" action="{{ route('jeniskerja.store') }}">
@csrf
<div class="modal-content">
<div class="modal-header"><h5>Add New</h5></div>
<div class="modal-body">
<div class="mb-3">
<label>Jenis Kerja</label>
<input type="text" name="jenis_kerja" class="form-control">
</div>
<div class="mb-3">
<label>Status</label>
<select name="status" class="form-control">
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>
</select>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Create</button>
</div>
</div>
</form>
</div>
</div>
@endsection


@section('custom-js')
<script>
/* ADD */
$("#addForm").submit(function (e) {
    e.preventDefault();

    $.post("{{ route('jeniskerja.store') }}", $(this).serialize(), function (res) {
        location.reload();
    });
});

/* SHOW EDIT MODAL */
$(".editBtn").click(function () {
    $("#edit_id").val($(this).data("id"));
    $("#edit_status").val($(this).data("status"));
    $("#editModal").modal("show");
});

/* UPDATE */
$("#editForm").submit(function (e) {
    e.preventDefault();

    let id = $("#edit_id").val();

    $.post("/jenisKerja/update/" + id, {
        _token: "{{ csrf_token() }}",
        status: $("#edit_status").val()
    }, function (res) {
        location.reload();
    });
});

/* DELETE */
$(".deleteBtn").click(function () {
    if (!confirm("Are you sure?")) return;

    let id = $(this).data("id");

    $.ajax({
        url: "/jenisKerja/delete/" + id,
        type: "DELETE",
        data: { _token: "{{ csrf_token() }}" },
        success: function () {
            $("#row" + id).remove();
        }
    });
});
</script>
@endsection
