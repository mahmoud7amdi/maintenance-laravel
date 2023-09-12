@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="row">
        <div class="col-md-9 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Role Permission</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form  method="post" action="{{ route('role.permission.store') }}" class="form-horizontal form-label-left">
                        @csrf



                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Roles Name</label>
                            <div class="col-md-6 col-sm-9 ">
                                <select required name="role_id" class="form-control">

                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultAll">
                            <label class="form-check-label" for="flexCheckDefaultAll">Permission All</label>
                        </div>
                        <hr>


                        @foreach($permission_groups as $group)
                            <div class="row"><!--  // Start row  -->
                                <div class="col-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">{{ $group->group_name }}</label>
                                    </div>
                                </div>

                                <div class="col-9">
                                    @php
                                        $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                    @endphp

                                    @foreach($permissions as $permission)
                                        <div class="form-check">
                                            <input class="form-check-input" name="permission[]" type="checkbox" value="{{ $permission->id }}" id="flexCheckDefault{{ $permission->id }}">
                                            <label class="form-check-label" for="flexCheckDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                    <br>

                                </div>

                            </div><!--  // end row  -->
                        @endforeach





                        <div class="ln_solid"></div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success cent">Submit</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $('#flexCheckDefaultAll').click(function(){
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked',true);
            }else{
                $('input[type = checkbox]').prop('checked',false);
            }
        });
    </script>

@endsection
