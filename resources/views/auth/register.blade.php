<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/change-email.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
    <title>Sign Up - Username & Email</title>
    <style>
        .form-page {
            display: none;
        }

        .form-page.active {
            display: block;
        }
    </style>
</head>
<body class="body">
<form method="POST" action="{{ route('register') }}" >
@csrf
    <div class="container form-page active" id="page1">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div id="container1" class="col-5 align-self-center content1">
                    <div class="col-12">
                        <h1 class="fw-bold">Sign Up</h1>
                    </div>
                    <div class="col-12">
                        <div class="col-sm-12">
                            <input type="text" class="input @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" name="user_name" placeholder="Username">
                            @error('user_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <input type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Email address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-12 regis" style="font-weight: 500">
                            <a style="visibility: hidden;">a</a>
                        </div>
                        <div class="col-12 btn1">
                            <button type="button" class="btn btn-next text-white float-end" onclick="nextPage()">Next</button> 
                            <button type="submit" class="btn btn-next text-black float-end" style="background-color: #C4C3C3 !important; margin-right: 10px;">Back</button>
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container form-page" id="page2">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div id="container2" class="col-5 align-self-center content1">
                    <div class="col-12">
                        <h1 class="fw-bold">Sign Up</h1>
                    </div>
                    <div class="col-12">
                        <div class="col-sm-12">
                            <input type="password" class="input @error('password') is-invalid @enderror" name="password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <input type="password" class="input" name="user_password_confirmation" placeholder="Confirm Password">
                        </div>
                        <div class="col-sm-12 regis" style="font-weight: 500">
                            <a style="visibility: hidden;">a</a>
                        </div>
                        <div class="col-12 btn1">
                            <button type="submit" class="btn btn-next text-white float-end">Sign Up</button> 
                            <button type="button" onclick="prevPage()" class="btn btn-next text-black float-end" style="background-color: #C4C3C3 !important; margin-right: 10px;">Back</button>
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
<script>
    @if ($errors->has('password'))
        nextPage();
    @endif
    function nextPage() {
        document.getElementById('page1').classList.remove('active');
        document.getElementById('page2').classList.add('active');
    }
    function prevPage() {
        document.getElementById('page2').classList.remove('active');
        document.getElementById('page1').classList.add('active');
    }
</script>
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
</html>