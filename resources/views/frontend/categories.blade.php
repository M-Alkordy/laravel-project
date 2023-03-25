<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/frame2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <title>Categories</title>
    @livewireStyles
</head>

<body id="body">
    <header>

        <div class="user">
            <div class="menu">
                <p class="userName"> <span>hello</span> <br> {{ $name->name}}</p>
                <p class="signOut"><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     <i class="mdi mdi-logout text-primary"></i>Logout
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
            </div>
            <div class="userInfo">
                <img src="{{ asset('frontend/assets/imgs/user.svg') }}" alt="user profile image">
                <p><span>hello</span> <br> {{ $name->name}}</p>
            </div>
            <div class="exit"><img src="{{ asset('frontend/assets/imgs/exit.svg') }}" alt=""></div>
        </div>
        <div class="categories">
            @foreach ($categories as $category)
            <a class="btn btn-info deActive" href="{{ route('showVideo' , $category->category->id) }}">{{ $category->category->name; }}</a>
            @endforeach

        </div>
    </header>
    <div class="mobileMenu">
        <div class="menu">
            <p class="question">Do you want to Exit?</p>
            <div class="choices">
                <a class="yes" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         <i class="mdi mdi-logout text-primary"></i>yes
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                <a class="no">no</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/assets/js/signOut.js') }}"></script>
</body>

</html>

