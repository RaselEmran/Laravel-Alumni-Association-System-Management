@extends('layouts.app', ['title' => 'Dahsboard', 'modal' => false])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
@stop
@section('content')
<!-- Basic initialization -->
   @if (auth()->user()->can(['dashboard.view']))
      <div class="row">
        <div class="col-md-3">
          <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Users</h4>
              <p><b>{{ App\User::count() }}</b></p>
            </div>
          </div>
        </div>
           <div class="col-md-3">
          <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Register Alumni</h4>
              <p><b>{{ App\Alumni::count() }}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small warning"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Active Team</h4>
              <p><b>{{ App\Team::count() }}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small danger"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Student</h4>
              <p><b>{{ App\Depertment::count() }}</b></p>
            </div>
          </div>
        </div>
      </div>
    @endif

      @php
      $month =date('m');
        $register =App\User::whereMonth('created_at', $month)
            ->get();
      @endphp
        <div class="row">
          @if (auth()->user()->can(['dashboard.view']))
          @if ($register->count()>0)
          <div class="col-lg-12">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-danger">
                <button class="close" type="button" data-dismiss="alert">×</button><strong></strong> {{ $register->count() }} New Member Register This Month
              </div>
            </div>
          </div>
           @endif
           @endif
           @if ($receiver->count()>0) 
          <div class="col-lg-12">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-info">
                <button class="close" type="button" data-dismiss="alert">×</button><strong></strong> You Have {{ $receiver->count() }} Messege
              </div>
            </div>
          </div>
            @endif
            @if ($inbox->count()>0)
            <div class="col-lg-12">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <button class="close" type="button" data-dismiss="alert">×</button><strong></strong>You Have {{ $inbox->count() }} New Mail
              </div>
            </div>
          </div>
          @endif
        </div>
@if (auth()->user()->can(['dashboard.view']))
      <div class="row">
          <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Responsive Table</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>{{ _lang('Name') }}</th>
                    <th>{{ _lang('Email') }}</th>
                    <th>{{ _lang('Phone') }}</th>
                    <th>{{ _lang('action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($register as $member)
                  @if (getUserRoleName($member->id)=='Member')
                  <tr>
                    <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>
                      <a href="{{ route('admin.register-check-deatils',$member->id) }}" class="badge badge-info"><i  class="fa fa-eye"></i> {{_lang('Show')}}</a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
        @endif

<!-- /basic initialization -->
@stop

@push('scripts')

@endpush

