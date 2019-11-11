<tr>
	<td>
		{{ Form::text('day[]', null, ['class' => 'form-control', 'placeholder' => _lang('Day'),'required'=>'']) }}
	</td>

	<td>
		{{ Form::text('date[]', null, ['class' => 'form-control date', 'placeholder' => _lang('Date'),'required'=>'']) }}
	</td>

	<td>
		{{ Form::textarea('plan[]', null, ['class' => 'form-control summernote', 'placeholder' =>  _lang('Plan'), 'style' => 'resize: none;', 'rows' => '3','required'=>'']) }}
	</td>

	@if ($row !=1)
	<td>
		<button  type="button" class="btn btn-danger remmove">-</button>
	</td>
	@endif
</tr>