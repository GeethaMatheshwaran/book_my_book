@extends('admin.layout')
@section('title')
    Book
@endsection

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-14">
                <div class="card">
                    <div class="card-header">Book</div>
                    <div class="card-body">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-success btn-sm" title="Add New product">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @foreach ($category as $cat)
                                                    @if ($item->category_id == $cat->id)
                                                        {{ $cat->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $item->price }}</td>

                                            <td>{{ $item->description }}</td>
                                            {{-- <td>
                                                @if ($item->status == 1)
                                                    <span class="dot green">&#9679;</span>
                                                @else
                                                    <span class="dot red">&#9679;</span>
                                                @endif
                                            </td> --}}
                                            <td>
                                                <a href="{{ route('admin.product.edit', ['id' => $item->id]) }}"
                                                    title="Edit Student"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</button></a>

                                                <form method="POST"
                                                    action="{{ route('admin.product.delete', ['id' => $item->id]) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete product"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
