<table class="table table-bordered">
	<thead>
		<tr>
			<th>{{_lang('title')}} :{{ $model->title }}</th>
			<th>{{_lang('Star Date')}} :{{ date('F jS', strtotime($model->open_date)) }}</th>
			<th>{{_lang('End Date')}} :{{ date('F jS', strtotime($model->close_date)) }}</th>
		</tr>
	</thead>
</table>

<table class="table table-bordered">
	<thead>
		@foreach ($model->schedule as $element)
		<tr>
			<td style="width:15% ">{{ _lang('Day') }}  <hr><br> {{ $element->day }}</td>
			<td style="width:15% ">{{ _lang('Date') }} <hr><br> {{ date('F jS', strtotime($element->date)) }}</td>
			<td style="width: 70%">{{ _lang('Paln') }}  <hr><br> {!! $element->plan !!} </td>
		</tr>
			
		@endforeach
	</thead>
</table>