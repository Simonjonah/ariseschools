@include('dashboard.admin.header')
  <!-- /.navbar -->

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
                      <th>Name</th>
                      <th>Surname </th>
                      <th>Schooltype</th>
                      <th>Email</th>
                      <th>Ref_no</th>
                      <th>Status</th>
                      <th>-</th>
                      <th>Link</th>
                     
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
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
                    @foreach ($view_boards as $view_board)
                    <tr>
                        <td>{{ $view_board->fname }}</td>
                        <td>{{ $view_board->surname }}</td>
                        <td>{{ $view_board->schooltype }}</td>
                        <td>{{ $view_board->email }}</td>
                        <td>{{ $view_board->ref_no1 }}</td>
                        
                        <td>@if ($view_board->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                         @elseif($view_board->status == 'suspend')
                         <span class="badge badge-warning"> Suspended</span>
                         @else
                         <span class="badge badge-success">Approved</span>
                         @endif</td>

                        <td>  @if ($view_board->schooltype == 'SUBEB')
                        <td><a href="{{ url('/schoolsheads/'.$view_board->ref_no1) }}" target="_blank">{{ url('/schoolsheads/'.$view_board->ref_no1) }}</a></tf>
                            
                          @else
                          <td><a href="{{ url('/schoolsprincipals/'.$view_board->ref_no1) }}" target="_blank">{{ url('/schoolsprincipals/'.$view_board->ref_no1) }}</a></tf>
                            
                          @endif
                        </td>
                       
                        
                          
                        

                        

                     <td>{{ $view_board->created_at->format('D d, M Y, H:i')}}</td>
                     {{-- <td><a href="{{ url('admin/downloadcourse/'.$view_board->id) }}" class="btn btn-success"><i class="fas fa-print"></i></a></td> --}}

                      </tr>
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Name</th>
                      <th>Surname </th>
                      <th>Schooltype</th>
                      <th>Email</th>
                      <th>Ref_no</th>
                      <th>Status</th>
                      <th>-</th>
                      <th>Link</th>
                     
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
  <strong>Copyright &copy; 2024 <a href="#">ARISE SCHOOLS</a></strong>
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
