<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Left Side Menu -->
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('admin.user.index') }}">User</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.category.index') }}">Category</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.product.index') }}">Product</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-9">
                <h1 align="center" class="my-3">BOOK MY BOOK</h1>
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
