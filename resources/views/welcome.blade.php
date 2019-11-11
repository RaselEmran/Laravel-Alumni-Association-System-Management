@extends('layouts.master', ['title' => _lang('Alumni')])
@php
date_default_timezone_set('Asia/Dhaka');

$start = $alumni->open_date.' 00:00:00';
$end = $alumni->close_date.' 23:59:59';

$current = strtotime(date('Y-m-d H:i:s'));
@endphp
@section('content')
    <section id="home-section" class="hero js-fullheight">
      <h3 class="vr"><span>Welcome</span> to {{ get_option('company_name') }}.</h3>
      <div id="timer" class="text-center">
        <div class="time" id="days"></div>
        <div class="time" id="hours"></div>
        <div class="time" id="minutes"></div>
        <div class="time" id="seconds"></div>
      </div>
      @if ($slider->count()>0)
      <div class="home-slider owl-carousel js-fullheight">
        @foreach ($slider as $alslider)
        <div class="slider-item js-fullheight">
          <div class="overlay"></div>
          <div class="container-fluid px-0">
            <div class="row d-flex no-gutters slider-text js-fullheight align-items-end justify-content-end" data-scrollax-parent="true">
              <div class="one-third order-md-last js-fullheight img" style="background-image:url({{asset('storage/slider/'.$alslider->image)}});">
                <div class="overlay"></div>
              </div>
              <div class="one-forth js-fullheight d-flex align-items-start align-items-md-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <div class="text mt-4 mt-md-0">
                  <h1 class="mb-4">{{ $alslider->title }}</h1>
                  <h2 class="mb-4">{{ date('F jS', strtotime($alslider->created_at)) }}</h2>
                  <p><a href="{{auth()->user()? route('login'):route('register') }}" class="btn btn-primary py-3 px-4">{{ auth()->user()?'Sign In':'Get Ticket' }}</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @endif
    </section>

@if ($about)
    <section class="ftco-about ftco-counter ftco-no-pb img ftco-section" id="about-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-6 col-lg-5 d-flex">
            <div class="img-about img d-flex align-items-stretch">
              <div class="overlay"></div>
              <div class="img d-flex align-self-stretch align-items-center" style="background-image:url({{isset($about)?asset('storage/about/'.$about->image):''}});">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-7 pl-lg-5 pt-5">
            <div class="row justify-content-start pb-3">
              <div class="col-md-12 heading-section ftco-animate">
               {!! isset($about)?$about->content:null!!}
              </div>
            </div>
            <div class="counter-wrap ftco-animate d-flex mt-md-3">
              <div class="text p-4 pr-5 bg-primary">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif

