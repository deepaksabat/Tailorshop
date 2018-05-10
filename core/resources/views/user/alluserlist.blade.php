@extends('admin.layouts.master')

@section('content')

 <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-green"></i>
                        <span class="caption-subject font-green bold uppercase">All Staff List of Shop</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle  btn-success" href="{{url('add-staff')}}">
                           <i class="fa fa-plus"></i> Add New Staff
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table">
                        <table id="data-table-button" class="table table-bordered table-striped">
                <thead>
                    <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>UserName</th>
                          <th>Current Role</th>
                          <th>Create Date</th>
                        @if(Auth()->user()->is_permission==3 || Auth()->user()->is_permission==4)
                            <th>Assign New Role</th>
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                  <tr>
                    <td id="user_id">{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                    <td>
                      @if($user->is_permission==3)
                      Admin
                      @elseif($user->is_permission==4)
                      Superadmin
                        @elseif($user->is_permission==1)
                        Salesman
                      @elseif($user->is_permission==2)
                      Tailor
                      @else
                      Not Assign
                      @endif
                    </td>
                     <td>
                         {{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}
                     </td>
                      @if(Auth()->user()->is_permission==3 || Auth()->user()->is_permission==4)
                              <td>
                                    @if($user->is_permission==4)
                                      <button type="button" class="btn red btn-outline">Unavailable</button>
                                    @else
                                    <select id="role_id">
                                        @if($user->is_permission==0)
                                            <option value="" disabled>Select Role</option>
                                            <option value="0"selected>Not Assign</option>
                                            <option value="1">Salesman</option>
                                            <option value="2">Tailor</option>
                                            <option value="3">Admin</option>
                                        @elseif($user->is_permission==1)
                                            <option value="" disabled>Select Role</option>
                                            <option value="0">Not Assign</option>
                                            <option value="1" selected>Salesman</option>
                                            <option value="2" >Tailor</option>
                                            <option value="3">Admin</option>
                                        @elseif($user->is_permission==2)
                                            <option value="" disabled>Select Role</option>
                                            <option value="0">Not Assign</option>
                                            <option value="1">Salesman</option>
                                            <option value="2" selected>Tailor</option>
                                            <option value="3">Admin</option>
                                        @else($user->is_permission==3)
                                            <option value="" disabled>Select Role</option>
                                            <option value="0">Not Assign</option>
                                            <option value="1" selected>Salesman</option>
                                            <option value="2">Tailor</option>
                                            <option value="3" selected>Admin</option>
                                        @endif
                                    </select>@endif
                              </td>
                            <td>
                                @if($user->is_permission==4)
                                    <button type="button" class="btn red btn-block">Unavailable</button>
                                @else
                                    <button type="button" class="btn green btn-block" id="submit-role">Submit Request</button>
                                @endif
                            </td>
                        @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <script>
 	$(document).ready(function(){
    $('#data-table-button').dataTable();

         $(document).on('click','#submit-role',function(){
               var user_id = $(this).closest('tr').find('td:first').text();
         	   var role_id = $(this).closest('tr').find('#role_id option:selected').attr('value');
                if(role_id==""){
                    alert("Please select atleast one role!");
                        return false;
                 }
                else{
                alert('Role Assign Successfully');
                     }

              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                          });

              $.ajax({
                type:"POST",
                url:"{{route('set-user-role')}}",
                data:{
                  'user_id'            :  user_id,
                  'role_id'        	   :  role_id,
                },
                success:function(data){
                    console.log(data);
                }
              });

             location.reload();
         });
})
</script>
          
@endsection