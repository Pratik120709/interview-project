<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- bootstrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        {{-- jQuery link --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="d-flex justify-content-center mt-5">
<div class="w-50 border p-5 rounded bg-light">
    <div class="d-flex justify-content-between mb-3 ">
    <div class="text-center text-success"><h2>
        Add Blog </h2></div>
    <div class="">
        @php
        $getUserData = Auth::user();
    @endphp
    
    @if($getUserData['id'] == 1)
        <a class="btn btn-success float-right mb-3 mx-2" href="{{route('user.roll.list')}}">User Roll </a>
        @endif
        <a type="button" class="ms-5 btn-warning btn" href="{{ route('show')}}" >Manage Blog list
        </a>
    <a type="button" class="ms-5 btn-danger btn" data-toggle="modal" data-target="#myModal">Logout
    </a>
    </div>
    </div>
    <form class="" id="formSubmit">
        @csrf
        <label for="title">Title</label>
    <input type="text" class="form-control mb-3" name="title" placeholder="Title">
    <span class="text-danger title_err"></span>
        <label>Description</label>
    <textarea  class="form-control mb-3" name="description" placeholder="Description"></textarea>
    <span class="text-danger description_err"></span>
    <label>Upload Image</label>
    <input type="file" class="form-control mb-5" name="file" placeholder="Upload Image">
    <span class="text-danger file_err"></span>
    <div class="text-center">
    <input type="submit" class="mb-2 btn btn-success px-4 py-2" value="Submit">
    </div>
    </form>
</div>
</div>
{{-- <a class="btn btn-info mt-5 ms-5" href="{{route('logout')}}"> Logout</a> --}}

   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close float-end" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title">LOGOUT</h4>
        </div>
        <div class="modal-body modal-header mb-4 ">
          <p>You want to logout your account.</p>
        </div>
        <div class="mb-5 text-center">
          <a class="link_name btn btn-info" href="{{route('logout')}}">Logout</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 <!--/ Modal -->
<script>
$('#formSubmit').submit('submit', function(e) {
    e.preventDefault();


    var formData = new FormData(this);

    $.ajax({
        url: "{{ route('store') }}",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            alert(response.message);
            window.location = "{{ route('show')}}";
        },
        error: function(xhr, status, error)   
        {                  // Clear error messages
                    $('.title_err, .description_err, .file_err').text('');
                } 
       });
    });


</script>
</body>
</html>