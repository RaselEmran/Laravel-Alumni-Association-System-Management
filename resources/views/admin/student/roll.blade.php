<span style="color: red">{{ _lang('Student Info Form Depertment Database') }}</span>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>
				{{ _lang('Roll') }}
			</td>
			<td>
				<input type="text" class="form-control" value="{{ $check->roll_no }}" readonly>
			</td>
		</tr>
		<tr>
			<td>
				{{ _lang('Name') }}
			</td>
			<td>
				<input type="text" class="form-control" value="{{ $check->name }}" readonly>
			</td>
		</tr>
		<tr>
			<td>
				{{ _lang('Address') }}
			</td>
			<td>
				<input type="text" class="form-control" value="{{ $check->address }}" readonly>
			</td>
		</tr>

		<tr>
			<td>
				<a href="" data-url="{{ route('admin.user.change',['value'=>'activated','id'=>$id]) }}" class="badge badge-info"  id="change_status">{{ _lang('Valid') }}</a>
			</td>
			<td>
				<a href="" data-url="{{ route('admin.user.change',['value'=>'suspend','id'=>$id]) }}" class="badge badge-danger"  id="change_status">{{ _lang('Suspend') }}</a>
			</td>
		</tr>
	</thead>
</table>