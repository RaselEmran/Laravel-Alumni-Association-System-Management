@php
$route = 'admin.invitation.create';
@endphp
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
   
            <div class="tile-body">

{!! Form::open(['route' => $route, 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
     <div class="row">
      <div class="col-md-12">
          <div class="form-group">
                  {{ Form::label('alumni_id', _lang('Alumni') , ['class' => 'col-form-label required']) }}
                    {!! Form::select('alumni_id', $alumni, null, ['class' => 'form-control select alumni_id', 'data-placeholder' => 'Select A Alumni','required'=>'', 'data-parsley-errors-container' => '#parsley_division_error_area1']); !!}
                    <span id="parsley_division_error_area1"></span>
          </div>
      </div>

        <div class="col-md-12">
          <div class="form-group">
                  {{ Form::label('type', _lang('Type') , ['class' => 'col-form-label required']) }}
                   <select name="type" id="type" class="form-control select" data-url="{{ route('admin.ajax-member-list') }}">
                     <option value="">Select One</option>
                     <option value="All">All</option>
                     <option value="Custom">Custom</option>
                   </select>
          </div>
      </div>

       <div class="col-md-12 display" style="display: none;" >
          <div class="form-group">
                  {{ Form::label('member', _lang('Member') , ['class' => 'col-form-label required']) }}
                   <select name="member[]" id="member" class="form-control select" multiple style="width: 100%">
                   </select>
          </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('subject', _lang('Subject') , ['class' => 'col-form-label required']) }}

            {{ Form::text('subject', null, ['class' => 'form-control', 'placeholder' => _lang('Subject'),'required'=>'']) }}
          </div>
      </div>

       <div class="col-md-12" >
          <div class="form-group">
                  {{ Form::label('messege', _lang('Messege') , ['class' => 'col-form-label required']) }}
                 {{ Form::textarea('messege', null, ['class' => 'form-control summernote', 'placeholder' =>  _lang('Messege'), 'style' => 'resize: none;', 'rows' => '3','required'=>'']) }}
          </div>
      </div>




     </div>

             <div class="text-right mt-2">
        {{ Form::submit(isset($model) ? _lang('update'):_lang('create'), ['class' => 'btn btn-primary btn-lg', 'id' => 'submit']) }}
        <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('ajaxloader.gif') }}" width="80"></button>

       </div>



{!! Form::close() !!}
           
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

