@extends('layouts.app', ['title' => _lang('Alumni'), 'modal' => 'lg'])
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
<!-- Basic initialization -->
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">
              <a href="{{ route('admin.alumni.create') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>{{_lang('create')}}</a>
            </h3>
            <div class="tile-body">
              <table class="table table-hover table-bordered content_managment_table">
                <thead>
                  <tr>
                    <th>{{_lang('id')}}</th>
                    <th>{{_lang('title')}}</th>
                    <th>{{_lang('Star Date')}}</th>
                    <th>{{_lang('End Date')}}</th>
                    <th>{{_lang('Staus')}}</th>
                    <th>{{_lang('action')}}</th>
                  </tr>
                </thead>

                <tbody>
                @foreach ($model as $element)
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $element->title }}</td>
                    <td>{{ date('F jS', strtotime($element->open_date)) }}</td>
                    <td>{{ date('F jS', strtotime($element->close_date)) }}</td>
                    <td>  
                      <div class="toggle lg">
                      <label id="status_{{$element->id}}" title="{{ $element->status == '1' ? _lang('status_online_to_offline') : _lang('status_offline_to_online') }}" data-popup="tooltip-custom" data-placement="bottom">
                        <input type="checkbox" id="change_status" data-id="{{ $element->id }}" data-status="{{ $element->status }}" data-url="{{ route('admin.alumni.change',['value'=> ($element->status == '1' ? '0' : '1'),'id'=>$element->id])  }}" {{ $element->status == '1' ? 'checked' : '' }} data-fouc ><span class="button-indecator"></span>
                      </label>
                    </div>
                    </td>
                    <td>
                        <ul class="nav nav-tabs" id="action_menu_{{$element->id}}">
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-line-chart" aria-hidden="true"></i></a>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('admin.alumni.edit',$element->id) }}"><i class="fa fa-pencil-square-o"></i> {{_lang('edit')}}</a>

                                <a class="dropdown-item" href="{{ route('admin.alumni.schedule.edit',$element->id) }}"><i class="fa fa-hand-o-right"></i> {{_lang('schedule')}}</a>
                                  <a class="dropdown-item" href="" id="content_managment" data-url="{{ route('admin.alumni.show',$element->id) }}"><i  class="fa fa-eye"></i> {{_lang('Show')}}</a>
                              <a class="dropdown-item" href="#" id="delete_item" data-id ="{{$element->id}}" data-url="{{route('admin.alumni.destroy',$element->id) }}"><i class="fa fa-trash"></i>{{_lang('delete')}}</a>
                            </div>
                          </li>
                      </ul>
                    </td>
                  </tr>
                @endforeach
                </tbody>
             
               </table>
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
<script src="{{ asset('js/pages/picklist.js') }}"></script>
@endpush

