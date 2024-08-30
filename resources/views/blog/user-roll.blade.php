<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />


</head>
<body>
    



   <div class="container mt-5">
    <h2 class="mb-4">Manage Users List</h2>
    <a class="btn btn-info float-right mb-3 mx-2" href="{{route('add.blog.view')}}">Back To Add Blog</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>User NAme</th>
                <th>Delete Roll</th>
                <th>Edit Roll</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->firstname}} </td>
                <td>{{$product->username}}</td>
                <td>{{ $product->edit_roll ? $product->edit_roll : 'NA' }}</td>
                <td>{{ $product->delete_roll ? $product->delete_roll : 'NA' }}</td>                
                <td><a class="btn btn-info" href="/edit-user/{{$product->id}}" title="edit">Edit</a>
                    <a class="btn btn-danger" href="/delete-user/{{$product->id}}" title="preview product">Delete</a>
                    <a class="btn btn-success" data-toggle="modal" data-target="#myModal" >User roll
                    </a>
                </td>
            </tr>

            @endforeach
            
        </tbody>
    </table>
    {{ $data->links() }}
</div>

@foreach ($data as $product)
{{-- ================================================= --}}
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close float-end" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title">Add User Roll</h4>
        </div>
      <div class="p-3">
        <form action="{{route('add.user.roll',[$product->id])}}" method="post">
            @csrf
            <label for="deleteBlog">Roll Title</label>
            <input type="text" id="deleteBlog" name="roll_title" placeholder="User Roll" class="mx-2 form-control">
        <h4 class="mt-3">User Permission</h4>

        <input type="checkbox" id="deleteBlog" name="delete_roll" placeholder="User Roll" class="mx-2">
        <label for="deleteBlog">Delete Blog</label>
        <br/>

        <input type="checkbox" id="editBlog" name="edit_roll" placeholder="User Roll" class="mx-2">
        <label for="editBlog">Edit Blog</label>
    <br/>
        <input type="submit" value="Add" class="btn btn-info">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
    </form>
   </div>
      </div>
      
    </div>
  </div>
 <!--/ Modal -->
 @endforeach
</body>
</html>
