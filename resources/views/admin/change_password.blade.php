@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content col-lg-6 fw-bold ">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center m-3">
            <h3 class="breadcrumb-title pe-3 ">Admin Change password</h3>

            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container ">
            <div class="main-body">
                <div class="row">


                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ">
                                <form method="post" action="{{ route('update.password') }}" >
                                    @csrf



                                    @if(session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @elseif(session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Old Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" name="old_password" id="current_password" placeholder="old_password"  class="form-control" @error('old_password') is-invalid @enderror  />
                                            @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">New Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" name="new_password" id="new_password" placeholder="New Password"  class="form-control" @error('new_password') is-invalid @enderror  />
                                            @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Confirm New Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm New Password"  class="form-control"   />

                                        </div>
                                    </div>



                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">




                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
