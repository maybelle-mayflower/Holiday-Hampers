<?php
include './config/db.php';
include './seller_functions/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <title>Hampers - Merchant's Portal</title>
  <link rel="stylesheet" href="assets/css/vendor.bundle.css">
  <link rel="stylesheet" href="assets/css/app.bundle.css">
  <link rel="stylesheet" href="assets/css/theme-a.css">
</head>

<body>
  <div id="app_wrapper">
    <header id="app_topnavbar-wrapper">
      <nav role="navigation" class="navbar topnavbar">
        <div class="nav-wrapper">
          <ul class="nav navbar-nav pull-left left-menu">
            <li class="app_menu-open">
              <a href="javascript:void(0)" data-toggle-state="app_sidebar-left-open" data-key="leftSideBar">
                <i class="zmdi zmdi-menu"></i>
              </a>
            </li>
          </ul>
          <ul class="nav navbar-nav left-menu hidden-xs">
            <li>
              <a href="javascript:void(0)" class="nav-link">
                <span>Home</span>
              </a>
            </li> 
          </ul>
          <ul class="nav navbar-nav pull-right">
            <li class="dropdown avatar-menu">
              <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                <span class="meta">
                  <span class="avatar">
                    <img src="assets/img/profiles/02.jpg" alt="" class="img-circle max-w-35">
                    <i class="badge mini success status"></i>
                  </span>
                  <span class="name">Maybelle Mem-Otaji</span>
                  <span class="caret"></span>
                </span>
              </a>
              <ul class="dropdown-menu btn-primary dropdown-menu-right">
                <li>
                  <a href="page-profile.html"><i class="zmdi zmdi-account"></i> Profile</a>
                </li>
                <li>
                  <a href="javascript:void(0)"><i class="zmdi zmdi-settings"></i> Account Settings</a>
                </li>
                <li>
                  <a href="javascript:void(0)"><i class="zmdi zmdi-sign-in"></i> Sign Out</a>
                </li>
              </ul>
            </li>
            <li class="select-menu hidden-xs hidden-sm">
              <select class="select form-control country" style="display:none">
                <option option="EN">English</option>
                <option option="ES">Español</option>
                <option option="FN"> Français</option>
                <option option="IT">Italiano</option>
              </select>
            </li>
            <li>
              <a href="javascript:void(0)" data-navsearch-open>
                <i class="zmdi zmdi-search"></i>
              </a>
            </li>
            <li class="dropdown hidden-xs hidden-sm">
              <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                <span class="badge mini status danger"></span>
                <i class="zmdi zmdi-notifications"></i>
              </a>
              <ul class="dropdown-menu dropdown-lg-menu dropdown-menu-right dropdown-alt">
                <li class="dropdown-menu-header">
                  <ul class="card-actions icons  left-top">
                    <li class="withoutripple">
                      <a href="javascript:void(0)" class="withoutripple">
                        <i class="zmdi zmdi-settings"></i>
                      </a>
                    </li>
                  </ul>
                  <h5>NOTIFICATIONS</h5>
                  <ul class="card-actions icons right-top">
                    <li>
                      <a href="javascript:void(0)">
                        <i class="zmdi zmdi-check-all"></i>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <div class="card">
                    <a href="javascript:void(0)" class="pull-right dismiss" data-dismiss="close">
                      <i class="zmdi zmdi-close"></i>
                    </a>
                    <div class="card-body">
                      <ul class="list-group ">
                        <li class="list-group-item ">
                          <span class="pull-left"><img src="assets/img/profiles/11.jpg" alt="" class="img-circle max-w-40 m-r-10 "></span>
                          <div class="list-group-item-body">
                            <div class="list-group-item-heading">Notification Title</div>
                            <div class="list-group-item-text">Notification body</div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
               
                <li class="dropdown-menu-footer">
                  <a href="javascript:void(0)">
                    All notifications
                  </a>
                </li>
              </ul>
            </li>
            <li class="last">
              <a href="javascript:void(0)" data-toggle-state="sidebar-overlay-open" data-key="rightSideBar">
                <i class="mdi mdi-playlist-plus"></i>
              </a>
            </li>
          </ul>
        </div>
        <form role="search" action="" class="navbar-form" id="navbar_form">
          <div class="form-group">
            <input type="text" placeholder="Search and press enter..." class="form-control" id="navbar_search" autocomplete="off">
            <i data-navsearch-close class="zmdi zmdi-close close-search"></i>
          </div>
          <button type="submit" class="hidden btn btn-default">Submit</button>
        </form>
      </nav>
    </header>
    <aside id="app_sidebar-left">
      <div id="logo_wrapper">
        <ul>
          <li class="logo-icon">
            <a href="index.html">
              <div class="logo">
                <img src="assets/img/logo/logo-icon.png" alt="Logo">
              </div>
              <h1 class="brand-text"></h1>
            </a>
          </li>
          <li class="menu-icon">
            <a href="javascript:void(0)" role="button" data-toggle-state="app_sidebar-menu-collapsed" data-key="leftSideBar">
              <i class="mdi mdi-backburger"></i>
            </a>
          </li>
        </ul>
      </div>
      <nav id="app_main-menu-wrapper" class="fadeInLeft scrollbar">
        <div class="sidebar-inner sidebar-push">
          <ul class="nav nav-pills nav-stacked">
            <li class="sidebar-header">NAVIGATION</li>
            <li><a href="index.html"><i class="zmdi zmdi-view-dashboard"></i>Dashboard</a></li>
            <li class="sidebar-header">APP VIEWS</li>
            <li class="nav-dropdown active open"><a href="#"><i class="zmdi zmdi-shopping-cart"></i>Your Store</a>
              <ul class="nav-sub">
                <li class="active"><a href="index.html">Overview</a></li>
                <li><a href="ecom-products.php">Products</a></li>
                
                <li><a href="ecommerce-customers.html">Customers</a></li>
                <li><a href="ecommerce-settings.html">Settings</a></li>
              </ul>
            </li>
            <li><a href="page-profile.html"><i class="zmdi zmdi-account"></i>Profile</a></li>
            <li><a href="app-file-manager.html"><i class="zmdi zmdi-folder"></i>File Manager</a></li>
            <li><a href="app-taskboard.html"><i class="zmdi zmdi-view-column"></i>Taskboard</a></li>
            
            <li class="sidebar-header">Your Account</li>
            
            <li><a href="page-invoice.html"><i class="zmdi zmdi-money"></i>Invoice</a></li>
          <li class="nav-dropdown"><a href="#"><i class="zmdi zmdi-lock"></i>Authentication</a>
  <ul class="nav-sub">
    <li><a href="login.html">Login &amp; Register</a></li>
    
    
    <li><a href="lock-screen.html">Lock Screen</a></li>
  </ul>
