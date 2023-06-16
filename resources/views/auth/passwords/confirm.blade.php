<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/verify-password.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
    <title>Forgot Password - Input Verify Code</title>
</head>
<body class="body">
    <div class="container">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div id="container1" class="col-5 align-self-center content1">
                    <div class="col-12">
                        <h1 class="fw-bold">Forgot Password?</h1>
                    </div>
                    <div class="col-12">
                        <center>
                        <form action="{{ route('verification.password.post') }}" method="post" class="">
                            @csrf
                            <div class="col-sm-8">
                                <p class="text-center">Please, enter the verification code we sent to your email</p>
                                <input type="hidden" name="email" value="<?= $_GET['email'] ?>">
                            </div>
                            <div class="col-sm-7" style="color: #949494;">
                                <p class="text-center"><span id="timer">01:00</span></p>
                                <p class="text-center" id="resend-link" style="display: none;">
                                    <a href="{{ route('forget.password.get') }}">Resend again?</a>
                                </p>
                            </div>
                            <div class="col-sm-10">
                                <div class="input-verify-box">
                                    @for ($i = 1; $i <= 6; $i++)
                                        <input type="text" maxlength="1" pattern="[0-9]" name="verification[]" required oninput="focusNextInput(this, {{ $i }})" placeholder="-">
                                    @endfor
                                </div>
                            </div>
                            <div class="col-12 btn1">
                                <button type="submit" class="btn btn-next text-white float-end">Verify</button> <button type="submit" class="btn btn-next text-black float-end" style="background-color: #C4C3C3 !important; margin-right: 10px;">Back</button>
                            </div>
                        </form>   
                        </center>                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var timer = document.getElementById('timer');
    var resendLink = document.getElementById('resend-link');

    var minutes = 1; // Set the timer duration in minutes
    var seconds = 0; // Set the timer duration in seconds

    function countdown() {
        var totalSeconds = minutes * 60 + seconds;
        var minutesRemaining = Math.floor(totalSeconds / 60);
        var secondsRemaining = totalSeconds % 60;

        timer.innerHTML = `${minutesRemaining.toString().padStart(2, '0')}:${secondsRemaining.toString().padStart(2, '0')}`;

        if (totalSeconds <= 0) {
            timer.style.display = 'none';
            resendLink.style.display = 'block';
        } else {
            totalSeconds--;
            minutes = Math.floor(totalSeconds / 60);
            seconds = totalSeconds % 60;
            setTimeout(countdown, 1000);
        }
    }

    countdown();
</script>


<script>
    window.addEventListener('DOMContentLoaded', function() {
      var container1 = document.getElementById('container1');
      if (window.innerWidth < 1023) {
        container1.classList.remove('col-5');
      }
    });
</script>
<script>
    function focusNextInput(currentInput, nextIndex) {
        const inputs = Array.from(document.querySelectorAll('.input-verify-box input[type="text"]'));
        const currentIndex = inputs.indexOf(currentInput);

        if (currentIndex !== -1 && currentInput.value !== '') {
            const nextInput = inputs[nextIndex];
            if (nextInput) {
                nextInput.focus();
            }
        }
    }
</script>
</html>