@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('contents')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    
@endsection
