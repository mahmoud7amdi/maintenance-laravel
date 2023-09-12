@extends('admin.admin_dashboard')
@section('admin')


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All Coupon</h3>
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
                                    <a href="{{ route('add.coupon') }}" class="btn btn-primary">Add coupon</a>

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
                                            <th>Coupon Name</th>
                                            <th>coupon discount</th>
                                            <th>Validity</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($coupon as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->coupon_name }}</td>
                                                <td>{{ $item->coupon_discount }}%</td>
                                                <td>{{ \Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}</td>
                                                <td>
                                                    @if($item->coupon_validity >= \Carbon\Carbon::now()->format('Y-m-d'))
                                                        <span class="badge rounded-pill bg-success">Valid</span>
                                                    @else
                                                        <span class="badge rounded-pill bg-danger">Invalid</span>
                                                    @endif
                                                </td>

                                                <td class="d-flex">
                                                    <a href="{{ route('edit.coupon',$item->id) }}" class="btn btn-info mx-1">Edit</a>
                                                    <a href="{{ route('delete.coupon',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>

                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Coupon Name</th>
                                            <th>coupon discount</th>
                                            <th>Validity</th>
                                            <th>status</th>
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
