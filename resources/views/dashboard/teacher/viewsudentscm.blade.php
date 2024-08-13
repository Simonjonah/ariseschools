@include('dashboard.teacher.header')

  @include('dashboard.teacher.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Pupils/Students </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
l            <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Add Pupils/Students  </li>
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
                <form action="{{ url('teacher/createstudent/'.$edit_primarypupils->ref_no1) }}" method="post" enctype="multipart/form-data">
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
                </div>
                  @endif
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label> First Name</label>
                        <input type="hidden" name="academic_session" value="{{ Auth::guard('teacher')->user()->academic_session }}" id="">
                        <input type="hidden" name="teacher_id" value="{{ Auth::guard('teacher')->user()->id }}" id="">
                        <input type="hidden" name="school_id" value="{{ Auth::guard('teacher')->user()->school_id }}" id="">
                        <input type="hidden" name="user_id" value="{{ Auth::guard('teacher')->user()->user_id }}" id="">
                        <input type="hidden" name="schoolname" value="{{ Auth::guard('teacher')->user()->schoolname }}" id="">
                        <input type="hidden" name="ref_no1" value="{{ Auth::guard('teacher')->user()->ref_no1 }}" id="">
                        <input type="hidden" name="address" value="{{ Auth::guard('teacher')->user()->address }}" id="">
                        <input type="hidden" name="logo" value="{{ Auth::guard('teacher')->user()->logo }}" id="">
                        <input type="hidden" name="connect" value="{{ Auth::guard('teacher')->user()->connect }}" id="">
                        <input type="hidden" name="slug" value="{{ Auth::guard('teacher')->user()->slug }}" id="">
                        {{-- <input type="hidden" name="email" value="{{ Auth::guard('teacher')->user()->logo }}" id=""> --}}
                        <input type="text" value="{{ $edit_primarypupils->fname }}" class="form-control" name="fname" placeholder="fname">

                      </div>

                      
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Middle Name</label>
                       <input type="text" value="{{ $edit_primarypupils->middlename }}" required name="middlename" class="form-control" placeholder="Middle Name">
                      </div>
                     
                    </div>
                 <div class="col-sm-6">
                      <div class="form-group">
                        <label>Surname</label>
                        <input type="text" value="{{ $edit_primarypupils->surname }}" required name="surname" class="form-control" placeholder="Surname">

                      </div>
                    </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" value="{{ $edit_primarypupils->age }}" required class="form-control" placeholder="Age">

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" value="{{ $edit_primarypupils->dob }}" required class="form-control" placeholder="Date of Birth">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control" id="">
                            <option value="{{ $edit_primarypupils->gender }}">{{ $edit_primarypupils->gender }}</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                    
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Alms</label>
                        <select name="alms" class="form-control" id="">
                            <option value="{{ $edit_primarypupils->alms }}">{{ $edit_primarypupils->alms }}</option>
                        <option value="">Select Alms</option>

                          @foreach ($view_alms as $view_alm)

                            <option value="{{ $view_alm->alms }}">{{ $view_alm->alms }}</option>
                            
                          @endforeach
                        </select>
                    
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Term</label>
                        <select name="term" class="form-control" id="">
                            <option value="{{ $edit_primarypupils->term }}">{{ $edit_primarypupils->term }}</option>
                          <option value="First Term">First Term</option>
                          <option value="Second Term">Second Term</option>
                          <option value="Third Term">Third Term</option>
                          
                        </select>
                    
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label for="">Section</label>
                    <div class="form-group">
                    <select name="section" class="form-control" id="">
                    <option value="{{ $edit_primarypupils->section }}">{{ $edit_primarypupils->section }}</option>

                      @if (Auth::guard('teacher')->user()->schooltype == 'SUBEB')
                      <option value="Primary">Primary</option>
                        
                      @else
                      <option value="Junior Secondary">Junior Secondary</option>
                      <option value="Senior Secondary">Senior Secondary</option>
                        
                      @endif
                    </select>
                  </div>
                    </div>



                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>Reg. Number</label>
                        <input type="text" name="regnumber" @error('regnumber')
                        @enderror required value="{{ $edit_primarypupils->regnumber }}" class="form-control" placeholder="Reg Number">
                         
                        </div>
                        @error('regnumber')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>State</label>
                        <input type="text" name="state" @error('state')
                        @enderror  value="{{ $edit_primarypupils->state }}" class="form-control" placeholder="State">
                         
                        </div>
                        @error('state')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                     
                      
                     
                      
                     
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>LGA </label>
                          <select name="lga" class="form-control" id="">
                            <option value="{{ $edit_primarypupils->lga }}">{{ $edit_primarypupils->lga }}</option>
                            @foreach ($view_lgas as $view_lga)
                            <option value="{{ $view_lga->lga }}">{{ $view_lga->lga }}</option>
                            @endforeach
                          </select>
                        
                        </div>
                        @error('lga')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Academic Session </label>
                          <select name="academic_session" class="form-control" id="">
                            <option value="{{ $edit_primarypupils->academic_session }}">{{ $edit_primarypupils->academic_session }}</option>
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
                            <option value="{{ $edit_primarypupils->classname }}">{{ $edit_primarypupils->classname }}</option>
                            @if (Auth::guard('teacher')->user()->section == 'Primary')
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
                        <td><img style="width: 30%; height: 120px;" src="{{ URL::asset("/public/../$edit_primarypupils->images")}}" alt=""></td>

                        <input type="file" name="images" @error('images')
                        @enderror  value="" class="form-control" >
                         
                        </div>
                        @error('images')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>


                      


                      

                     
                      <div class="col-sm-6">
                        <div class="form-group">
                            <a href="{{ url('teacher/home') }}" class="btn btn-success">Back</a> 
                            <a href="{{ url('teacher/editstudentsm/'.$edit_primarypupils->ref_no) }}" class="btn btn-info">Edit</a> 
                            <a href="{{ url('teacher/approvestudent/'.$edit_primarypupils->ref_no) }}" class="btn btn-success">Approved</a> 
                            <a href="{{ url('teacher/suspendedtudent/'.$edit_primarypupils->ref_no) }}" class="btn btn-primary">Suspend</a> 
                            <a href="{{ url('teacher/transferstudent/'.$edit_primarypupils->ref_no) }}" class="btn btn-warning">Transfer</a> 
                            <a href="{{ url('teacher/deletestudentscm/'.$edit_primarypupils->ref_no) }}" class="btn btn-danger">Delete</a> 
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                            {{ $edit_primarypupils->fname }} {{ $edit_primarypupils->surname }} Terminal Results
                        </button>

                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-success">
                        {{ $edit_primarypupils->fname }} {{ $edit_primarypupils->surname }}  Session Results
                        </button>
                          </td>
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


    @include('dashboard.teacher.footer')


  <div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Search Child Terminal Results</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('teacher/searchforstudentresult') }}" method="post">
          @csrf
            <!-- @if (Session::get('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
              @endif

              @if (Session::get('fail'))
              <div class="alert alert-danger">
                {{ Session::get('fail') }}
              </div>
            @endif -->
          <div class="form-group">
            <label for="">School </label>
            <select class="form-control" name="school_id">
                <option value="{{ $edit_primarypupils->school_id }}">{{ $edit_primarypupils->school['schoolname'] }}</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Classes</label>
            <select class="form-control" name="classname">
             
                <option value="{{ $edit_primarypupils->classname }}">{{ $edit_primarypupils->classname }}</option>
               
            </select>
          </div>

          
          <div class="form-group">
            <label for="">Reg. number</label>
            <select class="form-control" name="regnumber">
                <option value="{{ $edit_primarypupils->regnumber }}">{{ $edit_primarypupils->section }} {{ $edit_primarypupils->surname }} {{ $edit_primarypupils->fname }} {{ $edit_primarypupils->classname }} {{ $edit_primarypupils->regnumber }}</option>
            </select>
          </div>


          <div class="form-group">
            <label for="">Alms Optional</label>
            <select class="form-control" name="alms">
              <option value=""></option>
                <option value="{{ $edit_primarypupils->alms }}">{{ $edit_primarypupils->alms }}</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Terms</label>
            <select class="form-control" name="term">
                <option value="{{ $edit_primarypupils->term }}">{{ $edit_primarypupils->term }}</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Academic Session</label>
            <select class="form-control" name="academic_session">
                <option value="{{ $edit_primarypupils->academic_session }}">{{ $edit_primarypupils->academic_session }}</option>
            </select>
          </div>

          
          <div class="form-group">
            <label for=""> Sections</label>
            <select class="form-control" name="section">
             
                <option value="{{ $edit_primarypupils->section }}">{{ $edit_primarypupils->section }}</option>
                          
            </select>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Search Child Session Result</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('teacher/searchforstudentresultbysession') }}" method="post">
          @csrf
            
          <div class="form-group">
            <label for="">School </label>
            <select class="form-control" name="school_id">
                <option value="{{ $edit_primarypupils->school_id }}">{{ $edit_primarypupils->school['schoolname'] }}</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Classes</label>
            <select class="form-control" name="classname">
             
                <option value="{{ $edit_primarypupils->classname }}">{{ $edit_primarypupils->classname }}</option>
               
            </select>
          </div>

          
          <div class="form-group">
            <label for="">Reg. number</label>
            <select class="form-control" name="regnumber">
                <option value="{{ $edit_primarypupils->regnumber }}">{{ $edit_primarypupils->section }} {{ $edit_primarypupils->surname }} {{ $edit_primarypupils->fname }} {{ $edit_primarypupils->classname }} {{ $edit_primarypupils->regnumber }}</option>
            </select>
          </div>


          <div class="form-group">
            <label for="">Academic Session</label>
            <select class="form-control" name="academic_session">
                <option value="{{ $edit_primarypupils->academic_session }}">{{ $edit_primarypupils->academic_session }}</option>
            </select>
          </div>

          
          <div class="form-group">
            <label for=""> Sections</label>
            <select class="form-control" name="section">
             
                <option value="{{ $edit_primarypupils->section }}">{{ $edit_primarypupils->section }}</option>
                          
            </select>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->