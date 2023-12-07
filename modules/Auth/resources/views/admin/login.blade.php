@extends('layouts.auth')

@section('content')
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">{{ $pageTitle }}</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('login') }}">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" name="email" type="email"
                            placeholder="name@example.com" value="{{old('email')}}" />
                        <label for="inputEmail">Email address</label>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                        <label for="inputPassword">Password</label>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                        <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="small" href="password.html">Forgot Password?</a>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                    @csrf
                </form>
            </div>

        </div>
    </div>
@endsection
