@extends('layouts.app')

@section('title', 'Edit Category')

@section('contents')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<form action="{{ route('danhmucs.update', ['id' => $danhmuc->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Tên</label>
        <input type="text" class="form-control" name="name" placeholder="Tên danh mục" value="{{ old('name', $danhmuc->name) }}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Cập nhật</button>
    <a href="{{ route('danhmucs.index') }}" class="btn btn-light">Quay lại trang chủ</a>
</form>
@endsection