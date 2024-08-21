<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
<div class="d-flex justify-content-center mt-5">
    <div class="w-50 border p-5 rounded bg-light">
        <div class="text-center"><h2>Update Product Form</h2></div>
        <form class="" id="formSubmit">
            @csrf
            <label>Name</label>
        <input type="text" class="form-control mb-3" name="name" value="{{$data->name}}" placeholder="Name">
            <label>Amount</label>
        <input type="number" class="form-control mb-3" name="amount" value="{{$data->amount}}" placeholder="Amount">
            <label>Description</label>
        <textarea class="form-control mb-3" name="description" value="{{$data->description}}" placeholder="Description">{{$data->description}}</textarea>
        <label>Upload Image</label>
        <input type="file" id="file" name="file" value="{{$data->file}}" class="form-control mb-3">
        <img src="{{asset('/storage/upload/tmp/'.$data->file)}}" height="100" width="100">
        <input type="hidden" value="{{$data->id}}" id="id">
        <div class="text-center">
        <input type="submit" class="mb-2 btn btn-success px-4 py-2" value="Update">
        <a type="button" class="mb-2 btn btn-danger px-4 py-2" href="{{ route('show')}}" value="cancle">cancle</a>
        </div>
        </form>
    </div>
    </div>
</body>
</html>

<script>
        $('#formSubmit').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id = $('#id').val();
            $.ajax({
                url: "/update/"+id,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                   alert(data.message);
                   window.location = "{{ route('show')}}"
                    
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    
</script>







