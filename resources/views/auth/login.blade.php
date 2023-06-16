<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
    <title>Login</title>
</head>
<body class="body">
    <div class="container">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div id="container1" class="col-5 align-self-center content1" style="padding: 50px 50px 50px 50px; ">
                    <div class="col-12">
                        <h1 class="fw-bold">Sign In</h1>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="col-sm-12">
                                <input type="email" class="input" name="email" id="email" placeholder="Email Address">
                            </div>
                            <div class="col-sm-12 position-relative">
                                <input type="password" class="input" name="password" id="password" placeholder="Password">
                                <span id="togglePassword" class="position-absolute top-50 translate-middle-y end-0" style="cursor: pointer;">
                                    <i id="eyeIcon" class="bi bi-eye fs-4"></i>
                                </span>
                            </div>
                            <div class="col-sm-12 regis" style="font-weight: 500">
                                No account? <a href="{{ route('register') }}">Create One!</a>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-next text-white float-end fs-5 mt-3">Next</button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
            <a href="{{ route('forget.password.get') }}">
                <div class="row justify-content-md-center mt-4">
                    <div id="container2" class="col-5 justify-content-center content2" style="padding: 10px;">
                        <img src="asset/lock.png" width="29px" height="29.37px"><span style="padding: 10px; font-size: 20px; font-weight: bold; color:black;">Forgot my password</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</body>
<script>
    window.addEventListener('DOMContentLoaded', function() {
      var container1 = document.getElementById('container1');
      var container2 = document.getElementById('container2');
      if (window.innerWidth < 1023) {
        container1.classList.remove('col-5');
        container2.classList.remove('col-5');
      }
    });
</script>
<script>
    var togglePassword = document.getElementById('togglePassword');
    var passwordInput = document.getElementById('password');
    var eyeIcon = document.getElementById('eyeIcon');
  
    togglePassword.addEventListener('click', function() {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('bi-eye');
        eyeIcon.classList.add('bi-eye-slash');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('bi-eye-slash');
        eyeIcon.classList.add('bi-eye');
      }
    });
  </script>
</html>