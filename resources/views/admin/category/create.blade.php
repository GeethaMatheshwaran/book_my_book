@extends('admin.layout')
@section('title')
    Category
@endsection
@section('content')

    <div class="card my-5">
        <div class="card-header">Category Creation</div>
        <div class="card-body">
            <form action="{{ route('admin.category.save') }}" method="post">
                {!! csrf_field() !!}
                <label>Name</label></br>
                <input type="text" name="name" id="name" class="form-control" required></br>
                <label>Description</label></br>
                <input type="text" name="description" id="description" class="form-control" required></br>

                <input type="checkbox" class="form-check-input" id="status">
                <label class="form-check-label" for="status">Category Status</label><br><br>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
