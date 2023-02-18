 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link" style="text-align: center">
      <img src="{{URL::asset('public/assets/asset/logo.png')}}" height="70px" alt="">

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-5 pb-3 mb-3 d-flex">
        <div class="image">

        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Panel</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
                <a href="{{url('/admin')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard

                </p>
                </a>

            </li>

            <li class="nav-header">Main Controls</li>
            <li class="nav-item">
                <a href="{{url('admin/leads/show')}}" class="nav-link">
                    <i class="nav-icon fa fa-paper-plane"></i>
                    <p>
                        Leads
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>
                    Properties
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview ">

                    <li class="nav-item">
                        <a href="{{url('admin/properties/show')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Properties</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('admin/properties/locations')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Locations Mgt</p>
                        </a>
                    </li>

                    <li class="nav-item">
                            <a href="{{url('admin/aminites/show')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Amenities</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/types/show')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Type</p>
                        </a>
                    </li>



                </ul>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                    Project
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{url('admin/projects/show')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Project</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{url('admin/projects/locations-mgt')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Location Mgt.</p>
                    </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('admin/features/show')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Features</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/project_type/show')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Project Types</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="pages/examples/invoice.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Status</p>
                        </a>
                    </li> --}}

                </ul>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-map-pin"></i>
                    <p>
                    Communities
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{url('admin/communities/show')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dubai Communities</p>
                    </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="pages/examples/invoice.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Features</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/invoice.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Types</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/examples/invoice.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Status</p>
                        </a>
                    </li> --}}

                </ul>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>
                    Developers
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{url('admin/developer/show')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Developers</p>
                    </a>
                    </li>


                </ul>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{url('admin/agents/show')}}" class="nav-link">
                    <i class="nav-icon fas fa-user-friends"></i>
                    <p>
                        Agents

                    </p>
                </a>


            </li>
            <li class="nav-item">
                <a href="{{url('admin/cities/show')}}" class="nav-link">
                    <i class="nav-icon fas fa-city"></i>
                    <p>
                        Cities

                    </p>
                </a>

                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/location/show')}}" class="nav-link">
                    <i class="nav-icon fas fa-map-marker-alt"></i>
                    <p>
                        Locations

                    </p>
                </a>


            </li>
            <li class="nav-item">
                <a href="{{url('admin/generalsetting/show')}}" class="nav-link">
                    <i class="nav-icon fas fa-sliders-h"></i>
                    <p>
                        General Settings

                    </p>
                </a>


            </li>
            <li class="nav-item">
                <a href="{{url('admin/landingpageseo/show')}}" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        Landing Page SEO

                    </p>
                </a>

            </li>
            <li class="nav-item">
                <a href="{{url('admin/blogs/show')}}" class="nav-link">
                    <i class="nav-icon fas fa-blog"></i>
                    <p>
                        Blogs

                    </p>
                </a>

            </li>
            <li class="nav-item">
                <a href="{{url('admin/invoice/show')}}" class="nav-link">
                    <i class="nav-icon fas fa-receipt"> </i>
                    <p>
                        Invoice

                    </p>
                </a>

            </li>





            <li class="nav-header">Site Data</li>
            <li class="nav-item">
                <a href="{{url('admin/banner/show')}}" class="nav-link">
                    <i class="nav-icon fas fa-file-image"></i>
                    <p>
                    Ad.Banner

                    </p>
                </a>


            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
