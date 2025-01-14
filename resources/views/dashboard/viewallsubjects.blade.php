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
            <h1> Subjects</h1>
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
  @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
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
                    <th>Subjects</th>
                    <th>Section</th>
                   

                    <th>Edit</th>
                    <th>Assigned Subjects</th>
                    <th>Delete</th>
                    <th>Date</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_mysubjects as $view_mysubject)
                       @if ($view_mysubject->section == 'Primary')
                        <tr>
                            <td>{{ $view_mysubject->subjectname }}</td>
                            <td>{{ $view_mysubject->section }}</td>
                            
                            <td><a href="#"
                             {{-- url('web/assignedsubjects/'.$view_mysubject->id) --}}
                              class='btn btn-info'>
                               <i class="far fa-edit"></i></td>

                               <td><a href="{{ url('web/assignedsubjects/'.$view_mysubject->id) }}"
                                class='btn btn-info'>
                                 <i class="far fa-edit"></i></td>
  
                               <td><a href="{{ url('web/deletesubjectsc/'.$view_mysubject->id) }}"
                                  class='btn btn-danger'>
                                  <i class="far fa-trash-alt"></i>
                              
                              <td>{{ $view_mysubject->created_at->format('D d, M Y, H:i')}}</td>
  
                        
                          </tr>
  
                        @else
                            
                        @endif
                        
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Subjects</th>
                      <th>Section</th>
                     
  
                      <th>Edit</th>
                      <th>Assigned Subjects</th>
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


  @else
    
 
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
                      <th>Subjects</th>
                      <th>Section</th>
                     
  
                      <th>Edit</th>
                      <th>Assigned Subjects</th>
                      <th>Delete</th>
                      <th>Date</th>
  
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_mysubjects as $view_mysubject)
                        @if ($view_mysubject->section == 'Secondary' || $view_mysubject->section == 'Senior Secondary')
                        <tr>
                          <td>{{ $view_mysubject->subjectname }}</td>
                          <td>{{ $view_mysubject->section }}</td>
                          
                          <td><a href="{{ url('web/editsubjectsc/'.$view_mysubject->id) }}"
                            class='btn btn-default'>
                             <i class="far fa-edit"></i></td>

                             <td><a href="#"
                             {{-- url('web/assignedsubjects/'.$view_mysubject->id) --}}
                              class='btn btn-info'>
                               <i class="far fa-edit"></i></td>

                             <td><a href="{{ url('web/deletesubjectsc/'.$view_mysubject->id) }}"
                                class='btn btn-danger'>
                                <i class="far fa-trash-alt"></i>
                            
                            <td>{{ $view_mysubject->created_at->format('D d, M Y, H:i')}}</td>

                      
                        </tr>
  
                        @else
                            
                        @endif
                        
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Subjects</th>
                      <th>Section</th>
                     
  
                      <th>Edit</th>
                      <th>Assigned Subjects</th>
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
                      <th>Subjects</th>
                      <th>Section</th>
                     
  
                      <th>Edit</th>
                      <th>Assigned Subjects</th>
                      <th>Delete</th>
                      <th>Date</th>
  
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_mysubjects as $view_mysubject)
                        @if ($view_mysubject->section == 'Junior Secondary')
                        <tr>
                          <td>{{ $view_mysubject->subjectname }}</td>
                          <td>{{ $view_mysubject->section }}</td>
                          
                          <td><a href="{{ url('web/editsubjectsc/'.$view_mysubject->id) }}"
                            class='btn btn-default'>
                             <i class="far fa-edit"></i></td>

                             <td><a href="#"
                             {{-- url('web/assignedsubjects/'.$view_mysubject->id) --}}
                              class='btn btn-info'>
                               <i class="far fa-edit"></i></td>

                             <td><a href="{{ url('web/deletesubjectsc/'.$view_mysubject->id) }}"
                                class='btn btn-danger'>
                                <i class="far fa-trash-alt"></i>
                            
                            <td>{{ $view_mysubject->created_at->format('D d, M Y, H:i')}}</td>

                      
                        </tr>
  
                        @else
                            
                        @endif
                        
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Subjects</th>
                      <th>Section</th>
                     
  
                      <th>Edit</th>
                      <th>Assigned Subjects</th>
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
    @endif
    



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2024 <a href="#">Arise</a>.</strong> All rights
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
