<?php

namespace App\Http\Controllers;
use App\Models\School;
use App\Models\Classname;
use App\Models\Academicsession;
use App\Models\Student;
use App\Models\Lga;
use App\Models\Result;
use App\Models\Schoolnew;
use App\Models\Term;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
class SchoolsController extends Controller
{

    public function creatschools(Request $request){
        
       
        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            // 'centernumber' => ['required', 'string', 'max:255'],
            'schoolname' => ['required', 'string'],
            'lga' => ['required', 'string', 'max:255'],
            'motor' => ['required', 'string'],
            'schooltype' => ['required', 'string'],
            'address' => ['required', 'string'],
            'term' => ['required', 'string'],
            'section' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'logo' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());
        if ($request->hasFile('logo')){

            $file = $request['logo'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('resourcelogo', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $add_school = new School();

        $add_school['logo'] = $path;

        $add_school->schoolname = $request->schoolname;
        $add_school->motor = $request->motor;
        $add_school->lga = $request->lga;
        $add_school->term = $request->term;
        $add_school->section = $request->section;
        $add_school->user_id = $request->user_id;
        $add_school->academic_session = $request->academic_session;
        $add_school->address = $request->address;
        $add_school->centernumber = substr(rand(0,time()),0, 9);
        $add_school->slug = SlugService::createSlug(School::class, 'slug', $request->schoolname);
        $add_school->schooltype = $request->schooltype;
        $add_school->ref_no1 = substr(rand(0,time()),0, 9);
        $add_school->connect = substr(rand(0,time()),0, 9);
        $add_school->save();

        //return redirect()->route('registerprincipals', ['ref_no1' =>$add_school->ref_no1]); 
    
        if ($add_school) {
            return redirect()->route('registerprincipals', ['ref_no1' =>$add_school->ref_no1]); 

            //return redirect()->route('web.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function updateschool(Request $request, $ref_no1){
        $edit_schools = School::where('ref_no1', $ref_no1)->first();
        $request->validate([
            
             'schoolname' => ['required', 'string'],
             'lga' => ['required', 'string', 'max:255'],
             'motor' => ['required', 'string'],
             'schooltype' => ['required', 'string'],
             'address' => ['required', 'string'],
             'section' => ['required', 'string'],
             'logo' => 'nullable|mimes:jpg,png,jpeg'
 
         ]);
 
         // dd($request->all());
         if ($request->hasFile('logo')){
 
             $file = $request['logo'];
             $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
             $path = $request->file('logo')->storeAs('resourcelogo', $filename);
             $edit_schools['logo'] = $path;
         }else{
 
             $path = 'noimage.jpg';
         }
 
        
         $edit_schools->schoolname = $request->schoolname;
         $edit_schools->motor = $request->motor;
         $edit_schools->lga = $request->lga;
        
         $edit_schools->section = $request->section;
         $edit_schools->address = $request->address;
         $edit_schools->schooltype = $request->schooltype;
         
         $edit_schools->update();
 
         return redirect()->back()->with('success', 'you have updated the school successfully');
 
     }

    public function updateschooladmin(Request $request, $ref_no1){
       $edit_schools = School::where('ref_no1', $ref_no1)->first();
       $request->validate([
           
            'schoolname' => ['required', 'string'],
            'lga' => ['required', 'string', 'max:255'],
            'motor' => ['required', 'string'],
            'schooltype' => ['required', 'string'],
            'address' => ['required', 'string'],
            'section' => ['required', 'string'],
            'logo' => 'nullable|mimes:jpg,png,jpeg'

        ]);

        // dd($request->all());
        if ($request->hasFile('logo')){

            $file = $request['logo'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('resourcelogo', $filename);
            $edit_schools['logo'] = $path;
        }else{

            $path = 'noimage.jpg';
        }

       
        $edit_schools->schoolname = $request->schoolname;
        $edit_schools->motor = $request->motor;
        $edit_schools->lga = $request->lga;
       
        $edit_schools->section = $request->section;
        $edit_schools->address = $request->address;
        $edit_schools->schooltype = $request->schooltype;
        
        $edit_schools->update();

        return redirect()->back()->with('success', 'you have updated the school successfully');

    
        // if ($add_school) {
        //     return redirect()->route('registerprincipals', ['ref_no1' =>$add_school->ref_no1]); 

        //     //return redirect()->route('web.home')->with('success', 'you have successfully registered');
                
        //     }else{
        //         return redirect()->back()->with('error', 'you have fail to registered');
        // }
    }

    public function registerprincipals($ref_no1){

        $getyours = School::where('ref_no1', $ref_no1)->first();
        $getclasses = Classname::all();
        $lgas = Lga::orderBy('lga')->get();
        $addacademics = Academicsession::latest()->get();
        
        return view('auth.registerprincipals', compact('lgas', 'getclasses', 'getyours', 'addacademics'));
  
}



public function displayschools(){
    $view_schools = School::where('user_id', auth::guard('web')->id())->latest()->get();
    return view('dashboard.displayschools', compact('view_schools'));
}

public function editschoolss($ref_no1){
    $edit_schools = School::where('ref_no1', $ref_no1)->first();
    $view_lgas = Lga::all(); 
    return view('dashboard.editschoolss', compact('view_lgas', 'edit_schools'));
}

public function editcenternumber($ref_no1){
    $edit_schools = School::where('ref_no1', $ref_no1)->first();
    return view('dashboard.editcenternumber', compact('edit_schools'));
}

public function updatecenternumber(Request $request, $ref_no1){
    $edit_schools = School::where('ref_no1', $ref_no1)->first();
    $request->validate([
        'centernumber' => ['required', 'string', 'unique:schools'],
    ]);
    $edit_schools->centernumber = $request->centernumber;
    $edit_schools->update();
    return redirect()->back()->with('success', 'You have updated the centernumber succeesully');
}





public function schoolsteachers($slug){
    $viewschools = School::where('slug', $slug)->first();
    $viewschool_teachers = Teacher::where('slug', $slug)->where('assign1', 'teacher')
    ->where('user_id', auth::guard('web')->id())
    ->get(); 

    return view('dashboard.schoolsteachers', compact('viewschool_teachers', 'viewschools'));
}

public function schoolsstudents($slug){
    $viewschools = School::where('slug', $slug)->first();
    $viewschool_students = Student::where('slug', $slug)
    ->where('user_id', auth::guard('web')->id())->latest()
    ->get(); 
    $view_classes = Classname::all();
    $view_sessions = Academicsession::all();
    $lgas = Lga::all();
    return view('dashboard.schoolsstudents', compact('lgas', 'view_sessions', 'view_classes', 'viewschool_students', 'viewschools'));
}

public function schoolsprinteachers($slug){
    $viewschools = School::where('slug', $slug)->first();
    $viewschool_heads = Teacher::where('slug', $slug)
    ->where('assign1', 'Principal')
    ->where('user_id', auth::guard('web')->id())->latest()
    ->get(); 
    $view_classes = Classname::all();
    $view_sessions = Academicsession::all();
    $lgas = Lga::all();
    return view('dashboard.schoolsprinteachers', compact('lgas', 'view_sessions', 'view_classes', 'viewschool_heads', 'viewschools'));
}
public function viewschool($ref_no1){
    $view_schools = School::where('ref_no1', $ref_no1)->first();
     
    $view_classes = Classname::all();
    $view_sessions = Academicsession::all();
    $lgas = Lga::all();
    $terms = Term::all();
    return view('dashboard.viewschool', compact('terms', 'lgas', 'view_sessions', 'view_classes', 'view_schools'));
}

public function editschool($ref_no1){
    $view_schools = School::where('ref_no1', $ref_no1)->first();
     
    $view_classes = Classname::all();
    $view_sessions = Academicsession::all();
    $lgas = Lga::all();
    return view('dashboard.editschool', compact('lgas', 'view_sessions', 'view_classes', 'view_schools'));
}


public function editschooladmin($ref_no1){
    $view_schools = School::where('ref_no1', $ref_no1)->first();
     
    $view_classes = Classname::all();
    $view_sessions = Academicsession::all();
    $lgas = Lga::all();
    return view('dashboard.admin.editschooladmin', compact('lgas', 'view_sessions', 'view_classes', 'view_schools'));
}





function updatesch(Request $request, $ref_no1){
    $edit_schools = School::where('ref_no1', $ref_no1)->first();
       
    $request->validate([
       
        'schoolname' => ['required', 'string'],
        'lga' => ['required', 'string', 'max:255'],
        'motor' => ['required', 'string'],
        'schooltype' => ['required', 'string'],
        'address' => ['required', 'string'],
       
        'section' => ['required', 'string'],
        
        'logo' => 'nullable|mimes:jpg,png,jpeg'
      

    ]);

    // dd($request->all());
    if ($request->hasFile('logo')){

        $file = $request['logo'];
        $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('logo')->storeAs('resourcelogo', $filename);

    }else{

        $path = 'noimage.jpg';
    }

  

    $edit_schools['logo'] = $path;
    $edit_schools->schoolname = $request->schoolname;
    $edit_schools->motor = $request->motor;
    $edit_schools->lga = $request->lga;
    $edit_schools->section = $request->section;
    $edit_schools->address = $request->address;
    $edit_schools->schooltype = $request->schooltype;

    $edit_schools->update();

    return redirect()->back()->with('success', 'you have successfully  updated');
}

public function schoolelete($ref_no1){
    $edit_schools = School::where('ref_no1', $ref_no1)->delete();
    return redirect()->back()->with('success', 'you have successfully deleted');

}


public function viewschools($ref_no1){
    $viewsingleschool = School::where('ref_no1', $ref_no1)->first();
return view('dashboard.admin.viewschools', compact('viewsingleschool'));
}


public function viewschreview(){
    $school_reviews = School::where('status', null)->latest()->get();
return view('dashboard.admin.viewschreview', compact('school_reviews'));
}
public function viewschapproved(){
    $school_approves = School::where('status', 'admitted')->latest()->get();
return view('dashboard.admin.viewschapproved', compact('school_approves'));
}

public function viewschrejected(){
    $school_rejects = School::where('status', 'reject')->latest()->get();
return view('dashboard.admin.viewschrejected', compact('school_rejects'));
}


public function rejectschool($ref_no1){
    $reject_student = School::where('ref_no1', $ref_no1)->first();
    $reject_student->status = 'reject';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}
public function suspendschools($ref_no1){
    $reject_student = School::where('ref_no1', $ref_no1)->first();
    $reject_student->status = 'suspend';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}

public function schooldeletes($ref_no1){
    $reject_student = School::where('ref_no1', $ref_no1)->delete();
    
    return redirect()->back()->with('success', 'you have deleted successfully');
}


public function rejectschools($ref_no1){
    $reject_student = School::where('ref_no1', $ref_no1)->first();
    $reject_student->status = 'reject';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}

public function suspendschool($ref_no1){
    $reject_student = School::where('ref_no1', $ref_no1)->first();
    $reject_student->status = 'suspend';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}

public function approvedschool($ref_no1){
    $school_approves = School::where('ref_no1', $ref_no1)->first();
    $school_approves->status = 'admitted';
    $school_approves->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}



public function rejectedstudent(){
    $reject_students = School::where('status', 'reject')->get();
    return view('dashboard.admin.rejectedstudent', compact('reject_students'));
}

public function schoolsaddmit($ref_no1){
    $admit_student = School::where('ref_no1', $ref_no1)->first();
    $admit_student->status = 'admitted';
    $admit_student->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}
public function admittedstudents(){
    $admit_students = School::where('section', 'Secondary')->get();
    return view('dashboard.admin.admittedstudents', compact('admit_students'));
}


public function reachresultbystudentbyadmin(Request $request){
    // dd($request->all());
    $request->validate([
        'schoolname' => ['required', 'string'],
        'lga' => ['required', 'string'],
        'schooltype' => ['required', 'string'],
    ]);
    if($viewsecondaries = School::where('schoolname', $request->schoolname)
    ->where('lga', $request->lga)
    ->where('schooltype', $request->schooltype)
    ->exists()) {
        $viewsecondaries = School::orderby('created_at', 'DESC')
        ->where('schoolname', $request->schoolname)
        ->where('lga', $request->lga)
        ->where('schooltype', $request->schooltype)
        ->get(); 

        
        }else{
            return redirect()->back()->with('fail', 'There is no such School in the LGA');
        }
        return view('dashboard.admin.sttudentsbyadmin', compact('viewsecondaries'));

}


public function schoolsheads($ref_no1){
    $getyours = School::where('ref_no1', $ref_no1)->first();
    $getyoursterms = Term::all();
    $getclasses = Classname::all();
    $lgas = Lga::orderBy('lga')->get();
    $addacademics = Academicsession::latest()->get();
    $dsplay_sections = Section::latest()->get();
    
    return view('auth.schoolsheads', compact('getyoursterms', 'dsplay_sections', 'lgas', 'getclasses', 'getyours', 'addacademics'));
}

public function viewsingleschoolsresult($slug){
    $view_resultschool = School::where('slug', $slug)
    ->where('user_id', auth::guard('web')->id())->first();

    $view_resultalls = Result::where('slug', $slug)
    ->where('user_id', auth::guard('web')->id())->get();
    $view_classes = Classname::all();
    return view('dashboard.viewsingleschoolsresult', compact('view_resultschool', 'view_classes', 'view_resultalls'));
}


public function viewschoolsingle($slug){
    $view_allnews = School::where('slug', $slug)->first();
    $view_allschoolnews = Schoolnew::where('slug', $slug)->get();
    return view('pages.viewschoolsingle', compact('view_allschoolnews', 'view_allnews'));
}
public function search(Request $request)
{
    $query = $request->input('query');
    $results = School::where('schoolname', 'LIKE', '%' . $query . '%')->get();

    return view('pages.searchresults', ['results' => $results]);
}


}
