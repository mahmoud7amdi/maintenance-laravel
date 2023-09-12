@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="row">
        <div class="col-md-9 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Permission</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form  method="post" action="{{ route('store.permission') }}" class="form-horizontal form-label-left">
                        @csrf



                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Permission Name</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input type="text" required name="name" class="form-control" >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Group Name</label>
                            <div class="col-md-6 col-sm-3 ">
                                <select required name="group_name" class="form-control">

                                    <option value="brand">Brand</option>
                                    <option value="category">Category</option>
                                    <option value="subcategory">Subcategory</option>
                                    <option value="product">Product</option>
                                    <option value="slider">Slider</option>
                                    <option value="ads">Ads</option>
                                    <option value="coupon">Coupon</option>
                                    <option value="area">Area</option>
                                    <option value="vendor">Vendor</option>
                                    <option value="order">Order</option>
                                    <option value="return">Return</option>
                                    <option value="report">Report</option>
                                    <option value="user">User Management</option>
                                    <option value="review">Review</option>
                                    <option value="setting">Setting</option>
                                    <option value="blog">Blog</option>
                                    <option value="role">Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="stock">Stock</option>
                                </select>
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
