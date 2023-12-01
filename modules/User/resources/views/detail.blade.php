@extends('layouts.client')
@section('title','Chi tiết người dùng')

@section('content')
<h1>{{ trans('user::custom.title',['name'=>'Lê Thanh Nhã ']) }} {{$id}}</h1>
@endsection
