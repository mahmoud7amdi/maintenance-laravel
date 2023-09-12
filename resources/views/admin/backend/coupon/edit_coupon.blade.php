@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="row">
        <div class="col-md-9 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Coupon</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form  method="post" action="{{ route('update.coupon') }}"  class="form-horizontal form-label-left">
                        @csrf

                        <input type="hidden" name="id" value="{{ $coupon->id }}">

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Coupon Name</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input type="text" required name="coupon_name" class="form-control" value="{{ $coupon->coupon_name }}">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">coupon discount</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input type="text" required name="coupon_discount" class="form-control" value="{{ $coupon->coupon_discount }}">
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Validity</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input type="date" required name="coupon_validity" class="form-control" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupon->coupon_validity }}">
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


    {{--    show image when change it--}}
    <script type="text/javascript">
        $(document).ready(function (){
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImage').attr('src',e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
