@extends('layouts.app', ['title' => _lang('Check-member'), 'modal' => 'lg'])
@section('page.header')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> {{_lang('Check-member')}}</h1>
    <p>A free and open source Bootstrap 4 admin template</p>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">{{_lang('Check-member')}}</a></li>
  </ul>
</div>
@stop
@section('content')
<!-- Basic initialization -->
<div class="row">
  <div class="col-md-12">
    <div class="tile">

      <div class="tile-body">
        <div class="row">
          <div class="col-md-8">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>{{ _lang('Profile') }}</th>
                  <th>
                    <img src="{{asset('storage/student/'.$student->image)}}" alt="" width="120">
                  </th>
                </tr>
                <tr>
                  <th>{{ _lang('Name') }}</th>
                  <th>{{ $student->surname }}.{{ $student->first_name }} {{ $student->last_name }}</th>
                </tr>
                  <tr>
                  <th>{{ _lang('Roll') }}</th>
                  <th>{{ $student->student->roll_no }} </th>
                </tr>
                <tr>
                  <th>{{ _lang('Email') }}</th>
                  <th>{{ $student->email }}</th>
                </tr>
                <tr>
                  <th>{{ _lang('Phone') }}</th>
                  <th>{{ $student->phone }}</th>
                </tr>
                <tr>
                  <th>{{ _lang('Session') }}</th>
                  <th>{{ $student->student->session->name }} [{{ $student->student->session->year }}]</th>
                </tr>
                <tr>
                  <th>{{ _lang('Batch') }}</th>
                  <th>{{ $student->student->batch->name }} [{{ $student->student->batch->year }}]</th>
                </tr>
                <tr>
                  <th>{{ _lang('Alumni') }}</th>
                  <th>{{ $student->student->alumni->title }}</th>
                </tr>
                <tr>
                  <th>{{ _lang('designation') }}</th>
                  <th>{{ $student->student->designation }}</th>
                </tr>
                <tr>
                  <th>{{ _lang('Occupation') }}</th>
                  <th>{{ $student->student->occupation }}</th>
                </tr>
                <tr>
                  <th>{{ _lang('Address') }}</th>
                  <th>{{ $student->student->address }}</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="col-md-4">
            <div class="row">
             <div class="col-md-8">
               <div class="form-group">
                {{ Form::label('roll', _lang('Roll No') , ['class' => 'col-form-label required']) }}

                {{ Form::text('roll', null, ['class' => 'form-control roll', 'placeholder' => _lang('Roll No'),'required'=>'']) }}
              </div>
            </div>
            <div class="col-md-4 mt-3"> <br> 
              <div class="form-group">
                <button class="btn btn-primary" type="button" id="check" data-url="{{ route('admin.register-check-roll') }}" data-id="{{ $student->id }}">{{ _lang('Check') }}</button>
              </div>
            </div>
            <div class="col-md-12">
              <div class="body">
                
              </div>
            </div>
          </div>
        </div>
      </div>
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
<script src="{{ asset('js/pages/result.js') }}"></script>
@endpush

