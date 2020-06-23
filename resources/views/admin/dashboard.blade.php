@extends('admin.layouts.master')
@section('css')

@endsection
@section('content')
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Dashboard</h1>
               </div>
               <!-- /.col -->
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
               <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                     <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">CPU Traffic</span>
                        <span class="info-box-number">
                        10
                        <small>%</small>
                        </span>
                     </div>
                     <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
               </div>
               <!-- /.col -->
               <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                     <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">41,410</span>
                     </div>
                     <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
               </div>
               <!-- /.col -->
               <!-- fix for small devices only -->
               <div class="clearfix hidden-md-up"></div>
               <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                     <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">Sales</span>
                        <span class="info-box-number">760</span>
                     </div>
                     <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
               </div>
               <!-- /.col -->
               <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                     <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">New Members</span>
                        <span class="info-box-number">2,000</span>
                     </div>
                     <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h5 class="card-title">Monthly Recap Report</h5>
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse">
                           <i class="fas fa-minus"></i>
                           </button>
                           <div class="btn-group">
                              <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                              <i class="fas fa-wrench"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" role="menu">
                                 <a href="#" class="dropdown-item">Action</a>
                                 <a href="#" class="dropdown-item">Another action</a>
                                 <a href="#" class="dropdown-item">Something else here</a>
                                 <a class="dropdown-divider"></a>
                                 <a href="#" class="dropdown-item">Separated link</a>
                              </div>
                           </div>
                           <button type="button" class="btn btn-tool" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                           </button>
                        </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-8">
                              <p class="text-center">
                                 <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                              </p>
                              <div class="chart">
                                 <!-- Sales Chart Canvas -->
                                 <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                              </div>
                              <!-- /.chart-responsive -->
                           </div>
                           <!-- /.col -->
                           <div class="col-md-4">
                              <p class="text-center">
                                 <strong>Goal Completion</strong>
                              </p>
                              <div class="progress-group">
                                 Add Products to Cart
                                 <span class="float-right"><b>160</b>/200</span>
                                 <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 80%"></div>
                                 </div>
                              </div>
                              <!-- /.progress-group -->
                              <div class="progress-group">
                                 Complete Purchase
                                 <span class="float-right"><b>310</b>/400</span>
                                 <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger" style="width: 75%"></div>
                                 </div>
                              </div>
                              <!-- /.progress-group -->
                              <div class="progress-group">
                                 <span class="progress-text">Visit Premium Page</span>
                                 <span class="float-right"><b>480</b>/800</span>
                                 <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" style="width: 60%"></div>
                                 </div>
                              </div>
                              <!-- /.progress-group -->
                              <div class="progress-group">
                                 Send Inquiries
                                 <span class="float-right"><b>250</b>/500</span>
                                 <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" style="width: 50%"></div>
                                 </div>
                              </div>
                              <!-- /.progress-group -->
                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                     </div>
                     <!-- ./card-body -->
                     <div class="card-footer">
                        <div class="row">
                           <div class="col-sm-3 col-6">
                              <div class="description-block border-right">
                                 <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                                 <h5 class="description-header">$35,210.43</h5>
                                 <span class="description-text">TOTAL REVENUE</span>
                              </div>
                              <!-- /.description-block -->
                           </div>
                           <!-- /.col -->
                           <div class="col-sm-3 col-6">
                              <div class="description-block border-right">
                                 <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                                 <h5 class="description-header">$10,390.90</h5>
                                 <span class="description-text">TOTAL COST</span>
                              </div>
                              <!-- /.description-block -->
                           </div>
                           <!-- /.col -->
                           <div class="col-sm-3 col-6">
                              <div class="description-block border-right">
                                 <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                 <h5 class="description-header">$24,813.53</h5>
                                 <span class="description-text">TOTAL PROFIT</span>
                              </div>
                              <!-- /.description-block -->
                           </div>
                           <!-- /.col -->
                           <div class="col-sm-3 col-6">
                              <div class="description-block">
                                 <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                                 <h5 class="description-header">1200</h5>
                                 <span class="description-text">GOAL COMPLETIONS</span>
                              </div>
                              <!-- /.description-block -->
                           </div>
                        </div>
                        <!-- /.row -->
                     </div>
                     <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                     <div class="col-md-8">
                        <!-- DIRECT CHAT -->
                        <div id="chatAdmin"></div>
                        <!--/.direct-chat -->
                     </div>
                     <!-- /.col -->
                     <div class="col-md-4">
                        <!-- USERS LIST -->
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Latest Members</h3>
                              <div class="card-tools">
                                 <span class="badge badge-secondary">8 New Members</span>
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                 </button>
                                 <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                 </button>
                              </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body p-0">
                              <ul class="users-list clearfix">
                                 @foreach ($data['users'] as $user)
                                    <li>
                                       <img src="{{ asset('front_assets/img/user/'.$user->image) }}" alt="User Image">
                                          <a class="users-list-name" href="#">{{ $user->name }}</a>
                                       <span class="users-list-date">{{ date_format($user->created_at, 'Y-m-d') }}</span>
                                    </li>
                                 @endforeach
                              </ul>
                              <!-- /.users-list -->
                           </div>
                           <!-- /.card-body -->
                           <div class="card-footer text-center">
                              <a href="{{ route('user') }}">View All Users</a>
                           </div>
                           <!-- /.card-footer -->
                        </div>
                        <!--/.card -->
                     </div>
                     <!-- /.col -->
                  </div>
            <!-- Main row -->
            <div class="row">
               <!-- Left col -->
               <div class="col-md-8">
                  <!-- MAP & BOX PANE -->
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">US-Visitors Report</h3>
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse">
                           <i class="fas fa-minus"></i>
                           </button>
                           <button type="button" class="btn btn-tool" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                           </button>
                        </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body p-0">
                        <div class="d-md-flex">
                           <div class="p-1 flex-fill" style="overflow: hidden">
                              <!-- Map will be created here -->
                              <div id="world-map-markers" style="height: 325px; overflow: hidden">
                                 <div class="map"></div>
                              </div>
                           </div>
                           <div class="card-pane-right bg-success pt-2 pb-2 pl-4 pr-4">
                              <div class="description-block mb-4">
                                 <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                                 <h5 class="description-header">8390</h5>
                                 <span class="description-text">Visits</span>
                              </div>
                              <!-- /.description-block -->
                              <div class="description-block mb-4">
                                 <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                 <h5 class="description-header">30%</h5>
                                 <span class="description-text">Referrals</span>
                              </div>
                              <!-- /.description-block -->
                              <div class="description-block">
                                 <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                 <h5 class="description-header">70%</h5>
                                 <span class="description-text">Organic</span>
                              </div>
                              <!-- /.description-block -->
                           </div>
                           <!-- /.card-pane-right -->
                        </div>
                        <!-- /.d-md-flex -->
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  
                  <!-- /.row -->
                  <!-- TABLE: LATEST ORDERS -->
                  <div class="card">
                     <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Orders</h3>
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse">
                           <i class="fas fa-minus"></i>
                           </button>
                           <button type="button" class="btn btn-tool" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                           </button>
                        </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body p-0">
                        <div class="table-responsive">
                           <table class="table m-0">
                              <thead>
                                 <tr>
                                    <th>Order ID</th>
                                    <th>Item</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($data['lastOrder'] as $item)
                                 <tr>
                                    <td><a href="">{{ $item->id }}</a></td>
                                    <td>@foreach ($item->ordersPro as $pro)
                                      <div style="border-bottom: 1px solid #ff6666;">
                                         {{ $pro->product_name }}|
                                         ${{ $pro->product_price }}|
                                         {{ $pro->product_quantity }} item
                                      </div>
                                    @endforeach
                                 </td>
                                    <td>@if ($item->order_status == 'Shipped')
                                       <span class="badge badge-success">Shipped</span>
                                    @elseif ($item->order_status == 'New')
                                       <span class="badge badge-warning">New</span>
                                    @elseif ($item->order_status == 'Delivered')
                                       <span class="badge badge-danger">Delivered</span>
                                    @elseif ($item->order_status == 'Error')
                                       <span class="badge badge-info">Error</span>   
                                    @endif
                                 </td>
                                    <td>
                                       <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $item->created_at }}</div>
                                    </td>
                                 </tr>
                                 @endforeach 
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <!-- /.table-responsive -->
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer clearfix">
                        <a href="javascript:void(0)" id="dataOrders" class="btn btn-sm btn-info float-left">Place New Order</a>
                        <a href="{{ url('admin/order') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                     </div>
                     <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
               </div>
               <!-- /.col -->
               <div class="col-md-4">
                  <!-- Info Boxes Style 2 -->
                  <div class="info-box mb-3 bg-warning">
                     <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">Inventory</span>
                        <span class="info-box-number">5,200</span>
                     </div>
                     <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box mb-3 bg-success">
                     <span class="info-box-icon"><i class="far fa-heart"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">Mentions</span>
                        <span class="info-box-number">92,050</span>
                     </div>
                     <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box mb-3 bg-danger">
                     <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">Downloads</span>
                        <span class="info-box-number">114,381</span>
                     </div>
                     <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box mb-3 bg-info">
                     <span class="info-box-icon"><i class="far fa-comment"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">Direct Messages</span>
                        <span class="info-box-number">163,921</span>
                     </div>
                     <!-- /.info-box-content -->
                  </div>
                  <!-- /.card -->
                  <!-- PRODUCT LIST -->
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Recently Added Products</h3>
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse">
                           <i class="fas fa-minus"></i>
                           </button>
                           <button type="button" class="btn btn-tool" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                           </button>
                        </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                           @foreach ($data['product'] as $pro)
                           <li class="item">
                              <div class="product-img">
                                 <img src="{{ asset('front_assets/img/product/'.$pro->image) }}" alt="Product Image" class="img-size-50">
                              </div>
                              <div class="product-info">
                                 <a href="javascript:void(0)" class="product-title">{{ $pro->name }}
                                 <span class="badge @if ($pro->price >= 1000)
                                    badge-warning
                                    @elseif ($pro->price < 1000 && $pro->price >= 700)
                                    badge-info
                                    @elseif ($pro->price < 700 && $pro->price >= 400)
                                    badge-success
                                    @else
                                    badge-danger
                                    @endif 
                                    float-right">${{ $pro->price }}</span></a>
                                 <span class="product-description">
                                 {{ $pro->description }}
                                 </span>
                              </div>
                           </li>
                           @endforeach
                           
                        </ul>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer text-center">
                        <a href="{{ url('admin/products') }}" class="uppercase">View All Products</a>
                     </div>
                     <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
                  <!-- /.info-box -->
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Browser Usage</h3>
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                           </button>
                           <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                           </button>
                        </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-8">
                              <div class="chart-responsive">
                                 <canvas id="pieChart" height="150"></canvas>
                              </div>
                              <!-- ./chart-responsive -->
                           </div>
                           <!-- /.col -->
                           <div class="col-md-4">
                              <ul class="chart-legend clearfix">
                                 <li><i class="far fa-circle text-danger"></i> Chrome</li>
                                 <li><i class="far fa-circle text-success"></i> IE</li>
                                 <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                 <li><i class="far fa-circle text-info"></i> Safari</li>
                                 <li><i class="far fa-circle text-primary"></i> Opera</li>
                                 <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                              </ul>
                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer bg-white p-0">
                        <ul class="nav nav-pills flex-column">
                           <li class="nav-item">
                              <a href="#" class="nav-link">
                              United States of America
                              <span class="float-right text-danger">
                              <i class="fas fa-arrow-down text-sm"></i>
                              12%</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#" class="nav-link">
                              India
                              <span class="float-right text-success">
                              <i class="fas fa-arrow-up text-sm"></i> 4%
                              </span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#" class="nav-link">
                              China
                              <span class="float-right text-warning">
                              <i class="fas fa-arrow-left text-sm"></i> 0%
                              </span>
                              </a>
                           </li>
                        </ul>
                     </div>
                     <!-- /.footer -->
                  </div>
                  
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
         <!--/. container-fluid -->
      </section>
      <!-- /.content -->
   </div>
<style>
   .direct-chat-text {
      width: 90% !important;
   }

   .container-fluid {
     position: relative !important;
     z-index: 0 !important;
   }
</style>
<script src="{{ asset('js/admin.js') }}" type="text/javascript"></script>
@endsection

