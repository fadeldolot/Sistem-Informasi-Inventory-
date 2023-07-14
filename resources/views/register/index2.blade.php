<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style2.css">
    <title>Form Registrasi</title>
</head>

<body>
    <main class="form-registration">
        <img class="img" src="assets/images/logo2.png">
        <h1 class="h3 mb-3 fw-normal text-center">Registrasi</h1>

        <form action="/register" method="post">
            @csrf

            <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror"
                    id="name" placeholder="Name" required value="{{ old('name') }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username')is-invalid @enderror"
                    id="username" placeholder="UserName" required value="{{ old('username') }}">


                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email')is-invalid @enderror"
                    id="email" placeholder=" E-mail" required value="{{ old('email') }}">


                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="form-floating">
                <input type="password" name="password"
                    class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password"
                    placeholder="Password" required>

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="form-group">
            <select name="role" class="form-control rounded-bottom" required>
              <option value="">-Pilih-</option>
              <option value="user">user</option>
            </select>
          </div> --}}

            {{-- @error('password')
            <div  class="invalid-feedback">
                {{ $message }}
              </div>  
            @enderror  --}}




            <button class="register" type="submit">Register</button>
        </form>
        <div class="bottom">
            <a href="/login">Login</a>
        </div>
    </main>
</body>

</html>
