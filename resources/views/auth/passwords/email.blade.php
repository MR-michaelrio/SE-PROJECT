<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forgot-password.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
    <title>Forgot Password - Input Email</title>
</head>
<body class="body">
    <div class="container">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div id="container1" class="lign-self-center content1">
                    <div class="col-12 mb-4">
                        <h1 class="fw-bold">Forgot Password?</h1>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('forget.password.post') }}" method="post">
                        @csrf
                            <div class="col-12">
                                <span>Please verify your account</span>
                                <input type="email" class="input" name="email" id="email" placeholder="Email Address">
                            </div>
                            <div class="col-12" style="margin-top:120px">
                               <button type="submit" class="btn btn-next text-white float-end">Verify</button> <button type="submit" class="btn btn-next text-black float-end" style="background-color: #C4C3C3 !important; margin-right: 10px;">Back</button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>