<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body><br><br><br>
    <div class="containe">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                       <center><h4>Login</h4></center> 
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login.user') }}" method="POST" enctype="multipart/form-data">
                            @if (Session::has('success'))
                                <div class="alert-success">{{ Session::get('seccess') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            
                            <div class="form-group">
                                <label for="email"><h6>email</h6></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group">
                                <label for="password"><h6>password</h6></label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div> <br>
                            <button class="btn btn-block btn-success">Login</button><br>
                        </form>
                        <br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>