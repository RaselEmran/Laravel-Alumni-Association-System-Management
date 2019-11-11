@php
$route = 'admin.alumni.';
@endphp
@extends('layouts.app', ['title' => _lang('Alumni'), 'modal' => false])
@section('page.header')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> {{_lang('Alumni')}}</h1>
    <p>A free and open source Bootstrap 4 admin template</p>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">{{_lang('Alumni')}}</a></li>
  </ul>
</div>
@stop
@section('content')
<div class="row">
  <div class="col-md-12">
   <div class="tile">
    <div class="tile-body">
      @if(isset($model))
      {!! Form::model($model, ['route' => [$route.'update', $model->id], 'class' => 'form-validate-jquery', 'id' => 'content_form', 'method' => 'PUT', 'files' => true]) !!}
      @else
      {!! Form::open(['route' => $route.'store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
      @endif
      <div class="row">
      
        <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('title', _lang('Title') , ['class' => 'col-form-label required']) }}

            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => _lang('Title'),'required'=>'']) }}
          </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('open_date', _lang('Star Date') , ['class' => 'col-form-label required']) }}

            {{ Form::text('open_date', null, ['class' => 'form-control date', 'placeholder' => _lang('Star Date'),'required'=>'']) }}
          </div>
      </div>

        <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('close_date', _lang('End Date') , ['class' => 'col-form-label required']) }}

            {{ Form::text('close_date', null, ['class' => 'form-control date', 'placeholder' => _lang('End Date'),'required'=>'']) }}
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

@stop
@push('scripts')
<script src="{{ asset('js/pages/extra.js') }}"></script>
@endpush
 