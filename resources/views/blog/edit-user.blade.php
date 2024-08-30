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
        <div class="text-center"><h2>Update Blog</h2></div>
        <form class="" id="formSubmit">
            @csrf
            <input type="hidden" value="{{$data->id}}" id="id">

            <label>First Name</label>
        <input type="text" class="form-control mb-3" name="firstname" value="{{$data->firstname}}" placeholder="Title">
            <label>Username</label>
        <input class="form-control mb-3" name="username" value="{{$data->username}}" placeholder="Username">
        {{-- <label>Roll Title</label>
        <input class="form-control mb-3" name="roll_title" value="{{$data->roll_title}}" placeholder="Roll Title"> --}}
       
        @if($data->delete_roll!= null ) 
        <label>Delete Roll</label>
        <select name="delete_roll" class="w-100">
            <option value="" disabled>{{$data->delete_roll}}</option>
            <option value="on">Active</option>
            <option value="">Inactive</option>
          </select>
          @else
          <input hidden name="delete_roll" value="na">
          @endif
          @if($data->edit_roll!= null ) 
        <label>Edit Roll</label>
        <select name="edit_roll" class="w-100">
            <option value=""disabled>{{$data->edit_roll}}</option>
            <option value="on">Active</option>
            <option value="">Inactive</option>
          </select>
          @else
          <input hidden name="edit_roll" value="na">
          @endif
        <div class="text-center mt-3">
        <input type="submit" class="mb-2 btn btn-success px-4 py-2" value="Update">
        <a type="button" class="mb-2 btn btn-danger px-4 py-2" href="{{ route('user.roll.list')}}" value="cancle">cancle</a>
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
                url: "/update-user/"+id,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                   alert(data.message);
                   window.location = "{{ route('user.roll.list')}}"
                    
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    
</script>







