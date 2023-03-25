<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/frame2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <title>Document</title>
</head>
<body id="body">
    <header>

        <div class="user">
            <div class="menu">
                <p class="userName"> <span>hello</span> <br> {{ auth()->user()->name }}</p>
                <p class="signOut"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" hidden>
                        @csrf
                    </form>
                </p>
            </div>
            <div class="userInfo">
                <img src="../assets/imgs/user.svg" alt="user profile image">
                <p><span>hello</span> <br> {{ auth()->user()->name }}</p>
            </div>
            <div class="exit"><img src="../assets/imgs/exit.svg" alt=""></div>
        </div>
        <div class="categories">
            <p class="deActive" id="branding">Branding Records</p>
            <p class="active" id='marketing' >Marketing Records</p>
        </div>
    </header>
    <div class="mobileMenu">
      <div class="menu">
        <p class="question">Do you want to Exit?</p>
        <div class="choices">
          <a href="../index.html" class="yes">yes</a>
          <a class="no">no</a>
        </div>
      </div>
    </div>
    <div class="swiper mySlider">
        <div class="swiper-wrapper allRecords dataRecordsMarketing">
          <!-- all records get into this div by videosSlider.js -->
        </div>
           <div class="sliderControl">
               <div class="swiper-button-prev"></div>
               <div class="swiper-pagination">
               </div>
                <div class="swiper-button-next"></div>
           </div>
         </div>
         <script src="{{ asset('frontend/assets/js/signOut.js') }}"></script>
         <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
         <script src="{{ asset('frontend/assets/js/videosSlider.js') }}"></script>

       </body>
       </html>
