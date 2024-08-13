@include('dashboard.header')
@include('dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if (Session::get('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>
      @endif

      @if (Session::get('fail'))
      <div class="alert alert-danger">
      {{ Session::get('fail') }}
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img style="width: 100%; height: 200px;" class="profile-user-img img-fluid"
                       src="{{ URL::asset("/public/../$view_principal->logo")}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $view_principal->surname }}, {{ $view_principal->fname }} {{ $view_principal->middlename }}</h3>

                <p class="text-muted text-center"> {{ $view_principal->centername }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Phone</b> <a href="" style="text-transform: uppercase" class="float-right">{{ $view_principal->phone }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>School Name</b> <a class="float-right">{{ $view_principal->school['schoolname'] }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $view_principal->email }}</a>
                  </li>

                  <li class="list-group-item">
                    <b>Center Number</b> <a class="float-right">{{ $view_principal->school['centernumber'] }}</a>
                  </li>
                  

                  
                  <li class="list-group-item">
                    <b>Status</b> <a class="float-right">@if ($view_principal->status == null)
                      <span class="badge badge-secondary">Admission In progress</span>
                    @elseif ($view_principal->status == 'reject')
                    <span class="badge badge-danger">Rejected</span>
                    @elseif ($view_principal->status == 'suspend')
                    <span class="badge badge-warning">Suspended</span>
                    @elseif ($view_principal->status == 'approved')
                    <span class="badge badge-info">Approved</span>

                    @elseif ($view_principal->status == 'retired')
                    <span class="badge badge-danger">Retired</span>
                    
                    @else
                    <span class="badge badge-success">Admitted</span>
                    @endif</a>
                  </li>
                </ul>

                {{-- <a href="couse" class="btn btn-primary btn-block"><b>Register more Courses</b></a> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Declaration</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                {{-- <strong><i class="fas fa-book mr-1"></i> school Education Level </strong> --}}

              

               

                <strong><i class="far fa-file-alt mr-1"></i> Note:</strong>

                <p class="text-muted">{{ $view_principal->fname }} {{ $view_principal->middlename }} {{ $view_principal->surname }} hereby declare that the information given by me in this form is correct. I understand that if any piece of informatio is false i shall automatically be disqualified</p>
              </div> 
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li> --}}
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Bio Data</a></li>
                  {{-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Father Details</a></li> --}}
                  {{-- <li class="nav-item"><a class="nav-link" href="#mother" data-toggle="tab">Mother Details</a></li> --}}
                  {{-- <li class="nav-item"><a class="nav-link" href="#olevels1" data-toggle="tab">Medical Reports</a></li> --}}
                  {{-- <li class="nav-item"><a class="nav-link" href="#olevels2" data-toggle="tab">Olevels 2nd sitting</a></li> --}}

                  {{-- <li class="nav-item"><a class="nav-link" href="#quali" data-toggle="tab">Qualifications</a></li> --}}


                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 
                
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          {{ $view_principal->created_at->format('D d, M Y, H:i')}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $view_principal->created_at->diffForHumans() }}</span>
                          <h3 class="timeline-header"><a href="mailTo:{{ $view_principal->school['schoolname'] }}">School Name </a> {{ $view_principal->school['schoolname'] }}</h3>

                          <h3 class="timeline-header"><a href="mailTo:{{ $view_principal->school['address'] }}">Address  </a> {{ $view_principal->school['address'] }}</h3>
                          <h3 class="timeline-header"><a href="mailTo:{{ $view_principal->school['motor'] }}">Mottor  </a> {{ $view_principal->school['motor'] }}</h3>

                          {{-- <div class="timeline-body">
                            {{ $view_principal->motor }}
                          </div> --}}
                          
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $view_principal->created_at->diffForHumans()}}</span>

                          {{-- <h3 class="timeline-header border-0"><a href="#">{{ $view_principal->age }}</a>
                          </h3>

                          <h3 class="timeline-header border-0"><a href="#">{{ $view_principal->disability }}</a>
                          </h3> --}}
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                         <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $view_principal->created_at->diffForHumans()}}</span>

                          {{-- <h3 class="timeline-header"><a href="#">State</a> {{ $view_principal->state }}</h3> --}}

                          
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          {{ $view_principal->created_at->toFormattedDateString() }}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Gender</label>
                       <input type="text" class="form-control" value="{{ $view_principal->gender }}" id="">
                    </div>

                    
                    
                    {{-- <div class="form-group">
                      <label for="">Who introduced you to G. D. A</label>
                       <input type="text" class="form-control" value="{{ $view_principal->whointro }}" id="">
                    </div> --}}
                  </div>
                  <!-- /.tab-pane -->
                  <div class="form-group">
                    <label for="">Take Action</label>
                    <!-- <a href="{{ url('web/schoolpdf/'.$view_principal->ref_no)  }}" class="btn btn-primary">Print form</a> -->
                    <a href="{{ url('web/primsaddmit/'.$view_principal->ref_no)  }}" class="btn btn-warning">Approved</a>
                    
                    <th><a href="{{ url('web/rejectprim/'.$view_principal->ref_no) }}" class="btn btn-sm bg-danger">
                      <i class="fas fa-user"></i>Reject
                    </a></th>
                   <th><a href="{{ url('web/suspendprim/'.$view_principal->ref_no) }}" class="btn btn-sm bg-warning">
                      <i class="fas fa-comments"></i>Suspend
                    </a></th>

                    <th> <a href="{{ url('web/tranferprim/'.$view_principal->ref_no) }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Transfer
                    </a></th>
                    <th><a href="{{ url('web/retiredprim/'.$view_principal->ref_no) }}" class="btn btn-info"><i class="fas fa-print">Retired</i></a></th> 
                  </div>
                  {{--  <li class="nav-item">
              @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/web/viewyourstudentsinschhol/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @else
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Secondary')
                 <li class="nav-item">
                    <a href="{{ url('/teacher/viewyourstudentsinschhol/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                   
                 @endif
                @endforeach
                @endif --}}

              </li>

                  <div class="tab-pane" id="quali">
                    <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          
                          <div class="col-12">
                            <div class="card card-primary">
                              <div class="card-header">
                                <div class="card-title">
                                  All Qualification submitted by {{ $view_principal->surname }} {{ $view_principal->fname }}
                                </div>
                              </div>
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-2">
                                    <a href="{{ URL::asset("/public/../$view_principal->logo")}}?text=1" data-toggle="lightbox" data-title="Passport  - white" data-gallery="gallery">
                                      <img style="width: 100%; height: 80%" src="{{ URL::asset("/public/../$view_principal->logo")}}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>

                                  <div class="col-sm-2">
                                    <a href="{{ URL::asset("/public/../$view_principal->immune")}}?text=1" data-toggle="lightbox" data-title="Immunization" data-gallery="gallery">
                                      <img style="width: 100%; height: 80%" src="{{ URL::asset("/public/../$view_principal->immune")}}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>

                                  <div class="col-sm-2">
                                    <a href="{{ URL::asset("/public/../$view_principal->birthcert")}}?text=1" data-toggle="lightbox" data-title="Birth Certificate" data-gallery="gallery">
                                      <img style="width: 100%; height: 80%" src="{{ URL::asset("/public/../$view_principal->birthcert")}}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>

                                  
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.container-fluid -->
                    </section>
                  </div>

                  









                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                      @csrf
                      
                      @method('PUT')

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father SurName</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{ $view_principal->title }} {{ $view_principal->fathersurname }}" class="form-control" id="inputName" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father FirstName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fathername }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      {{-- <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->middlename }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div> --}}

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fathername }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fatheremail }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father Phone</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fatherphone }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father Employer</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fatheremployer }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>


                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nationality</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->nationality }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fatheraddress }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Relationship</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->relationship }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>
                      
                    </form>
                  </div>





                  <div class="tab-pane" id="mother">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                      @csrf
                      

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father SurName</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{ $view_principal->fathername }} {{ $view_principal->mothersurname }}" class="form-control" id="inputName" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother FirstName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->mothername }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->middlename }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->middlename }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->motheremail }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother Phone</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->motherphone }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother Employer</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->motheremployer }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>


                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nationality</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->nationality }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->motheraddress }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>                      
                    </form>
                  </div>




                  <div class="tab-pane" id="olevels1">
                  
                     <div class="container">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group row">
                            <label for="inputName">Does your child has SS genotype?</label>
                            <div class="col-sm-10">
                              <div class="form-group">
                                <h5>Does your child have SS genotype?</h5>
                                <label for="vehicle1"> {{ $view_principal->genotype1 }}</label><br>
                                <label for="vehicle1"> {{ $view_principal->genotype2 }}</label><br>
                            </div>

                            <div class="form-group">
                              <h5>Has your Child any of the following conditions?</h5>
                              <label for="vehicle1"> {{ $view_principal->symtoms1 }}</label><br>
                              <label for="vehicle1"> {{ $view_principal->symtoms2 }}</label><br>
                              <label for="vehicle1"> {{ $view_principal->symtoms3 }}</label><br>
                          </div>



                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="form-group">
                              <h5>Is your Child asthmatic?</h5>
                              <label for="vehicle1"> {{ $view_principal->asthmatic1 }}</label><br>
                              <label for="vehicle1"> {{ $view_principal->asthmatic2 }}</label><br>
                          </div>
                          </div>
                          
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group row">
                            <div class="form-group">
                              <h5>Has your child any medical condition or form of allergy that the school should know about?</h5>
                              <label for="vehicle1"> {{ $view_principal->medicalcondition1 }}</label><br>
                              <label for="vehicle1"> {{ $view_principal->medicalcondition2 }}</label><br>
                          </div>
                          </div>

                          <div class="form-group row">
                            <div class="form-group">
                              <h5>Has your child been diagnosed with having specific learning difficilties such as Dyslyxia, ADHD or any other?</h5>
                              <label for="vehicle1"> {{ $view_principal->diagnose1 }}</label><br>
                              <label for="vehicle1"> {{ $view_principal->diagnose2 }}</label><br>
                              <label for="vehicle1"> {{ $view_principal->diagnose3 }}</label><br>
                          </div>

                          <div class="form-group">
                            <h5>Has your child been Immunized with the following?</h5>
                            <label for="vehicle1"> {{ $view_principal->diagnose1 }}</label><br>
                            <label for="vehicle1"> {{ $view_principal->diagnose2 }}</label><br>
                            <label for="vehicle1"> {{ $view_principal->diagnose3 }}</label><br>
                        </div>
                        </div>
                        </div>

                        <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>Particulars</th>
                                  <th>Yes</th>
                                  <th>No</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>Small Pox</td>
                                  <td>{{ $view_principal->smallpox1 }}</td>
                                  <td>{{ $view_principal->smallpox2 }}</td>
                              </tr>

                              <tr>
                                  <td>Chicken Pox</td>
                                  <td>{{ $view_principal->chickenpox1 }}</td>
                                  <td>{{ $view_principal->chickenpox2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Polio </td>
                                  <td>{{ $view_principal->polio1 }}</td>
                                  <td>{{ $view_principal->polio2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Tetanus </td>
                                  <td>{{ $view_principal->tetanus1 }}</td>
                                  <td>{{ $view_principal->tetanus2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Tuberculosis </td>
                                  <td>{{ $view_principal->tuber1 }}</td>
                                  <td>{{ $view_principal->tuber2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Mumps </td>
                                  <td>{{ $view_principal->mumps1 }}</td>
                                  <td>{{ $view_principal->mumps2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Rebelia </td>
                                  <td>{{ $view_principal->rebelia1 }}</td>
                                  <td>{{ $view_principal->rebelia2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Hepatitis </td>
                                  <td>{{ $view_principal->hepatitis1 }}</td>
                                  <td>{{ $view_principal->hepatitis2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Meningitis </td>
                                  <td>{{ $view_principal->meningitis1 }}</td>
                                  <td>{{ $view_principal->meningitis2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Whoopingcough </td>
                                  <td>{{ $view_principal->whoopingcough1 }}</td>
                                  <td>{{ $view_principal->whoopingcough2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Diphtheria </td>
                                  <td>{{ $view_principal->diphtheria1 }}</td>
                                  <td>{{ $view_principal->diphtheria2 }}</td>
                                  
                                 
                              </tr>
                          </tbody>
                      </table>
                      </div>

                      
                     </div>







                     
                  </div>
                  <!-- /.tab-pane -->






                  <div class="tab-pane" id="olevels2">
                  
                    <div class="container">
                     <div class="row">
                       <div class="col-lg-6 col-md-6 col-sm-12">
                         <div class="form-group row">
                           <label for="inputName">Center Name</label>
                           <div class="col-sm-10">
                             <input type="text" name="name" value="{{ $view_principal->centre_name2 }}" class="form-control" id="inputName" placeholder="First Name">
                           </div>
                         </div>
                         <div class="form-group row">
                           <label for="inputName"> Exam Number</label>
                           <div class="col-sm-10">
                             <input type="text" name="lastname" value="{{ $view_principal->examnumber2 }}" class="form-control" id="inputName" placeholder="Last Name">
                           </div>
                         </div>
                         
                       </div>

                       <div class="col-lg-6 col-md-6 col-sm-12">
                         <div class="form-group row">
                           <label for="inputName"> Year Obtain</label>
                           <div class="col-sm-10">
                             <input type="text" name="name" value="{{ $view_principal->yearobtain2 }}" class="form-control" id="inputName" placeholder="First Name">
                           </div>
                         </div>
                         <div class="form-group row">
                           <label for="inputName"> Qualification Obtain</label>
                           <div class="col-sm-10">
                             <input type="text" name="lastname" value="{{ $view_principal->qualiobtain2 }}" class="form-control" id="inputName" placeholder="Last Name">
                           </div>
                         </div>
                       </div>

                       <table class="col-lg-12">
                                       
                        <tr>
                                               
                          <th><div class="form-group col-12">
                              <select class="form-control" class="form-control" name="subject11" id="">
                                  <option value="{{ $view_principal->subject11 }}">{{ $view_principal->subject11 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade11" id="">
                                  <option value="{{ $view_principal->grade11 }}">{{ $view_principal->grade11 }}</option>
                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>
                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject12" id="">
                                  <option value="{{ $view_principal->subject12 }}">{{ $view_principal->subject12 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade12" id="">
                               <option value="{{ $view_principal->grade12 }}">{{ $view_principal->grade12 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>

                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject13" id="">
                                  <option value="{{ $view_principal->subject13 }}">{{ $view_principal->subject13 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade13" id="">
                               <option value="{{ $view_principal->grade13 }}">{{ $view_principal->grade13 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>
                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject14" id="">
                                  <option value="{{ $view_principal->subject14 }}">{{ $view_principal->subject14 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade14" id="">
                                <option value="{{ $view_principal->grade14 }}">{{ $view_principal->grade14 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>

                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject15" id="">
                                  <option value="{{ $view_principal->subject15 }}">{{ $view_principal->subject15 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade15" id="">
                                 <option value="{{ $view_principal->grade15 }}">{{ $view_principal->grade15 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>
                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject16" id="">
                                  <option value="{{ $view_principal->subject16 }}">{{ $view_principal->subject16 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade16" id="">
                              <option value="{{ $view_principal->grade16 }}">{{ $view_principal->grade16 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>

                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject17" id="">
                                  <option value="{{ $view_principal->subject17 }}">{{ $view_principal->subject17 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade17" id="">
                                <option value="{{ $view_principal->grade17 }}">{{ $view_principal->grade17 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>

                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject18" id="">
                                  <option value="{{ $view_principal->subject18 }}">{{ $view_principal->subject18 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade18" id="">
                                <option value="{{ $view_principal->grade18 }}">{{ $view_principal->grade18 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>

                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject19" id="">
                                  <option value="{{ $view_principal->subject19 }}">{{ $view_principal->subject19 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade19" id="">
                                  <option value="{{ $view_principal->grade19 }}">{{ $view_principal->grade19 }}</option>


                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>
                </table>
                     </div>
                    </div> 
                 </div>
                </div>



                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
            
          </div>
          <!-- /.col -->
        </div>

        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
    </section>
 </div>
    @include('dashboard.footer')

    

<script src="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

<script src="{{ asset('assets/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

