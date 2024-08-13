<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lga;
use App\Models\School;
use App\Models\user;
use App\Models\Classname;
use App\Models\Academicsession;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Result;

use Auth;
class LgaController extends Controller
{
    public function addlga(){

        return view('dashboard.admin.addlga');
    }

    public function createlga(Request $request){
        $request->validate([
            'lga' =>['required', 'string', 'max:255', 'unique:lgas'],
        ]);
        $addlga = new Lga();
        $addlga->lga = $request->lga;
        $addlga->save();
        if($addlga){
            return redirect()->back()->with('success', 'You have registered successfully');
        }
        return redirect()->back()->with('error', 'You have not registered successfully');

    }

    public function updatelga(Request $request, $id){

        $editlga = Lga::find($id);

        $request->validate([
            'lga' =>['required', 'string', 'max:255'],
        ]);
        $editlga->lga = $request->lga;
        $editlga->update();
        if($editlga){
            return redirect()->back()->with('success', 'You have registered successfully');
        }
        return redirect()->back()->with('error', 'You have not registered successfully');

    }

    
    public function editlga($id){
        $editlga = Lga::find($id);
        return view('dashboard.admin.editlga', compact('editlga'));
    }
    public function viewlga(){
        $viewlgas = Lga::all();
        return view('dashboard.admin.viewlga', compact('viewlgas'));
    }

    public function viewperlgaschools(){
        $viewlgaschools = Lga::all();
        return view('dashboard.admin.viewperlgaschools', compact('viewlgaschools'));
    }

    public function viewteacherbylga(){
        $viewlgaschools = Lga::all();
        return view('dashboard.viewteacherbylga', compact('viewlgaschools'));
    }

    public function allresultsbylga(){
        $viewlgaschools = Lga::all();
        return view('dashboard.allresultsbylga', compact('viewlgaschools'));
    }

    public function viewyourschoolsbylgas(){
        $viewlgaschools = Lga::all();
        return view('dashboard.viewyourschoolsbylgas', compact('viewlgaschools'));
    }
    public function firstermresults($lga){
        $viewlgas = Lga::where('lga', $lga)->first();
        $view_resultalls = Result::where('lga', $lga)
        ->where('user_id', auth::guard('web')->id())->get();
        $view_classes = Classname::all();
        return view('dashboard.firstermresults', compact('viewlgas', 'view_classes', 'view_resultalls'));
    }
    
    public function viewyourlgastudents(){
        $viewlgaschools = Lga::all();
        return view('dashboard.viewyourlgastudents', compact('viewlgaschools'));
    }

    

    public function viewsinglelgasschool($lga){
         
        $viewlga = Lga::where('lga', $lga)->first();
        $viewlgas = School::where('lga', $lga)->take(1)->get();
        $viewlgasecondaries = School::where('lga', $lga)->take(1)->get();
        $countprimayschools = School::where('lga', $lga)
        ->where('schooltype', 'SUBEB')->count();

        $countsecondaryschools = School::where('lga', $lga)
        ->where('schooltype', 'SSEB')->count();
        return view('dashboard.admin.viewsinglelgasschool', compact('viewlga', 'countsecondaryschools', 'countprimayschools', 'viewlgasecondaries', 'viewlgas'));
    }
    public function viewteachersinlgas($lga){
        $viewlgas = Lga::where('lga', $lga)->first();

        $view_headmasters = Teacher::where('lga', $lga)
        ->where('assign1', 'teacher')
        ->where('user_id', auth::guard('web')->id())->latest()->get();
        $view_schools = School::all();
        $view_classes = Classname::all();
        $view_lgas = Lga::all();
        return view('dashboard.viewteachersinlgas', compact('view_lgas', 'view_classes', 'view_schools', 'view_headmasters'));
    }

    public function viewschoolsinlgas($lga){
        $viewlgas = Lga::where('lga', $lga)->first();

        $view_schools = School::where('lga', $lga)
        ->where('user_id', auth::guard('web')->id())->latest()->get();
        return view('dashboard.viewschoolsinlgas', compact('viewlgas', 'view_schools'));
    }

    public function viewshs($lga){
        $viewlgas = Lga::where('lga', $lga)->first();

        $view_headmasters = Teacher::where('lga', $lga)
        ->where('user_id', auth::guard('web')->id())->latest()->get();
        return view('dashboard.viewshs', compact('viewlgas', 'view_headmasters'));
    }

    
    public function viewprimariesschools($lga){
         
        $viewprimaries = Lga::where('lga', $lga)->first();
        $viewprimaries = School::where('lga', $lga)->where('schooltype', 'SUBEB')->latest()->get();
        return view('dashboard.admin.viewprimariesschools', compact('viewprimaries'));
    }

    public function viewsecondariesschools($lga){
         
        $viewsecondaries = Lga::where('lga', $lga)->first();
        $viewsecondaries = School::where('lga', $lga)->where('schooltype', 'SSEB')->latest()->get();
        $lgas = Lga::all();
        return view('dashboard.admin.viewsecondariesschools', compact('lgas', 'viewsecondaries'));
    }

    public function viewprincipalsbylgadmin(){         
        $lgasprincipals = Lga::all();
        return view('dashboard.admin.viewprincipalsbylgadmin', compact('lgasprincipals'));
    }

    public function displaymbtlga(){         
        $lgasprincipals = Lga::all();
        return view('dashboard.displaymbtlga', compact('lgasprincipals'));
    }

    
    
    public function viewlgaprincipals($lga){
        $view_students = Lga::where('lga', $lga)->first();
        $view_headmasters = Teacher::where('assign1', 'Principal')
        
        ->where('lga', $lga)
        ->get();
        $view_classes = Classname::all();
        $view_sessions = Academicsession::all();
        $lgas = Lga::all();
        
        return view('dashboard.admin.viewlgaprincipals', compact('view_students', 'lgas', 'view_sessions', 'view_classes', 'view_headmasters'));
    }

    public function subebheadmaster($lga){
        $view_students = Lga::where('lga', $lga)->first();
        $view_headmasters = Teacher::where('assign1', 'Principal')
        
        ->where('lga', $lga)
        ->get();
        $view_classes = Classname::all();
        $view_sessions = Academicsession::all();
        $lgas = Lga::all();
        
        return view('dashboard.admin.subebheadmaster', compact('view_students', 'lgas', 'view_sessions', 'view_classes', 'view_headmasters'));
    }

    
    
    

    public function viewstudentsinlgas($lga){
        $view_students = Lga::where('lga', $lga)->first();
        $view_secondarystudents = Student::where('user_id', auth::guard('web')->id())
        ->where('lga', $lga)
        ->get();
        $view_classes = Classname::all();
        $view_sessions = Academicsession::all();
        $lgas = Lga::all();
        
        return view('dashboard.viewstudentsinlgas', compact('view_students', 'lgas', 'view_sessions', 'view_classes', 'view_secondarystudents'));
    }
    

    
    public function deletelga($id){
        $viewlgas = Lga::where('id', $id)->delete();
        return redirect()->back()->with('success', 'deleted successfully');
    }
    
}  
