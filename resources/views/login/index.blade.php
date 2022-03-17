<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Sistem</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="form-signin">
        <img class="img" src="assets/images/logo2.png" > 
        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
        <form action="/login" method="post">
          @csrf
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-mail" autofocus required value="{{ old('email') }}">
            

            @error('email')
                <div class="ivalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>

          <div class="form-floating">
            <input type="password" name = "password" class="form-control" id="password" placeholder="Password" required>
            
          </div>
      
          
          <button class="btn-login" type="submit">Login</button>
        </form>
        <div class="bottom">
             <a href="/register">Register Now!</a>
             <a href="/">Home</a>
        </div>
      </main>
</body>
</html>