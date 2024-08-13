@include('dashboard.header')
@include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subjects </h1>
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

  
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Domains</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="#" class="dropdown-item">Action</a>
                  <a href="#" class="dropdown-item">Another action</a>
                  <a href="#" class="dropdown-item">Something else here</a>
                  <a class="dropdown-divider"></a>
                  <a href="#" class="dropdown-item">Separated link</a>
                </div>
              </div>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                {{-- <p class="text-center">
                  <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p> --}}

                <div class="table-responsive">
                  {{-- <p class="lead">Behaviour</p> --}}
    
                  <form action="{{ url('web/createpsychomotorom') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif
                    <!-- @method('PUT') -->
                    <table class="table table-bordered">
                      <tr>
                        {{-- <td><input type="text" name="" value="{{ $add_psychomotor->images }}" id=""></td> --}}
                       
                        <th style="width:50%">COGNITIVE DOMAIN:</th>
                        <th style="width:50%">A</th>
                        <th style="width:50%">B</th>
                        <th style="width:50%">C</th>
                        <th style="width:50%">D</th>
                      </tr>


                      @foreach ($view_domains as $view_domain)
                        @if ($view_domain->psycomoto == 'Cognitive Domain')
                        <tr>
                      <input type="text" name="regnumber[]" value="{{ $add_psychomotor->regnumber }}">
                      <input type="text" name="student_id[]" value="{{ $add_psychomotor->student_id }}">
                        <input type="text" name="school_id[]" value="{{ $add_psychomotor->school_id }}">
                        <input type="text" name="classname[]" value="{{ $add_psychomotor->classname }}">
                        <input type="text" name="user_id[]" value="{{ $add_psychomotor->user_id }}">
                        <input type="text" name="term[]" value="{{ $add_psychomotor->term }}">
                        <input type="text" name="section[]" value="{{ $add_psychomotor->section }}">
                        <input type="text" name="cogname[]" value="{{ $view_domain->cogname }}">
                        <input type="text" name="psycomoto[]" value="{{ $view_domain->psycomoto }}">
                      <input type="text" name="teacher_id[]" value="{{ $add_psychomotor->teacher_id }}">
                       
                        <th>{{ $view_domain->cogname }}</th>
                        <!-- <td><input type="checkbox" name="1" value="Yes" id=""></td>
                        <td><input type="checkbox" name="2" value="Yes" id=""></td>
                        <td><input type="checkbox" name="3" value="Yes" id=""></td>
                        <td><input type="checkbox" name="4" value="Yes" id=""></td> -->
                        <th><select name="punt1[]" id="">
                            <option value="nil">No</option>
                            <option value="Yes">A</option>
                        </select></th>
                        <th><select name="punt2[]" id="">
                            <option value="nil">No</option>
                            <option value="Yes">A</option>
                        </select></th>
                        <th><select name="punt3[]" id="">
                            <option value="nil">No</option>
                            <option value="Yes">A</option>
                        </select></th>
                        <th><select name="punt4[]" id="">
                            <option value="nil">No</option>
                            <option value="Yes">A</option>
                        </select></th>
                        
                      </tr>
                        @else
                            
                        @endif
                     
                      @endforeach

                    </table>
                      <div class="form-group">
                          <textarea class="form-control" name="teacher_comment" id="" cols="20" rows="5" placeholder="Teacher's Comment"></textarea>
                      </div>
                </div>
               
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">PSYCHOMOTOR DOMAIN:</th>
                      <th style="width:50%">A</th>
                      <th style="width:50%">B</th>
                      <th style="width:50%">C</th>
                      <th style="width:50%">D</th>
                    </tr>
                    
                    @foreach ($view_domains as $view_domain)
                        @if ($view_domain->psycomoto == 'Psychomotor Domain')
                        <input type="text" name="regnumber[]" value="{{ $add_psychomotor->regnumber }}">
                      <input type="text" name="student_id[]" value="{{ $add_psychomotor->student_id }}">
                      <input type="text" name="teacher_id[]" value="{{ $add_psychomotor->teacher_id }}">
                        <input type="text" name="school_id[]" value="{{ $add_psychomotor->school_id }}">
                        <input type="text" name="classname[]" value="{{ $add_psychomotor->classname }}">
                        <input type="text" name="user_id[]" value="{{ $add_psychomotor->user_id }}">
                        <input type="text" name="term[]" value="{{ $add_psychomotor->term }}">
                        <input type="text" name="section[]" value="{{ $add_psychomotor->section }}">
                        <input type="text" name="cogname[]" value="{{ $view_domain->cogname }}">
                        <input type="text" name="psycomoto[]" value="{{ $view_domain->psycomoto }}">
                        <tr>
                        <th>{{ $view_domain->cogname }}</th>
                        <th><select name="punt1[]" id="">
                            <option value="nil">No</option>
                            <option value="Yes">A</option>
                        </select></th>
                        <th><select name="punt2[]" id="">
                            <option value="nil">No</option>
                            <option value="Yes">A</option>
                        </select></th>
                        <th><select name="punt3[]" id="">
                            <option value="nil">No</option>
                            <option value="Yes">A</option>
                        </select></th>
                        <th><select name="punt4[]" id="">
                            <option value="nil">No</option>
                            <option value="Yes">A</option>
                        </select></th>
                        <!-- <th><select name="punt5" id="">
                            <option value="">No</option>
                            <option value="Yes">A</option>
                        </select></th> -->
                        <!-- <td><input type="checkbox" value="Yes" name="1" id=""></td>
                        <td><input type="checkbox" value="Yes" name="2" id=""></td>
                        <td><input type="checkbox" value="Yes" name="3" id=""></td>
                        <td><input type="checkbox" value="Yes" name="4" id=""></td> -->
                        </tr>
                        @else
                            
                        @endif
                    
                    @endforeach

                  </table>
    
                </div>
                <table class="table table-bordered">
                  <tr>
                    <th style="width:50%" colspan="5" style="text-align: center">GRADING AND KEY</th>
                    
                  </tr>
                  <tr>
                    <th>0</th>
                    <td>-</td>
                    <td>39</td>
                    <td>F</td>
                    <td>FAIL</td>
                  </tr>
                  <tr>
                    <th>40</th>
                    <td>-</td>
                    <td>49</td>
                    <td>E</td>
                    <td>FAIR</td>
                  </tr>
  
                  <tr>
                    <th>50</th>
                    <td>-</td>
                    <td>59</td>
                    <td>D</td>
                    <td>PASS</td>
                  </tr>
                  <tr>
                    <th>60</th>
                    <td>-</td>
                    <td>69</td>
                    <td>C</td>
                    <td>GOOD</td>
                  </tr>
  
                  <tr>
                    <th>70</th>
                    <td>-</td>
                    <td>79</td>
                    <td>B</td>
                    <td>VERY GOOD</td>
                  </tr>
                  <tr>
                    <th>80</th>
                    <td>-</td>
                    <td>100</td>
                    <td>A</td>
                    <td>EXCELLENCE</td>
                  </tr>
                  
                </table>
              </div>
              <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> Submit
                 
              </button>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
















    

  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.footer')