<aside class="app-sidebar">
      <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{auth()->user()->image? asset('storage/student/'.auth()->user()->image):'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg'}}" alt="User Image" width="80">
        <div>
          <p class="app-sidebar__user-name">{{auth()->user()->username?auth()->user()->username:'John Doe'}}</p>
          <p class="app-sidebar__user-designation">{{getUserRoleName(auth()->user()->id)?getUserRoleName(auth()->user()->id):'Admin'}}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item {{ Request::is('home') ? ' active' : '' }}" href="{{ route('admin.home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">{{_lang('dashboard')}}</span></a></li>
        @role('Super Admin')
         <li><a class="app-menu__item {{ Request::is('admin/setting') ? ' active' : '' }}" href="{{ route('admin.setting') }}"><i class="app-menu__icon fa fa-cogs" aria-hidden="true"></i><span class="app-menu__label">{{_lang('setting')}}</span></a></li>
        @endrole 

         @if (auth()->user()->can(['language.view', 'language.create' ]))
          <li><a class="app-menu__item {{ Request::is('admin/language*') ? ' active' : '' }}" href="{{ route('admin.language') }}"><i class="app-menu__icon fa fa-language" aria-hidden="true"></i><span class="app-menu__label">{{_lang('language')}}</span></a></li>
        @endif
      @if (auth()->user()->can(['role.view', 'role.create','user.view', 'user.create' ]))
        <li class="treeview {{ Request::is('admin/user*') ? ' is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-times"></i><span class="app-menu__label">{{_lang('role_and_permission')}}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
             @if (auth()->user()->can(['role.view', 'role.create' ]))
            <li class="mt-1"><a class="treeview-item {{Request::is('admin/user/role*') ? 'active':''}}" href="{{ route('admin.user.role') }}"><i class="icon fa fa-circle-o"></i> {{_lang('role_permission')}}</a>
            </li>
            @endif
             @if (auth()->user()->can(['user.view', 'user.create' ]))
            <li class="mt-1"><a class="treeview-item {{(Request::is('admin/user*') And !Request::is('admin/user/role*'))  ?'active':''}}" href="{{ route('admin.user.index') }}"><i class="icon fa fa-circle-o"></i>{{_lang('user')}}</a></li>
            @endif
          </ul>
        </li>
        @endif
           
           @if (auth()->user()->can(['database.create']))
           <li><a class="app-menu__item {{ Request::is('admin/backup') ? ' active' : '' }}" href="{{ route('admin.backup') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('backup')}}</span></a></li>
           @endif
               
              @if (auth()->user()->can(['slider.create','slider.view']))
               <li><a class="app-menu__item {{ Request::is('admin/slider') ? ' active' : '' }}" href="{{ route('admin.slider.index') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('Slider')}}</span></a></li>
              @endif
               @if (auth()->user()->can(['gallery.create','gallery.view'] )|| auth()->user()->hasRole('Member'))
                <li><a class="app-menu__item {{ Request::is('admin/gallery') ? ' active' : '' }}" href="{{ route('admin.gallery.index') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('gallery')}}</span></a></li>
               @endif 
                
                @if (auth()->user()->can(['team.create','team.view']))
                <li><a class="app-menu__item {{ Request::is('admin/team') ? ' active' : '' }}" href="{{ route('admin.team.index') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('team')}}</span></a></li>
                @endif
                
                @if (auth()->user()->can(['about.create','about.view']))
                <li><a class="app-menu__item {{ Request::is('admin/about') ? ' active' : '' }}" href="{{ route('admin.about') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('About')}}</span></a></li>
                @endif
              
               @if (auth()->user()->can(['alumni.create','alumni.view']))
                 <li><a class="app-menu__item {{ Request::is('admin/alumni*') ? ' active' : '' }}" href="{{ route('admin.alumni.index') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('Alumni')}}</span></a></li>
               @endif  
          @if (auth()->user()->can(['category.create','category.view']))
           <li><a class="app-menu__item {{ Request::is('admin/category') ? ' active' : '' }}" href="{{ route('admin.category.index') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('Category')}}</span></a></li>
           @endif
            
            @if (auth()->user()->can(['apply.view']))
             <li><a class="app-menu__item {{ Request::is('admin/student') ? ' active' : '' }}" href="{{ route('admin.student') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('Student')}}</span></a></li>
             @endif
      
        @if (auth()->user()->can(['messege.view','messege.create','mail.view','mail.create'] )|| auth()->user()->hasRole('Member'))
          <li class="treeview {{ Request::is('admin/messege*') ? ' is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-times"></i><span class="app-menu__label">{{_lang('Messesing')}}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
            <li class="mt-1"><a class="treeview-item {{Request::is('admin/messege*') ? 'active':''}}" href="{{ route('admin.messege') }}"><i class="icon fa fa-circle-o"></i> {{_lang('Messege')}}</a>
            </li>
            <li class="mt-1"><a class="treeview-item {{Request::is('admin/mail*') ?'active':''}}" href="{{ route('admin.mail.index') }}"><i class="icon fa fa-circle-o"></i>{{_lang('Mail')}}</a></li>
          </ul>
        </li>
        @endif
          
          @if (auth()->user()->can(['invitation.view','invitation.create']))
           <li><a class="app-menu__item {{ Request::is('admin/invitation') ? ' active' : '' }}" href="{{ route('admin.invitation') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('Invitation')}}</span></a></li>
          @endif

           @if (auth()->user()->can(['depertment.view','depertment.create']))
          <li><a class="app-menu__item {{ Request::is('admin/depertment') ? ' active' : '' }}" href="{{ route('admin.depertment.index') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('Depertment Info')}}</span></a></li>
          @endif
         @if (auth()->user()->can(['picklist.view','picklist.create']))
          <li class="treeview {{ Request::is('admin/picklist*') ? ' is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-times"></i><span class="app-menu__label">{{_lang('picklist')}}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
            <li class="mt-1"><a class="treeview-item {{Request::is('admin/picklist/batch*') ? 'active':''}}" href="{{ route('admin.picklist.batch.index') }}"><i class="icon fa fa-circle-o"></i> {{_lang('Batch')}}</a>
            </li>
            <li class="mt-1"><a class="treeview-item {{Request::is('admin/picklist/session*') ?'active':''}}" href="{{ route('admin.picklist.session.index') }}"><i class="icon fa fa-circle-o"></i>{{_lang('session')}}</a></li>
          </ul>
        </li>
        @endif

          @role('Super Admin')
          <li class="treeview {{ Request::is('admin/contact*') ? ' is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-times"></i><span class="app-menu__label">{{_lang('Contact')}}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
            <li class="mt-1"><a class="treeview-item {{Request::is('admin/contact*') ? 'active':''}}" href="{{ route('admin.contact') }}"><i class="icon fa fa-circle-o"></i> {{_lang('Contact')}}</a>
            </li>
            <li class="mt-1"><a class="treeview-item {{Request::is('admin/picklist/session*') ?'active':''}}" href="{{ route('admin.picklist.session.index') }}"><i class="icon fa fa-circle-o"></i>{{_lang('session')}}</a></li>
          </ul>
        </li>
        @endrole

        @role('Member')
              <li><a class="app-menu__item {{ Request::is('admin/member/profile') ? ' active' : '' }}" href="{{ route('admin.member.profile') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('Profile')}}</span></a></li>

               <li><a class="app-menu__item {{ Request::is('admin/programm/schedule') ? ' active' : '' }}" href="{{ route('admin.programm.schedule') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('Schedule')}}</span></a></li>
        @endrole
      </ul>
    </aside>