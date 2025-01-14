




@include('dashboard.admin.vtu.header')


  @include('dashboard.admin.vtu.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DSTV</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DSTV </li>
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
              <h3 class="card-title">Add DSTV</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  
                  <form action="{{ url('admin/verifydstv') }}" method="post" enctype="multipart/form-data">
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
                    <label for="exampleInputEmail1">Billers Code</label>
                    <input type="number" name="billersCode" class="form-control" @error('billersCode') 
                        
                    @enderror value="" id="exampleInputEmail1" placeholder="billersCode"> 
                  </div>
                  @error('billersCode')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror



                {{-- @php
                use Carbon\Carbon;
                date_default_timezone_set('Africa/Lagos');
                        $currentTime = Carbon::now('Africa/Lagos')->format('Ymdhi'); 
                        $randomString = bin2hex(random_bytes(5)); 
                        $man =  $currentTime . $randomString;
                        // dd($man);
                @endphp
                  <label>Select your Plan</label>
                  <select name="variation_code" class="form-control">
                    @foreach ($variations as $variation)
                    <option value="{{ $variation['variation_code'] }}">
                          {{ $variation['variation_code'] }}
                      </option>
                  @endforeach
                  </select> --}}


                  

                <div class="form-group">
                  <label for="exampleInputEmail1">serviceID DSTV</label>
                  <input type="hidden" name="serviceID" class="form-control" @error('service ID') 
                  @enderror value="dstv" id="exampleInputEmail1" placeholder="serviceID"> 
                </div>
                @error('serviceID')
                <span class="text-danger">{{ $message }}</span>
                @enderror


                {{-- <div class="form-group">
                  <input type="hidden" name="request_id" class="form-control" @error('service ID') 
                  @enderror value="{{ $man }}" id="exampleInputEmail1" placeholder="request_id"> 
                </div>
                @error('request_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror --}}

               
                  </div>
                  <!-- /.card-body -->
    
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
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