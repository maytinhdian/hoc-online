@extends('layouts.backend')
@section('title', 'Quản lý người dùng')
@section('content')
    <p><a href="{{ route('admin.users.create') }}" class="btn btn-primary">Thêm mới</a></p>
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Nhóm</th>
                <th>Thời Gian</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Nhóm</th>
                <th>Thời Gian</th>
                <th><a href="#" class="btn btn-warning">Sửa</a></th>
                <th><a href="#" class="btn btn-danger">Xóa</a></th>
            </tr>
        </tfoot>
    </table>
@endsection
@section('scripts')
    <script>
        new DataTable('#datatable', {
            processing: true,
            serverSide: true,
            ajax: "{{route('admin.users.data')}}",
            "columns":[
                {"data":"name"},
                {"data":"email"},
                {"data":"group_id"},
                {"data":"created_at"},
                {"data":"edit"},
                {"data":"delete"},
            ]
        });
    </script>
@endsection
