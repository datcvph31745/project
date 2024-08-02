@extends('layouts.app')
 
@section('title', 'Data product')
 
@section('contents')
    @if(session('success'))
        {{session('success')}}
    @endif
    @if(session('error'))
        {{session('error')}}
    @endif
    <a href="{{route('products.create')}}"
       class="btn btn-primary" style="width: 13%">Thêm mới </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Loại</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listPro as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->gia}}</td>
            <td>{{$item->so_luong}}</td>
            <td>
                @if(!isset($item->image))
                    Không có ảnh
                @else
                    <img src="{{Storage::url($item->image)}}" style="width: 100px">
                @endif
            </td>
            <td>{{$item->listCate->name}}</td>
            <td>
                <form action="{{route('products.destroy', ['id'=>$item->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa???')" class="btn btn-danger">Xóa</button>
                </form>
                <a class="btn btn-warning" href="{{route('products.edit', ['id'=> $item->id])}}">Sửa</a>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$listPro->links()}}


@endsection