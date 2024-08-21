
<div class="d-flex justify-content-center mt-5">
    <div class="col-3 border p-4">
        <h4 class="d-flex justify-content-center text-decoration-underline">Registration</h4>
            <form action="{{route('form.register')}}" method="post">
                @csrf
                <x-input type="text" name="firstname" label="Firstname"  placeholder="Firstname" />
                <span class="text-danger">
                    @error('firstname')
                    {{$message}}
                    @enderror
                  </span>
                <x-input type="text" name="username" label="Username"  placeholder="Username" />
                <span class="text-danger">
                    @error('username')
                    {{$message}}
                    @enderror
                  </span>
                <x-input type="password" name="password" label="password"  placeholder="Password here" />
                <span class="text-danger">
                    @error('password')
                    {{$message}}
                    @enderror
                  </span>
                <x-input type="password" name="comform_password" label="password"  placeholder="Confirm Password here" />
                <span class="text-danger">
                    @error('comform_password')
                    {{$message}}
                    @enderror
                  </span>

                <input type="submit" class=" btn btn-success mt-3 form-control"  value="Register"/>
            </form>
        <div class="d-flex justify-content-center">
        <h6><a href="{{route('login')}}" class="btn btn-secondary">Back To Login</a></h6>
        </div> 
    </div>
</div>
