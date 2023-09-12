@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="row">
        <div class="col-md-9 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Permission</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form  method="post" action="{{ route('update.permission') }}" class="form-horizontal form-label-left">
                        @csrf

                        <input type="hidden" name="id" value="{{ $permission->id }}">

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Permission Name</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input type="text" required name="name" class="form-control" value="{{ $permission->name }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Group Name</label>
                            <div class="col-md-6 col-sm-3 ">
                                <select required name="group_name" class="form-control" >

                                    <option value="brand" {{ $permission->group_name == 'brand' ? 'selected': ''}}>Brand</option>
                                    <option value="category"{{ $permission->group_name == 'category' ? 'selected': ''}}>Category</option>
                                    <option value="subcategory"{{ $permission->group_name == 'subcategory' ? 'selected': ''}}>Subcategory</option>
                                    <option value="product"{{ $permission->group_name == 'product' ? 'selected': ''}}>Product</option>
                                    <option value="slider"{{ $permission->group_name == 'slider' ? 'selected': ''}}>Slider</option>
                                    <option value="ads"{{ $permission->group_name == 'ads' ? 'selected': ''}}>Ads</option>
                                    <option value="coupon"{{ $permission->group_name == 'coupon' ? 'selected': ''}}>Coupon</option>
                                    <option value="area"{{ $permission->group_name == 'area' ? 'selected': ''}}>Area</option>
                                    <option value="vendor"{{ $permission->group_name == 'vendor' ? 'selected': ''}}>Vendor</option>
                                    <option value="order"{{ $permission->group_name == 'order' ? 'selected': ''}}>Order</option>
                                    <option value="return"{{ $permission->group_name == 'return' ? 'selected': ''}}>Return</option>
                                    <option value="report"{{ $permission->group_name == 'report' ? 'selected': ''}}>Report</option>
                                    <option value="user"{{ $permission->group_name == 'user' ? 'selected': ''}}>User Management</option>
                                    <option value="review"{{ $permission->group_name == 'review' ? 'selected': ''}}>Review</option>
                                    <option value="setting"{{ $permission->group_name == 'setting' ? 'selected': ''}}>Setting</option>
                                    <option value="blog"{{ $permission->group_name == 'blog' ? 'selected': ''}}>Blog</option>
                                    <option value="role"{{ $permission->group_name == 'role' ? 'selected': ''}}>Role</option>
                                    <option value="admin"{{ $permission->group_name == 'admin' ? 'selected': ''}}>Admin</option>
                                    <option value="stock"{{ $permission->group_name == 'stock' ? 'selected': ''}}>Stock</option>
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
