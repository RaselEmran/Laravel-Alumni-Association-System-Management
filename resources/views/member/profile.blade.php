@extends('layouts.app', ['title' => _lang('user'), 'modal' => 'lg'])
@section('content')
<!-- Basic initialization -->
      <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="{{auth()->user()->image? asset('storage/student/'.auth()->user()->image):'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg'}}">
              <h4>{{auth()->user()->first_name?auth()->user()->first_name.  auth()->user()->last_name:'John Doe'}}</h4>
              <p>{{getUserRoleName(auth()->user()->id)?getUserRoleName(auth()->user()->id):'Admin'}}</p>
            </div>
              <div class="cover-image" style="background-image: url({{auth()->user()->banner? asset('storage/student/banner/'.auth()->user()->banner):'http://placeimg.com/1200/300/nature'}})"></div>

          </div>
        </div>
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">{{_lang('basic')}}</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">{{_lang('password')}}</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <div class="tile user-settings">
                <div class="tile-body">
                    {!! Form::open(['route' => 'admin.member.profile', 'id'=>'content_form','files' => true, 'method' => 'POST']) !!}
                    <input type="hidden" name="id" value="{{ $user->id }}">

                      <div class="row">
                        <div class="col-md-2">
                        <div class="form-group">
                        {{ Form::label('surname', _lang('Prefix') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('surname', $user->surname, ['class' => 'form-control', 'placeholder' => 'Dr/Mr/Mrs','required'=>'']) }}
                        </div>
                        </div>

                        <div class="col-md-5">
                        <div class="form-group">
                        {{ Form::label('first_name', _lang('first_Name') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('first_name', $user->first_name, ['class' => 'form-control', 'placeholder' => _lang('first_Name'),'required'=>'']) }}
                        </div>
                        </div>

                        <div class="col-md-5">
                        <div class="form-group">
                        {{ Form::label('last_name', _lang('last_Name') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => _lang('last_Name'),'required'=>'']) }}
                        </div>
                        </div>
                </div>

                     <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('email', _lang('email') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => _lang('email'),'required'=>'','readonly'=>'']) }}
                      </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('username', _lang('user_name') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('username', $user->username, ['class' => 'form-control', 'placeholder' => _lang('user_name'),'required'=>'','readonly'=>'']) }}
                      </div>
                  </div>
                 </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('phone', _lang('Phone') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => _lang('Phone'),'required'=>'']) }}
                      </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('designation', _lang('designation') , ['class' => 'col-form-label required']) }}

                        {{ Form::text('designation', $user->student->designation, ['class' => 'form-control', 'placeholder' => _lang('designation'),'required'=>'']) }}
                      </div>
                  </div>
                 </div>

                 <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::label('occupation', _lang('Oppupation') , ['class' => 'col-form-label']) }}
                        {{ Form::textarea('occupation', $user->student->occupation, ['class' => 'form-control', 'placeholder' =>  _lang('Oppupation'), 'style' => 'resize: none;', 'rows' => '3']) }}
                     </div>
                    </div>

                     <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::label('address', _lang('Address') , ['class' => 'col-form-label']) }}
                        {{ Form::textarea('address', $user->student->address, ['class' => 'form-control', 'placeholder' =>  _lang('Address'), 'style' => 'resize: none;', 'rows' => '3']) }}
                     </div>
                  <div class="col-md-12">
                     {{ Form::label('image', _lang('Image') , ['class' => 'col-form-label']) }}
                 
                      <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="{{auth()->user()->image? asset('storage/student/'.auth()->user()->image):'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg'}}" />

                        @if(isset($user) && isset($user->image))
                        <input type="hidden" name="oldimage" value="{{$user->image}}">
                        @endif
                  </div>

                    <div class="col-md-12">
                     {{ Form::label('banner', _lang('Banner') , ['class' => 'col-form-label']) }}
                 
                      <input type="file" name="banner" id="input-file-now-custom-1" class="dropify" data-default-file="{{auth()->user()->banner? asset('storage/student/banner/'.auth()->user()->banner):'http://placeimg.com/1200/300/nature'}}" />

                        @if(isset($user) && isset($user->banner))
                        <input type="hidden" name="oldbanner" value="{{$user->banner}}">
                        @endif
                  </div>
                    </div>
                 </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ _lang('Update Profile') }}
                                </button>
                            </div>
                        </div>
                 {!!Form::close()!!}
                </div>
           </div>
          </div>

           <div class="tab-pane fade" id="user-settings">
            <div class="tile user-settings">
              {!! Form::open(['route' => 'admin.password', 'class'=>'ajax_form','files' => true, 'method' => 'POST']) !!}
               <fieldset class="mb-3" id="form_field">
               <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      {{ Form::label('password', _lang('new_Password') , ['class' => 'col-form-label']) }}

                      {{ Form::password('password', ['class' => 'form-control', 'placeholder' =>_lang('new_Password'),'required'=>'']) }}
                     </div>
                </div>

              <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('password_confirmation', _lang('Confirm Password') , ['class' => 'col-form-label']) }}

                    {{ Form::password('password_confirmation',  ['class' => 'form-control', 'placeholder' =>_lang('Confirm Password'),'required'=>'']) }}
                  </div>
              </div>
             </div>
            <div class="text-right">
              <button type="submit" class="btn btn-primary"  id="submit">{{_lang('change_password')}}<i class="icon-arrow-right14 position-right"></i></button>
              <button type="button" class="btn btn-link" id="submiting" style="display: none;">{{_lang('Processing')}} <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>

             </div>
           </fieldset>
            {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- /basic initialization -->
@stop
@push('scripts')
<script src="{{ asset('js/pages/user.js') }}"></script>
@endpush

