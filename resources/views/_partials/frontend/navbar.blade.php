    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">{{ get_option('company_name') }} <span>{{ get_option('site_title') }}.</span></a>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav nav ml-auto">
            <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
            <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
            <li class="nav-item"><a href="#speakers-section" class="nav-link"><span>Speakers</span></a></li>
            <li class="nav-item"><a href="#schedule-section" class="nav-link"><span>Schedule</span></a></li>
         
            <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
            <li class="nav-item cta"><a href="{{auth()->user()? route('login'):route('register') }}" class="nav-link">{{ auth()->user()?'Sign In':'Get Ticket' }}
            +</a></li>
          </ul>
        </div>
      </div>
    </nav>