@include('dashboard.header')

  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Parents </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Parents  </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
       
          <!-- right column -->
          <div class="col-md-12">
            
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Register Child</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('web/updatescstudent/'.$view_primarypupils->ref_no) }}" method="post" enctype="multipart/form-data">
                  @csrf
                   @method('PUT')
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label> First Name</label>
                        {{-- <input type="text" name="academic_session" value="{{ Auth::guard('web')->user()-> }}" id=""> --}}
                        <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}" id="">
                        <input type="hidden" name="schoolname" value="{{ Auth::guard('web')->user()->schoolname }}" id="">
                        <input type="hidden" name="ref_no1" value="{{ Auth::guard('web')->user()->ref_no1 }}" id="">
                        <input type="hidden" name="address" value="{{ Auth::guard('web')->user()->address }}" id="">
                        {{-- <input type="text" name="logo" value="{{ Auth::guard('web')->user()->logo }}" id=""> --}}
                        {{-- <input type="text" name="email" value="{{ Auth::guard('web')->user()->email }}" id=""> --}}
                        <input type="text" value="{{ $view_primarypupils->fname }}" class="form-control" name="fname" placeholder="fname">

                      </div>

                      
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Middle Name</label>
                       <input type="text" value="{{ $view_primarypupils->middlename }}" required name="middlename" class="form-control" placeholder="Middle Name">
                      </div>
                     
                    </div>
                 <div class="col-sm-6">
                      <div class="form-group">
                        <label>Surname</label>
                        <input type="text" value="{{ $view_primarypupils->surname }}" required name="surname" class="form-control" placeholder="Surname">

                      </div>
                    </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" value="{{ $view_primarypupils->age }}" required class="form-control" placeholder="Age">

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="{{ $view_primarypupils->address }}" required class="form-control" placeholder="Address">

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" value="{{ $view_primarypupils->dob }}" required class="form-control" placeholder="Date of Birth">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control" id="">
                          <option value="{{ $view_primarypupils->gender }}">{{ $view_primarypupils->gender }}</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                    
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Alms</label>
                        <select name="alms" class="form-control" id="">
                        <option value="{{ $view_primarypupils->alms }}">{{ $view_primarypupils->alms }}</option>

                          @foreach ($view_alms as $view_alm)
                            <option value="{{ $view_alm->alms }}">{{ $view_alm->alms }}</option>
                          @endforeach
                        </select>
                    
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>schoolname</label>
                        <select name="schoolname" class="form-control" id="">
                        <option value="{{ $view_primarypupils->schoolname }}">{{ $view_primarypupils->schoolname }}</option>
                        @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                            @foreach ($view_schools as $view_school)
                              @if ($view_school->schooltype == 'SUBEB')
                              <option value="{{ $view_school->schoolname }}">{{ $view_school->schoolname }}</option>
                              @else
                                
                              @endif
                            @endforeach
                            @else


                           
                            @foreach ($view_schools as $view_school)
                              @if ($view_school->schooltype == 'SSEB')
                              <option value="{{ $view_school->schoolname }}">{{ $view_school->schoolname }}</option>
                              @else
                                
                              @endif
                            @endforeach
                              
                            @endif

                          
                        </select>
                    
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Term</label>
                        <select name="term" class="form-control" id="">
                          @foreach ($view_terms as $view_term)
                            <option value="{{ $view_term->term }}">{{ $view_term->term }}</option>
                          @endforeach
                          
                        </select>
                    
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Section</label>
                        <select name="section" class="form-control" id="">
                          @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                            <option value="Primary">Primary</option>
                           
                          @else
                          <option value="Junior Secondary">Junior Secondary</option>
                          <option value="Senior Secondary">Senior Secondary</option>

                            @endif
                        </select>
                    
                      </div>
                    </div>


{{-- 
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>Reg. Number</label>
                        <input type="text" name="regnumber" @error('regnumber')
                        @enderror  value="{{ $view_primarypupils->regnumber }}" class="form-control" placeholder="Reg Number">
                         
                        </div>
                        @error('regnumber')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div> --}}

                      
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>State</label>
                        <input type="text" name="state" @error('state')
                        @enderror  value="{{ $view_primarypupils->state }}" class="form-control" placeholder="State">
                         
                        </div>
                        @error('state')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>Local Government</label>
                        <input type="text" name="lga" @error('lga')
                        @enderror  value="{{ $view_primarypupils->lga }}" class="form-control" placeholder="Local Government">
                         
                        </div>
                        @error('lga')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      
                     
                      
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Academic Session </label>
                          <select name="academic_session" class="form-control" id="">
                            @foreach ($view_sesions as $view_sesion)
                            <option value="{{ $view_sesion->academic_session }}">{{ $view_sesion->academic_session }}</option>
                            @endforeach
                          </select>
                        
                        </div>
                        @error('academic_session')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Class </label>
                          <select name="classname" class="form-control" id="">
                            @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                            @foreach ($view_classes as $view_classe)
                              @if ($view_classe->section == 'Primary')
                              <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                              @else
                                
                              @endif
                            @endforeach
                            @else


                           
                            @foreach ($view_classes as $view_classe)
                              @if ($view_classe->section == 'Secondary')
                              <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                              @else
                                
                              @endif
                            @endforeach
                              
                            @endif
                            
                          </select>
                        
                        </div>
                        @error('classname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Passport </label>
                          <td><img style="width: 50px; height: 60px;" src="{{ URL::asset("/public/../$view_primarypupils->images")}}" alt=""></td>

                        <input type="file" name="images" @error('images')
                        @enderror  value="" class="form-control" >
                         
                        </div>
                        @error('images')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>


                      


                      

                     
                      <div class="col-sm-6">
                        <div class="form-group">
                           <a href="{{ url('web/home') }}" class="btn btn-primary">Back</a>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        </div>
                      </div>
                      

                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


    @include('dashboard.footer')

