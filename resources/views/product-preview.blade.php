<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Preview</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h3>Product View</h3>
    <div class="float-right col-7 mb-5"><a class="btn btn-secondary" href="{{ route('show')}}">Back to procuct page</a></div>
    <div class="p-3">
        <div class="row bg-light col-8 border p-3 shadow rounded">
                <img src="{{asset('/storage/upload/tmp/'.$data->file)}}" height="300" width="350"alt="Product Image" >

                <div class="card-body">
                    <h5 class="card-title">{{$data->title}}</h5>
                    <p class="card-text">{{$data->description}}</p>
            </div>
        </div>
    </div>
</div>


</body>
</html>
