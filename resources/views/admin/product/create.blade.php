@extends('admin.layout')
@section('title')
Product
@endsection
@section('content')

<div class="card my-5">
  <div class="card-header">Product Creation</div>
  <div class="card-body">
      <form action="{{ route('admin.product.save') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Category</label></br>
        <input type="text" name="category_id" id="category_id" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label>Status</label></br>
        <input type="text" name="status" id="status" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
