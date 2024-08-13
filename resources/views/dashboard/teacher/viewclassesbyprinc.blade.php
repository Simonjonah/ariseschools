@include('dashboard.teacher.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.teacher.sidebar')

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
                    <th>First name</th>
                    <th>Middlename</th>
                    <th>Surname</th>
                    <th>section</th>
                    <th>Classname</th>
                    <th>Term</th>
                    <th>Gender</th>

                    <th>Images</th>
                    {{-- <th>Status</th> --}}
                    <th>Change Term</th>
                    <th>Add Results</th>
                    <th>Date</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_classnametudents as $view_classnametudent)
                      @if ($view_classnametudent->section == Auth::guard('teacher')->user()->section && $view_classnametudent->schoolname == Auth::guard('teacher')->user()->schoolname && $view_classnametudent->ref_no1 == Auth::guard('teacher')->user()->ref_no1 && $view_classnametudent->slug == Auth::guard('teacher')->user()->slug )
                        <tr>
                          <td>{{ $view_classnametudent->fname }}</td>
                          <td>{{ $view_classnametudent->middlename }}
                          </td>
                          <td>{{ $view_classnametudent->surname }}</td>
                          <td> {{ $view_classnametudent->section }}</td>
                          <td> {{ $view_classnametudent->classname }}
                          @if ($view_classnametudent->regnumber == null)
                            <h2>Please Add Reg number</h2>
                            <a href="{{ url('teacher/addrenumbyteacher/'.$view_classnametudent->ref_no) }}"
                            class='btn btn-default'>Add Reg. Number
                            <i class="far fa-eye"></i>
                            @else
                            <b style="color: red">{{ $view_classnametudent->regnumber }}</b>
                            @endif
                          </td>
                          <td> {{ $view_classnametudent->term }}</td>
                          <td> {{ $view_classnametudent->gender }}</td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_classnametudent->images")}}" alt=""></td>
                          {{-- <td> <span class="badge badge-success">{{ $view_classnametudent->status }}</span></td> --}}
                          
                          <td><a href="{{ url('teacher/changeterm/'.$view_classnametudent->ref_no) }}"
                            class='btn btn-default'>
                             <i class="far fa-edit"></i>
                      
                        

                        <td><a href="{{ url('teacher/addresults/'.$view_classnametudent->ref_no) }}"
                          class='btn btn-info'>
                           Add Results
                       </a></td>

                       <td>{{ $view_classnametudent->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                     @else
                    @endif
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>First name</th>
                      <th>Middlename</th>
                      <th>Surname</th>
                      <th>section</th>
                      <th>Classname</th>
                      <th>Term</th>
                      <th>Gender</th>
  
                      <th>Images</th>
                      {{-- <th>Status</th> --}}
                      <th>Change Term</th>
                      <th>Add Results</th>
                    <th>Delete</th>
                      
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
    <strong>Copyright &copy; 2024 <a href="#">Arise Schools</a>.</strong> All rights
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
