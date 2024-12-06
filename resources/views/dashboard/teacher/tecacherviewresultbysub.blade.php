@include('dashboard.teacher.header')
@include('dashboard.teacher.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>Subjects </h1> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subjects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        {{-- <small class="float-right">{{ $view_student->created_at->format('D d, M Y, H:i')}}</small> --}}
                    </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-2 invoice-col">
                    <img style="width: 150px; hieght: 150px;" src="{{ asset('/public/../'.Auth::guard('teacher')->user()->logo)}}" alt="teacherLTE Logo" class="brand-image ">

                 
                </div> 
                <!-- /.col -->
               <div class="col-sm-10 invoice-col">
                   <h2 style="text-transform: uppercase; text-align:center">{{ Auth::guard('teacher')->user()->school['schoolname'] }}</h2>
                  <p style=" text-align:center">{{Auth::guard('teacher')->user()->school['address']}}</p>
                  <p style="text-align:center">{{Auth::guard('teacher')->user()->school['motor']}}</p>
                </div>
                <!-- /.col -->
                {{-- <div class="col-sm-2 invoice-col">
                    <img style="width: 70%; height: 150px;" src="{{ URL::asset("/public/../$view_results->user['images']")}}" alt="">
                </div> --}}
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
              
                  <table class="table table-striped">
                      <thead>
                      <tr>
                        {{-- <th>S/N</th> --}}
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Surname</th>
                        <th>Subjects</th>
                        <th>Ca 1</th>
                        <th>Ca 2</th>
                        {{-- <th>Ca 3</th> --}}
                        <th>Exams</th>
                        <th>Total</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Add Psychomotor </th>
                        
                      </tr>
                      </thead>
                      <tbody>
                        @php
                            $total_score = 0;
                            // $totalsubject_score = 0;
                        @endphp
                          @foreach ($view_myresult_results as $view_myresult_result)
                          @php
                          $total_score +=$view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams;
                          // $totalsubject_score +=$view_myresult_result->test_1  + $view_myresult_result->test_2  + $view_myresult_result->test_3  + $view_myresult_result->exams                            
                          @endphp
                          <tr>
                              <td>{{ $view_myresult_result->fname }}
                                <br>
                                <small>{{ $view_myresult_result->section }}</small>

                              </td>
                              <td>{{ $view_myresult_result->middlename }} <br>
                                <small>{{ $view_myresult_result->classname }}</small><br>
                                <small>{{ $view_myresult_result->alms }}</small>

                              </td>
                              <td>{{ $view_myresult_result->surname }}</td>
                              <td>{{ $view_myresult_result->subjectname }}
                              <small><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                Search Results of Student
                              </button></small>
                              </td>
                              <td>{{ $view_myresult_result->test_1 }}</td>
                              <td>{{ $view_myresult_result->test_2 }}</td>
                              {{-- <td>{{ $view_myresult_result->test_3 }}</td> --}}
                              <td>{{ $view_myresult_result->exams }}

                              <small><a class="btn btn-success" href="{{ url('teacher/editresultsbyteacher/'.$view_myresult_result->id) }}">Edit Result</a></small>
                              </td>
                              <td>{{ $view_myresult_result->test_1  + $view_myresult_result->test_2  + $view_myresult_result->test_3  + $view_myresult_result->exams }}</td>
                              <td>@if ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 69)
                                <p>A</p>
                               
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 59)
                                <p>B</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 49)
                                <p>C</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 44)
                                <p>D</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 40)
                                <p>E</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 39)
                                <p>F</p>
                                @else
                                <p>F</p>
                              @endif</td>
                              <td>@if ($view_myresult_result->status == null)
                                <span class="badge badge-secondary"> In progress</span>
                              @elseif($view_myresult_result->status == 'suspend')
                              <span class="badge badge-warning"> Suspended</span>
                              @elseif($view_myresult_result->status == 'reject')
                              <span class="badge badge-danger"> Rejected</span>
                              @elseif($view_myresult_result->status == 'approved')
                              <span class="badge badge-info"> Approved</span>
                              @elseif($view_myresult_result->status == 'admitted')
                              
                              <span class="badge badge-success">Admitted</span>
                              @endif</td>
                             
                              <th> <a href="{{ url('teacher/addpsychomotorteacher1/'.$view_myresult_result->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-user">Add Psychomotor</i> 
                              </a></th>

                              {{-- <th> <a href="{{ url('teacher/addpsychomotorteacher/'.$view_myresult_result->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-user">Add </i> 
                              </a></th> --}}
                            </td>

                            </tr>
                          @endforeach
                      
                            {{-- <td>{{ $total_score }}</td> --}}
                      </tbody>
                    </table>
                
                  {{-- @else
                      
                @endif --}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
      </div><!-- /.container-fluid -->
    </section>


















      
          </div>
          <!-- /.col -->         
     
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> Submit
                    Submit 
                  </button>
                
                  {{-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button> --}}
                  

                </form>
                  {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> --}}
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.teacher.footer')


 
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Seach Result Term</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('teacher/searchforstudentresult') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="">School </label>
            <select class="form-control" name="school_id">
                <option value="{{ Auth::guard('teacher')->user()->school_id }}">{{ Auth::guard('teacher')->user()->school['schoolname'] }}</option>
            </select>
          </div>
            
          <div class="form-group">
            <label for="">Reg Number</label>
            <select class="form-control" name="regnumber">
              @foreach ($view_myresult_results as $view_myresult_result)
                <option value="{{ $view_myresult_result->regnumber }}"> {{ $view_myresult_result->surname }} {{ $view_myresult_result->fname }} {{ $view_myresult_result->regnumber }}</option>
                
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">Classes</label>
            <select class="form-control" name="classname">
            @if (Auth::guard('teacher')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                    @if ($view_classe->section == 'Primary')
                        <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                    @else
                    @endif
                @endforeach
            @else
            @foreach ($view_classes as $view_classe)
                    @if ($view_classe->section == 'Secondary' || $view_classe->section == 'Junior Secondary')
                        <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                    @else
                    @endif
                @endforeach
            @endif
              
            </select>
          </div>


          <div class="form-group">
            <label for="">Alms Optional</label>
            <select class="form-control" name="alms">
                <option value="">Select Alms optional</option>

              @foreach ($view_alms as $view_alm)
                <option value="{{ $view_alm->alms }}">{{ $view_alm->alms }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Terms</label>
            <select class="form-control" name="term">
              @foreach ($view_myresult_results as $view_myresult_result)
                <option value="{{ $view_myresult_result->term }}">{{ $view_myresult_result->term }}</option>
                
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Academic Session</label>
            <select class="form-control" name="academic_session">
              @foreach ($view_sessions as $view_session)
                <option value="{{ $view_session->academic_session }}">{{ $view_session->academic_session }}</option>
                
              @endforeach
            </select>
          </div>

          
          <div class="form-group">
            <label for=""> Sections</label>
            <select class="form-control" name="section">
              @if (Auth::guard('teacher')->user()->schooltype == 'SUBEB')
                <option value="Primary">Primary</option>
               @else
               
               <option value="Junior Secondary">Junior Secondary</option>
               <option value="Senior Secondary">Senior Secondary</option>
            @endif
     
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