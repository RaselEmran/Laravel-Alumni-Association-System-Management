@php
$route = 'admin.picklist.batch.';
@endphp
@if(isset($model))
{!! Form::model($model, ['route' => [$route.'update', $model->id], 'class' => 'form-validate-jquery', 'id' => 'content_form', 'method' => 'PUT', 'files' => true]) !!}
@else
{!! Form::open(['route' => $route.'store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
@endif
     <div class="row">
      <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('name', _lang('Name') , ['class' => 'col-form-label required']) }}

            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => _lang('Name'),'required'=>'']) }}
          </div>
      </div>

        <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('year', _lang('Year') , ['class' => 'col-form-label required']) }}

            {{ Form::text('year', null, ['class' => 'form-control', 'placeholder' => _lang('Year'),'required'=>'']) }}
          </div>
      </div>
      <div class="text-right mt-2">
        {{ Form::submit(isset($model) ? _lang('update'):_lang('create'), ['class' => 'btn btn-primary btn-lg', 'id' => 'submit']) }}
        <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('ajaxloader.gif') }}" width="80"></button>

       </div>
     </div>



{!! Form::close() !!}