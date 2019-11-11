@extends('layouts.app', ['title' => _lang('Invitation'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Invitation')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Invitation')}}</a></li>
        </ul>
  </div>
@stop
@section('content')
<!-- Basic initialization -->
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">
              <a href="{{ route('admin.invitation.create') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>{{_lang('create')}}</a>
            </h3>
            <div class="tile-body">
              <h3>{{ _lang('Send Invitation') }}</h3> <hr>
              <table class="table table-hover table-bordered content_managment_table">
                <thead>
                  <tr>
                    <th>{{_lang('Sender Name')}}</th>
                    <th>{{_lang('Email')}}</th>
                    <th>{{_lang('When Post')}}</th>
                    <th>{{_lang('Subject')}}</th>
                    <th>{{_lang('Messege')}}</th>
                  </tr>
                </thead>
              @foreach ($send as $send_invite)
              <tr>
                <td>{{ $send_invite->sender->first_name }} {{ $send_invite->sender->last_name }}</td>
                <td>{{ $send_invite->sender->email }}</td>
                <td>{{ date('F jS-Y', strtotime($send_invite->created_at)) }}</td>
                <td>{{ $send_invite->subject }}</td>
                <td>{!! $send_invite->messege !!}</td>
              </tr>
               @endforeach
                <tbody>
                </tbody>
             
               </table>
             </div>
          </div>
      </div>

  </div>
<!-- /basic initialization -->
@stop
@push('scripts')
<script type="text/javascript" src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('backend/js/plugins/select.min.js') }}"></script>
<script src="{{ asset('backend/js/plugins/buttons.min.js') }}"></script>
<script src="{{ asset('backend/js/plugins/responsive.min.js') }}"></script>
<script src="{{ asset('js/pages/invitation.js') }}"></script>
@endpush

