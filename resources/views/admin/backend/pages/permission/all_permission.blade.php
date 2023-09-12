@extends('admin.admin_dashboard')
@section('admin')


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All Permission</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Default Example <small>Users</small></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <div class="ms-auto">
                                <div class="btn-group">
                                    <a href="{{ route('add.permission') }}" class="btn btn-primary">Add Permission</a>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Permission Name</th>
                                            <th>Group Name</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($permissions as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->group_name }}</td>

                                                <td class="d-flex">
                                                    <a href="{{ route('edit.permission',$item->id) }}" class="btn btn-info mx-1">Edit</a>
                                                    <a href="{{ route('delete.permission',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>

                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Permission Name</th>
                                            <th>Group Name</th>
                                            <th>Action</th>

                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
