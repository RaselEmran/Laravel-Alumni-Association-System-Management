@extends('layouts.auth')
@push('auth.css')
  <link rel="stylesheet" href="{{asset('backend/css/dropify.min.css')}}">
@endpush
@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
             <div class="tile">
                <div class="tile-header">{{ __('Register') }}</div>

                <div class="tile-body">
                    {!! Form::open(['route' => 'register', 'id'=>'content_form','files' => true, 'method' => 'POST']) !!}

                <div class="row">
                        <div class="col-md-2">
                        <div class="form-group">
                        {{ Form::label('surname', _lang('Prefix') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('surname', null, ['class' => 'form-control', 'placeholder' => 'Dr/Mr/Mrs','required'=>'']) }}
                        </div>
                        </div>

                        <div class="col-md-5">
                        <div class="form-group">
                        {{ Form::label('first_name', _lang('first_Name') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => _lang('first_Name'),'required'=>'']) }}
                        </div>
                        </div>

                        <div class="col-md-5">
                        <div class="form-group">
                        {{ Form::label('last_name', _lang('last_Name') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => _lang('last_Name'),'required'=>'']) }}
                        </div>
                        </div>
                </div>

                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('email', _lang('email') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => _lang('email'),'required'=>'']) }}
                      </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('username', _lang('user_name') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => _lang('user_name'),'required'=>'']) }}
                        <input type="hidden" name="alumni_id" value="{{ $alumni->id }}">
                      </div>
                  </div>
                 </div>

                 <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('password', _lang('password') , ['class' => 'col-form-label required']) }}

                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => _lang('password'),'required'=>'']) }}
                      </div>
                  </div>

                  <div class="col-md-6">
                   <div class="form-group">
                        {{ Form::label('password_confirmation', _lang('confirm_password') , ['class' => 'col-form-label required']) }}

                        {{ Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => _lang('confirm_password'),'required'=>'']) }}
                      </div>
                  </div>
                 </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('phone', _lang('Phone') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => _lang('Phone'),'required'=>'']) }}
                      </div>
                  </div>


                  <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('designation', _lang('designation') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('designation', null, ['class' => 'form-control', 'placeholder' => _lang('designation'),'required'=>'']) }}
                      </div>
                  </div>

                    <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('roll_no', _lang('Roll Number') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('roll_no', null, ['class' => 'form-control', 'placeholder' => _lang('Roll Number'),'required'=>'']) }}
                      </div>
                  </div>
                 </div>



                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                      {{ Form::label('batch_id', _lang('Batch') , ['class' => 'col-form-label required']) }}
                        {!! Form::select('batch_id', $batch, null, ['class' => 'form-control select', 'data-placeholder' => 'Select A Batch','required'=>'', 'data-parsley-errors-container' => '#parsley_division_error_area']); !!}
                        <span id="parsley_division_error_area"></span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                  {{ Form::label('session_id', _lang('Session') , ['class' => 'col-form-label required']) }}
                    {!! Form::select('session_id', $session, null, ['class' => 'form-control select', 'data-placeholder' => 'Select A Session','required'=>'', 'data-parsley-errors-container' => '#parsley_division_error_area1']); !!}
                    <span id="parsley_division_error_area1"></span>
                  </div>
                  </div>
                 </div>
                 <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::label('occupation', _lang('Oppupation') , ['class' => 'col-form-label']) }}
                        {{ Form::textarea('occupation', null, ['class' => 'form-control', 'placeholder' =>  _lang('Oppupation'), 'style' => 'resize: none;', 'rows' => '3']) }}
                     </div>
                    </div>

                     <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::label('address', _lang('Address') , ['class' => 'col-form-label']) }}
                        {{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' =>  _lang('Address'), 'style' => 'resize: none;', 'rows' => '3']) }}
                     </div>
                  <div class="col-md-12">
                     {{ Form::label('image', _lang('Image') , ['class' => 'col-form-label']) }}
                 
                      <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="" />
                  </div>
                    </div>
                 </div>
                 <br>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                 {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('backend/js/dropify.min.js')}}"></script>
 <script src="{{asset('js/main.js')}}"></script>
<script src="{{ asset('js/pages/register.js') }}"></script>
@endpush
