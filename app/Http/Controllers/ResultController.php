<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Domain;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Pin;
use App\Models\Position;
use App\Models\User;
use App\Models\Psycomotor;
use App\Models\Studentdomain;
use App\Models\Subject;
use App\Models\Teacherdomain;
use App\Models\Classname;
use App\Models\Alm;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Term;
use PDF;
use Illuminate\Support\Facades\Auth;
use Svg\Tag\Rect;

class ResultController extends Controller
{
    public function createresults(Request $request){
        if (Auth::guard('teacher')->user()->section == 'Primary') {
            $data = [];
            $almes = $request->input('alms');
            $signatures = $request->input('signature');
            $subjectnames = $request->input('subjectname');
            $test_1s = $request->input('test_1');
            $test_2s = $request->input('test_2');
            // $test_3s = $request->input('test_3');
            $examss = $request->input('exams');
            $school_ids = $request->input('school_id');
            $teacher_ids = $request->input('teacher_id');
            $user_ids = $request->input('user_id');
            $slugs = $request->input('slug');
            $academic_sessions = $request->input('academic_session');
            $regnumbers = $request->input('regnumber');
            $terms = $request->input('term');
            $student_ids = $request->input('student_id');
            $classnames = $request->input('classname');
            $fnames = $request->input('fname');
            $middlenames = $request->input('middlename');
            $surnames = $request->input('surname');
            $genders = $request->input('gender');
            $motors = $request->input('motor');
            $addresses = $request->input('address');
            $logos = $request->input('logo');
            $images_ds = $request->input('images');
            $schoolnames = $request->input('schoolname');
            $sections = $request->input('section');
            $lgas = $request->input('lga');
            // $slugs = $request->input('lga');
            
            
            
                for ($i = 0; $i < count($subjectnames); $i++) {
                    $data[] = [
                        
                        'alms' => $almes[$i],
                        'signature' => $signatures[$i],
                        'subjectname' => $subjectnames[$i],
                        'test_1' => $test_1s[$i],
                        'test_2' => $test_2s[$i],
                        // 'test_3' => $test_3s[$i],
                        'exams' => $examss[$i],
                        'user_id' => $user_ids[$i],
                        'school_id' => $school_ids[$i],
                        'teacher_id' => $teacher_ids[$i],
                        'slug' =>$slugs[$i],
                        'logo' =>$logos[$i],
                        'schoolname' =>$schoolnames[$i],
        
                        'academic_session' =>$academic_sessions[$i],
                        'regnumber' =>$regnumbers[$i],
                        'term' => $terms[$i],
                        'student_id' => $student_ids[$i],
                        'classname' => $classnames[$i],
                        'fname' => $fnames[$i],
                        'middlename' => $middlenames[$i],
                        'surname' => $surnames[$i],
                        'gender' => $genders[$i],
                        'images' => $images_ds[$i],
                        'address' => $addresses[$i],
                        'motor' => $motors[$i],
                        'section' => $sections[$i],
                        'lga' => $lgas[$i],
                        'total' => $test_1s[$i] + $test_2s[$i] + $examss[$i],

                        
                    ];
                }
        // dd($data);
                Result::insert($data);
        
            }else{

                $data = [];
                $almes = $request->input('alms');
                $signatures = $request->input('signature');
                $subjectnames = $request->input('subjectname');
                $test_1s = $request->input('test_1');
                $test_2s = $request->input('test_2');
                // $test_3s = $request->input('test_3');
                $examss = $request->input('exams');
                $school_ids = $request->input('school_id');
                $teacher_ids = $request->input('teacher_id');
                $user_ids = $request->input('user_id');
                $slugs = $request->input('slug');
                $academic_sessions = $request->input('academic_session');
                $regnumbers = $request->input('regnumber');
                $terms = $request->input('term');
                $student_ids = $request->input('student_id');
                $classnames = $request->input('classname');
                $fnames = $request->input('fname');
                $middlenames = $request->input('middlename');
                $surnames = $request->input('surname');
                $genders = $request->input('gender');
                $motors = $request->input('motor');
                $addresses = $request->input('address');
                $logos = $request->input('logo');
                $images_ds = $request->input('images');
                $schoolnames = $request->input('schoolname');
                $sections = $request->input('section');
                $lgas = $request->input('lga');
                // $slugs = $request->input('lga');
                
                
                
                    for ($i = 0; $i < count($subjectnames); $i++) {
                        $data[] = [
                            
                            'alms' => $almes[$i],
                            'signature' => $signatures[$i],
                            'subjectname' => $subjectnames[$i],
                            'test_1' => $test_1s[$i],
                            'test_2' => $test_2s[$i],
                            // 'test_3' => $test_3s[$i],
                            'exams' => $examss[$i],
                            'user_id' => $user_ids[$i],
                            'school_id' => $school_ids[$i],
                            'teacher_id' => $teacher_ids[$i],
                            'slug' =>$slugs[$i],
                            'logo' =>$logos[$i],
                            'schoolname' =>$schoolnames[$i],
            
                            'academic_session' =>$academic_sessions[$i],
                            'regnumber' =>$regnumbers[$i],
                            'term' => $terms[$i],
                            'student_id' => $student_ids[$i],
                            'classname' => $classnames[$i],
                            'fname' => $fnames[$i],
                            'middlename' => $middlenames[$i],
                            'surname' => $surnames[$i],
                            'gender' => $genders[$i],
                            'images' => $images_ds[$i],
                            'address' => $addresses[$i],
                            'motor' => $motors[$i],
                            'section' => $sections[$i],
                            'lga' => $lgas[$i],
                            'total' => $test_1s[$i] + $test_2s[$i] + $examss[$i],
    
                            
                        ];
                    }
            // dd($data);
                    Result::insert($data);
    

               
               
            }

       return redirect()->back()->with('success', 'you have added successfully');
    }



