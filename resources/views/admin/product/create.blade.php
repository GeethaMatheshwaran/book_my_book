@extends('admin.layout')
@section('title')
    Book
@endsection
@section('content')

    <div class="card my-5">
        <div class="card-header">Book Creation</div>
        <div class="card-body">
            <form action="{{ route('admin.product.save') }}" method="post">
                {!! csrf_field() !!}
                <label>Name</label></br>
                <input type="text" name="name" id="name" class="form-control" required></br>
                <label>Category</label></br>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select a category</option>
                    @foreach ($category as $categoryData)
                        <option value="{{ $categoryData->id }}">{{ $categoryData->name }}</option>
                    @endforeach
                </select></br>
                <label>Price</label></br>
                <input type="int" name="price" id="price" class="form-control" required></br>
                <label>Description</label></br>
                <input type="text" name="description" id="description" class="form-control" required></br>

                <input type="checkbox" class="form-check-input" id="status">
                <label class="form-check-label" for="status">Book Status</label><br><br>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