@if ($gallery->count()>0)
    <section class="ftco-section ftco-no-pb ftco-no-pt">
      <div class="container-fluid px-0">
        <div class="row no-gutters">
          @foreach ($gallery as $algllarey)
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="gallery img" style="background-image: url({{asset('storage/gallery/'.$algllarey->image)}});">
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif
    <section class="ftco-section ftco-subscribe img" style="background-image: url({{asset('frontend/images/bg_1.jpg')}});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-7 heading-section heading-section-white text-center ftco-animate">
            <h2 class="mb-4">Join Our Event</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <div class="row d-flex justify-content-center mt-4">
              <div class="col-md-10">
                <form action="{{ route('subscribe') }}" class="subscribe-form ajax_form" >
                  <div class="form-group d-flex">
                    <input type="email" name="sub_email" id="sub_email" class="form-control" placeholder="Enter email address">
                    <input type="submit" value="Subscribe" class="submit px-3">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 
 @if($team->count()>0)
    <section class="ftco-section ftco-speakers" id="speakers-section">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section heading-section-white text-center ftco-animate">
            <span class="subheading">Speakers</span>
            <h2 class="mb-4">MeetUp Speakers</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row">
          @foreach ($team as $alteam)
          <div class="col-sm-6 col-md-6 col-lg-3 ftco-animate">
            <div class="staff">
              <div class="img-wrap d-flex align-items-stretch justify-content-end">
                <div class="img align-self-stretch" style="background-image: url({{asset('storage/team/'.$alteam->image)}});"></div>
              </div>
              <div class="text d-flex align-items-center pt-3">
                <div>
                  <h3 class="mb-2">{{ $alteam->name }}</h3>
                  <span class="position mb-4">{{ $alteam->designation }}</span>
                  <ul class="ftco-social">
                    <li class="ftco-animate"><a href="{{ $alteam->tw }}"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="{{ $alteam->fb }}"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="{{ $alteam->google }}"><span class="icon-google-plus"></span></a></li>
                    <li class="ftco-animate"><a href="{{ $alteam->inst }}"><span class="icon-instagram"></span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif
 
    <section class="ftco-section bg-light" id="schedule-section">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Schedule</span>
            <h2 class="mb-4">Program Schedule</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="ftco-schedule">
          <div class="row">
            <div class="col-md-4 nav-link-wrap">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @foreach ($alumni->schedule as $key=> $first)
                 @if ($key+1==1)
                <a class="nav-link ftco-animate active" id="v-pills-{{ $key+1 }}-tab" data-toggle="pill" href="#v-pills-{{ $key+1 }}" role="tab" aria-controls="v-pills-{{ $key+1 }}" aria-selected="true">{{ $first->day }}<span>{{ date('F jS', strtotime($first->date)) }}</span></a>
                 @else
                   <a class="nav-link ftco-animate" id="v-pills-{{ $key+1 }}-tab" data-toggle="pill" href="#v-pills-{{ $key+1 }}" role="tab" aria-controls="v-pills-{{ $key+1 }}" aria-selected="true">{{ $first->day }}<span>{{ date('F jS', strtotime($first->date)) }}</span></a>
                 @endif


                @endforeach

              </div>
            </div>
            <div class="col-md-8 tab-wrap">
              
              <div class="tab-content" id="v-pills-tabContent">

                @foreach ($alumni->schedule as $key=> $sc)
                @if ($key+1==1)
                <div class="tab-pane fade show active" id="v-pills-{{ $key+1 }}" role="tabpanel" aria-labelledby="day-{{ $key+1 }}-tab">
                  <div class="speaker-wrap ftco-animate d-flex">
                    <div class="text pl-md-5">
                     {!! $sc->plan !!}
                    </div>
                  </div>
              
                </div>
                @else
                 <div class="tab-pane fade " id="v-pills-{{ $key+1 }}" role="tabpanel" aria-labelledby="day-{{ $key+1 }}-tab">
                  <div class="speaker-wrap ftco-animate d-flex">
                    <div class="text pl-md-5">
                     {!! $sc->plan !!}
                    </div>
                  </div>
              
                </div>
                @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Contact</span>
            <h2 class="mb-4">Contact Me</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>

        <div class="row block-9">
          <div class="col-md-7 order-md-last d-flex">
            <form action="{{ route('contact-form') }}" id="content_form" class="bg-light p-4 p-md-5 contact-form" method="post">
              <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-5 d-flex">
            <div class="row d-flex contact-info mb-5">
              <div class="col-md-12 ftco-animate">
                <div class="box p-2 px-3 bg-light d-flex">
                  <div class="icon mr-3">
                    <span class="icon-map-signs"></span>
                  </div>
                  <div>
                    <h3 class="mb-3">Address</h3>
                    <p>{{ get_option('address') }}</p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 ftco-animate">
                <div class="box p-2 px-3 bg-light d-flex">
                  <div class="icon mr-3">
                    <span class="icon-phone2"></span>
                  </div>
                  <div>
                    <h3 class="mb-3">Contact Number</h3>
                    <p><a href="{{ get_option('phone') }}">{{ get_option('phone') }}</a></p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 ftco-animate">
                <div class="box p-2 px-3 bg-light d-flex">
                  <div class="icon mr-3">
                    <span class="icon-paper-plane"></span>
                  </div>
                  <div>
                    <h3 class="mb-3">Email Address</h3>
                    <p><a href="{{ get_option('email') }}">{{ get_option('email') }}</a></p>
                  </div>
                </div>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-no-pt ftco-no-pb">
      <div id="map" class="bg-white"></div>
    </section>
@stop
@push('font.scripts')
<script src="{{ asset('js/pages/pages.js') }}"></script>
<script>
  $(document).ready(function(){
    var a =new Date("{{ $end }}");
     setInterval(function() { makeTimer(a); }, 1000);
  });
</script>
@endpush