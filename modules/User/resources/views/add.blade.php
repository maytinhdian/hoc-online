@extends('layouts.backend')
@section('title', 'Quản lý người dùng')
@section('content')
    <form action="" method="POST">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Tên</label>
                    <input type="text" name="" id="" class="form-control" placeholder="Tên...">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="" id="" class="form-control" placeholder="Email...">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Nhóm</label>
                    <select name="" id="" class="form-select">
                        <option value="">Chọn Nhóm</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="" id="" class="form-control" placeholder="Mật khẩu...">
                </div>
            </div>
            <div class="col-12">

                <button type="submit" class="btn btn-primary">Lưu lại</button>
                <a href="#" class="btn btn-danger">Hủy</a>
            </div>
        </div>

    </form>
@endsection
