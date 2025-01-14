<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/home') }}" class="brand-link">
    
        <img src="{{ asset('assets/dist/img/logo.jpg') }}" alt="webLTE Logo" class="brand-image "
        style="opacity: .8">
        
   <span class="brand-text font-weight-light">MYSCHOL VTU</span>
 </a>
 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/logo.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">MYSCHOOL VTU</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/vtudashboard') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                WAEC Section
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addwaecscrahcards') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add WAEC Scrach Card</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/viewwaecscrahcards') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View WAEC Scrach Card</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                NECO Section
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addnecoscrahcards') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add NECO Scrash Card</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/viewnecoscrahcards') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View NECO Scrash Card</p>
                </a>
              </li>
             
            </ul>

            <li class="nav-item">
              <a href="{{ url('admin/usedscrahcards') }}" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Used ScrachCards</p>
              </a>
            </li>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
               Phone Airtime
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/mtnairtime') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buy Mtn Airtime</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/airtelairtime') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buy Airtel Airtime</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/gloairtime') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buy Glo Airtime</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/ninemobileairtime') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buy 9mobile Airtime</p>
                </a>
              </li>
             
             
              
              <li class="nav-item">
                <a href="{{ url('admin/viewairtimesales') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Airtime Sales</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="ion ion-wifi text-warning"></i>
              <p>
                Data Subscription
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/mtndata') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buy Mtn Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/airteldata') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buy Airtel Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/glodata') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buy Glo Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/ninemobiledata') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buy 9mobile Data</p>
                </a>
              </li>
             
             
              
              <li class="nav-item">
                <a href="{{ url('admin/viewdatasales') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Data Sales</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/viewsubscribers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Cables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/dstvsub') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DSTV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/gotv') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>GOTV</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('admin/startimesubtv') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Star Time TV</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/showmaxtv') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Showmax TV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewcablesub') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Cable Sub</p>
                </a>
              </li>
            </ul>
          </li>





          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                  Electricity Bill
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/ikedcpay') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IKEDC - IKEJA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/ekedcpay') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>EKEDC - EKO</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('admin/kedcopay') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KEDCO</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/phedpay') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PHED</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/jecpay') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>JED - JOS</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('admin/aedcpay') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>AEDC - ABUJA</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('admin/ibedcPAY') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IBEDC - Ibadan</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('admin/kaedcopay') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KAEDCO – Kaduna</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/eedcpay') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>EEDC – Enugu </p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{ url('admin/bedc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BEDC – Benin</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('admin/abapay') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ABA – ABA </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('admin/yedc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>YEDC – YOLA </p>
                </a>
              </li>
            </ul>
          </li>


            




          
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>