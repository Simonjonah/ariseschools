
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Registration </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>Check </b>Results</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">

      
      <form action="{{ url('yourresultfinale') }}" method="post" enctype="multipart/form-data">
          @csrf
          {{-- $phone checkyourresults = User::find(1)->phone; --}}
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
    <label for="">Reg Number</label>
        <div class="input-group mb-3">
          <input name="regnumber" type="text" class="form-control" @error('regnumber') is-invalid @enderror"
          value="{{ old('regnumber') }}" placeholder="Reg Number">
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('regnumber')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="">Select Classname</label>
        <div class="input-group mb-3">
          <select name="classname" class="form-control">
            @foreach ($get_classnames as $get_classname)
            <option value="{{ $get_classname->classname }}">{{ $get_classname->classname }}</option>
            @endforeach
          </select>
        </div>
        @error('classname')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        
        

        <label for="">Select Academic Session</label>
        <div class="input-group mb-3">
          <select name="academic_session" class="form-control">
            @foreach ($addacademics as $addacademic)
            <option value="{{ $addacademic->academic_session }}">{{ $addacademic->academic_session }}</option>
            @endforeach
          </select>
        </div>
        @error('academic_session')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="">Select Term</label>
          <div class="input-group mb-3">
            <select name="term" class="form-control" id="">
               <option value="First Term">First Term</option>
                <option value="Second Term">Second Term</option>
                <option value="Third Term">Third Term</option>
            </select>
            
          </div>
          @error('term')
          <span class="text-danger">{{ $message }}</span>
          @enderror

          <label for="">Select Section</label>
          <div class="input-group mb-3">
            <select name="section" class="form-control" id="">
                <option value="Primary">Primary</option>
                <option value="Junior Secondary">Junior Secondary</option>
                <option value="Senior Secondary">Senior Secondary</option>
            </select>
          </div>
          @error('section')
          <span class="text-danger">{{ $message }}</span>
          @enderror
       
       
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Check Results</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      {{-- <a href="login" class="text-center">I already have a membership</a> --}}
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
