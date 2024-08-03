@extends('layouts.app')

@section('title', 'Data product')

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
{{session('success')}}
@endif
@if(session('error'))
{{session('error')}}
@endif
<form action="{{route('danhmucs.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Áo" value="{{old('name')}}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <button type="submit" class="btn btn-success">Gửi</button>
    <a href="{{route('danhmucs.index')}}" class="btn btn-light"> Quay lại trang chủ</a>
</form>


@endsection