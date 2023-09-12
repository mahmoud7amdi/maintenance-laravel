@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="row">
        <div class="col-md-9 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Division</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form  method="post" action="{{ route('update.division') }}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf

                        <input type="hidden" name="id"  value="{{ $division->id }}">

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Division Name</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input required type="text"  name="division_name" value="{{ $division->division_name }}" class="form-control" >
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success cent">Submit</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection
