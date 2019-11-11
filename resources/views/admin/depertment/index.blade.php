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
              <a href="{{ route('admin.depertment.create') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>{{_lang('create')}}</a>
            </h3>
            <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                  {{ Form::label('session_id', _lang('Session') , ['class' => 'col-form-label required']) }}
                    {!! Form::select('session_id', $session, null, ['class' => 'form-control select session_id', 'data-placeholder' => 'Select A Session','required'=>'', 'data-parsley-errors-container' => '#parsley_division_error_area1']); !!}
                    <span id="parsley_division_error_area1"></span>
                  </div>
                </div>
                <div class="col-md-6 mt-3"> <br> 
                  <div class="form-group">
                  <button class="btn btn-primary" type="button" id="show" data-url="{{ route('admin.depertment.info') }}">{{ _lang('Show') }}</button>
                </div>
            </div>
          </div>
          <hr>
        
            <div class="tile-body">
         
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

