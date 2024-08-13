@include('dashboard.teacher.header')

  @include('dashboard.teacher.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark" style="text-transform: capitalize">{{ Auth::guard('teacher')->user()->fathername }}  
             
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (Auth::guard('teacher')->user()->status == 'admitted' && Auth::guard('teacher')->user()->assign1 == 'teacher')
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $resultscounts }}</h3>

                <p>Your Results</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('teacher/tecacherviewresultbysub') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $countcognitive }}</h3>

                {{-- <h3><sup style="font-size: 20px"></sup></h3> --}}

                <p>Cognitive Domain</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('teacher/teacherviewdomaiin') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $countpsycomo }}</h3>

                <p>Psycomotor Domain</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('teacher/teacherviewdomaiin') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $countsubject }}</h3>

                <p>My Subjects</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              {{-- <a href="{{ url('teacher/viewclassactivityparespecial') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $countapproveresult }}</h3>

                <p>Approve Results</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>

              </div>
              {{-- <a href="{{ url('teacher/viewpersonnel') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{ $countunapproveresult }}</h3>

                <p>Unapproved Results</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>

              </div>
              {{-- <a href="{{ url('teacher/viewpersonnel') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->

        </div>
        <!-- /.row -->
        <!-- Main row -->
       <!-- TABLE: LATEST ORDERS -->
       <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title">Student</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>Student ID</th>
                <th>Surname</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Admit Number</th>
                <th>Class</th>
                <th>Picture</th>
              </tr>
              
              </thead>
              <tbody>
                {{-- @foreach ($viewourstudents as $viewourstudent)
              <tr>
                
                <td><a href="{{ url('teacher/parentviewstudent/'.$viewourstudent->ref_no1)  }}">{{ Auth::guard('teacher')->user()->ref_no  }}</a></td>
                <td>{{ $viewourstudent->surname  }}</td>
                <td>{{ $viewourstudent->fname  }}</td>
                <td>{{ $viewourstudent->middlename  }}</td>
                <td>{{ $viewourstudent->ref_no  }}</td>
                <td>{{ $viewourstudent->classname  }}</td>
                <td><img style="width: 50px; height: 50px;" src="{{ URL::asset("/public/../$viewourstudent->images")}}" alt=""></td>
                
               </td>
              </tr>
                @endforeach --}}
                
             
             
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="{{ url('teacher/profile/'.Auth::guard('teacher')->user()->ref_no)  }}" class="btn btn-sm btn-info float-left">View Profile</a>
          {{-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> --}}
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->


      </div><!-- /.container-fluid -->
    </section>

  @elseif (Auth::guard('teacher')->user()->status == 'admitted')    
<section class="content">

  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <h5 class="m-0 text-dark">Teacher Registration Link <a href="{{ url('/registerteachers/'.Auth::guard('teacher')->user()->ref_no) }}" target="_blank">{{ url('/registerteachers/'.Auth::user()->ref_no) }} </a></h5>
    @if (Auth::guard('teacher')->user()->signature == null)
          <div class="col-lg-12 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>Add Your Signature for Results before any other thing</h3>

                  <form action="{{ url('teacher/updatesignature/'.Auth::guard('teacher')->user()->ref_no) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif
                  <input type="file" name="signature" class="form-control">

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('teacher/allresults') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          @else
            
          @endif
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $countresults }}</h3>

            <p>Total Result</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('teacher/allresults') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>{{ $countunapprove }}</h3>

            <p>Total Unapprove Result</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('teacher/allresultsprinci') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->


      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $countapprove }}</h3>

            <p>Total Approve Result</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('teacher/allresultsprinciapproved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            @if (Auth::guard('teacher')->user()->section == 'Primary')
            <h3>{{ $countsprimarysubjects }}<sup style="font-size: 20px"></sup></h3>
              
            @else
            <h6>Senior {{ $countsecondarysubjects }}<sup style="font-size: 20px"></sup></h6>
            <h6>Junior {{ $countjuniorsubjects }}<sup style="font-size: 20px"></sup></h6>
            <h6>Total {{ $countjuniorsubjects + $countsecondarysubjects}}<sup style="font-size: 20px"></sup></h6>
              
            @endif

            <p>Subjects</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ url('teacher/viewallsubjectsbyhead') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $countteachers }}</h3>

            <p>My Teachers</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ url('teacher/myteachers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $countpsycomo1 }}</h3>

            <p>Psychomotor</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <!-- <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>{{ $countstudent }}</h3>

            <p> All Students</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="{{ url('teacher/viewyourstudentsecondary') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ $reinstate }}</h3>

            <p>Reinstated Students</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="{{ url('teacher/restatedstudent') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $suspendedstu }}</h3>

            <p>Suspended Students</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="{{ url('teacher/suspendedstudent') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-dark">
          <div class="inner">
            <h3>{{ $viewschoolnews }}</h3>

            <p>My School News</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="{{ url('teacher/viewyouradverts') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

    </div>
    <!-- /.row -->
    <!-- Main row -->
   <!-- TABLE: LATEST ORDERS -->
   <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Your info</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
          <tr>
            <th> ID</th>
            <th>Surname</th>
            <th>Firstname</th>
            <th>Phone</th>
            <th>Plans</th>
            <th>Status</th>
          </tr>
          
          </thead>
          <tbody>
          <tr>
            <td><a href="{{ url('teacher/profile/'.Auth::guard('teacher')->user()->ref_no1)  }}">{{ Auth::guard('teacher')->user()->ref_no1  }}</a></td>
            <td>{{ Auth::guard('teacher')->user()->surname  }}</td>
            <td>{{ Auth::guard('teacher')->user()->fname  }}</td>
            <td>{{ Auth::guard('teacher')->user()->phone  }}</td>
            <td>{{ Auth::guard('teacher')->user()->plans  }}</td>
           <td> @if (Auth::guard('teacher')->user()->status = null)
            <span class="badge badge-info">Admission in progress</span>
            @elseif (Auth::guard('teacher')->user()->status = 'admitted')
            <span class="badge badge-success">Approved</span>
            @elseif (Auth::guard('teacher')->user()->status = 'reject')
            <span class="badge badge-danger">Rejected</span>
            @elseif (Auth::guard('teacher')->user()->status = 'approved')
            <span class="badge badge-success">Approved</span>
            @elseif (Auth::guard('teacher')->user()->status = 'suspend')
            <span class="badge badge-warning">Suspended</span>
            @endif
           </td>
           
          </tr>
         
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="{{ url('teacher/profile/'.Auth::guard('teacher')->user()->ref_no1)  }}" class="btn btn-sm btn-info float-left">View Profile</a>
      {{-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> --}}
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->


  </div><!-- /.container-fluid -->
</section>

   @elseif (Auth::guard('teacher')->user()->status == 'retired')
   <h1>{{ Auth::guard('teacher')->user()->fname }}, You have been Retired</h1>
   @elseif (Auth::guard('teacher')->user()->status == 'retired')
   <h1>{{ Auth::guard('teacher')->user()->fname }}, You have been Admitted</h1>
    @else

    <h2>Welcome Wait for Approval Please</h2>

    @endif
    
    <!-- /.content -->
  </div>
  @include('dashboard.teacher.footer')