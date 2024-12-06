@include('dashboard.admin.header')
  <!-- Main Sidebar Container -->
  @include('dashboard.admin.sidebar')

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
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Ref NO</th>
                    <th>Gender</th>
                    <th>Logo</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Add Results</th>

                    <th>Date</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($viewstudents as $viewstudent)
                      {{-- @if ($viewstudent->status == null) --}}
                      <tr>
                        <td><a href="{{ url('admin/schoolstudents/'.$viewstudent->user_id) }}" target="_blank" rel="noopener noreferrer">{{ $viewstudent->school['schoolname'] }}</a></td>

                        <td>{{ $viewstudent->surname }}</td>
                        <td>{{ $viewstudent->fname }}</td>
                        <td>{{ $viewstudent->regnumber }}</td>
                        <td>{{ $viewstudent->gender }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$viewstudent->images")}}" alt=""></td>
                        <td><a href="{{ url('admin/viewstudent/'.$viewstudent->ref_no) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td><a href="{{ url('admin/editstudent/'.$viewstudent->ref_no) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>


                       <td><a href="{{ url('admin/addresultsad1/'.$viewstudent->ref_no) }}"
                        class='btn btn-dark'>
                         Add Results
                     </a></td>
                   
                       
                        
                     <td>{{ $viewstudent->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Schoolname</th>
                    
                      <th>Surname</th>
                      <th>First Name</th>
                      <th>Ref NO</th>
                      <th>Gender</th>
                      <th>Logo</th>
                      <th>View</th>
                      <th>Edit</th>
                      <th>Add Results</th>
                     
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
 <!-- /.content-wrapper -->
 <!-- /.content-wrapper -->
 <footer class="main-footer">
  <strong>Copyright &copy; 2023 <a href="#">School</a></strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b>1.1.1
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('assets/dist/js/adminlte.min.js?v=3.2.0') }}"></script>

<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
{{-- @include('dashboard.admin.header') --}}
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
