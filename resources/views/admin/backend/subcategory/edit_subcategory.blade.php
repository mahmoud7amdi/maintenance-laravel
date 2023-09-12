@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="row">
        <div class="col-md-9 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit SubCategory</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form id="myForm" method="post" action="{{ route('update.subcategory') }}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf

                        <input type="hidden" name="id" value="{{ $subcategory->id }}">
                        <input type="hidden" name="old_image" value="{{ $subcategory->subcategory_image }}">

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Category Name</label>
                            <div class="col-md-6 col-sm-3 ">
                                <select name="category_id" required class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">SubCategory Name</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input type="text"  required name="subcategory_name" class="form-control" value="{{ $subcategory->subcategory_name }}">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">SubCategory Slug</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input type="text" required name="subcategory_slug" class="form-control" value="{{ $subcategory->subcategory_slug }}">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">SubCategory image</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input type="file"  name="subcategory_image" class="form-control" id="image">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">SubCategory image</label>
                            <div class="col-md-6 col-sm-9 ">
                                <img id="showImage" src="{{ asset($subcategory->subcategory_image) }}" alt="Admin" style="width: 100px; height: 100px;" width="110">
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
