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
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Schoolname</th>
                    <th>Phone</th>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Ref NO</th>
                    <th>Plan</th>
                    <th>Logo</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Action</th>
                   
                    <th>Delete</th>

                    <th>Date</th>

                  </tr>
                  </thead> 
                  @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif

                        @if (Session::get('fail'))
                        <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                        </div>
                    @endif
                  <tbody>

                    @foreach ($viewschool_teachers as $viewschool_teacher)
                      <tr>
                        @if ($viewschool_teacher->user_id == null)
                          <td>No Teacher</td>
                        @else
                        <td><a href="{{ url('web/schoolsteachers/'.$viewschool_teacher->slug) }}" target="_blank" rel="noopener noreferrer">{{ $viewschool_teacher->school['schoolname'] }}</a></td>
                          
                        @endif
                        <td>{{ $viewschool_teacher->phone }}
                          <small>{{ $viewschool_teacher->lga }}</small>
                        </td>

                        <td>{{ $viewschool_teacher->surname }}
                        @if ($viewschool_teacher->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                         @elseif($viewschool_teacher->status == 'suspend')
                         <span class="badge badge-warning"> Suspended</span>
                         @elseif($viewschool_teacher->status == 'transfer')
                         <span class="badge badge-info"> Transfered</span>
                         @elseif($viewschool_teacher->status == 'retired')
                         <span class="badge badge-danger"> Retired</span>
                         @elseif($viewschool_teacher->status == 'reject')
                         <span class="badge badge-warning"> Rejected</span>
                         @else
                         <span class="badge badge-success">Approved</span>
                         @endif
                        </td>
                        <td>{{ $viewschool_teacher->fname }}
                          <small>{{ $viewschool_teacher->classname }}</small>
                        </td>
                        <td>{{ $viewschool_teacher->ref_no }}</td>
                        <td>{{ $viewschool_teacher->schooltype }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$viewschool_teacher->logo")}}" alt=""></td>
                        <td><a href="{{ url('web/viewprim/'.$viewschool_teacher->ref_no) }}"
                          class='btn btn-default'>
                           <i class="far fa-eye"></i>
                       </a></td>
                       <td><a href="{{ url('web/editprim/'.$viewschool_teacher->ref_no) }}"
                        class='btn btn-info'>
                         <i class="far fa-edit"></i>
                     </a></td>
                     <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('web/primsaddmit/'.$viewschool_teacher->ref_no) }}">Approved</a></li>
                          <li class="dropdown-item"><a href="{{ url('web/rejectprim/'.$viewschool_teacher->ref_no) }}">Reject</a></li>
                          <li class="dropdown-item"><a href="{{ url('web/suspendprim/'.$viewschool_teacher->ref_no) }}">Suspend</a></li>
                          <li class="dropdown-item"><a href="{{ url('web/tranferprim/'.$viewschool_teacher->ref_no) }}">Transfer</a></li>
                          <li class="dropdown-item"><a href="{{ url('web/retiredprim/'.$viewschool_teacher->ref_no) }}">Retired</a></li>
                        </ul>
                      </div></td>
                

                   <td><a href="{{ url('web/primdelete/'.$viewschool_teacher->ref_no) }}"
                      class='btn btn-danger'>
                      <i class="far fa-trash-alt"></i>
                     
                   </a></td>
                       
                        
                     <td>{{ $viewschool_teacher->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                    
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Schoolname</th>

                        <th>Phone</th>
                        <th>Surname</th>
                        <th>First Name</th>
                        <th>Ref NO</th>
                        <th>Plan</th>
                        <th>Logo</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Action</th>
                        <th>Delete</th>
    
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
    <strong>Copyright &copy; 2023 <a href="#">Arise Schools</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="../../assets/plugins/jquery/jquery.min.js"></script>

<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../assets/plugins/jszip/jszip.min.js"></script>
<script src="../../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="../../assets/dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="../../assets/dist/js/demo.js"></script>

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
