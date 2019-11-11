@extends('layouts.app', ['title' => _lang('Mail'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Mail')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Mail')}}</a></li>
        </ul>
  </div>
@stop
@section('content')
<!-- Basic initialization -->
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">
              <a href="" class="btn btn-info" id="content_managment" data-url ="{{ route('admin.mail.create') }}"><i class="icon-stack-plus mr-2"></i>{{_lang('create')}}</a>
            </h3>
            <div class="tile-body">
              <h3>{{ _lang('Mail Inbox') }}</h3> <hr>
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
              @foreach ($inbox as $rc)
              <tr>
                <td>{{ $rc->sender->first_name }} {{ $rc->sender->last_name }}</td>
                <td>{{ $rc->sender->email }}</td>
                <td>{{ date('F jS-Y', strtotime($rc->created_at)) }}</td>
                <td>{{ $rc->subject }}</td>
                <td>{!! $rc->messege !!}</td>
              </tr>
               @endforeach
                <tbody>
                </tbody>
             
               </table>
             </div>
          </div>
      </div>

          <div class="col-md-12">
          <div class="tile">
            <h3>{{ _lang('Send Item') }}</h3>
            <hr>
            <div class="tile-body">
              <table class="table table-hover table-bordered content_managment_table">
                <thead>
                  <tr>
                    <th>{{_lang('Date')}}</th>
                    <th>{{_lang('name')}}</th>
                    <th>{{_lang('Email')}}</th>
                    <th>{{_lang('Subject')}}</th>
                    <th>{{_lang('Messege')}}</th>
                  </tr>
                </thead>
              @foreach ($send as $sitem)
              <tr>
                <td>{{ date('F jS-Y', strtotime($sitem->created_at)) }}</td>
                <td>{{ $sitem->user->first_name }} {{ $sitem->user->last_name }}</td>
                <td>{{ $sitem->user->email }}</td>
                <td>{{ $sitem->subject }}</td>
                <td>{!! $sitem->messege !!}</td>
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
<script src="{{ asset('js/pages/mail.js') }}"></script>
@endpush

