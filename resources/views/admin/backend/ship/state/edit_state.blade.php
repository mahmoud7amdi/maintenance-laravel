@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="row">
        <div class="col-md-9 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit State</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form  method="post" action="{{ route('update.state') }}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf
                        <input type="hidden" name="id" value="{{ $state->id }}">

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Division Name</label>
                            <div class="col-md-6 col-sm-3 ">
                                <select required name="division_id" class="form-control">
                                    @foreach($division as $item)
                                        <option value="{{ $item->id }}"{{ $item->id == $state->division_id ? 'selected' : '' }}>{{ $item->division_name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">district Name</label>
                            <div class="col-md-6 col-sm-3 ">
                                <select required name="district_id" class="form-control">
                                    @foreach($district as $item)
                                        <option value="{{ $item->id }}"{{ $item->id == $state->district_id ? 'selected' : '' }}>{{ $item->district_name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">District Name</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input required type="text"  name="state_name" value="{{ $state->state_name }}" class="form-control" >
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
