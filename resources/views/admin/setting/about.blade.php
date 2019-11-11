@php
$route = 'admin.about';
@endphp
@extends('layouts.app', ['title' => _lang('about'), 'modal' => false])
@section('page.header')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> {{_lang('about')}}</h1>
    <p>A free and open source Bootstrap 4 admin template</p>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">{{_lang('about')}}</a></li>
  </ul>
</div>
@stop
@section('content')
<div class="row">
  <div class="col-md-12">
   <div class="tile">
    <div class="tile-body">
      {!! Form::open(['route' => $route, 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
      <div class="row">
      
     <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('content', _lang('content') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('content', isset($model)?$model->content:null, ['class' => 'form-control summernote', 'placeholder' =>  _lang('news_content'), 'style' => 'resize: none;', 'rows' => '3']) }}
        </div>
     </div>

        <div class="col-md-12">

        <div class="form-group">
            {{ Form::label('image', _lang('image') , ['class' => 'col-form-label']) }}
             <input type="file" name="image" id="image" class="dropify" data-default-file="{{isset($model)?asset('storage/about/'.$model->image):''}}" />
        </div>

          @if(isset($model) && isset($model->image))
          <input type="hidden" name="oldimage" value="{{$model->image}}">
          @endif
              
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
 