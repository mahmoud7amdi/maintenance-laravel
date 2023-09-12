@extends('admin.admin_dashboard')
@section('admin')


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All Admin User</h3>
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
                                    <a href="{{ route('add.admin') }}" class="btn btn-primary">Add Admin User</a>

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
                                            <th>Image </th>
                                            <th>Name </th>
                                            <th>Email </th>
                                            <th>Phone </th>
                                            <th>Role </th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($alladminuser as $key => $item)
                                            <tr>
                                                <td> {{ $key+1 }} </td>
                                                <td> <img src="{{ (!empty($item->photo)) ? url('upload/admin_images/'.$item->photo):url('upload/no_image.jpg') }}" style="width: 50px; height:50px;" >  </td>

                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>
                                                    @foreach($item->roles as $role)
                                                        <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                                    @endforeach
                                                </td>

                                                <td>
                                                    <a href="{{ route('edit.admin.role',$item->id) }}" class="btn btn-info">Edit</a>
                                                    <a href="{{ route('admin.delete.role',$item->id) }}" class="btn btn-danger" >Delete</a>

                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Image </th>
                                            <th>Name </th>
                                            <th>Email </th>
                                            <th>Phone </th>
                                            <th>Role </th>
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
