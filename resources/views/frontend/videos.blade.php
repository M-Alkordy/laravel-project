<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('frontend/frame3.css')}}">
    <title>Document</title>
</head>
<body>
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
                 </form></p>
            </div>
            <div class="userInfo">
                <img src="{{ asset('frontend/assets/imgs/user.svg') }}" alt="user profile image">
                <p> <span>hello</span> <br> {{ $name->name}}</p>
            </div>
            <div class="goBack">
            @foreach ($categories as $category)
            @if ($category->category->id == collect(request()->segments())[1])
            <a href="{{ route('showVideo' , $category->category->id)}}"><img src="{{ asset('frontend/assets/imgs/goBack.svg') }}" alt=""></a></div>
            @endif
            @endforeach

        </div>
    </header>
    <div class="container">
        <div class="left">
            @foreach ( $videos as $video)
                <div class="info">
                    @if ($video->id == collect(request()->segments())->last())
                        <p>{{$video->description}}</p>
                        <div class="masterRecord">
                            <video controls>
                                <source src="{{asset('backend/')}}/{{$video->path}}" type="video/mp4">
                                <source src="{{asset('backend/')}}/{{$video->path}}" type="video/ogg">
                            </video>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="right">
            <p class="text">Suggested Videos</p>
            <div class="videos">
                @foreach ( $videos as $video)
                @if ($video->id > collect(request()->segments())->last() && $video->id <= collect(request()->segments())->last()+4)
                    <a href="{{ route('studentsVideo' , [collect(request()->segments())[1] , $video->id]) }}">
                        <img class="{{$video->id}}" src="{{asset('backend/')}}/{{$video->imgPath}}" alt="{{$video->description}}">
                    </a>
                @endif
                @endforeach
            </div>
        </div>
        {{-- <div class="recordsContainer">
            <div class="record">
                <div class="img">
                    <img src="{{ asset('frontend/assets/imgs/record.png') }}" alt="">
                </div>
                <p class="description">
                    Les 1  |  Mr. Alaa Darwish
                </p>
            </div>
            <div class="record">
                <div class="img">
                    <img src="{{ asset('frontend/assets/imgs/record.png') }}" alt="">
                </div>
                <p class="description">
                    Les 1  |  Mr. Alaa Darwish
                </p>
            </div>
            <div class="record">
                <div class="img">
                    <img src="{{ asset('frontend/assets/imgs/record.png') }}" alt="">
                </div>
                <p class="description">
                    Les 1  |  Mr. Alaa Darwish
                </p>
            </div>
            <div class="record">
                <div class="img">
                    <img src="{{ asset('frontend/assets/imgs/record.png') }}" alt="">
                </div>
                <p class="description">
                    Les 1  |  Mr. Alaa Darwish
                </p>
            </div>
        </div> --}}
    </div>
    </div>
   <script src="{{ asset('frontend/assets/js/signOut.js') }}"></script>
        {{-- @for ($x=(collect(request()->segments())->last()); $x<(collect(request()->segments())->last()+4); $x++)
        @if ($x<=count($videos)-5)
        <a href="{{ route('studentsVideo' , [collect(request()->segments())[1] , $videos[$x]->id]) }}">
            <img class="{{$x}}" src="{{asset('frontend/assets/imgs/')}}{{$videos[$x]->imgPath}}" alt="{{$videos[$x]->description}}"></a>
        @endif
        @endfor --}}
</body>
</html>
