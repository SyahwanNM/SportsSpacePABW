import React, { useEffect } from 'react';
import { Link } from 'react-router-dom';

const Home = () => {
  useEffect(() => {
    // Initialize ScrollReveal
    if (window.ScrollReveal) {
      const sr = window.ScrollReveal({
        origin: 'top',
        distance: '60px',
        duration: 2500,
        delay: 400,
      });
      
      sr.reveal('.header__image__card', { interval: 100 });
      sr.reveal('.header__content h1', { delay: 500 });
      sr.reveal('.header__content p', { delay: 600 });
    }

    // Mobile menu toggle
    const menuBtn = document.getElementById('menu-btn');
    const navLinks = document.getElementById('nav-links');
    
    const toggleMenu = () => {
      navLinks.classList.toggle('open');
    };

    if (menuBtn && navLinks) {
      menuBtn.addEventListener('click', toggleMenu);
    }

    return () => {
      if (menuBtn && navLinks) {
        menuBtn.removeEventListener('click', toggleMenu);
      }
    };
  }, []);

  return (
    <>
      <nav>
        <div className="nav__header">
          <div className="nav__logo">
            <Link to="/">
            <img src="/images/assets/logo.png" alt="SportsSpace Logo" />
            </Link>
          </div>
          <div className="nav__menu__btn" id="menu-btn">
            <span><i className="ri-menu-line"></i></span>
          </div>
        </div>
        
        <ul className="nav__links" id="nav-links">
          <li><Link to="/">Home</Link></li>
          <li><Link to="/about">About Us</Link></li>
          <li><Link to="/contact">Contact</Link></li>
          <li><Link to="/register">Sign Up</Link></li>
          <li><Link to="/login">Sign In</Link></li>
        </ul>
        
        <div className="nav__btns">
          <Link to="/register" className="btn sign__up">Sign Up</Link>
          <Link to="/login" className="btn sign__in">Sign In</Link>
        </div>
      </nav>

      <header className="header__container">
        <div className="header__image">
          {[
            { icon: 'ri-key-line', text: 'Badminton' },
            { icon: 'ri-basketball-line', text: 'Basketball' },
            { icon: 'ri-ping-pong-line', text: 'Tennis' },
            { icon: 'ri-football-fill', text: 'Futsal' }
          ].map((sport, index) => (
            <div key={index} className={`header__image__card header__image__card-${index + 1}`}>
              <span><i className={sport.icon}></i></span>
              {sport.text}
            </div>
          ))}
          <img src="/images/assets/young-man-badminton-player-standing-white-fit-male-athlete.png" alt="Athlete" />
        </div>

        <div className="header__content">
          <h1>Move Together<br/>Stay <span>Healthy</span> <br /> Make friend</h1>
          <p>
            Whether you're looking to unwind from your studies, stay active, 
            or simply have fun, our app has everything you need.
          </p>
          
          <form action="/search">
            <div className="input__row">
              <div className="input__group">
                <h5>Fields</h5>
                <div>
                  <span><i className="ri-map-pin-line"></i></span>
                  <input type="text" placeholder="More Than 100+" />
                </div>
              </div>
              <div className="input__group">
                <h5>Date</h5>
                <div>
                  <span><i className="ri-calendar-2-line"></i></span>
                  <input type="date" placeholder="Anytime" />
                </div>
              </div>
            </div>
            <button type="submit">Search</button>
          </form>
          
          <div className="bar">
            Copyright © {new Date().getFullYear()} SportsSpace. All rights reserved.
          </div>
        </div>
      </header>
    </>
  );
};

export default Home;