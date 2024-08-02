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
<form action="{{route('products.update', ['id'=>$listPro->id])}}"
  method="POST"
  enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="mb-3">
    <label class="form-label">Tên</label>
    <input type="text"
           class="form-control"
           id="exampleFormControlInput1"
           name="name"
           placeholder="Bánh Gạo" value="{{$listPro->name}}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">Giá</label>
    <input type="text"
           class="form-control"
           id="exampleFormControlInput1"
           name="gia" value="{{$listPro->gia}}">
</div>
<div class="mb-3">
    <label class="form-label">Quantity</label>
    <input type="text"
           class="form-control"
           id="exampleFormControlInput1"
           name="so_luong" value="{{$listPro->so_luong}}">
</div>
<div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file"
           class="form-control"
           id="exampleFormControlInput1"
           name="image">
    <img src="{{Storage::url($listPro->image)}}" style="width: 100px">
</div>
<div class="mb-3">
    <label class="form-label">Category</label>
    <select class="form-select" name="id_danh_muc" aria-label="Default select example">
        @foreach($listCate as $item)
            <option value="{{$item->id}}"
                    @if($item->id == $listPro->id_danh_muc) selected @endif>
                {{$item->name}}</option>
        @endforeach
    </select>
</div>
<button type="submit" class="btn btn-success">Gửi</button>
<a href="{{route('products.index')}}"  class="btn btn-light"> Quay lại trang chủ</a>
</form>


@endsection