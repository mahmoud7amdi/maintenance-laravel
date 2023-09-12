@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="row">
        <div class="col-md-9 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add State</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form  method="post" action="{{ route('store.state') }}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Division Name</label>
                            <div class="col-md-6 col-sm-3 ">
                                <select required name="division_id" class="form-control">
                                    <option selected="">Open This Select Menu</option>
                                    @foreach($division as $item)
                                        <option value="{{ $item->id }}">{{ $item->division_name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">District Name</label>
                            <div class="col-md-6 col-sm-3 ">
                                <select required name="district_id" class="form-control">

{{--                                    @foreach($district as $item)--}}
{{--                                        <option value="{{ $item->id }}">{{ $item->district_name }}</option>--}}

{{--                                    @endforeach--}}
                                    <option></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">State Name</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input required type="text"  name="state_name" class="form-control" >
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




    <script type="text/javascript">

        $(document).ready(function(){
            $('select[name="division_id"]').on('change', function(){
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/district/ajax') }}/"+division_id,
                        type: "GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="district_id"]').html('');
                            var d =$('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id + '">' + value.district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>




@endsection
