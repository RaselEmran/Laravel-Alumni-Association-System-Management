      <table class="table table-hover table-bordered content_managment_table">
                <thead>
                  <tr>
                    <th>{{_lang('id')}}</th>
                    <th>{{ _lang('Name') }}</th>
                    <th>{{ _lang('Email') }}</th>
                    <th>{{ _lang('Phone') }}</th>
                    <th>{{_lang('Session')}}</th>
                    <th>{{_lang('Batch')}}</th>
                    <th>{{ _lang('action') }}</th>
                  </tr>
                </thead>

                <tbody>
                @foreach ($student as $element)
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $element->user->surname }}.{{ $element->user->first_name }} {{ $element->user->last_name }}</td>
                    <td>{{ $element->user->email }}</td>
                    <td>{{ $element->user->phone }}</td>
                    <td>{{ $element->session->name }}</td>
                    <td>{{ $element->batch->name }}</td>
                    <td>
                       <a class="btn label label-info" href="" id="content_managment" data-url="{{ route('admin.register-list-deatils',$element->id) }}"><i  class="fa fa-eye"></i> {{_lang('Show')}}</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
             
               </table>