@extends('layouts.app', ['title' => _lang('session'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('session')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('session')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
<!-- Basic initialization -->
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">
              <a href="" class="btn btn-info" id="content_managment" data-url ="{{ route('admin.picklist.session.create') }}"><i class="icon-stack-plus mr-2"></i>{{_lang('create')}}</a>
            </h3>
            <div class="tile-body">
              <table class="table table-hover table-bordered content_managment_table">
                <thead>
                  <tr>
                    <th>{{_lang('id')}}</th>
                    <th>{{_lang('name')}}</th>
                    <th>{{_lang('year')}}</th>
                    <th>{{_lang('action')}}</th>
                  </tr>
                </thead>

                <tbody>
                @foreach ($model as $element)
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $element->name }}</td>
                    <td>{{ $element->year }}</td>
                    <td>
                        <ul class="nav nav-tabs" id="action_menu_{{$element->id}}">
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-line-chart" aria-hidden="true"></i></a>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="" id="content_managment" data-url="{{ route('admin.picklist.session.edit',$element->id) }}"><i class="fa fa-pencil-square-o"></i> {{_lang('edit')}}</a>
                              <a class="dropdown-item" href="#" id="delete_item" data-id ="{{$element->id}}" data-url="{{route('admin.picklist.session.destroy',$element->id) }}"><i class="fa fa-trash"></i>{{_lang('delete')}}</a>
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

