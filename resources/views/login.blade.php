
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
            <h6 class="btn btn-danger form-control mt-3"><a href="{{route('google.redirect')}}" class="text-white text-decoration-none">Login with Google</a></h6>
            <h6 class="btn btn-dark form-control mt-2"><a href="{{route('github.redirect')}}" class="text-white text-decoration-none">Login with Github</a></h6>
        </div>
    </div>
