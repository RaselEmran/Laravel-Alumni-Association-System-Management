@php
$route = 'admin.gallery.';
@endphp
@if(isset($model))
{!! Form::model($model, ['route' => [$route.'update', $model->id], 'class' => 'form-validate-jquery', 'id' => 'content_form', 'method' => 'PUT', 'files' => true]) !!}
@else
{!! Form::open(['route' => $route.'store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
@endif
     <div class="row">
      <div class="col-md-12">

        <div class="form-group">
            {{ Form::label('image', _lang('image') , ['class' => 'col-form-label']) }}
             <input type="file" name="image" id="image" class="dropify" data-default-file="{{isset($model)?asset('storage/gallery/'.$model->image):''}}" />
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