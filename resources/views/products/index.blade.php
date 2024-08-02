@extends('layouts.app')
 
@section('title', 'Data product')
 
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data product</h6>
    </div>
    <div class="card-body">
            {{-- @if (auth()->user()->level == 'Admin')
      <a href="{{ route('products.add') }}" class="btn btn-primary mb-3">Add product</a>
            @endif --}}
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>code product</th>
              <th>name product</th>
              <th>Category</th>
              <th>Price</th>                            
              <th>Action</th>
                            
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    // $(function(){
    //   var table = $('#dataTable').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{route('products')}}",
    //     columns: [
    //       {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //       {data: 'item_code', name: 'item_code'},
    //       {data: 'productname', name: 'productname'},
    //       {data: 'category', name: 'category'},
    //       {data: 'price', name: 'price'},
    //       {data: 'action', name: 'action'},
    //     ]
    //   });
    // })
  </script>
@endsection