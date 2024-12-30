@include('dashboard.admin.vtu.header')
@include('dashboard.admin.vtu.sidebar')

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
                        <th>Serial Number</th>
                        <th>Pin</th>
                        <th>Amount</th>
                        <th>Type</th>
                       
                        <th>Status</th>
                        <th>View</th>
                        <th>Date</th>
                        <th>Delete</th>
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
                    @foreach ($view_cables as $view_cable)
                  <tr>
                    <td>{{ $view_cable->ref_no }}</td>
                    <td>{{ $view_cable->serviceID }}</td>
                    <td>{{ $view_cable->unit_price }}</td>
                    <td>{{ $view_cable->type }}</td>
                   
                    <td>@if ($view_cable->status == null)
                        <span class="badge badge-primary"> Nothing</span>
                       @elseif($view_cable->status == 'pending')
                       <span class="badge badge-warning"> Initiated</span>
                       @elseif($view_cable->status == 'delivered')
                       <span class="badge badge-success"> Paid</span>
                       @elseif($view_cable->status == 'canceled')
                       <span class="badge badge-danger"> Cancelled</span>
                      
                       @endif</td>
                    <td><a href="{{ url('admin/viewcable/'.$view_cable->ref_no) }}" class="btn btn-info">View</a></td>
                    <td><a href="{{ url('admin/deletecables/'.$view_cable->ref_no) }}" class="btn btn-danger">Delete</a></td>
                    <td>{{ $view_cable->created_at->format('d M, Y') }}</td>
                     
                  </tr>
                    @endforeach
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial Number</th>
                    <th>Pin</th>
                    <th>Amount</th>
                    <th>Type</th>
                   
                    <th>Status</th>
                    <th>View</th>
                    <th>Date</th>
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

  @include('dashboard.admin.vtu.footer')

