




@include('dashboard.admin.vtu.header')


  @include('dashboard.admin.vtu.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">View</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  
                    {{-- <form action="{{ route('admin.creatprofessional') }}" method="post" enctype="multipart/form-data"> --}}
                    @csrf
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
                    
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Variation Code</label>
                    
                      <input type="text" name="variation_code" class="form-control" @error('variation_code') 
                          
                      @enderror value="{{ $view_cables->variation_code }}" id="exampleInputEmail1" placeholder="Serial Number"> 
                    </div>
                    @error('variation_code')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror



                    <div class="form-group">
                      <label for="exampleInputEmail1">Service ID</label>
                    
                      <input type="text" name="pin" class="form-control" @error('pin') 
                          
                      @enderror value="{{ $view_cables->serviceID }}" id="exampleInputEmail1" placeholder="Pin Number"> 
                    </div>
                    @error('pin')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                      <label for="exampleInputEmail1"> Type</label>
                    
                      <select name="type" class="form-control">
                        <option value="{{ $view_cables->type }}">{{ $view_cables->type }}</option>
                      </select>
                    </div>
                    @error('type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="form-group">
                        <label for="exampleInputEmail1"> status</label>
                      
                        <select name="status" class="form-control">
                          <option value="{{ $view_cables->status }}">{{ $view_cables->status }}</option>
                        </select>
                      </div>
                      @error('status')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror

                  </div>

                  
                </div>



                <div class="col-lg-6">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="number" name="amount" class="form-control" @error('amount') 
                    @enderror value="{{ $view_cables->amount }}" id="exampleInputEmail1" placeholder="Amount"> 
                  </div>
                  @error('amount')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror


                  <div class="form-group">
                    <label for="exampleInputEmail1">Billers code</label>
                    <input type="number" name="billersCode" class="form-control" @error('billersCode') 
                    @enderror value="{{ $view_cables->billersCode }}" id="exampleInputEmail1" placeholder="billersCode"> 
                  </div>
                  @error('billersCode')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror


                  <div class="form-group">
                    <label for="exampleInputEmail1">Subscription Type</label>
                    <input type="number" name="subscription_type" class="form-control" @error('subscription_type') 
                    @enderror value="{{ $view_cables->subscription_type }}" id="exampleInputEmail1" placeholder="subscription_type"> 
                  </div>
                  @error('subscription_type')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror


                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" name="phone" class="form-control" @error('phone') 
                    @enderror value="{{ $view_cables->phone }}" id="exampleInputEmail1" placeholder="phone"> 
                  </div>
                  @error('subscription_type')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

    
                  {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div> --}}

             
                </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  </div>
      @include('dashboard.admin.vtu.footer')