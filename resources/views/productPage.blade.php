<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Product Table</h2>
    <a class="btn btn-info float-right mb-3" href="{{route('home.page')}}">Back To Add Product</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><a class="text-danger" title="preview product" href="/preview/{{$product->id}}">{{$product->name}}</a></td>
                <td>{{$product->amount}}</td>
                <td>{{$product->description}}</td>
                <td class="col-2"><img src="{{asset('/storage/upload/tmp/'.$product->file)}}" height="100" width="200" ></td>
                <td><a class="btn btn-info" href="/edit/{{$product->id}}" title="edit">Edit</a>
                    <a class="btn btn-warning" href="/preview/{{$product->id}}" title="preview product">Preview</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
