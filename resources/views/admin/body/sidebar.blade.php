<div class="col-md-3 content left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>{{ trans('admin.maintenance') }}</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            @php
                $id = Auth::user()->id;
                $adminData = App\Models\User::find($id);
            @endphp
            <div class="profile_pic">
                <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome</span>
                <h2>{{ $adminData->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">


                    <li>
                        <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>






                    <li>
                        <a><i class="fa fa-list"></i> Category <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('all.category') }}">All Category</a></li>
                            <li><a href="{{ route('add.category') }}">Add Category</a></li>
                        </ul>
                    </li>



                    <li>
                        <a><i class="fa fa-list"></i>SubCategory <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('all.subcategory') }}" >All SubCategory</a></li>
                            <li><a href="{{ route('add.subcategory') }}">Add SubCategory</a></li>
                        </ul>
                    </li>



                    <li>
                        <a><i class="fa fa-list"></i>Slider Manage <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="general_elements.html">General Elements</a></li>
                            <li><a href="media_gallery.html">Media Gallery</a></li>
                        </ul>
                    </li>



                    <li>
                        <a><i class="fa fa-list"></i> Banner Manage <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="general_elements.html">General Elements</a></li>
                            <li><a href="media_gallery.html">Media Gallery</a></li>
                        </ul>
                    </li>


                    <li>
                        <a><i class="fa fa-list"></i> Coupon System <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('all.coupon') }}">All Coupon</a></li>
                            <li><a href="{{ route('add.coupon') }}">Add Coupon</a></li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-home"></i> Shipping Area <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('all.division') }}">All Division</a></li>
                            <li><a href="{{ route('all.district') }}">All District</a></li>
                            <li><a href="{{ route('all.state') }}">All State</a></li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-desktop"></i> Order Manage <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="general_elements.html">General Elements</a></li>
                            <li><a href="media_gallery.html">Media Gallery</a></li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-desktop"></i> User Manage<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="general_elements.html">General Elements</a></li>
                            <li><a href="media_gallery.html">Media Gallery</a></li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-gear"></i> Setting Manage<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="general_elements.html">General Elements</a></li>
                            <li><a href="media_gallery.html">Media Gallery</a></li>
                        </ul>
                    </li>


                    @if(Auth::user()->can('role.permission.menu'))
                    <li>
                        <a><i class="fa fa-desktop"></i> Role And Permission<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('all.permission') }}">All Permission</a></li>
                            <li><a href="{{ route('all.roles') }}">All Roles</a></li>
                            <li><a href="{{ route('add.roles.permission') }}">Roles In Permission</a></li>
                            <li><a href="{{ route('all.roles.permission') }}">All Roles In Permission</a></li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->can('admin'))
                    <li>
                        <a><i class="fa fa-gear"></i> Admin Manage<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('all.admin') }}">All Admin</a></li>
                            <li><a href="{{ route('add.admin') }}">Add Admin</a></li>
                        </ul>
                    </li>
                    @endif

                </ul>
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>


            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('admin.logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>


        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
