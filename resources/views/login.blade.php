
    <div class="d-flex justify-content-center mt-5">
        <div class="col-3 border p-4">
            <h4 class="d-flex justify-content-center text-decoration-underline">Login</h4>
            <form action="{{route('form.login')}}" method="post">
                @csrf
                <x-input type="text" name="username" label="Username"  placeholder="Username" required />
                <span class="text-danger">
                    @error('username')
                    {{$message}}
                    @enderror
                  </span>
                <x-input type="password" name="password" label="password"  placeholder="Password here" required />
                <span class="text-danger">
                    @error('password')
                    {{$message}}
                    @enderror
                  </span>
                <input type="submit" class=" btn btn-success mt-3 form-control"  value="Login"/>
            </form>
            <h6>You don't have account please <a href="{{route('sign.up')}}"> Ragistrer here</a></h6>
        </div>
    </div>
