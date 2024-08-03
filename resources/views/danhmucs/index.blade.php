@extends('layouts.app')

@section('title', 'Data product')

@section('contents')
@if(session('success'))
{{session('success')}}
@endif
@if(session('error'))
{{session('error')}}
@endif
<a href="{{route('danhmucs.create')}}" class="btn btn-primary" style="width: 13%">Thêm mới </a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listDanhmuc as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{ $item->listCate->name ?? 'N/A' }}</td> <!-- Xử lý nếu listCate không tồn tại -->
            <td>
                <form action="{{route('danhmucs.destroy', ['id'=>$item->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa???')" class="btn btn-danger">Xóa</button>
                </form>
                <a class="btn btn-warning" href="{{route('danhmucs.edit', ['id'=> $item->id])}}">Sửa</a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$listDanhmuc->links()}}


@endsection