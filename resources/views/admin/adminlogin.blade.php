<!DOCTYPE html>
<html>
    <head>
       @include('admin.includes.top')
    </head>
    <body>
        <main>
            <header class="jumbotron">
                <h1 class="text-center">Admin Panel</h1>
            </header>
            <section class="container">
            @if($message=Session::get('msg'))
          <div class="alert alert-danger">
              {{ $message }}
          </div>
        @endif
        <form method="post" action="{{ url('/postlogin')}}">
        @csrf()

          <div class="form-group">
           <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" placeholder="Enter email">
          <!-- @error('email')
          <div class="alert alert-danger">
              {{$message}}
          </div>
          @enderror -->
          </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
    <!-- @error('password')
          <div class="alert alert-danger">
              {{$message}}
          </div>
          @enderror -->
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>

        </main>
        @include('admin.includes.footer')
    </body>
</html>
