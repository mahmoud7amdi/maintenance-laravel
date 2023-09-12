@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="row">
        <div class="col-md-9 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Category</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form  method="post" action="{{ route('update.category') }}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf

                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <input type="hidden" name="old_image" value="{{ $category->category_image }}">



                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Category Name</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input type="text" required  name="category_name" class="form-control" value="{{ $category->category_name }}">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Category Slug</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input type="text" required name="category_slug" class="form-control" value="{{ $category->category_slug }}">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Category image</label>
                            <div class="col-md-6 col-sm-9 ">
                                <input type="file"  name="category_image" class="form-control" id="image">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Category image</label>
                            <div class="col-md-6 col-sm-9 ">
                                <img id="showImage" src="{{ asset($category->category_image) }}" alt="Admin" style="width: 100px; height: 100px;" width="110">
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