    public function createresultsadmin(Request $request){
        if (Auth::guard('teacher')->user()->section == 'Primary') {
            $data = [];
            $almes = $request->input('alms');
            $signatures = $request->input('signature');
            $subjectnames = $request->input('subjectname');
            $test_1s = $request->input('test_1');
            $test_2s = $request->input('test_2');
            // $test_3s = $request->input('test_3');
            $examss = $request->input('exams');
            $school_ids = $request->input('school_id');
            $teacher_ids = $request->input('teacher_id');
            $user_ids = $request->input('user_id');
            $slugs = $request->input('slug');
            $academic_sessions = $request->input('academic_session');
            $regnumbers = $request->input('regnumber');
            $terms = $request->input('term');
            $student_ids = $request->input('student_id');
            $classnames = $request->input('classname');
            $fnames = $request->input('fname');
            $middlenames = $request->input('middlename');
            $surnames = $request->input('surname');
            $genders = $request->input('gender');
            $motors = $request->input('motor');
            $addresses = $request->input('address');
            $logos = $request->input('logo');
            $images_ds = $request->input('images');
            $schoolnames = $request->input('schoolname');
            $sections = $request->input('section');
            $lgas = $request->input('lga');
            // $slugs = $request->input('lga');
            
            
            
                for ($i = 0; $i < count($subjectnames); $i++) {
                    $data[] = [
                        
                        'alms' => $almes[$i],
                        'signature' => $signatures[$i],
                        'subjectname' => $subjectnames[$i],
                        'test_1' => $test_1s[$i],
                        'test_2' => $test_2s[$i],
                        // 'test_3' => $test_3s[$i],
                        'exams' => $examss[$i],
                        'user_id' => $user_ids[$i],
                        'school_id' => $school_ids[$i],
                        'teacher_id' => $teacher_ids[$i],
                        'slug' =>$slugs[$i],
                        'logo' =>$logos[$i],
                        'schoolname' =>$schoolnames[$i],
        
                        'academic_session' =>$academic_sessions[$i],
                        'regnumber' =>$regnumbers[$i],
                        'term' => $terms[$i],
                        'student_id' => $student_ids[$i],
                        'classname' => $classnames[$i],
                        'fname' => $fnames[$i],
                        'middlename' => $middlenames[$i],
                        'surname' => $surnames[$i],
                        'gender' => $genders[$i],
                        'images' => $images_ds[$i],
                        'address' => $addresses[$i],
                        'motor' => $motors[$i],
                        'section' => $sections[$i],
                        'lga' => $lgas[$i],
                        'total' => $test_1s[$i] + $test_2s[$i] + $examss[$i],

                        
                    ];
                }
        // dd($data);
                Result::insert($data);
        
            }else{

                $data = [];
                $almes = $request->input('alms');
                $signatures = $request->input('signature');
                $subjectnames = $request->input('subjectname');
                $test_1s = $request->input('test_1');
                $test_2s = $request->input('test_2');
                // $test_3s = $request->input('test_3');
                $examss = $request->input('exams');
                $school_ids = $request->input('school_id');
                $teacher_ids = $request->input('teacher_id');
                $user_ids = $request->input('user_id');
                $slugs = $request->input('slug');
                $academic_sessions = $request->input('academic_session');
                $regnumbers = $request->input('regnumber');
                $terms = $request->input('term');
                $student_ids = $request->input('student_id');
                $classnames = $request->input('classname');
                $fnames = $request->input('fname');
                $middlenames = $request->input('middlename');
                $surnames = $request->input('surname');
                $genders = $request->input('gender');
                $motors = $request->input('motor');
                $addresses = $request->input('address');
                $logos = $request->input('logo');
                $images_ds = $request->input('images');
                $schoolnames = $request->input('schoolname');
                $sections = $request->input('section');
                $lgas = $request->input('lga');
                // $slugs = $request->input('lga');
                
                
                
                    for ($i = 0; $i < count($subjectnames); $i++) {
                        $data[] = [
                            
                            'alms' => $almes[$i],
                            'signature' => $signatures[$i],
                            'subjectname' => $subjectnames[$i],
                            'test_1' => $test_1s[$i],
                            'test_2' => $test_2s[$i],
                            // 'test_3' => $test_3s[$i],
                            'exams' => $examss[$i],
                            'user_id' => $user_ids[$i],
                            'school_id' => $school_ids[$i],
                            'teacher_id' => $teacher_ids[$i],
                            'slug' =>$slugs[$i],
                            'logo' =>$logos[$i],
                            'schoolname' =>$schoolnames[$i],
            
                            'academic_session' =>$academic_sessions[$i],
                            'regnumber' =>$regnumbers[$i],
                            'term' => $terms[$i],
                            'student_id' => $student_ids[$i],
                            'classname' => $classnames[$i],
                            'fname' => $fnames[$i],
                            'middlename' => $middlenames[$i],
                            'surname' => $surnames[$i],
                            'gender' => $genders[$i],
                            'images' => $images_ds[$i],
                            'address' => $addresses[$i],
                            'motor' => $motors[$i],
                            'section' => $sections[$i],
                            'lga' => $lgas[$i],
                            'total' => $test_1s[$i] + $test_2s[$i] + $examss[$i],
    
                            
                        ];
                    }
            // dd($data);
                    Result::insert($data);
    

               
               
            }

       return redirect()->back()->with('success', 'you have added successfully');
    }



