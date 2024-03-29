         <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/admin/dashboard') }}" class="brand-link">
            <img src="admin_assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
            <span class="brand-text font-weight-light">Admin Daily Shop</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar user panel (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                     <img src="admin_assets/dist/img/crush.jpg" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                     <a href="#" class="d-block">Anh Tú K14-FPL HN</a>
                  </div>
               </div>
               <!-- Sidebar Menu -->
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                     <li class="nav-item has-treeview menu-open">
                        <a href="{{ url('/admin/dashboard') }}" class="nav-link active">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                              Dashboard
                           </p>
                        </a>
                     </li>
                     @role('Administrator')
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-american-sign-language-interpreting"></i>
                           <p>
                              Users
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">6</span>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{ url('admin/user') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Show All Users</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ route('addrole') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Roles</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ route('addrole') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Permission (Updating)</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                           <i class="nav-icon far fa-star"></i>
                           <p>
                              Coupons
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">6</span>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{ url('admin/coupons') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Show All Coupons</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ url('admin/coupons/add-coupons') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add Coupons</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     @endrole

                     @hasanyrole('Editor|Writer|Administrator')
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-eye"></i>
                           <p>
                              Posts
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">6</span>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{ url('admin/post') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Show All Posts</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ url('admin/post/add-post') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add Post</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     @endhasanyrole
                     
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-play"></i>
                           <p>
                              Slides
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">6</span>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{ url('admin/slides') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Show All Slides</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ url('admin/slides/add-slides') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add Slides</p>
                              </a>
                           </li>
                        </ul>
                     </li>

                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                           <i class="nav-icon far fa-calendar-alt"></i>
                           <p>
                              Products
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">6</span>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{ url('admin/products/add-product') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add Products</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ url('admin/products') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>List Product</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-chart-pie"></i>
                           <p>
                              Cate
                              <i class="right fas fa-angle-left"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{ url('admin/cate/add-cate') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add Cate</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ url('admin/cate') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>List Cate</p>
                              </a>
                           </li>
                        </ul>
                     </li>

                     <li class="nav-item">
                        <a href="{{ url('admin/bills') }}" class="nav-link">
                           <i class="nav-icon fas fa-calendar-alt"></i>
                           <p>
                              Bills
                              <span class="badge badge-info right">2</span>
                           </p>
                        </a>
                     </li>

                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                           <i class="nav-icon far fa-envelope"></i>
                           <p>
                              Contacts
                              <i class="right fas fa-angle-left"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{ url('admin/contacts') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Contact</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ route('emailads') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Email Ads</p>
                              </a>
                           </li>
                        </ul>   
                     </li>
                     
                  </ul>
               </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>
        