@php
$route = 'admin.mail.create';
@endphp

{!! Form::open(['route' => $route, 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      {{ Form::label('user_id', _lang('Member') , ['class' => 'col-form-label required']) }}
      {!! Form::select('user_id', $user, null, ['class' => 'form-control select alumni_id', 'data-placeholder' => 'Select A Member','required'=>'', 'data-parsley-errors-container' => '#parsley_division_error_area1']); !!}
      <span id="parsley_division_error_area1"></span>
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