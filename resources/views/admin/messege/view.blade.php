
 <div class="tile">
    <h3 class="tile-title">
    	{{ $slug }} {{ _lang('Item') }}
    </h3>

    <div class="tile-body">
    	<b>{{ _lang("Date ") }}</b> : {{ date('d/M/Y - H:m', strtotime($messege->created_at)) }}
    </div>
    <hr>

    <div class="tile-body">
    	{{ $messege->subject }}
    </div>
     <hr>

      <div class="tile-body">
    		{!! $messege->messege !!}
    </div>
 </div>