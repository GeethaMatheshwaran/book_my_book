<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .dot {
            font-size: 23px;
            /* Adjust size as needed */
            line-height: 1;
            /* Ensure proper alignment */
        }

        .green {
            color: green;
        }

        .red {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-md-3 bg-light my-3">
                <!-- Left Side Menu -->
                <h1>DASHBOARD</h1>
                <ul class="list-group h-50 d-flex flex-column justify-content-between my-5">
                    <li class="list-group-item">
                        <a href="{{ route('admin.user.index') }}">User</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.category.index') }}">Category</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.product.index') }}">Book</a>
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