</li>
<li><a href="index.html"><i class="zmdi zmdi-view-web"></i>Front-end</a></li>
            </ul>
          </div>
        </nav>
      </aside>
      <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">
          <div id="header_wrapper" class="header-md ecom-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-xs-12">
                  <header id="header">
                    <h1>Products</h1>
                    <ol class="breadcrumb">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="javascript:void(0)">E-commerce</a></li>
                      <li class="active">Products</li>
                    </ol>
                  </header>
                </div>
              </div>
            </div>
          </div>
          <div id="content" class="container-fluid">
            <div class="content-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="card card-data-tables product-table-wrapper">
                  <header class="card-heading">
                    <h2 class="card-title">Manage Products</h2>
                    <small class="dataTables_info"></small>
                    <div class="card-search">
                      <div id="productsTable_wrapper" class="form-group label-floating is-empty">
                        <i class="zmdi zmdi-search search-icon-left"></i>
                        <input type="text" class="form-control filter-input" placeholder="Filter Products..." autocomplete="off">
                        <a href="javascript:void(0)" class="close-search" data-card-search="close" data-toggle="tooltip" data-placement="top" title="Close"><i class="zmdi zmdi-close"></i></a>
                      </div>
                    </div>
                    <ul class="card-actions icons right-top">
                      <li id="deleteItems" style="display: none;">
                        <span class="label label-info pull-left m-t-5 m-r-10 text-white"></span>
                        <a href="javascript:void(0)" id="confirmDelete" data-toggle="tooltip" data-placement="top" data-original-title="Delete Product(s)">
                          <i class="zmdi zmdi-delete"></i>
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0)" data-card-search="open" data-toggle="tooltip" data-placement="top" data-original-title="Filter Products">
                          <i class="zmdi zmdi-filter-list"></i>
                        </a>
                      </li>
                      <li class="dropdown" data-toggle="tooltip" data-placement="top" data-original-title="Show Entries">
                        <a href="javascript:void(0)" data-toggle="dropdown">
                          <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        <div id="dataTablesLength">
                        </div>
                      </li>
                      <li>
                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-original-title="Export All">
                          <i class="zmdi zmdi-inbox"></i>
                        </a>
                      </li>
                    </ul>
                  </header>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id="productsTable" class="mdl-data-table product-table m-t-30" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th data-orderable="false" class="col-xs-1">
                              <span class="checkbox">
                                <label>
                                  <input type="checkbox" value="" id="checkAll">
                                  <span class="checkbox-material"></span>
                                </label>
                              </span>
                            </th>
                            <th data-orderable="false" class="col-xs-2">Image</th>
                            <th class="col-xs-2">Category</th>
                            <th class="col-xs-2">Product Title</th>
                            <th class="col-xs-2">Price</th>
                            
                           
                            <th data-orderable="false" class="col-xs-2">
                              <button class="btn btn-primary btn-fab  animate-fab" data-toggle="modal" data-target="#product_add_modal"><i class="zmdi zmdi-plus"></i></button>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php get_merchantPro(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
              <aside class="drawer-right-lg mw-lightGray drawer-fixed ecom-edit-panel">
              <div class="drawer-content">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Edit Info
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      <div class="card">
                        <div class="card-body">
                          <form>
                            <div class="form-group label-floating">
                              <label class="control-label">Title</label>
                              <input type="text" class="form-control" value="A Gaggle of Triangles">
                            </div>
                            <div class="form-group">
                              <div id="edit_product_desc">Say hello to a triangular cluster of neatly organized chaos, wrapped in a tasty cyan-to-magenta rainbow roll and deep-fried to imperfection.</div>
                            </div>
                            <div class="chips chips-placeholder"></div>
                            <div class="form-group label-floating is-empty">                             
                                <label id="edit_product_price" class="control-label">Price</label>
                                <input type="text" class="form-control" name="product_price">
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Tags/Keywords</label>
                                <input type="text" class="form-control" name="product_keyword">
                                
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            <footer class="drawer-footer">
              <button type="button" class="btn btn-default" data-dismiss="drawer">Cancel</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </footer>
            <section id="chat_compose_wrapper">
              <footer id="compose-footer">
                <form class="form-horizontal compose-form">
                  <ul class="card-actions icons left-bottom">
                    <li>
                      <a href="javascript:void(0)">
                        <i class="zmdi zmdi-attachment-alt"></i>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <i class="zmdi zmdi-mood"></i>
                      </a>
                    </li>
                  </ul>
                  <div class="form-group m-10 p-l-75 is-empty">
                    <div class="input-group">
                      <label class="sr-only">Leave a comment...</label>
                      <input type="text" class="form-control form-rounded input-lightGray" placeholder="Leave a comment..">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-blue btn-fab  btn-fab-sm">
                          <i class="zmdi zmdi-mail-send"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                </form>
              </footer>
            </section>
          </div>
        </aside>
      </div>
        <footer id="footer_wrapper">
          <div class="footer-content">
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <h6>Want to Work with Us?</h6>
                <p>Paleo flexitarian bushwick letterpress, ea migas yr adipisicing. Man bun tacos tumblr kombucha, yuccie banjo affogato dolore gentrify retro chartreuse. Anim austin tempor ethical, sapiente food truck fanny pack farm-to-table.
                  Culpa keytar esse tilde hoodie, art party nostrud messenger bag authentic helvetica kinfolk cred eu affogato forage.</p>
                </div>
                <div class="col-xs-12 col-sm-2">
                  <h6>Company</h6>
                  <ul>
                    <li><a href="javascript:void(0)">About Us </a></li>
                    <li><a href="javascript:void(0)">Careers</a></li>
                    <li><a href="javascript:void(0)">Privacy Policy</a></li>
                    <li><a href="javascript:void(0)">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <h6>Email Newsletters</h6>
                  <p>Sign up for new MaterialWrap content, updates, and offers.</p>
                  <div class="form-group is-empty">
                    <div class="input-group">
                      <label class="control-label sr-only" for="footerEmail">Email Address</label>
                      <input type="email" class="form-control" id="footerEmail" placeholder="Enter your email address...">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-white btn-fab animate-fab btn-fab-sm">
                          <i class="zmdi zmdi-mail-send"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row copy-wrapper">
                <div class="col-xs-8">
                  <p class="copy">&copy; Copyright <time class="year"></time>All Rights Reserved</p>
                </div>
                <div class="col-xs-4">
                  <ul class="social">
                    <li>
                      <a href="javascript:void(0)"> </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"> </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"> </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"> </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
        </section>
        <aside id="app_sidebar-right">
          <div class="sidebar-inner sidebar-overlay">
            <div class="tabpanel">
              <ul class="nav nav-tabs nav-justified">
                <li role="presentation"><a href="#sidebar_activity" data-toggle="tab">Activity</a></li>
                <li role="presentation"><a href="#sidebar_settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div>
          </div>
        </aside>
      </div>
      <div class="modal fade" id="product_add_modal" tabindex="-1" role="dialog" aria-labelledby="tab_modal">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header p-b-15">
              
              <h4 class="modal-title">Product Setup</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
                
              </ul>
            </div>
            <div class="modal-body p-0">
              <div class="tabpanel">
                <ul class="nav nav-tabs p-0">
                  <li class="active" role="presentation"><a href="#product_add_general" data-toggle="tab" aria-expanded="true">Product Info</a></li>
                </ul>
              </div>
              
              <div class="tab-content">
                <div class="tab-pane fadeIn active" id="product_add_general">
                  <div class="card card p-20 p-t-10 m-b-0">
                    <div class="card-body">
                      <form class="form-horizontal" action="insert_btn.php" method="post" enctype="multipart/form-data">
                        <div class="form-group label-floating is-empty">
                          <label class="control-label">Title</label>
                          <input type="text" class="form-control" name="product_title" required="">
                        </div>
                          <div class="form-group">	
				<label class="header">Category <span>:</span></label>
                                <select name="product_cat" required="">
                                    <option>Select a category</option>
                                    <?php getCat();?>
                                </select>
			</div>
                        <div class="form-group">
                            <label class="control-label">Product Description</label>
                            <div id="add_product_desc">
                                <input type="text" class="form-control" name="product_desc">
                            </div>
                        </div>
                        
                        <div class="form-group label-floating is-empty">
                                <!--<span class="input-group-addon">N</span>-->
                                <label class="control-label">Price</label>
                                <input type="text" class="form-control" name="product_price">
                        </div>
                        <div class="form-group label-floating is-empty">
                                <label class="control-label">Tags/Keywords</label>
                                <input type="text" class="form-control" name="product_keyword">
                                <!--<div class="chips chips-placeholder"></div>-->
                                
                        </div>
                        <div class=""> 
                            <label class="control-label">Image</label>
                            <input type="file" id="pro_img" name="product_image"/>
                        </div>
                          <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="insert_pro" class="btn btn-primary" value="Add Product">
                        <div class="clear"></div>  
                        </div>	
                      </form>

                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- modal-content -->
          </div>
          <!-- modal-dialog -->
        </div>
        <script src="assets/js/vendor.bundle.js"></script>
        <script src="assets/js/app.bundle.js"></script>
      </body>
      
      </html>
