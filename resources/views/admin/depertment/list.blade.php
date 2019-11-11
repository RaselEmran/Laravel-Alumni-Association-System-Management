      <table class="table table-hover table-bordered content_managment_table">
                <thead>
                  <tr>
                    <th>{{ _lang('Name') }}</th>
                    <th>{{ _lang('Roll') }}</th>
                    <th>{{ _lang('Email') }}</th>
                    <th>{{ _lang('Phone') }}</th>
                    <th>{{_lang('Batch')}}</th>
                    <th>{{_lang('Parents')}}</th>
                    <th>{{ _lang('Address') }}</th>
                    <th>{{ _lang('action') }}</th>
                  </tr>
                </thead>

                <tbody>
                @foreach ($model as $element)
                  <tr>
                    <td>{{ $element->name }}</td>
                    <td>{{ $element->roll_no }}</td>
                    <td>{{ $element->email}}</td>
                    <td>{{ $element->phone}}</td>
                    <td>{{ $element->batch->name }}</td>
                    <td>
                      <b>{{ _lang('Father') }} :</b> {{ $element->father_name }} <br>
                      <b>{{ _lang('Mother') }} :</b> {{ $element->mother_name }}
                    </td>
                    <td>
                       {{ $element->address }}
                    </td>
                    <td>
                      <a href="{{ route('admin.depertment.edit',$element->id) }}" class="label label-info"><i class="fa fa-pencil-square-o"></i> {{_lang('edit')}}</a>
                      <a href="" id="delete_item" data-id ="{{$element->id}}" data-url="{{route('admin.depertment.destroy',$element->id) }}" class="label label-danger"><i class="fa fa-trash"></i>{{_lang('delete')}}</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
             
               </table>