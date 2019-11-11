@php
$route = 'admin.team.';
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
            {{ Form::label('designation', _lang('designation') , ['class' => 'col-form-label required']) }}

            {{ Form::text('designation', null, ['class' => 'form-control', 'placeholder' => _lang('designation'),'required'=>'']) }}
          </div>
        </div>

        <div class="col-md-12">
         <div class="form-group">
            {{ Form::label('fb', _lang('Facebook') , ['class' => 'col-form-label required']) }}

            {{ Form::text('fb', null, ['class' => 'form-control', 'placeholder' => _lang('Facebook')]) }}
          </div>
        </div>

        <div class="col-md-12">
         <div class="form-group">
            {{ Form::label('tw', _lang('Twiter') , ['class' => 'col-form-label required']) }}

            {{ Form::text('tw', null, ['class' => 'form-control', 'placeholder' => _lang('Twiter')]) }}
          </div>
        </div>

        <div class="col-md-12">
         <div class="form-group">
            {{ Form::label('inst', _lang('Instrgram') , ['class' => 'col-form-label required']) }}

            {{ Form::text('inst', null, ['class' => 'form-control', 'placeholder' => _lang('Instrgram')]) }}
          </div>
        </div>


        <div class="col-md-12">
         <div class="form-group">
            {{ Form::label('google', _lang('Google Plus') , ['class' => 'col-form-label required']) }}

            {{ Form::text('google', null, ['class' => 'form-control', 'placeholder' => _lang('Google Plus')]) }}
          </div>
        </div>

      <div class="col-md-12">

        <div class="form-group">
            {{ Form::label('image', _lang('image') , ['class' => 'col-form-label']) }}
             <input type="file" name="image" id="image" class="dropify" data-default-file="{{isset($model)?asset('storage/team/'.$model->image):''}}" />
        </div>

          @if(isset($model) && isset($model->image))
          <input type="hidden" name="oldimage" value="{{$model->image}}">
          @endif
              
      </div>

      <div class="text-right mt-2">
        {{ Form::submit(isset($model) ? _lang('update'):_lang('create'), ['class' => 'btn btn-primary btn-lg', 'id' => 'submit']) }}
        <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('ajaxloader.gif') }}" width="80"></button>

       </div>
     </div>



{!! Form::close() !!}