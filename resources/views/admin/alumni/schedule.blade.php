@php
$route = 'admin.alumni.schedule.';
@endphp
@extends('layouts.app', ['title' => _lang('Alumni- Schedule'), 'modal' => false])
@section('page.header')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> {{_lang('Alumni')}}</h1>
    <p>A free and open source Bootstrap 4 admin template</p>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">{{_lang('Alumni- Schedule')}}</a></li>
  </ul>
</div>
@stop
@section('content')
<div class="row">
  <div class="col-md-12">
   <div class="tile">
    <div class="tile-body">
      {!! Form::open(['route' => $route.'post', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
      <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td style="width: 15%;">{{ _lang('Day') }}</td>
            <td style="width: 20%;">{{ _lang('Date') }}</td>
            <td style="width: 60%;">{{ _lang('Paln') }}</td>
            <td class="text-center font-white" style="width: 5%;">
              <button type="button" id="add" class="btn btn-info">+</button>
            </td>
          </tr>
        </thead>
        <input type="hidden" id="row" value="1">
        <tbody id="item">
          
        </tbody>
      </table>
      </div>
          <div class="text-right mt-2">
        {{ Form::submit(isset($model) ? _lang('update'):_lang('Schedule Plan'), ['class' => 'btn btn-primary btn-lg', 'id' => 'submit']) }}
        <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('ajaxloader.gif') }}" width="80"></button>

       </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>
</div>

@stop
@push('scripts')
<script src="{{ asset('js/pages/extra.js') }}"></script>
<script>
  $(document).ready(function(){
  addNewRow();
  $(document).on('click','#add',function(){
    addNewRow();
  });
function addNewRow()
{
 var row =parseInt($("#row").val());
  $.ajax({
  type: 'GET',
  url: "{{ route('admin.alumni.schedule.value') }}",
  dateType: 'html',
  data:{row:row},
  success:function(data)
  { 
 
  $('#item').append(data);
   $("#row").val(row+1);
   _componenteditor();
   _componentDatefPicker();

  }
})
}

$("#item").on('click','.remmove',function(){
 $(this).closest('tr').remove();
       
})
});
</script>
@endpush
 