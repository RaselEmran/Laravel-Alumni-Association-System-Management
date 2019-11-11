@extends('layouts.app', ['title' => _lang('Contact'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Contact')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Contact')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
<!-- Basic initialization -->
  <div class="row">
        <div class="col-md-12">
          <div class="tile">

            <div class="tile-body">
              <table class="table table-hover table-bordered content_managment_table">
                <thead>
                  <tr>
                    <th>{{_lang('name')}}</th>
                    <th>{{_lang('Email')}}</th>
                    <th>{{_lang('Phone')}}</th>
                    <th>{{_lang('Subject')}}</th>
                    <th>{{_lang('Messege')}}</th>
                  </tr>
                </thead>

                <tbody>
                @foreach ($model as $element)
                  <tr>
                    <td>{{ $element->name }}</td>
                    <td>{{ $element->email }}</td>
                    <td>{{ $element->phone }}</td>
                    <td>{{ $element->subject }}</td>
                    <td>{{ $element->messege }}</td>
              
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
@endpush

