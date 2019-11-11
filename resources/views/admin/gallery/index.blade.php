@extends('layouts.app', ['title' => _lang('gallery'), 'modal' => 'lg'])
@push('admin.css')
  <link rel="stylesheet" type="text/css" href="{{asset('backend/css/jquery.fancybox.min.css')}}">
@endpush
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('gallery')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('gallery')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
<!-- Basic initialization -->
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">
              @if (auth()->user()->can('gallery.create'))

              <a href="" class="btn btn-info" id="content_managment" data-url ="{{ route('admin.gallery.create') }}"><i class="icon-stack-plus mr-2"></i>{{_lang('create')}}</a>
              @endif
            </h3>
            <div class="tile-body">
             <div class="row">
           @foreach ($model as $element)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="{{asset('storage/gallery/'.$element->image)}}" class="fancybox" rel="ligthbox">
                    <img  src="{{asset('storage/gallery/'.$element->image)}}" class="zoom img-fluid "  alt="" width="232px" height="200px">
                   
                </a>
                @if (auth()->user()->can('gallery.delete'))
                <button class="btn btn-danger text-center btn-block" id="delete_item" data-id ="{{$element->id}}" data-url="{{route('admin.gallery.destroy',$element->id) }}">{{ _lang('Remove') }}</button>
                @endif
            </div>
            @endforeach   
           </div>
            </div>
          </div>
      </div>
  </div>
<!-- /basic initialization -->
@stop
@push('scripts')
<script type="text/javascript" src="{{asset('backend/js/jquery.fancybox.min.js')}}"></script>
<script src="{{ asset('js/pages/picklist.js') }}"></script>
<script>
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
    
    $(this).addClass('transition');
  }, function(){
        
    $(this).removeClass('transition');
  });
</script>
@endpush

