<table class="table table-bordered">
	<thead>
		<tr>
			<th>{{ _lang('Name') }}</th>
			<th>{{ $student->user->surname }}.{{ $student->user->first_name }} {{ $student->user->last_name }}</th>
		</tr>
		<tr>
			<th>{{ _lang('Email') }}</th>
			<th>{{ $student->user->email }}</th>
		</tr>
		<tr>
			<th>{{ _lang('Phone') }}</th>
			<th>{{ $student->user->phone }}</th>
		</tr>
		<tr>
			<th>{{ _lang('Session') }}</th>
			<th>{{ $student->session->name }} [{{ $student->session->year }}]</th>
		</tr>
		<tr>
			<th>{{ _lang('Batch') }}</th>
			<th>{{ $student->batch->name }} [{{ $student->batch->year }}]</th>
		</tr>
		<tr>
			<th>{{ _lang('Alumni') }}</th>
			<th>{{ $student->alumni->title }}</th>
		</tr>
		<tr>
			<th>{{ _lang('designation') }}</th>
			<th>{{ $student->designation }}</th>
		</tr>
		<tr>
			<th>{{ _lang('Occupation') }}</th>
			<th>{{ $student->occupation }}</th>
		</tr>
		<tr>
			<th>{{ _lang('Address') }}</th>
			<th>{{ $student->address }}</th>
		</tr>
		<tr>
			<th>{{ _lang('Image') }}</th>
			<th>
				<img src="{{asset('storage/student/'.$student->user->image)}}" alt="" width="125">
			</th>
		</tr>
	</thead>
</table>