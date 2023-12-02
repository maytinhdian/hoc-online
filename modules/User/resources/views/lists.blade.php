@extends('layouts.backend')
@section('title', 'Quản lý người dùng')
@section('content')
<p><a href="{{route('admin.users.create')}}" class="btn btn-primary">Thêm mới</a></p>
    <table id="datatablesSimple">
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
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>

                <td><a href="#" class="btn btn-warning">Sửa</a></td>
                <td><a href="#" class="btn btn-danger">Xóa</a></td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>

                <td><a href="#" class="btn btn-warning">Sửa</a></td>
                <td><a href="#" class="btn btn-danger">Xóa</a></td>
            </tr>
        </tbody>
    </table>
@endsection
