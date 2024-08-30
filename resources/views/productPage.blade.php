<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blog List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />

</head>
<body>
    @php
    $getUserData = Auth::user();
@endphp
<div class="container mt-5">
    <h2 class="mb-4">Manage Blog List</h2>
    <a class="btn btn-info float-right mb-3 mx-2" href="{{route('add.blog.view')}}">Back To Add Blog</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><a class="text-danger" title="preview product" href="/preview/{{$product->id}}">{{$product->title}}</a></td>
                <td>{{$product->description}}</td>
                <td class="col-2"><img src="{{asset('/storage/upload/tmp/'.$product->file)}}" height="100" width="200" ></td>
                <td>
                    @if($getUserData->edit_roll == 'Active')
                    <a class="btn btn-info" href="/edit/{{$product->id}}" title="edit">Edit</a>
                    @endif
                    @if($getUserData->delete_roll == 'Active')
                    <a class="btn btn-danger" href="/delete/{{$product->id}}" title="preview product">Delete</a>
                    @endif
                    <a class="btn btn-warning" href="/preview/{{$product->id}}" title="preview product">Preview</a>
                </td>
            </tr>

            @endforeach
            
        </tbody>
        
            <a class="btn btn-info float-right mb-3 mx-2" href="{{route('show')}}">View all record</a> 
       
        <div class="row col-4">
            <form action="{{route('search.data')}}" method="POST">
               
                <div class="d-flex justify-content-between">
                    @csrf
                <input type="text" class="form-control" placeholder="Search here" name="title">
                <input type="submit" value="Search" class="btn btn-info border-left-0"> 
            </div>
            </form>
        </div>

    </table>
    {{-- <div class="row">
    {{ $products->links() }}    
</div> --}}
</div>

<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