    public function createresultsbyteacter(Request $request){
        
        $data = [];

        $subjectnames = $request->input('subjectname');
        $test_1s = $request->input('test_1');
        $test_2s = $request->input('test_2');
        // $test_3s = $request->input('test_3');
        $examss = $request->input('exams');
        $user_ids = $request->input('user_id');
        $regnumbers = $request->input('schoolname');
        $teacher_ids = $request->input('teacher_id');
        $addresses = $request->input('address');
        $motors = $request->input('motor');
        $academic_sessions = $request->input('academic_session');
        $regnumbers = $request->input('regnumber');
        $terms = $request->input('term');
        $student_ids = $request->input('student_id');
        $classnames = $request->input('classname');
        $fnames = $request->input('fname');
        $middlenames = $request->input('middlename');
        $surnames = $request->input('surname');
        $genders = $request->input('gender');
        $images_ds = $request->input('images');
        $logo_ds = $request->input('logo');
        $schoolnames = $request->input('schoolname');
        $lgas = $request->input('lga');
        $slugs = $request->input('slug');
        $signatures = $request->input('signature');
        $sections = $request->input('section');
        
        
        
      
        for ($i = 0; $i < count($subjectnames); $i++) {

            $data[] = [

                'subjectname' => $subjectnames[$i],
                'test_1' => $test_1s[$i],
                'test_2' => $test_2s[$i],
                // 'test_3' => $test_3s[$i],
                'exams' => $examss[$i],
                'user_id' => $user_ids[$i],
                'teacher_id' =>$teacher_ids[$i],
                'schoolname' =>$schoolnames[$i],
                'motor' =>$motors[$i],
                'address' =>$addresses[$i],

                'academic_session' =>$academic_sessions[$i],
                'regnumber' =>$regnumbers[$i],
                'term' => $terms[$i],
                'student_id' => $student_ids[$i],
                'classname' => $classnames[$i],
                'fname' => $fnames[$i],
                'middlename' => $middlenames[$i],
                'surname' => $surnames[$i],
                'gender' => $genders[$i],
                'images' => $images_ds[$i],
                'pins' => substr(rand(0,time()),0, 9),
                'logo' => $logo_ds[$i],
                'lga' => $lgas[$i],
                'slug' => $slugs[$i],
                'signature' => $signatures[$i],
                'section' => $sections[$i],
                'total' => $test_1s[$i] + $test_2s[$i] + $examss[$i],
                
            ];

            
        }
//dd($data);
        Result::insert($data);
// $collection = collect($data);

//                 $filteredData = $collection->where('regnumber', $request->regnumber);
//                  $sum0 = $filteredData->sum('test_1');
//                  $sum1 = $filteredData->sum('test_2');
//                  $sum2 = $filteredData->sum('test_3');
//                  $sum3 = $filteredData->sum('exams');
//                  $sum = $sum0 + $sum1 + $sum2 + $sum3;
                 
         
//                      Position::create([
//                          'regnumber' => $request->regnumber,
//                          'term' => $request->term,
//                          'classname' => $request->classname,
//                          'academic_session' => $request->academic_session,
//                          'total_score' => $sum,
//                      ]);
        
        //return redirect()->route('psycomotor', ['ref_no' =>$user_ids->ref_no]); 
       return redirect()->back()->with('success', 'you have added successfully');
    }


    public function createresultsad(Request $request){
        

        $data = [];
        $subjectnames = $request->input('subjectname');
        $test_1s = $request->input('test_1');
        $test_2s = $request->input('test_2');
        // $test_3s = $request->input('test_3');
        $examss = $request->input('exams');
        $user_ids = $request->input('user_id');
        $teacher_ids = $request->input('teacher_id');
        $academic_sessions = $request->input('academic_session');
        $regnumbers = $request->input('regnumber');
        $terms = $request->input('term');
        $guardian_ids = $request->input('guardian_id');
        $classnames = $request->input('classname');
        
      
        for ($i = 0; $i < count($subjectnames); $i++) {
            $data[] = [

                'subjectname' => $subjectnames[$i],
                'test_1' => $test_1s[$i],
                'test_2' => $test_2s[$i],
                // 'test_3' => $test_3s[$i],
                'exams' => $examss[$i],
                'user_id' => $user_ids[$i],
                'teacher_id' =>$teacher_ids[$i],

                'academic_session' =>$academic_sessions[$i],
                'regnumber' =>$regnumbers[$i],
                'term' => $terms[$i],
                'guardian_id' => $guardian_ids[$i],
                'classname' => $classnames[$i],
            ];
        }
        Result::insert($data);

        //return redirect()->route('psycomotor', ['ref_no' =>$user_ids->ref_no]); 
       return redirect()->back()->with('success', 'you have added successfully');
    }


   
    public function teacherviewresults($student_id){
        $view_myresult_results = Result::where('student_id', $student_id)
        ->where('term', 'First Term')
        ->get();

        $view_results = Result::where('student_id', $student_id)->first();
           
        return view('dashboard.teacherviewresults', compact('view_results', 'view_myresult_results'));
    }

