<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/frame1.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <nav>
            <img class="logo" src="{{ asset('frontend/assets/imgs/logo.svg') }}" alt="">
        </nav>
        <div class="form">
            <p class="welcome">Welcome To Your Future </p>
            <p class="text">learn.. and have fun</p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input class="email" required name="email" type="text" placeholder="Enter your E-mail">
                <div class="password">
                    <input required type="password" name="password" placeholder="Password">
                    <img src="{{ asset('frontend/assets/imgs/eye.svg') }}" alt="">
                </div>
                <input class="submit" type="submit"  value="Login">

            </form>
        </div>
        <footer>
            <img class="mobileBack" src="{{ asset('frontend/assets/imgs/footer-mobile.png') }}" alt="" >

            <div class="content">
                <div class="socialIcons">
                    <a href="https://www.facebook.com/focal.x.agency"><img src="{{ asset('frontend/assets/imgs/facebook.svg') }}" alt=""></a>
                    <a href="https://www.behance.net/focal-x-agency"><img src="{{ asset('frontend/assets/imgs/behance.svg') }}" alt=""></a>
                    <a href="http://Www.Instagram.com/focal.x.agency"><img src="{{ asset('frontend/assets/imgs/insta.svg') }}" alt=""></a>
                    <a href="https://www.linkedin.com/company/focal-x-agency/"><img src="{{ asset('frontend/assets/imgs/linkedIn.svg') }}" alt=""></a>
                    <a href="https://twitter.com/focal_x_agency"><img src="{{ asset('frontend/assets/imgs/twitter.svg') }}" alt=""></a>
                </div>
                <div class="copyrights">© 2021 - 2023 focal X agency All Right Reserved</div>
            </div>
        </footer>
        <img class="desktopBack" src="{{ asset('frontend/assets/imgs/fotter.svg') }}" alt="">

    </div>
    <script src="{{ asset('frontend/assets/js/eye.js') }}"></script>
</body>
</html>







{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/frame1.css') }}">
    <title>Sing in</title>
</head>
<body>
  <div class="container">
    <div class="logo"><img src=".{{ asset('frontend/assets/') }}imgs/logo.svg" alt=""></div>
    <div class="loginForm">
        <p class="welcome">Welcome To Your Future </p>
        <p class="text">learn.. and have fun</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input required type="text" name="email" placeholder="Enter your E-mail">
            <div class="password">
                <input name="password" required type="password" placeholder="Password">
                <img src="{{ asset('frontend/assets/imgs/eye.svg') }}" alt="">
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
    <footer>
     <div class="container">
        <div class="backgroundFooter">
            <img src="{{ asset('frontend/assets/imgs/backgroundFooter.svg') }}" alt="">
        </div>
        <div class="content">
            <div class="socialIcons">
                <img src="{{ asset('frontend/assets/imgs/facebook.svg') }}" alt="">
                <img src="{{ asset('frontend/assets/imgs/behance.svg') }}" alt="">
                <img src="{{ asset('frontend/assets/imgs/insta.svg') }}" alt="">
                <img src="{{ asset('frontend/assets/imgs/linkedIn.svg') }}" alt="">
                <img src="{{ asset('frontend/assets/imgs/twitter.svg') }}" alt="">
            </div>
            <div class="copyrights">© 2021 - 2023 focal X agency All Right Reserved</div>
        </div>
     </div>

    </footer>
  </div>
</body>
</html> --}}
