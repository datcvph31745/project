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
<form action="{{route('products.store')}}"
  method="POST"
  enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label class="form-label">Tên</label>
    <input type="text"
           class="form-control"
           id="exampleFormControlInput1"
           name="name"
           placeholder="Áo" value="{{old('name')}}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">Giá</label>
    <input type="text"
           class="form-control"
           id="exampleFormControlInput1"
           name="gia" value="{{old('gia')}}">
</div>
<div class="mb-3">
    <label class="form-label">Số lượng</label>
    <input type="text"
           class="form-control"
           id="exampleFormControlInput1"
           name="so_luong" value="{{old('so_luong')}}">
</div>
<div class="mb-3">
    <label class="form-label">Ảnh</label>
    <input type="file"
           class="form-control"
           id="exampleFormControlInput1"
           name="image">
</div>
<div class="mb-3">
    <label class="form-label">Loại</label>
    <select class="form-select" name="id_danh_muc" aria-label="Default select example">
        @foreach($listCate as $item)
        <option value="{{$item->id}}" @if($item->id == old('id_danh_muc')) selected @endif>{{$item->name}}</option>
        @endforeach
    </select>
</div>
<button type="submit" class="btn btn-success">Gửi</button>
<a href="{{route('products.index')}}"  class="btn btn-light"> Quay lại trang chủ</a>
</form>


@endsection