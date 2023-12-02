@extends('admin.layout')
@section('title')
Category
@endsection
@section('content')

<div class="card my-5">
  <div class="card-header">Category Edit</div>
  <div class="card-body">

      <form action="{{ route('admin.category.update') }}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="id" id="id" value="{{$category->id}}">
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control" value="{{$category->description}}"></br>
        <label>Status</label></br>
        <input type="text" name="status" id="status" class="form-control" value="{{$category->status}}"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