    public function teacherviewresults2nd($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)
        ->where('term', 'Second Term')
        ->get();

        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.teacherviewresults', compact('view_results', 'view_myresult_results'));
    }


    public function teacherviewresults3rd($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)
        ->where('term', 'third Term')
        ->get();
        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.teacherviewresults3rd', compact('view_results', 'view_myresult_results'));
    }

    public function addpsychomotor($id){
        $add_psychomotor = Result::find($id);
        $view_domains = Domain::all();
        $view_pscos = Domain::where('psycomoto', 'Psychomotor Domain')->get();

        return view('dashboard.teacher.addpsychomotor', compact('view_pscos','add_psychomotor', 'view_domains'));
    }
    public function thirdtermresults(){
        $view_myresults = Result::where('teacher_id', auth::guard('web')->id())
         ->where('term', 'third Term')
        ->get();
        return view('dashboard.thirdtermresults', compact('view_myresults'));
    }
 
    

    public function secondtermresults(){
        $view_myresult_penultimates = Result::where('teacher_id', auth::guard('web')->id())
         ->where('term', 'Second Term')
        ->get();
        return view('dashboard.secondtermresults', compact('view_myresult_penultimates'));
    }
    
   
    public function checkresult(){
       $the_results = Academicsession::all();
        return view('dashboard.guardian.checkresult', compact('the_results'));
    }
    

    public function yourresult(Request $request){
        $request->validate([
            'pins' => ['required', 'string'],
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

        ], [
            'pins.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('pins', $request->pins)
        ->exists()) {
        $getyour_results = Result::where('user_id', auth::guard('web')->id()
        )->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
       // $view_results = Result::where('user_id', $user_id)->first();
       $getyours = Result::where('user_id', auth::guard('web')->id()
       )->where('term', 'First Term')->take(1)
       ->get();

       
       
        // $pdf = PDF::loadView('dashboard.pdf', compact('getyours','getyour_results'));

        // return $pdf->download('school_report.pdf');
    return view('dashboard.guardian.yourresult', compact('getyours','getyour_results'));
      
    }

    public function printresult(Request $request, $user_id){
        $print_results = Result::where('user_id', $user_id)
        ->where('term', 'First Term')->get();
        return view('dashboard.printresult', compact('print_results'));
    }




    public function generatePDF(Request $request)
    {

        $request->validate([
            // 'classname' => ['required', 'string'],
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->exists()) {
        $getyour_results = Result::where('guardian_id', auth::guard('guardian')->id()
        )->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

        $total_subject = Result::where('guardian_id', auth::guard('guardian')->id()
        )->where('classname', $request->classname)
        ->where('term', $request->term)->count();

        $total_student = Result::where('guardian_id', auth::guard('guardian')->id()
        )->where('classname', $request->classname)
        ->where('term', $request->term)->count();
        $pdf = PDF::loadView('dashboard.guardian.pdf', compact('total_student', 'total_subject', 'getyour_results'));
     
        return $pdf->download('goldendestinyschools.pdf');
    }



    public function viewresultbyadmins(){
        $view_results = Result::latest()->get();
        $view_schoolsnames = User::where('status', 'admitted')->get();
        $view_academcsessions = Academicsession::all();
        $view_terms = Term::all();
        return view('dashboard.admin.viewresultbyadmins', compact('view_terms', 'view_academcsessions', 'view_schoolsnames', 'view_results'));
    }

    public function searchresults(Request $request){
        $request->validate([
            'term' => ['required', 'string'],
            'school_id' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
        ]);
        if($view_schholsresults = Result::where('term', $request->term)
        ->where('school_id', $request->school_id)
        ->where('academic_session', $request->academic_session)
        ->exists()) {
            $view_schholsresults = Result::orderby('created_at', 'DESC')
            ->where('school_id', $request->school_id)
            ->where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->get(); 
            }else{
                return view('dashboard.admin.noresult');
                //return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.admin.yourschoolreults', compact('view_schholsresults'));
    
        }
    
        public function searchresultsforclasses(Request $request){
            $request->validate([
                'regnumber' => ['required', 'string'],
                'academic_session' => ['required', 'string'],
                'term' => ['required', 'string'],
                'classname' => ['required', 'string'],
                'school_id' => ['nullable', 'string'],
    
            ], [
                'regnumber.exist'=>'This email does not exist in the admins table'
            ]);
            if($getyour_results = Result::where('regnumber', $request->regnumber)
            ->where('term', $request->term)
            // ->where('section', $request->section)
            ->where('classname', $request->classname)
            ->where('school_id', $request->school_id)
            ->where('academic_session', $request->academic_session)
            ->exists()) {
            $getyour_results = Result::where('regnumber',  $request->regnumber
            )->where('academic_session', $request->academic_session)
           
            ->where('classname', $request->classname)
            ->where('term', $request->term)
            ->where('school_id', $request->school_id)
    
            ->get();
            }else{
                return redirect()->back()->with('fail', 'There is no results for you!');
            }
    
        
            // dd($result);
           $collection = collect($getyour_results);
    
           $filteredData = $collection->where('regnumber', $request->regnumber);
            $sum0 = $filteredData->sum('test_1');
            $sum1 = $filteredData->sum('test_2');
            $sum2 = $filteredData->sum('test_3');
            $sum3 = $filteredData->sum('exams');
            $sum = $sum0 + $sum1 + $sum2 + $sum3;
            // if ($request->term == null && $request->academic_session == null && $request->classname == null) {
                Position::firstOrCreate([
                    'regnumber' => $request->regnumber,
                    'term' => $request->term,
                    // 'school_id' => $getyour_results->school_id,
                    'classname' => $request->classname,
                    'academic_session' => $request->academic_session,
                    'total_score' => $sum,
                ]);
          
            
            $studentpositions = Position::orderBy('total_score', 'DESC')->where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('classname', $request->classname)->get();
            
            // $studentpos = Position::orderBy('total_score', 'Asc')->where('term', $request->term)
            // ->where('academic_session', $request->academic_session)
            // ->where('classname', $request->classname)
            // ->where('total_score', $sum)->get();
    
            $rank = 1;
            foreach ($studentpositions as $student) {
                $student->update(['rank' => $rank] = ['rank' => $rank]);
                $rank++;
            }
          
            $rankedStudents = Position::orderBy('rank')->where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('classname', $request->classname)->where('regnumber', $request->regnumber)->first();
    
            $total_subject = Result::where('academic_session', $request->academic_session)
            ->where('term', $request->term)->count();
    
            $total_student = Result::where('academic_session', $request->academic_session)
            ->where('term', $request->term)->count();

            $getyour_resultsdomains = Studentdomain::where('academic_session', $request->academic_session)
                ->where('term', $request->term)
                // ->where('section', $request->section)
                ->where('regnumber', $request->regnumber)
                ->where('classname', $request->classname)
                ->get();
            
              
                return view('dashboard.admin.yourschoolreultsbyadmin', compact('rankedStudents', 'getyour_resultsdomains', 'getyour_results'));
        
            }
        
            public function editviewresultsad($id){
                $edit_results = Result::find($id);
                return view('dashboard.admin.editviewresultsad', compact('edit_results'));
            }
        

    public function viewresults($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)->get();
        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.admin.viewresults', compact('view_results', 'view_myresult_results'));
    }

    public function viewresult($id){
        // $view_myresult_results = Result::where('id', $id)->get();
        $viewsingle_results = Result::where('id', $id)->first();
        
           
        return view('dashboard.admin.viewresult', compact('viewsingle_results'));
    }

    public function viewallresults(){
        $viewals_results = Result::latest()->get();
        return view('dashboard.admin.viewallresults', compact('viewals_results'));
    }

    
    public function approveresultbyteacher($id){
        $approved_results = Result::find($id);
        $approved_results->status = 'approved';
        $approved_results->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    
    public function approveresults($id){
        $approved_results = Result::find($id);
        $approved_results->status = 'approved';
        $approved_results->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    // public function approvedresultsc($id){
    //     $approved_results = Result::find($id);
    //     $approved_results->status = 'approved';
    //     $approved_results->save();
    //     return redirect()->back()->with('success', 'you have approved successfully');
    // }

    public function viewpins(){
        $view_pins = Result::latest()->get();
        $view_schoolsnames = User::where('status', 'admitted')->latest()->get();
        $view_academcsessions = Academicsession::all();
        $view_terms = Term::all();
        return view('dashboard.admin.viewpins', compact('view_terms', 'view_academcsessions', 'view_schoolsnames', 'view_pins'));
    }

    public function viewapproveresultsbyad(){
        $approve_results = Result::where('status', 'approved')->get();
        $view_schoolsnames = User::where('status', 'admitted')->get();
        $view_academcsessions = Academicsession::all();
        $view_terms = Term::all();
        return view('dashboard.admin.viewapproveresultsbyad', compact('view_terms', 'view_academcsessions', 'view_schoolsnames', 'approve_results'));
    }
    
    public function addpsychomotorad($id){
        $add_psychomotorad = Result::find($id);
        return view('dashboard.admin.addpsychomotorad', compact('add_psychomotorad'));
    }

   
         
      
    public function pdf1(){
        $getyour_results = Result::all();
        return view('dashboard.guardian.pdf1', compact('getyour_results'));
    }
    public function tecacherviewresultbysub(){
        // $view_results = Result::where('student_id', $student_id)->first();
        $view_myresult_results = Result::where('teacher_id', auth::guard('teacher')->id())
        ->where('status', null)->latest()->get();
        $view_sessions = Academicsession::all();
        $view_classes = Classname::all();
        $view_alms = Alm::all();
        
        return view('dashboard.teacher.tecacherviewresultbysub', compact('view_alms', 'view_classes', 'view_sessions', 'view_myresult_results'));
    }

    public function tecacherviewresultbysubapproved(){
        // $view_results = Result::where('student_id', $student_id)->first();
        $view_myresult_results = Result::where('teacher_id', auth::guard('teacher')->id())
        ->where('status', 'approved')->latest()->get();
        $view_classes = Classname::all();
        $view_alms = Alm::all(); 
        $view_sessions = Academicsession::all(); 
         
        return view('dashboard.teacher.tecacherviewresultbysubapproved', compact('view_sessions', 'view_alms', 'view_classes', 'view_myresult_results'));
    }

    

    public function addpsychomotorteacher($id){
        $addpsychomotor_results = Result::find($id);
        return view('dashboard.teacher.addpsychomotorteacher', compact('addpsychomotor_results'));
    }

    

    public function checkresults (){
        $addacademics = Academicsession::latest()->get();
        $getyours = Term::all();
        $get_alms = Alm::all();
        $get_classnames = Classname::orderBy('classname')->get();
        return view('pages.checkresults', compact('get_classnames', 'get_alms', 'addacademics', 'getyours'));
    }


    public function checkyourresults(Request $request)
    {
        $request->validate([
            'pins' => ['required', 'string'],
            'regnumber' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'term' => ['required', 'string',],
            
            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->exists()) {
        $getyour_results = Result::where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

        $total_subject = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();

        $total_student = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();
        // $phone = User::find(1)->phone;

        $getyour_resultsdomains = Studentdomain::where('term', $request->term)->get();
        //$pdf = PDF::loadView('dashboard.guardian.pdf', compact('total_student', 'total_subject', 'getyour_results'));
     
        return view('pages.resultterm', compact('getyour_resultsdomains', 'total_student', 'total_subject', 'getyour_results'));
    }

    public function addpsychomotorteacher1($id){
        $view_yourtudents = Result::where('id', $id)->first();
        $view_yourdomains = Domain::all();
        return view('dashboard.teacher.addpsychomotorteacher1', compact('view_yourdomains','view_yourtudents'));
    }
    

    public function searchstudentresults(Request $request){
        $request->validate([
            'term' => ['required', 'string'],
            'regnumber' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'classname' => ['required', 'string'],
        ]);
        dd($request->all());
        if($view_schholsresults = Result::where('term', $request->term)
        ->where('regnumber', $request->regnumber)
        ->where('academic_session', $request->academic_session)
        ->where('classname', $request->classname)
        ->where('term', $request->term)
        ->exists()) {
            $view_schholsresults = Result::orderby('created_at', 'DESC')
            ->where('regnumber', $request->regnumber)
            ->where('term', $request->term)
            ->where('academic_session', $request->academic_sessbion)
            ->where('classname', $request->classname)

            ->get(); 
            }else{
                return view('dashboard.admin.noresult');
                //return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.admin.viewresultsl', compact('view_schholsresults'));
    
        }
    public function allresults(){
        $view_resultalls = Result::where('user_id', auth::guard('web')->id())->get();
        $view_classes = Classname::all();
        return view('dashboard.allresults', compact('view_classes', 'view_resultalls'));
    }

  

    // public function schoolsresults(){
    //     $view_resultalls = Result::where('user_id', auth::guard('web')->id())->get();
    //     $view_classes = Classname::all();
    //     return view('dashboard.schoolsresults', compact('view_classes', 'view_resultalls'));
    // }

    
    public function reachresultbysc(Request $request){
        $request->validate([
            'school_id' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

        ], [
            'school_id.exist'=>'This email does not exist in the admins table'
        ]);
        // dd($request);
        if($view_allresults = Result::where('classname', $request->classname)
        ->where('term', $request->term)
        ->where('school_id', $request->school_id)
        ->where('academic_session', $request->academic_session)
        ->exists()) {
        $view_allresults = Result::where('user_id', auth::guard('web')->id()
        )
        ->where('term', $request->term)
        ->where('school_id', $request->school_id)
        ->where('classname', $request->classname)
        ->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
    
            return view('dashboard.viewresultsbysc', compact('view_allresults'));
    
        }


        public function reachresultbystudentsc(Request $request){
            $request->validate([
                'classname' => ['required', 'string'],
                'regnumber' => ['required', 'string',],
                'academic_session' => ['required', 'string',],
                'term' => ['required', 'string'],
                'section' => ['required', 'string'],
    
            ], [
                'regnumber.exist'=>'This email does not exist in the admins table'
            ]);
            
            if($view_myresult_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
            ->where('classname', $request->classname)
            ->where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('section', $request->section)
            ->exists()) {
            $view_myresult_results = Result::where('academic_session', $request->academic_session)
            ->where('classname', $request->classname)
            ->where('term', $request->term)
            ->where('regnumber', $request->regnumber)
            ->where('section', $request->section)
            ->get();
            }else{
                return redirect()->back()->with('fail', 'There is no results for you!');
            }
            
            $view_psyos = Studentdomain::where('term', $request->term)->get();

            $total_subject = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();
        return view('dashboard.yourresultschools', compact('total_subject', 'view_psyos', 'view_myresult_results'));
          
        }


    //     public function yourresultfinale(Request $request){
    //         $request->validate([
    //             'section' => ['required', 'string'],
    //             'classname' => ['required', 'string'],
    //             'regnumber' => ['required', 'string'],
    //             'academic_session' => ['required', 'string'],
    //             'term' => ['required', 'string'],
    //             'alms' => ['nullable', 'string'],
    //         ], [
    //             'regnumber.exist'=>'This email does not exist in the admins table'
    //         ]);
    //     if($getyour_results = Result::where('regnumber', $request->regnumber)
    //     ->where('term', $request->term)
    //     ->where('classname', $request->classname)
    //     ->where('academic_session', $request->academic_session)
    //     ->where('section', $request->section)
    //     ->exists()) {
    //     $getyour_results = Result::where('academic_session', $request->academic_session)
    //     ->where('term', $request->term)
    //     ->where('classname', $request->classname)
    //     ->where('alms', $request->alms)
    //     ->where('section', $request->section)
    //     ->where('regnumber', $request->regnumber)
    //     ->get();
    //     }else{
    //         return redirect()->back()->with('fail', 'There is no results for you!');
    //     }

    //     $total_subject = Result::where('academic_session', $request->academic_session)
    //     ->where('term', $request->term)->count();

    //     $total_student = Result::where('academic_session', $request->academic_session)
    //     ->where('term', $request->term)->count();
    //     $getyour_resultsdomains = Studentdomain::all();
         
    //     if($request->section == 'Primary'){
    //         return view('pages.resultspdf', compact('getyour_resultsdomains', 'total_subject', 'getyour_results'));

    //     }

    //     //$pdf = PDF::loadView('pages.pdf', compact('getyour_resultsdomains', 'total_subject', 'getyour_results'));
    
    //    // return $pdf->download('school_report.pdf');
         
    //     }


    public function yourresultfinale(Request $request){
        $request->validate([
            'section' => ['required', 'string'],
            'regnumber' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'term' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'alms' => ['nullable', 'string'],

        ], [
            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)
        ->where('term', $request->term)
        ->where('section', $request->section)
        ->where('classname', $request->classname)
        ->where('alms', $request->alms)
        ->where('academic_session', $request->academic_session)
        ->exists()) {
        $getyour_results = Result::where('regnumber',  $request->regnumber
        )->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('classname', $request->classname)
        ->where('term', $request->term)
        ->where('alms', $request->alms)

        ->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

    
        // dd($result);
       $collection = collect($getyour_results);

       $filteredData = $collection->where('regnumber', $request->regnumber);
        $sum0 = $filteredData->sum('test_1');
        $sum1 = $filteredData->sum('test_2');
        $sum2 = $filteredData->sum('test_3');
        $sum3 = $filteredData->sum('exams');
        $sum = $sum0 + $sum1 + $sum2 + $sum3;
        // if ($request->term == null && $request->academic_session == null && $request->classname == null) {
            Position::firstOrCreate([
                'regnumber' => $request->regnumber,
                'term' => $request->term,
                // 'school_id' => $getyour_results->id,
                'classname' => $request->classname,
                'academic_session' => $request->academic_session,
                'total_score' => $sum,
            ]);
      
        
        $studentpositions = Position::orderBy('total_score', 'DESC')->where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('classname', $request->classname)->get();
        
        // $studentpos = Position::orderBy('total_score', 'Asc')->where('term', $request->term)
        // ->where('academic_session', $request->academic_session)
        // ->where('classname', $request->classname)
        // ->where('total_score', $sum)->get();

        $rank = 1;
        foreach ($studentpositions as $student) {
            $student->update(['rank' => $rank] = ['rank' => $rank]);
            $rank++;
        }
      
        $rankedStudents = Position::orderBy('rank')->where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('classname', $request->classname)->where('regnumber', $request->regnumber)->first();

        $total_subject = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();

        $total_student = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();
        $getyour_resultsdomains = Studentdomain::where('term', $request->term)->get();
           
       return view('pages.resultspdf', compact('rankedStudents', 'studentpositions', 'getyour_resultsdomains', 'total_subject', 'getyour_results'));
       // $pdf = PDF::loadView('pages.pdf', compact('getyour_resultsdomains', 'total_subject', 'getyour_results'));
    
       //return $pdf->download('school_report.pdf');
         
        }






        public function searchpins(Request $request){
            $request->validate([
                'schoolname' => ['required', 'string'],
                'academic_session' => ['required', 'string'],
                'term' => ['required', 'string'],
    
            ], [
                'schoolname.exist'=>'This email does not exist in the admins table'
            ]);
        if($getyour_pins = Result::where('schoolname', $request->schoolname)->where('term', $request->term)
        ->exists()) {
        $getyour_pins = Result::where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

         
        $pdf = PDF::loadView('dashboard.admin.pdfpins', compact('getyour_pins'));
    
        return $pdf->download('school_pins.pdf');
         
        }

        public function viewschoolpins($user_id){
            $view_schoolpins = Result::where('user_id', $user_id)->latest()->get();
            $view_academcsessions = Academicsession::all();
            return view('dashboard.admin.viewschoolpins', compact('view_academcsessions', 'view_schoolpins'));
        }


        
        public function searchpinsforclass(Request $request){
            $request->validate([
                'schoolname' => ['required', 'string'],
                'academic_session' => ['required', 'string'],
                'term' => ['required', 'string'],
                'classname' => ['required', 'string'],
    
            ], [
                'schoolname.exist'=>'This email does not exist in the admins table'
            ]);
        if($getyour_pins = Result::where('schoolname', $request->schoolname)->where('term', $request->term)
        ->where('classname', $request->classname)
        ->exists()) {
        $getyour_pins = Result::where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

         
        $pdf = PDF::loadView('dashboard.admin.pdfpinsforclass', compact('getyour_pins'));
    
        return $pdf->download('school_classpins.pdf');
         
        }
        

        public function searchfortermbyschresult(Request $request){
            // dd($request->all());
            $request->validate([
                'term' => ['required', 'string'],
                'academic_session' => ['required', 'string'],
                'classname' => ['required', 'string'],
                'section' => ['required', 'string'],
                'school_id' => ['required', 'string'],
                'alms' => ['nullable', 'string'],

            ]);
            // dd($request->all());
            if($view_myresults = Result::where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('classname', $request->classname)
            ->where('school_id', $request->school_id)
            ->where('section', $request->section)
            ->exists()) {
                $view_myresults = Result::orderby('created_at', 'DESC')
                ->where('term', $request->term)
                ->where('academic_session', $request->academic_session)
                ->where('classname', $request->classname)
                ->where('school_id', $request->school_id)
                ->where('section', $request->section)
                ->where('alms', $request->alms)

                ->get(); 
                }else{
                   // return view('dashboard.teacher.noresult');
                    return redirect()->back()->with('fail', 'There is no students results in these class!');
                }
                return view('dashboard.teacher.yourschoolreultstermbyprinc', compact('view_myresults'));
        
            }


            public function searchfortermbysch(Request $request){
                $request->validate([
                    'term' => ['required', 'string'],
                    'academic_session' => ['required', 'string'],
                    'classname' => ['required', 'string'],
                    'schoolname' => ['required', 'string'],
                    'lga' => ['required', 'string'],
                ]);
                if($view_myresults = Result::where('term', $request->term)
                ->where('academic_session', $request->academic_session)
                ->where('classname', $request->classname)
                ->where('schoolname', $request->schoolname)
                ->where('lga', $request->lga)
                ->exists()) {
                    $view_myresults = Result::orderby('created_at', 'DESC')
                    ->where('term', $request->term)
                    ->where('academic_session', $request->academic_session)
                    ->where('classname', $request->classname)
                    ->where('schoolname', $request->schoolname)
                    ->where('lga', $request->lga)
    
                    ->get(); 
                    }else{
                       // return view('dashboard.web.noresult');
                        return redirect()->back()->with('fail', 'Result not found!');
                    }
                    return view('dashboard.yourschoolreultsterm', compact('view_myresults'));
            
                }




                public function searchforstudentresult (Request $request){
                    // dd($request->all());

                    $request->validate([
                        'section' => ['required', 'string'],
                        'classname' => ['required', 'string'],
                        'regnumber' => ['required', 'string'],
                        'academic_session' => ['required', 'string'],
                        'term' => ['required', 'string'],
                        'alms' => ['nullable', 'string'],
                        'school_id' => ['required', 'string'],
                    ], [
                        'regnumber.exist'=>'This email does not exist in the admins table',
                        // 'alms.exist'=>'This email does not exist in the admins table'
                    ]);
                    // dd($request->all());

                if($getyour_results = Result::where('regnumber', $request->regnumber)
                ->where('term', $request->term)
                ->where('classname', $request->classname)
                ->where('academic_session', $request->academic_session)
                ->where('section', $request->section)
                ->where('alms', $request->alms)
                ->exists()) {
                $getyour_results = Result::where('academic_session', $request->academic_session)
                ->where('term', $request->term)
                ->where('classname', $request->classname)
                ->where('alms', $request->alms)
                ->where('section', $request->section)
                ->where('school_id', $request->school_id)
                ->where('alms', $request->alms)

                ->get();

                  // dd($result);
       $collection = collect($getyour_results);

       $filteredData = $collection->where('regnumber', $request->regnumber);
        $sum0 = $filteredData->sum('test_1');
        $sum1 = $filteredData->sum('test_2');
        $sum2 = $filteredData->sum('test_3');
        $sum3 = $filteredData->sum('exams');
        $sum = $sum0 + $sum1 + $sum2 + $sum3;
        // if ($request->term == null && $request->academic_session == null && $request->classname == null) {
            Position::firstOrCreate([
                'regnumber' => $request->regnumber,
                'term' => $request->term,
                'classname' => $request->classname,
                'academic_session' => $request->academic_session,
                'total_score' => $sum,
            ]);
      
        $studentpositions = Position::orderBy('total_score', 'DESC')->where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('classname', $request->classname)->get();
        
        $rank = 1;
        foreach ($studentpositions as $student) {
            $student->update(['rank' => $rank] = ['rank' => $rank]);
            $rank++;
        }
      
        $rankedStudents = Position::orderBy('rank')->where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('classname', $request->classname)->first();

                }else{
                    return redirect()->back()->with('fail', 'There is no results for you!');
                }
        
                $total_subject = Result::where('academic_session', $request->academic_session)
                ->where('term', $request->term)->count();
        
                $total_student = Student::where('academic_session', $request->academic_session)
                ->where('term', $request->term)
                ->where('school_id', $request->school_id)
                ->where('term', $request->term)
                ->where('alms', $request->alms)
                ->where('section', $request->section)
                ->where('classname', $request->classname)
                ->count();

                
                $getyour_resultsdomains = Studentdomain::where('academic_session', $request->academic_session)
                ->where('term', $request->term)
                ->where('section', $request->section)
                ->where('classname', $request->classname)->get();
                if ($request->section == 'Primary') {
                    return view('dashboard.teacher.childresults', compact('rankedStudents', 'studentpositions', 'total_student', 'total_subject', 'getyour_resultsdomains', 'getyour_results'));

                }
                return view('dashboard.teacher.childresultsecondary', compact('rankedStudents', 'studentpositions', 'total_student', 'total_subject', 'getyour_resultsdomains', 'getyour_results'));
                
            }



            public function allresultsprinci(){
                $view_myresults = Classname::all();
                $view_myresults = Result::where('status', null)->latest()->get();
                $view_classes = Classname::all();
                $view_terms = Term::all();
                $view_alms = Alm::all();
                $view_sessions = Academicsession::latest()->get();
        
                return view('dashboard.teacher.allresultsprinci', compact('view_alms', 'view_sessions', 'view_terms', 'view_classes', 'view_myresults'));
           
            }

            public function allresultsprinciapproved(){
                $view_myresults = Classname::all();
                $view_myresults = Result::where('status', 'approved')->latest()->get();
                $view_classes = Classname::all();
                $view_terms = Term::all();
                $view_alms = Alm::all();
                $view_sessions = Academicsession::latest()->get();
        
                return view('dashboard.teacher.allresultsprinciapproved', compact('view_alms', 'view_sessions', 'view_terms', 'view_classes', 'view_myresults'));
           
            }
            
        public function addcomment($id){
            $add_comments = Result::find($id);
            return view('dashboard.teacher.addcomment', compact('add_comments'));
        }

        public function addresultcomment(Request $request, $id){
            $add_comments = Result::find($id);
            $request->validate([
                'headteach_comment' => ['required'],
            ]);

            $add_comments->headteach_comment = $request->headteach_comment;
            $add_comments->update();

            return redirect()->back()->with('success', 'You have successfully added result comment');

        }


        public function searchforstudentresultbysession (Request $request){
            // dd($request->all());

            $request->validate([
                'section' => ['required', 'string'],
                'classname' => ['required', 'string'],
                'regnumber' => ['required', 'string'],
                'academic_session' => ['required', 'string'],
                'school_id' => ['required', 'string'],
            ], [
                'regnumber.exist'=>'This email does not exist in the admins table',
            ]);
            // dd($request->all());

        if($getyour_results = Result::where('regnumber', $request->regnumber)
        ->where('classname', $request->classname)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('school_id', $request->school_id)
        ->exists()) {
        $getyour_results = Result::where('academic_session', $request->academic_session)
        ->where('classname', $request->classname)
        ->where('section', $request->section)
        ->where('school_id', $request->school_id)
        ->where('regnumber', $request->regnumber)

        ->get();

          // dd($result);
$collection = collect($getyour_results);

$filteredData = $collection->where('regnumber', $request->regnumber)
->where('school_id', $request->school_id);
$sum0 = $filteredData->sum('test_1');
$sum1 = $filteredData->sum('test_2');
$sum2 = $filteredData->sum('test_3');
$sum3 = $filteredData->sum('exams');
$sum = $sum0 + $sum1 + $sum2 + $sum3;
// if ($request->term == null && $request->academic_session == null && $request->classname == null) {
    Position::firstOrCreate([
        'school_id' => $request->school_id,
        'regnumber' => $request->regnumber,
        'term' => $request->term,
        'classname' => $request->classname,
        'academic_session' => $request->academic_session,
        'total_score' => $sum,
    ]);


$studentpositions = Position::orderBy('total_score', 'DESC')
// ->where('section', $request->section)
// ->where('school_id', $request->school_id)
->where('academic_session', $request->academic_session)
->where('classname', $request->classname)->get();



$rank = 1;
foreach ($studentpositions as $student) {
    $student->update(['rank' => $rank] = ['rank' => $rank]);
    $rank++;
}

$rankedStudents = Position::orderBy('rank')->where('term', $request->term)
->where('academic_session', $request->academic_session)
->where('classname', $request->classname)->first();

        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

        $total_subject = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();

        $total_student = Student::where('academic_session', $request->academic_session)
        ->where('term', $request->term)
        ->where('school_id', $request->school_id)
        ->where('term', $request->term)
        ->where('alms', $request->alms)
        ->where('section', $request->section)
        ->where('classname', $request->classname)
        ->count();

        
        $getyour_resultsdomains = Studentdomain::all();
        if ($request->section == 'Primary') {
            return view('dashboard.teacher.childresults', compact('rankedStudents', 'studentpositions', 'total_student', 'total_subject', 'getyour_resultsdomains', 'getyour_results'));

        }
        return view('dashboard.teacher.childresultsecondary', compact('rankedStudents', 'studentpositions', 'total_student', 'total_subject', 'getyour_resultsdomains', 'getyour_results'));
        
    }

    public function addcommentsteachers($id){
        $add_comments = Result::find($id);

        return view('dashboard.teacher.addcommentsteachers', compact('add_comments'));
    }


    public function addheadteachercomment($id){
        $add_comments = Result::find($id);

        return view('dashboard.teacher.addheadteachercomment', compact('add_comments'));
    }

    
    public function addresultcommentbyteachers(Request $request, $id){
        $add_comments = Result::find($id);
        $request->validate([
            'teacher_comment' => ['required'],
            'next_term' => ['required'],
            
        ]);

        $add_comments->next_term = $request->next_term;
        $add_comments->teacher_comment = $request->teacher_comment;
        $add_comments->update();

        return redirect()->back()->with('success', 'You have successfully added result comment');

    }

    public function addheadcommentbyteachers(Request $request, $id){
        $add_comments = Result::find($id);
        $request->validate([
            'headteachercomment' => ['required'],
            
        ]);

        $add_comments->headteachercomment = $request->headteachercomment;
        $add_comments->update();

        return redirect()->back()->with('success', 'You have successfully added result comment');

    }

    public function editresultsbyteacher($id){
        $edit_results = Result::find($id);
        return view('dashboard.teacher.editresultsbyteacher', compact('edit_results'));
    }

    public function updateheresult(Request $request, $id){
        // dd($request->all());
        $edit_results = Result::find($id);
        $request->validate([
            'test_1' => ['required', 'max:255'],
            // 'test_3' => ['required', 'max:255'],
            'test_2' => ['required', 'max:255'],
            'exams' => ['required', 'max:255'],
        ]);

        $edit_results->test_1 = $request->test_1;
        $edit_results->test_2 = $request->test_2;
        $edit_results->test_3 = $request->test_3;
        $edit_results->exams = $request->exams;
        $edit_results->update();
        return redirect()->back()->with('success', 'You have successfully edited result ');
        
    }


    public function updateheresultadmin(Request $request, $id){
        // dd($request->all());
        $edit_results = Result::find($id);
        $request->validate([
            'test_1' => ['required', 'max:255'],
            // 'test_3' => ['required', 'max:255'],
            'test_2' => ['required', 'max:255'],
            'exams' => ['required', 'max:255'],
        ]);

        $edit_results->test_1 = $request->test_1;
        $edit_results->test_2 = $request->test_2;
        $edit_results->test_3 = $request->test_3;
        $edit_results->exams = $request->exams;
        $edit_results->update();
        return redirect()->back()->with('success', 'You have successfully edited result ');
        
    }

     
    public function reachresultbyposition(Request $request){
        $request->validate([
            'school_id' => ['required', 'string'],
            // 'classname' => ['required', 'string'],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string'],
            'section' => ['required', 'string'],

        ], [
            'school_id.exist'=>'This email does not exist in the admins table'
        ]);
        // dd($request->all());

        if($view_allresults = Result::where('term', $request->term)
        ->where('term', $request->term)
        ->where('school_id', $request->school_id)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->exists()) {
        $view_allresults = Result::where('section', $request->section)
        ->where('term', $request->term)
        ->where('school_id', $request->school_id)
        ->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
    
            return view('dashboard.viewresultsbyscposition', compact('view_allresults'));
    
        }

    public function addcommentadmin($id){
        $add_comment = Result::find($id);
        return view('dashboard.admin.addcommentadmin', compact('add_comment'));
    }

    public function addcommentsbyadmin(Request $request, $id){
        $add_comment = Result::find($id);
        $request->validate([
            'headteacher_comment' => ['required'],
        ]);
        $add_comment->headteacher_comment = $request->headteacher_comment;
        $add_comment->update();

        return redirect()->back()->with('success', 'You have added comment to the result successfully');
    }

    public function analyseresult($slug){
        $viewanalisis = Result::where('slug', $slug)->first();
        $view_academcsessions = Academicsession::latest()->get();
        $studentcount = Student::where('slug', $slug)->count();
        $teachercount = Teacher::where('slug', $slug)->count();

        return view('dashboard.admin.analyseresult', compact('teachercount', 'studentcount', 'view_academcsessions', 'viewanalisis'));
    }
        
}

    


