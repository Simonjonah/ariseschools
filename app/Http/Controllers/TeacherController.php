<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Alm;
use App\Models\Classname;
use App\Models\Subject;
use App\Models\Domain;
use App\Models\Result;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Teacherassign;
use App\Models\Teacherdomain;
use App\Models\Term;
use App\Models\School;
use App\Models\User;
use App\Models\Schoolnew;

use App\Models\Lga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //

    
    public function createteacher(Request $request){
        // dd($request->all());
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'centernumber' => ['required', 'string', 'max:255'],
            'connect' => ['required', 'string', 'max:255'],
            'lga' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'phone' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            'classname' => ['required', 'string'],
            'school_id' => ['required', 'string'],
            'ref_no1' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'section' => ['required', 'string'],
            'term' => ['required', 'string'],
            'motor' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'slug' => ['nullable', 'string'],
            'schooltype' => ['nullable', 'string'],
            'signature' => ['required', 'string'],
            'password' => ['required', 'string', 'min:5'],

        ]);
       $add_teacher = new Teacher();
        $add_teacher->surname = $request->surname;
        $add_teacher->schooltype = $request->schooltype;
        $add_teacher->signature = $request->signature;
        
        $add_teacher->fname = $request->fname;
        $add_teacher->centernumber = $request->centernumber;
        $add_teacher->email = $request->email;
        $add_teacher->phone = $request->phone;
        $add_teacher->section = $request->section;
        // $add_teacher->school_id = $request->school_id;
        $add_teacher->alms = $request->alms;
        $add_teacher->ref_no1 = $request->ref_no1;
        $add_teacher->slug = $request->slug;
        $add_teacher->academic_session = $request->academic_session;
        $add_teacher->user_id = $request->user_id;
        $add_teacher->school_id = $request->school_id;
        $add_teacher->motor = $request->motor;
        $add_teacher->logo = $request->logo;
        $add_teacher->address = $request->address;
        $add_teacher->connect = $request->connect;
        $add_teacher->lga = $request->lga;
       
        $add_teacher->term = $request->term;
        $add_teacher->assign1 = 'teacher';
        $add_teacher->ref_no = substr(rand(0,time()),0, 9);
        $add_teacher->classname = $request->classname;
        $add_teacher->password = \Hash::make($request->password);
       
        $add_teacher->save();
        if ($add_teacher) {
            return redirect()->route('teacher.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }



    public function teachercheck(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:teachers'],
            'password' => ['required', 'string', 'min:5']
        ], [
            'email.exist'=>'This email does not exist in the teachers table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('teacher')->attempt($creds)) {
            return redirect()->route('teacher.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('teacher.login')->with('error', 'Failed to login');
        }
    }

    public function home(){
        
        $resultscounts = Result::where('teacher_id', auth::guard('teacher')->id()
        )->count();

        $countcognitive = Teacherdomain::where('teacher_id', auth::guard('teacher')->id()
        )->where('psycomoto', 'Cognitive Domain')->count();
        
        $countpsycomo = Teacherdomain::where('teacher_id', auth::guard('teacher')->id()
        )->where('psycomoto', 'Psychomotor Domain')->count();
        $countsubject = Teacherassign::where('teacher_id', auth::guard('teacher')->id()
        )->count();
        $countprimarysubjects = Subject::where('section', 'Primary')->count();
        $countseconsubjects = Subject::where('section', 'Secondary')->count();
        $countteachers = Teacher::where('school_id', auth::guard('teacher')->user()->school_id)->count();
        $countclasses = Classname::where('section', 'Secondary')->count();

        $countapproveresult = Result::where('teacher_id', auth::guard('teacher')->id()
        )->where('status', 'approved')->count();
        
        $countunapproveresult = Result::where('teacher_id', auth::guard('teacher')->id()
        )->where('status', 'approved')->count();

        $countpsyco = Domain::where('psycomoto', 'Cognitive Domain')->count();

        //principals/hm/hs section
        $countresults = Result::where('school_id', auth::guard('teacher')->user()->school_id)->count();
        $countunapprove = Result::where('school_id', auth::guard('teacher')->user()
        ->school_id)->where('status', null)->count();
        $countunapprove = Result::where('school_id', auth::guard('teacher')->user()
        ->school_id)->where('status', null)->count();

        $countapprove = Result::where('school_id', auth::guard('teacher')->user()
        ->school_id)->where('status', 'approved')->count();
        $countsprimarysubjects = Subject::where('section', 'primary')->count();
        $countsecondarysubjects = Subject::where('section', 'Senior Secondary')->count();
        $countjuniorsubjects = Subject::where('section', 'Junior Secondary')->count();
        $countpsycomo1 = Domain::whereNot('section', 'Primary')->count();

        
        $countstudent = Student::where('school_id', auth::guard('teacher')->user()
        ->school_id)->count();

        $reinstate = Student::where('school_id', auth::guard('teacher')->user()
        ->school_id)->where('status', 'approved')->count();
        $suspendedstu = Student::where('school_id', auth::guard('teacher')->user()
        ->school_id)->where('status', 'suspend')->count();

        $viewschoolnews = Schoolnew::where('school_id', auth::guard('teacher')->user()
        ->school_id)->count();
        
        
        return view('dashboard.teacher.home', compact('viewschoolnews', 'suspendedstu', 'reinstate', 'countstudent', 'countpsycomo1', 'countjuniorsubjects', 'countsecondarysubjects', 'countsprimarysubjects', 'countapprove', 'countunapprove', 'countresults', 'countpsyco', 'countclasses', 'countteachers', 'countseconsubjects', 'countprimarysubjects', 'countunapproveresult', 'countapproveresult', 'countsubject', 'countpsycomo', 'countcognitive', 'resultscounts'));
    }

    public function profile1() {
        $countresults = Result::where('teacher_id', auth::guard('teacher')->id()
        )->count();
        return view('dashboard.teacher.profile1', compact('countresults'));
    }

    public function settingsupdate(Request $request, $id){
        $edit_profiles = teacher::find($id);
        $edit_profiles = teacher::where('id', $id)->first();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],

            'phone' => ['required', 'string'],
            'motor' => ['required', 'string'],
            'address' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
       // dd($request->all());
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $edit_profiles['images'] = $path;
        $edit_profiles->name = $request->name;
        $edit_profiles->email = $request->email;
        $edit_profiles->address = $request->address;
        $edit_profiles->phone = $request->phone;
        $edit_profiles->motor = $request->motor;
        $edit_profiles->designation = $request->designation;


        $edit_profiles->update();

        return redirect()->back()->with('success', 'you have update successfully');

    }



    public function editstudentsc($ref_no){
        $edit_studentsc = Teacher::where('ref_no', $ref_no)->first();

        return view('dashboard.editstudentsc', compact('edit_studentsc'));
       
    }
    public function approveteacherbysc ($ref_no){
        $reject_student = Teacher::where('ref_no', $ref_no)->first();
        $reject_student->status = 'admitted';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function approveteacherbytr ($ref_no){
        $reject_student = Teacher::where('ref_no', $ref_no)->first();
        $reject_student->status = 'admitted';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    
    public function suspendteacherbysc ($ref_no){
        $reject_student = Teacher::where('ref_no', $ref_no)->first();
        $reject_student->status = 'suspend';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }


    public function deleteteachersc ($ref_no){
        $reject_student = Teacher::where('ref_no', $ref_no)->delete();
        
        return redirect()->back()->with('success', 'you have suspended successfully');
    }
    

    public function edittteachersc($ref_no){
        $edit_teacher = Teacher::where('ref_no', $ref_no)->first();
        $view_alms = Alm::where('user_id', auth::guard('web')->id()
        )->get();

        $view_terms = Term::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sesions = Section::where('user_id', auth::guard('web')->id()
        )->get();
        $view_classes = Classname::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sessions = Academicsession::latest()->get();

        return view('dashboard.edittteachersc', compact('view_sessions', 'view_classes', 'view_sesions', 'view_terms', 'view_alms', 'edit_teacher'));
    }

    
    public function viewteachers(){
        $view_teachers = Teacher::where('assign1', 'teacher')
        ->latest()->orderBy('schoolname')->get();
        return view('dashboard.admin.viewteachers', compact('view_teachers'));
    }

    public function updatesteacher(Request $request, $ref_no){
        $edit_teacher = Teacher::where('ref_no', $ref_no)->first();
       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            'classname' => ['required', 'string'],
          
            'user_id' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'section' => ['required', 'string'],
            'term' => ['required', 'string'],
            'motor' => ['nullable', 'string'],

            
        ]);
// dd($request->all());
        $edit_teacher->surname = $request->surname;
        // $edit_teacher->email = $request->email;
        $edit_teacher->phone = $request->phone;
        $edit_teacher->section = $request->section;
        // $edit_teacher->schoolname = $request->schoolname;
        $edit_teacher->alms = $request->alms;
        // $edit_teacher->ref_no = $request->ref_no;
        $edit_teacher->academic_session = $request->academic_session;
        $edit_teacher->user_id = $request->user_id;
        $edit_teacher->motor = $request->motor;
       
        $edit_teacher->term = $request->term;
        $edit_teacher->classname = $request->classname;
       
        $edit_teacher->update();

        return redirect()->back()->with('success', 'you have successfully registered');

    }

    
    
    public function viewtteachertr($ref_no){
        $edit_teacher = Teacher::where('ref_no', $ref_no)->first();
        $view_alms = Alm::all();
       

        $view_terms = Term::all();
        $view_sesions = Section::all();
        $view_classes = Classname::all();
        $view_sessions = Academicsession::latest()->get();

        return view('dashboard.teacher.viewtteachertr', compact('view_sessions', 'view_classes', 'view_sesions', 'view_terms', 'view_alms', 'edit_teacher'));
    }


    public function viewtteachersc($ref_no){
        $edit_teacher = Teacher::where('ref_no', $ref_no)->first();
        $view_alms = Alm::where('user_id', auth::guard('web')->id()
        )->get();

        $view_terms = Term::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sesions = Section::where('user_id', auth::guard('web')->id()
        )->get();
        $view_classes = Classname::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sessions = Academicsession::latest()->get();

        return view('dashboard.viewtteachersc', compact('view_sessions', 'view_classes', 'view_sesions', 'view_terms', 'view_alms', 'edit_teacher'));
    }


    public function yourclassbyteacher($classname){
        $view_yourtudents = Teacher::where('classname', $classname)->first();
        $view_yourstudents = Student::where('classname', $classname)->get();
        return view('dashboard.teacher.yourclassbyteacher', compact('view_yourstudents','view_yourtudents'));
    }

    public function tecacherdomainadd($ref_no){
        $view_yourtudents = Teacher::where('ref_no', $ref_no)->first();
        $view_yourdomains = Domain::all();
        return view('dashboard.teacher.tecacherdomainadd', compact('view_yourdomains','view_yourtudents'));
    }

    
    public function viewschoolstudent($schoolname){
        $view_schoolnametudents = Teacher::where('schoolname', $schoolname)->first();
        $view_schoolnametudents = Student::where('schoolname', $schoolname)->get();

    
        return view('dashboard.admin.viewschoolstudent', compact('view_schoolnametudents'));
    }


    public function viewsingleteacher($ref_no){
        $view_singteachers = Teacher::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.viewsingleteacher', compact('view_singteachers'));
    }

    public function editteacher($ref_no){
        $edit_singteachers = Teacher::where('ref_no', $ref_no)->first();
        $view_classnames = Classname::all();
        
        return view('dashboard.admin.editteacher', compact('view_classnames', 'edit_singteachers'));
    }
    
    
    public function teacherupdated(Request $request, $ref_no){
        $edit_singteachers = Teacher::where('ref_no', $ref_no)->first();
       
        $request->validate([
            'fname' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string', 'max:255'],
            // 'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'classname' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
      
            'section' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }

        $edit_singteachers['images'] = $path;
        $edit_singteachers->surname = $request->surname;
        $edit_singteachers->fname = $request->fname;
        $edit_singteachers->middlename = $request->middlename;
        $edit_singteachers->phone = $request->phone;
        $edit_singteachers->section = $request->section;
        $edit_singteachers->gender = $request->gender;
       
        $edit_singteachers->term = $request->term;
        $edit_singteachers->classname = $request->classname;
       
        $edit_singteachers->update();
        if ($edit_singteachers) {
            return redirect()->back()->with('success', 'you have successfully updated');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function updatephoto(Request $request, $ref_no){
        $edit_singteachers = Teacher::where('ref_no', $ref_no)->first();
        $request->validate([
            'images' => 'required|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $edit_singteachers['images'] = $path;
        $edit_singteachers->update();
        if ($edit_singteachers) {
            return redirect()->back()->with('success', 'you have successfully updated');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }

    public function teacherapprove($ref_no){
        $approved_teacher = Teacher::where('ref_no', $ref_no)->first();
        $approved_teacher->status = 'admitted';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function teachersuspend($ref_no){
        $approved_teacher = Teacher::where('ref_no', $ref_no)->first();
        $approved_teacher->status = 'suspend';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have suspend successfully');
    }

    public function teachersacked($ref_no){
        $approved_teacher = Teacher::where('ref_no', $ref_no)->first();
        $approved_teacher->status = 'sacked';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have sacked successfully');
    }
    
    public function teacherquery($ref_no){
        $query_singteachers = Teacher::where('ref_no', $ref_no)->first();

        return view('dashboard.admin.teacherquery', compact('query_singteachers'));
    }
    public function teachersprint(){
        $print_teachers = Teacher::latest()->get();

        return view('dashboard.admin.teachersprint', compact('print_teachers'));
    }

    public function approveteachers(){
        $approves_teachers = Teacher::where('status', 'admitted')
        ->where('assign1', 'teacher')
        ->get();
        return view('dashboard.admin.approveteachers', compact('approves_teachers'));
    }
    public function suspendedteachers(){
        $suspend_teachers = Teacher::where('status', 'suspend')->get();
        return view('dashboard.admin.suspendedteachers', compact('suspend_teachers'));
    }
    public function sackedteachers(){
        $sacked_teachers = Teacher::where('status', 'sacked')->get();
        return view('dashboard.admin.sackedteachers', compact('sacked_teachers'));
    }

  

    public function allteachers(){
        $all_teachers = Teacher::latest()->get();
        return view('dashboard.admin.allteachers', compact('all_teachers'));
    }

    // public function primaryteachers(){
    //     $all_teachers = Teacher::latest()->get();
    //     return view('dashboard.admin.primaryteachers', compact('all_teachers'));
    // }
    
    
    public function primaryteachers(){
        $view_uyoteachers = Teacher::latest()->get();
        return view('dashboard.admin.primaryteachers', compact('view_uyoteachers'));
    }
    public function secondaryteachers(){
        $view_abujateachers = Teacher::latest()->get();
        return view('dashboard.admin.secondaryteachers', compact('view_abujateachers'));
    }
    public function myteachers(){
        $mmy_teachers = Teacher::where('assign1', 'teacher')->get();
        return view('dashboard.teacher.myteachers', compact('mmy_teachers'));
    }

    public function lecturersprint($ref_no){
        $print_students = Teacher::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.lecturersprint', compact('print_students'));
    }


    public function studentsubjectbyhead($ref_no){
        $view_studentsubjects = User::where('ref_no', $ref_no)->first();
        $view_subjects = Subject::where('section', 'Primary')->get();
        return view('dashboard.studentsubjectbyhead', compact('view_studentsubjects', 'view_subjects'));
    }

    public function studentsubjectsbyheads($ref_no){
        $view_studentsubjects = User::where('ref_no', $ref_no)->first();
        $view_subjects = Subject::where('section', 'Secondary')->get();
        return view('dashboard.studentsubjectsbyheads', compact('view_studentsubjects', 'view_subjects'));
    }
    
    public function studentsubjectsall($ref_no){
        $view_studentsubjects = User::where('ref_no', $ref_no)->first();
        $view_subjects = Subject::all();
        return view('dashboard.studentsubjectsall', compact('view_studentsubjects', 'view_subjects'));
    }
    


// public function viewprincipal(){
//     $view_principals = Teacher::where('assign1', 'Principal')->where('schooltype', 'Principal')->get();
//     return view('dashboard.admin.viewprincipal', compact('view_principals'));
// }



public function createprincipals2(Request $request){
       
    $request->validate([
        'fname' => ['required', 'string', 'max:255'],
        'surname' => ['required', 'string'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
        'phone' => ['required', 'string', 'unique:teachers'],
        'school_id' => ['required', 'string'],
        'ref_no1' => ['required', 'string'],
        'user_id' => ['required', 'string'],
        'academic_session' => ['required', 'string'],
        'slug' => ['required', 'string'],
        'term' => ['required', 'string'],
        'motor' => ['nullable', 'string'],
        'address' => ['nullable', 'string'],
        'schooltype' => ['required', 'string'],
        'lga' => ['required', 'string'],
        'section' => ['required', 'string'],
        'connect' => ['required', 'string'],
        'school_id' => ['required', 'string'],
        'centernumber' => ['required', 'string'],
        
        'password' => ['required', 'string', 'min:5'],
        'images' => 'nullable|mimes:jpg,png,jpeg'

        
    ]);
    // dd($request->all());
    if ($request->hasFile('images')){

        $file = $request['images'];
        $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('images')->storeAs('resourceimages', $filename);

    }else{

        $path = 'noimage.jpg';
    }


    $add_teacher['images'] = $path;
// dd($request->all());
   $add_teacher = new Teacher();
    $add_teacher->surname = $request->surname;
    $add_teacher->fname = $request->fname;
    $add_teacher->email = $request->email;
    $add_teacher->lga = $request->lga;
    $add_teacher->phone = $request->phone;
    $add_teacher->connect = $request->connect;
    $add_teacher->schooltype = $request->schooltype;
    $add_teacher->schoolname = $request->schoolname;
    $add_teacher->alms = $request->alms;
    $add_teacher->ref_no1 = $request->ref_no1;
    $add_teacher->academic_session = $request->academic_session;
    $add_teacher->user_id = $request->user_id;
    $add_teacher->school_id = $request->school_id;
    $add_teacher->centernumber = $request->centernumber;
    
    $add_teacher->motor = $request->motor;
    $add_teacher->logo = $request->logo;
    $add_teacher->address = $request->address;
    $add_teacher->section = $request->section;
    $add_teacher->slug = $request->slug;
   
    $add_teacher->term = $request->term;
    $add_teacher->assign1 = 'Principal';
    $add_teacher->ref_no = substr(rand(0,time()),0, 9);
    $add_teacher->classname = $request->classname;
    $add_teacher->password = \Hash::make($request->password);
   
    $add_teacher->save();
    if ($add_teacher) {
        return redirect()->route('teacher.home')->with('success', 'you have successfully registered');
            
        }else{
            return redirect()->back()->with('error', 'you have fail to registered');
    }
}


public function viewprincipals(){
    $view_principals = Teacher::where('assign1', 'Principal')
    ->where('section', 'Secondary')
    ->latest()->get();
    return view('dashboard.admin.viewprincipals', compact('view_principals'));
}

public function viewsheadsgas($slug){
    $view_principals = Teacher::where('assign1', 'Principal')
    ->where('slug', $slug)
    ->latest()->get();
    return view('dashboard.admin.viewsheadsgas', compact('view_principals'));
}

public function viewschoolsteacheradlgas($slug){
    $view_principals = Teacher::where('assign1', 'teacher')
    ->where('slug', $slug)
    ->latest()->get();
    return view('dashboard.admin.viewschoolsteacheradlgas', compact('view_principals'));
}


public function viewprinci($ref_no){
    $view_principals = Teacher::where('ref_no', $ref_no)->first();
    return view('dashboard.admin.viewprinci', compact('view_principals'));
}



public function viewheadmaster(){
    $view_headmasters = Teacher::where('assign1', 'Principal')
    ->where('section', 'Primary')->latest()->get();
    return view('dashboard.admin.viewheadmaster', compact('view_headmasters'));
}

public function viewallhm(){
    $view_headmasters = Teacher::where('assign1', 'Principal')->latest()->get();
    return view('dashboard.viewallhm', compact('view_headmasters'));
}




public function updatetransfer(Request $request, $ref_no){
    $transfer = Teacher::where('ref_no', $ref_no)->first();
    $request->validate([
        'school_id' => 'required|string',
        'lga' => 'required|string',
    ]);
    // dd($request->all());

    $transfer->school_id = $request->school_id;
    $transfer->lga = $request->lga;
    $transfer->update();
    return redirect()->back()->with('success', 'you have successfully to transfered');

}




public function updatetransfersprinc(Request $request, $ref_no){
    $transfer = Teacher::where('ref_no', $ref_no)->first();
    $request->validate([
        'school_id' => 'required|string',
        'lga' => 'required|string',
    ]);
    // dd($request->all());

    $transfer->school_id = $request->school_id;
    $transfer->lga = $request->lga;
    $transfer->update();
    return redirect()->back()->with('success', 'you have successfully to transfered');

}




public function princisaddmit ($ref_no){
    $reject_principal = Teacher::where('ref_no', $ref_no)->first();
    $reject_principal->status = 'admitted';
    $reject_principal->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}

public function primsaddmit($ref_no){
    $reject_principal = Teacher::where('ref_no', $ref_no)->first();
    $reject_principal->status = 'admitted';
    $reject_principal->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}

public function rejectprinci($ref_no){
    $reject_student = Teacher::where('ref_no', $ref_no)->first();
    $reject_student->status = 'reject';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have suspended successfully');
}

public function rejectprim($ref_no){
    $reject_student = Teacher::where('ref_no', $ref_no)->first();
    $reject_student->status = 'reject';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have suspended successfully');
}

public function suspendprim($ref_no){
    $reject_student = Teacher::where('ref_no', $ref_no)->first();
    $reject_student->status = 'suspend';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have suspended successfully');
}




public function suspendprinci($ref_no){
    $reject_student = Teacher::where('ref_no', $ref_no)->first();
    $reject_student->status = 'suspend';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have suspended successfully');
}

public function retiredprim($ref_no){
    $reject_student = Teacher::where('ref_no', $ref_no)->first();
    $reject_student->status = 'retired';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have retired successfully');
}

public function teacheretired($ref_no){
    $reject_student = Teacher::where('ref_no', $ref_no)->first();
    $reject_student->status = 'retired';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have retired successfully');
}


 
public function tranfer($ref_no){
    $transfer_principal = Teacher::where('ref_no', $ref_no)->first();
    $all_schools = School::all();
    $all_lgas = Lga::all();
    return view('dashboard.admin.tranfer', compact('all_lgas', 'all_schools', 'transfer_principal'));
}

public function teachertransfer($ref_no){
    $transfer_principal = Teacher::where('ref_no', $ref_no)->first();
    $all_schools = School::all();
    $all_lgas = Lga::all();
    return view('dashboard.admin.teachertransfer', compact('all_lgas', 'all_schools', 'transfer_principal'));
}


public function tranferprim($ref_no){
    $transfer_principal = Teacher::where('ref_no', $ref_no)->first();
    $all_schools = School::all();
    $all_lgas = Lga::all();
    return view('dashboard.tranferprim', compact('all_lgas', 'all_schools', 'transfer_principal'));
}

public function viewprim($ref_no){
    $view_principal = Teacher::where('ref_no', $ref_no)->first();
    $view_classes = Classname::all();
    return view('dashboard.viewprim', compact('view_classes', 'view_principal'));
}

public function editprim($ref_no){
    $edit_principal = Teacher::where('ref_no', $ref_no)->first();
    $view_lgas = Lga::orderBy('lga')->get();
    return view('dashboard.editprim', compact('edit_principal', 'view_lgas'));
}

public function retired($ref_no){
    $reject_student = Teacher::where('ref_no', $ref_no)->first();
    $reject_student->status = 'retired';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have retired successfully');
}

public function updatehm(Request $request, $ref_no){
    $edit_principal = Teacher::where('ref_no', $ref_no)->first();
       
    $request->validate([
        'fname' => ['required', 'string', 'max:255'],
        'surname' => ['required', 'string'],
        'phone' => ['required', 'string'],
        'schoolname' => ['required', 'string'],
        'motor' => ['nullable', 'string'],
        'address' => ['nullable', 'string'],
        'schooltype' => ['required', 'string'],
        'lga' => ['required', 'string'],
        'section' => ['required', 'string'],
        
        'images' => 'nullable|mimes:jpg,png,jpeg'

        
    ]);
    // dd($request->all());
    if ($request->hasFile('images')){

        $file = $request['images'];
        $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('images')->storeAs('resourceimages', $filename);
        $edit_principal['images'] = $path;

    }else{

        $path = 'noimage.jpg';
    }


    $edit_principal->surname = $request->surname;
    $edit_principal->fname = $request->fname;
    $edit_principal->phone = $request->phone;
    $edit_principal->schooltype = $request->schooltype;
    $edit_principal->schoolname = $request->schoolname;
    $edit_principal->motor = $request->motor;
    $edit_principal->address = $request->address;
    $edit_principal->section = $request->section;
    $edit_principal->update();
    if ($edit_principal) {
        return redirect()->back()->with('success', 'you have successfully updated');
            
        }else{
            return redirect()->back()->with('fail', 'you have fail to registered');
    }
}


public function registerteachers($ref_no){

       
    $getyours = Teacher::where('ref_no', $ref_no)->first();
    $getyoursterms = Term::all();
    $getclasses = Classname::all();
    $getalms = Alm::all();
    $addacademics = Academicsession::latest()->get();
    $lgas = Lga::all();

 
    
    return view('pages.registerteachers', compact('lgas', 'getyoursterms', 'getalms', 'getclasses', 'getyours', 'addacademics'));

}

public function updatesignature(Request $request, $ref_no){
    $add_signature = Teacher::where('ref_no', $ref_no)->first();
    $request->validate([
        'signature' => 'required|mimes:jpg,png,jpeg'
    ]);
    if ($request->hasFile('signature')){

        $file = $request['signature'];
        $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('signature')->storeAs('resourcesignature', $filename);
    }else{

        $path = 'noimage.jpg';
    }

    $add_signature['signature'] = $path;
    $add_signature->update();
    return redirect()->back()->with('success', 'you have successfully updated');

}

public function addsignature($ref_no){
    $add_signature = Teacher::where('ref_no', $ref_no)->first();

    return view('dashboard.teacher.addsignature', compact('add_signature'));
}



public function searchteachersbysusb(Request $request){
    $request->validate([
        // 'term' => ['required', 'string'],
        // 'academic_session' => ['required', 'string'],
        // 'classname' => ['required', 'string'],
        'schoolname' => ['required', 'string'],
        'lga' => ['required', 'string'],
        'section' => ['required', 'string'],
    ]);
    if($view_teachers = Teacher::where('schoolname', $request->schoolname)
    // ->where('academic_session', $request->academic_session)
    // ->where('classname', $request->classname)
    // ->where('schoolname', $request->schoolname)
    ->where('lga', $request->lga)
    ->where('section', $request->section)
    ->exists()) {
        $view_teachers = Teacher::orderby('created_at', 'DESC')
        // ->where('term', $request->term)
        // ->where('academic_session', $request->academic_session)
        // ->where('classname', $request->classname)
        ->where('section', $request->section)
        ->where('schoolname', $request->schoolname)
        ->where('lga', $request->lga)

        ->get(); 
        }else{
           // return view('dashboard.web.noresult');
            return redirect()->back()->with('fail', 'Teachers not found!');
        }
        return view('dashboard.yourschoolteachers', compact('view_teachers'));

    }


    public function primdelete($ref_no){
        $edit_schools = Teacher::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'you have deleted successfully');
    }

    public function addlogotr($ref_no){
        $add_logo = Teacher::where('ref_no', $ref_no)->first();
        return view('dashboard.teacher.addlogotr', compact('add_logo'));
    }

    public function updatelogo(Request $request, $ref_no){
        $add_signature = Teacher::where('ref_no', $ref_no)->first();
        $request->validate([
            'logo' => 'required|mimes:jpg,png,jpeg'
        ]);
        if ($request->hasFile('logo')){
    
            $file = $request['logo'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('resourcesignature', $filename);
        }else{
    
            $path = 'noimage.jpg';
        }
    
        $add_signature['logo'] = $path;
        $add_signature->update();
        return redirect()->back()->with('success', 'you have successfully updated');
    
    }

public function logout(){
    Auth::guard('teacher')->logout();
    return redirect('teacher/login');
}
    

}
