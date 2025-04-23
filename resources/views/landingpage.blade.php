<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/pageStyle.css') }}" />
    <title>SportsSpace</title>
  </head>
  <body>
    <nav>
      <div class="nav__header">
        <div class="nav__logo">
          <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="SportsSpace Logo">
          </a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <span><i class="ri-menu-line"></i></span>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="{{ route('aboutus') }}">About Us</a></li>
        <li><a href="{{ route('faq') }}">Help</a></li>
      </ul>
      <div class="nav__btns">
        <button class="btn sign__up" onclick="window.location.href='{{ route('register') }}'">Sign Up</button>
        <button class="btn sign__in" onclick="window.location.href='{{ route('login') }}'">Sign In</button>
      </div>
    </nav>
    <header class="header__container">
      <div class="header__image">
        <div class="header__image__card header__image__card-1">
          <span><i class="ri-key-line"></i></span>
          Badminton
        </div>
        <div class="header__image__card header__image__card-2">
          <span><i class="ri-basketball-line"></i></span>
          Basketball
        </div>
        <div class="header__image__card header__image__card-3">
          <span><i class="ri-ping-pong-line"></i></span>
          Tennis
        </div>
        <div class="header__image__card header__image__card-4">
          <span><i class="ri-football-fill"></i></span>
          Futsal
        </div>
        <img src="{{ asset('images/young-man-badminton-player-standing-white-fit-male-athlete.png') }}" alt="header" />
      </div>
      <div class="header__content">
        <h1>Move Together<br/>Stay <span>Healthy</span> <br> Make friend</h1>
        <p>
            Whether you're looking to unwind from your studies, stay active, 
            or simply have fun, our app has everything you need.
        </p>
        <form action="/">
          <div class="input__row">
            <div class="input__group">
              <h5>Fields</h5>
              <div>
                <span><i class="ri-input-field"></i></i></span>
                <input type="text" placeholder="More Than 100+" />
              </div>
            </div>
            <div class="input__group">
              <h5>Date</h5>
              <div>
                <span><i class="ri-calendar-2-line"></i></span>
                <input type="text" placeholder="Anytime" />
              </div>
            </div>
          </div>
          <button type="submit">Search</button>
        </form>
        <div class="bar">
          Copyright © 2024 Web Design Mastery. All rights reserved.
        </div>
      </div>
    </header>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
