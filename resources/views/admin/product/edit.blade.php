@extends('admin.layout')
@section('title')
    Book
@endsection
@section('content')

    <div class="card my-5">
        <div class="card-header">Book Edit</div>
        <div class="card-body">

            <form action="{{ route('admin.product.update') }}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                <label>Name</label></br>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required></br>
                <label>Category</label></br>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select a category</option>
                    @foreach ($category as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select></br>
                <label>Price</label></br>
                <input type="text" name="price" id="price" class="form-control"
                    value="{{ $product->price }}" required></br>
                <label>Description</label></br>
                <input type="text" name="description" id="description" class="form-control"
                    value="{{ $product->description }}" required></br>
                <label>Status</label></br>
                <input type="text" name="status" id="status" class="form-control"
                    value="{{ $product->status }}" required></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
