@extends('layouts.main')
@section('title')
    Status Permohonan Projek
@endsection

@section('content')
<div class="container">

    <h4 class="mb-4">Status Permohonan Projek</h4>

    <!-- Add Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
        Add Status
    </button>

    <!-- Status Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Status ID</th>
                <th>Status</th>
                <th>Created At</th>
                <th width="120px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr id="row{{ $row->status_id }}">
                <td>{{ $row->status_id }}</td>
                <td>{{ $row->status }}</td>
                <td>{{ $row->created_at }}</td>
                <td>
                    <button class="btn btn-warning btn-sm editBtn"
                        data-id="{{ $row->status_id }}"
                        data-status="{{ $row->status }}">
                        Edit
                    </button>

                    <button class="btn btn-danger btn-sm deleteBtn"
                        data-id="{{ $row->status_id }}">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Add Modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <form id="addForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header"><h5>Add Status</h5></div>

                <div class="modal-body">
                    <label>Status</label>
                    <input type="text" class="form-control" name="status" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <form id="editForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header"><h5>Edit Status</h5></div>

                <div class="modal-body">
                    <input type="hidden" id="edit_id">
                    <label>Status</label>
                    <input type="text" class="form-control" id="edit_status" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-warning">Update</button>
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

    $.post("{{ route('projek-status.store') }}", $(this).serialize(), function (res) {
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

    $.post("/projek-status/update/" + id, {
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
        url: "/projek-status/delete/" + id,
        type: "DELETE",
        data: { _token: "{{ csrf_token() }}" },
        success: function () {
            $("#row" + id).remove();
        }
    });
});
</script>
@endsection


