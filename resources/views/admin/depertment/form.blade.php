@php
$route = 'admin.depertment.';
@endphp
@extends('layouts.app', ['title' => _lang('Depertment-info'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Depertment-info')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Depertment-info')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
<!-- Basic initialization -->
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
             <h3 class="tile-title">
              <a href="{{ route('admin.depertment.index') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>{{_lang('List')}}</a>
            </h3>
        
            <div class="tile-body">
    @if(isset($model))
    {!! Form::model($model, ['route' => [$route.'update', $model->id], 'class' => 'form-validate-jquery', 'id' => 'content_form', 'method' => 'PUT', 'files' => true]) !!}
    @else
    {!! Form::open(['route' => $route.'store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
    @endif
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('session_id', _lang('Session') , ['class' => 'col-form-label required']) }}

            {!! Form::select('session_id', $session, null, ['class' => 'form-control select', 'data-placeholder' => 'Select A Session','required'=>'', 'data-parsley-errors-container' => '#parsley_division_error_area1']); !!}
          </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('batch_id', _lang('Batch') , ['class' => 'col-form-label required']) }}

            {!! Form::select('batch_id', $batch, null, ['class' => 'form-control select', 'data-placeholder' => 'Select A Batch','required'=>'', 'data-parsley-errors-container' => '#parsley_division_error_area1']); !!}
          </div>
      </div>
    </div>
      <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('name', _lang('Name') , ['class' => 'col-form-label required']) }}

            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => _lang('Name'),'required'=>'']) }}
          </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('email', _lang('Email') , ['class' => 'col-form-label required']) }}

            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => _lang('Email'),'required'=>'']) }}
          </div>
      </div>
    </div>

      <div class="row">
      <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('roll_no', _lang('Roll Number') , ['class' => 'col-form-label required']) }}

            {{ Form::text('roll_no', null, ['class' => 'form-control', 'placeholder' => _lang('Roll Number'),'required'=>'',isset($model)?'readonly':null]) }}
          </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('phone', _lang('Phone') , ['class' => 'col-form-label required']) }}

            {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => _lang('Phone'),'required'=>'']) }}
          </div>
      </div>


      <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('hostel', _lang('Hostel') , ['class' => 'col-form-label required']) }}

            {{ Form::text('hostel', null, ['class' => 'form-control', 'placeholder' => _lang('Hostel'),'required'=>'']) }}
          </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
          <div class="form-group">
            {{ Form::label('father_name', _lang('Father Name') , ['class' => 'col-form-label required']) }}

            {{ Form::text('father_name', null, ['class' => 'form-control', 'placeholder' => _lang('Father Name'),'required'=>'']) }}
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
            {{ Form::label('mother_name', _lang('Mother Name') , ['class' => 'col-form-label required']) }}

            {{ Form::text('mother_name', null, ['class' => 'form-control', 'placeholder' => _lang('Mother Name'),'required'=>'']) }}
          </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            {{ Form::label('address', _lang('Address') , ['class' => 'col-form-label required']) }}

            {{ Form::textarea('address', null, ['class' => 'form-control', 'rows'=>3]) }}
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
<script src="{{ asset('js/pages/depertment.js') }}"></script>
@endpush

