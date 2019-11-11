 <header class="app-header"><a class="app-header__logo" href="{{ route('admin.home') }}">{{get_option('site_title')?get_option('site_title'):'SATT'}}</a>
  <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <!-- Navbar Right Menu-->
  @php
  $month =date('m');
  $note =App\User::whereMonth('created_at', $month)
  ->get();

  $receiver =App\Messege::orderBy('id','DESC')->where('receiver_id',auth()->user()->id)->orWhere('type','All')->whereMonth('created_at', $month)->get();
  $inbox =App\EmailLog::orderBy('id','DESC')->where('reciver_id',auth()->user()->id)->orWhere('type','Mail')->whereMonth('created_at', $month)->get();
  @endphp
  <ul class="app-nav">
    <li class="app-search">
      <input class="app-search__input" type="search" placeholder="Search">
      <button class="app-search__button"><i class="fa fa-search"></i></button>
    </li>
    <!--Notification Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
      <ul class="app-notification dropdown-menu dropdown-menu-right">
        @role('Member')

        <li class="app-notification__title">You have {{ $receiver->count()}} Messege And {{ $inbox->count() }} Mail.</li>
        <div class="app-notification__content">
          @foreach ($receiver as $ms)
          <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
            <div>
              <p class="app-notification__message">{{ $ms->sender->first_name }}  New Messege</p>
              <p class="app-notification__meta">{{ $ms->created_at->diffForHumans() }}</p>
            </div></a>
          </li>
          @endforeach

          @foreach ($inbox as $mail)
          <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
            <div>
              <p class="app-notification__message">{{ $mail->sender->first_name }}  New Messege</p>
              <p class="app-notification__meta">{{ $mail->created_at->diffForHumans() }}</p>
            </div></a>
          </li>
          @endforeach
        </div>

        @else
        <li class="app-notification__title">You have {{ $note->count() }} new notifications.</li>
        <div class="app-notification__content">
          @foreach ($note as $notification)
          <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
            <div>
              <p class="app-notification__message">{{ $notification->first_name }} {{ $notification->last_name }} New Registration</p>
              <p class="app-notification__meta">{{ $notification->created_at->diffForHumans() }}</p>
            </div></a>
          </li>
          @endforeach
        </div>
        @endrole
        <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
      </ul>
    </li>
    <!-- User Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li><a class="dropdown-item" href="@role('Member') {{ route('admin.member.profile') }} @else{{ route('admin.profile') }}@endrole"><i class="fa fa-user fa-lg"></i> Profile</a></li>
        <li><a class="dropdown-item" href="" id="logout" data-url='{{ route('logout') }}'><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</header>