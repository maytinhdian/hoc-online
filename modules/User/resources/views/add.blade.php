@extends('layouts.backend')
@section('title', 'Quản lý người dùng')
@section('content')
    <form action="" method="POST">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Tên</label>
                    <input type="text" name="name" id=""
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Tên..." value="{{old('name')}}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email..." value="{{old('email')}}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Nhóm</label>
                    <select name="group_id" id="" class="form-select {{ $errors->has('group_id') ? 'is-invalid' : '' }}" value="{{old('group_id')}}">
                        <option value="0">Chọn Nhóm</option>
                        <option value="1">Administrator</option>
                    </select>
                    @error('group_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password" id="" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Mật khẩu..." value="{{old('password')}}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12">

                <button type="submit" class="btn btn-primary">Lưu lại</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Hủy</a>
            </div>
        </div>
        @csrf
    </form>
@endsection
