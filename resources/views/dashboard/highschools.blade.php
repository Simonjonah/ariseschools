@include('dashboard.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Secondary Schools</h1>
          </div>
          <div class="col-sm-6">
            @if (Auth::guard('web')->user()->promotion == 'Secondary')
               @foreach ($view_classess as $view_classes)
            <ol class="breadcrumb float-sm-right">
              Class
                  <a href="{{ url('web/classes/'.$view_classes->classname) }}">{{ $view_classes->classname }}</a>
            </ol>
            @endforeach
            @else
              
            @endif
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="color: red">Your {{ Auth::guard('web')->user()->section }} Center</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Classes</th>
                      <th>Subjects</th>
                      <th>Lastname</th>
                      <th>Term</th>
                      {{-- <th>Centername</th> --}}
                      <th>Images</th>
                      <th>View</th>
                      <th>Status</th>
                      <th>Actions</th>
  
                      <th>Admit No</th>
                      {{-- <th>Form No</th> --}}
                      {{-- <th>Edit</th>
                      <th>Reject</th>
                      <th>Assigned </th>
                      <th>Suspend</th>
                      <th>Admit</th> --}}
                      
                      <th>View Subjects</th>
                      {{-- <th>Delete</th> --}}
                      {{-- <th>I.T Status</th> --}}
  
                      <th>Date</th>
  
                    </tr>
                  </thead>
                  <tbody>
                  {{-- @if (Auth::guard('web')->user()->promotion == 'Creche Head') --}}
                  @if (Auth::guard('web')->user()->promotion == 'Secondary')
                    @foreach ($view_highstudents as $view_highstudent)
                    @if ($view_highstudent->section == Auth::guard('web')->user()->section && $view_highstudent->status == null)
                      <tr>
                        <td>{{ $view_highstudent->classname }}</td>
                        <td>{{ $view_highstudent->middlename }}</td>
                        <td>{{ $view_highstudent->fname }}</td>
                        <td>{{ $view_highstudent->term }}</td>
                        <td>{{ $view_highstudent->section }}
                        <small style="color: red">Secondary Admin</small>
                        </td>
  
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_highstudent->images")}}" alt=""></td>
                        {{-- <td><a href="{{ url('admin/viewstudents/'.$view_highstudent->ref_no) }}"
                            class='btn btn-default'>
                            <i class="far fa-eye"></i>
                        </a></td> --}}
                        <td>@if ($view_highstudent->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                        @elseif($view_highstudent->status == 'suspend')
                        <span class="badge badge-warning"> Suspended</span>
                        @elseif($view_highstudent->status == 'reject')
                        <span class="badge badge-danger"> Rejected</span>
                        @elseif($view_highstudent->status == 'approved')
                        <span class="badge badge-info"> Approved</span>
                        @elseif($view_highstudent->status == 'admitted')
                        
                        <span class="badge badge-success">Admitted</span>
                        @endif</td>
                        
                      {{-- <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
                       Print
                      </button></td> --}}
                      <td><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                        Action
                      </button>
                      <ul class="dropdown-menu">
                       
                        <li class="dropdown-item"><a href="{{ url('web/highschoolsection') }}">High School Section</a></li>
                      </ul>
                    </div></td>
  
                      <td>{{ $view_highstudent->ref_no1 }}</td>
                        {{-- <td><a href="{{ url('admin/editstudent/'.$view_highstudent->ref_no) }}"
                          class='btn btn-info'>
                          <i class="far fa-edit"></i>
                      </a></td>   --}}
                      
                        
                     
                      <th><a href="{{ url('web/studentsubjectsbyheads/'.$view_highstudent->ref_no1) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a></th>
                     
  
                    

                    <td>{{ $view_highstudent->created_at->format('D d, M Y, H:i')}}</td>
  
                      </tr>
                      @else
                        
                      @endif  
                    
                  @endforeach
                        @else
                        
                      @endif
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Classes</th>
                      <th>Subjects</th>
                      <th>Lastname</th>
                      <th>Term</th>
                      {{-- <th>Centername</th> --}}

                      <th>Images</th>
                      <th>View</th>
                      <th>Status</th>
                      <th>Actions</th>
  
                      <th>Admit No</th>
                      {{-- <th>Form No</th>
                      <th>Edit</th>
                      <th>Reject</th>
                      <th>Assigned </th>
                      <th>Suspend</th>
                      <th>Admit</th> --}}
                      
                      <th>View Subjects</th>
                      {{-- <th>Delete</th> --}}
                      {{-- <th>I.T Status</th> --}}
  
                      <th>Date</th>
  
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2023 <a href="https://golderndayschools.com">goldendayschools.com</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="{{  asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{  asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{  asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{  asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{  asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{  asset('assets/dist/js/adminlte.min.js?v=3.2.0')}}"></script>

<script src="{{  asset('assets/dist/js/demo.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>




</body>
</html>
