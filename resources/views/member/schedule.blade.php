@php
date_default_timezone_set('Asia/Dhaka');

$start = $alumni->open_date.' 00:00:00';
$end = $alumni->close_date.' 23:59:59';
$current = strtotime(date('Y-m-d H:i:s'));
@endphp
@extends('layouts.app', ['title' => _lang('Schedule'), 'modal' => 'lg'])
@push('admin.css')
<style>
 #clockdiv{ 
  font-family: sans-serif; 
  color: #fff; 
  display: inline-block; 
  font-weight: 100; 
  text-align: center; 
  font-size: 30px; 
  width: 100%;

} 
#clockdiv > div{ 
  padding: 10px; 
  border-radius: 3px; 
  background: #00BF96; 
  display: inline-block; 
} 
#clockdiv div > span{ 
  padding: 15px; 
  border-radius: 3px; 
  background: #00816A; 
  display: inline-block; 
} 
smalltext{ 
  padding-top: 5px; 
  font-size: 16px; 
} 
</style>
@endpush
@section('content')
<!-- Basic initialization -->
<div class="row">
  <div id="clockdiv" class="tile"> 
    <div> 
      <span class="days" id="day"></span> 
      <div class="smalltext">Days</div> 
    </div> 
    <div> 
      <span class="hours" id="hour"></span> 
      <div class="smalltext">Hours</div> 
    </div> 
    <div> 
      <span class="minutes" id="minute"></span> 
      <div class="smalltext">Minutes</div> 
    </div> 
    <div> 
      <span class="seconds" id="second"></span> 
      <div class="smalltext">Seconds</div> 
    </div> 
    <p id="demo"></p> 
  </div> 
  
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width:15% ">{{ _lang('alumni') }}</th>
              <th style="width: 15%">{{ _lang(' Expire Date') }}</th>
              <th style="width: 5%">{{ _lang('Status') }}</th>
            </tr>
          </thead>
          <thead>
            @foreach ($model->alumni as $element)
            <tr>
             <td>{{ $element->title }}</td>
             <td>{{ date('F jS', strtotime($element->open_date)) }}</td>
             <td>
               @if ($element->status==1)
               <span class="badge badge-info">Processing</span>  
               @else
               <span class="badge badge-danger">Close</span>                          
               @endif
             </td>

           </tr>
           <tr>
            <table class="table table-bordered">
              <thead>
                <th style="width: 15%">{{ _lang('Day') }}</th>
                <th style="width: 20%">{{ _lang('Date') }}</th>
                <th style="width: 65%">{{ _lang('Plan') }}</th>
              </thead>
              @foreach ($element->schedule as $sc)
              <tr>
                <td>
                  {{ $sc->day }}
                </td>
                <td>
                  {{ date('F jS', strtotime($sc->date)) }}
                </td>
                <td>
                 {!! $sc->plan !!}
               </td>
             </tr>
             @endforeach
           </table>
         </tr>
         @endforeach
       </thead>
     </table>
   </div>
 </div>
</div> 
</div>     
<!-- /basic initialization -->

@stop
@push('scripts')
<script> 

  var deadline = new Date("{{ $end }}").getTime(); 
  
  var x = setInterval(function() { 

    var now = new Date().getTime(); 
    var t = deadline - now; 
    var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
    var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
    var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
    var seconds = Math.floor((t % (1000 * 60)) / 1000); 
    document.getElementById("day").innerHTML =days ; 
    document.getElementById("hour").innerHTML =hours; 
    document.getElementById("minute").innerHTML = minutes;  
    document.getElementById("second").innerHTML =seconds;  
    if (t < 0) { 
      clearInterval(x); 
      document.getElementById("demo").innerHTML = "TIME UP"; 
      document.getElementById("day").innerHTML ='0'; 
      document.getElementById("hour").innerHTML ='0'; 
      document.getElementById("minute").innerHTML ='0' ;  
      document.getElementById("second").innerHTML = '0'; } 
    }, 1000); 
  </script>
  @endpush

