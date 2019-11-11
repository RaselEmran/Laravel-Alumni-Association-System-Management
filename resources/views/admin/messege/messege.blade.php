@extends('layouts.app', ['title' => _lang('Messege'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Messege')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Messege')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
<!-- Basic initialization -->
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">
              <a href="" class="btn btn-info" id="content_managment" data-url ="{{ route('admin.messege.create') }}"><i class="icon-stack-plus mr-2"></i>{{_lang('create')}}</a>
            </h3>
            <div class="tile-body">
              <h2>{{ _lang('Send Item') }}</h2>
              <hr>
              <table class="table table-hover table-bordered content_managment_table">
                <thead>
                  <tr>
                    <th>{{_lang('id')}}</th>
                    <th>{{_lang('Receiver')}}</th>
                    <th>{{_lang('Subject')}}</th>
                    <th>{{_lang('action')}}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($send as $send_item)
                    <tr>
                      <td>{{ date('F jS-Y', strtotime($send_item->created_at)) }}</td>
                      <td>{{ $send_item->user->first_name }} {{ $send_item->user->last_name }}</td>
                      <td>{{ $send_item->subject }}</td>
                      <td>
                        <a class="btn btn-info" href="" id="content_managment" data-url="{{ route('admin.messege.view',['id'=>$send_item->id,'slug'=>'Send']) }}"><i  class="fa fa-eye"></i> {{_lang('Show')}}</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
             
               </table>
             </div>

              <div class="tile-body">
                 <h2>{{ _lang('Inbox Item') }}</h2>
              <hr>
              <table class="table table-hover table-bordered content_managment_table">
                <thead>
                  <tr>
                    <th>{{_lang('id')}}</th>
                    <th>{{_lang('name')}}</th>
                    <th>{{_lang('description')}}</th>
                    <th>{{_lang('action')}}</th>
                  </tr>
                </thead>

                  <tbody>
                  @foreach ($receiver as $receive_item)
                    <tr>
                      <td>{{ date('F jS-Y', strtotime($receive_item->created_at)) }}</td>
                      <td>{{ $receive_item->sender->first_name }} {{ $receive_item->sender->last_name }}</td>
                      <td>{{ $receive_item->subject }}</td>
                      <td>
                        <a class="btn btn-info" href="" id="content_managment" data-url="{{ route('admin.messege.view',['id'=>$receive_item->id,'slug'=>'Receive']) }}"><i  class="fa fa-eye"></i> {{_lang('Show')}}</a>
                      </td>
                    </tr>
                  @endforeach
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
<script src="{{ asset('js/pages/result.js') }}"></script>
@endpush

