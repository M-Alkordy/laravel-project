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
                <p class="userName"> <span>hello</span> <br>{{ $name->name}}</p>
                <p class="signOut"><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     <i class="mdi mdi-logout text-primary"></i>Logout
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form></p>
            </div>
            <div class="userInfo">
                <img src="{{ asset('frontend/assets/imgs/user.svg') }}" alt="user profile image">
                <p><span>hello</span> <br> {{ $name->name}}</p>
            </div>
            <div class="exit"><img src="{{ asset('frontend/assets/imgs/exit.svg') }}" alt=""></div>
        </div>
        <div class="categories">
            @foreach ($categories as $category)
            @if ($category->category->id == collect(request()->segments())->last())
            <a class="btn btn-info Active" href="{{ route('showVideo' , $category->category->id) }}">{{ $category->category->name; }}</a>
            @else
            <a class="btn btn-info deActive" href="{{ route('showVideo' , $category->category->id) }}">{{ $category->category->name; }}</a>
            @endif
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
    <div class="swiper mySlider">
        <div class="swiper-wrapper allRecords dataRecordsMarketing">
            @foreach ($categories as $category)
            @if ($category->category->id == collect(request()->segments())->last())
                @for ($i=0; $i < ceil(count($videos)/10);$i++)
                    <div class="swiper-slide recordsContainer">
                        @for ($j=($i*10) ; $j < ($i*10)+10; $j++)
                            @if ($j<=count($videos)-1)
                                <a class='aRecord {{$videos[$j]->id}}' href="{{ route('studentsVideo' , [$category->category->id , $videos[$j]->id] )}}">
                                <div class="record">
                                    <div class="img">
                                        <img src="{{asset('backend/')}}/{{$videos[$j]->imgPath}}" alt="">
                                    </div>
                                    <p class="description">
                                        {{$videos[$j]->description}}
                                    </p>
                                </div></a>
                            @endif
                        @endfor
                    </div>
                @endfor
            @endif
            @endforeach
        </div>
    </div>
    <div class="sliderControl">
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
    </div>
    <script src="{{ asset('frontend/assets/js/signOut.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend/assets/js/videosSlider.js') }}"></script>
    @livewireScripts

</body>

</html>

