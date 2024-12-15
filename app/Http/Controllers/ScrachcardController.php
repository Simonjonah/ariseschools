<?php

namespace App\Http\Controllers;

use App\Models\Scrachcard;
use Illuminate\Http\Request;

class ScrachcardController extends Controller
{
    //
    public function addwaecscrahcards(){
        
        return view('dashboard.admin.vtu.addwaecscrahcards');
    }

    public function addnecoscrahcards(){
        
        return view('dashboard.admin.vtu.addnecoscrahcards');
    }

    
    public function createscrachcard(Request $request){
        $request->validate([
            'pin' => ['required', 'string', 'unique:scrachcards'],
            'amount' => ['required', 'string'],
            'serial_number' => ['required', 'string', 'unique:scrachcards'],
            'type' => ['required', 'string'],
            // 'pin' => ['required', 'string'],
        ]);

        $addscrachcard = new Scrachcard();
        $addscrachcard->pin = $request->pin;
        $addscrachcard->amount = $request->amount;
        $addscrachcard->serial_number = $request->serial_number;
        $addscrachcard->type = $request->type;
        $addscrachcard->ref_no = substr(rand(0,time()),0, 9);

        $addscrachcard->save();

        return redirect()->back()->with('success', 'You have add the scrach card successfully');
    }

    public function viewwaecscrahcards(){
        $view_cards = Scrachcard::where('type', 'WAEC')->where('status', null)->latest()->get();
        return view('dashboard.admin.vtu.viewwaecscrahcards', compact('view_cards'));
    }
    public function usedscrahcards(){
        $view_usedcards = Scrachcard::where('status', 'used')->orderBy('created_at', 'DESC')->get();
        return view('dashboard.admin.vtu.usedscrahcards', compact('view_usedcards'));
    }
    
    public function viewnecoscrahcards(){
        $view_cards = Scrachcard::where('type', 'NECO')->where('status', null)->latest()->get();
        return view('dashboard.admin.vtu.viewnecoscrahcards', compact('view_cards'));
    }
    public function usedcard($ref_no){
        $used_cards = Scrachcard::where('ref_no', $ref_no)->first();
        $used_cards->status = 'used';
        $used_cards->save();
        return redirect()->back()->with('success', 'You have used this scrach Card');
    }
    

    public function viewcard($ref_no){
        $view_card = Scrachcard::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.vtu.viewcard', compact('view_card'));
    }

    public function editcard($ref_no){
        $edit_card = Scrachcard::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.vtu.editcard', compact('edit_card'));
    }

    public function deletecard($ref_no){
        $edit_card = Scrachcard::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have deleted the scrach card successfully');

    }

    

    public function updatecard(Request $request, $ref_no){
        $edit_card = Scrachcard::where('ref_no', $ref_no)->first();

        $request->validate([
            'pin' => ['required', 'string'],
            'amount' => ['required', 'string'],
            'serial_number' => ['required', 'string'],
            'type' => ['required', 'string'],
            // 'pin' => ['required', 'string'],
        ]);

        $edit_card->pin = $request->pin;
        $edit_card->amount = $request->amount;
        $edit_card->serial_number = $request->serial_number;
        $edit_card->type = $request->type;
        $edit_card->update();

        return redirect()->back()->with('success', 'You have added the scrach card successfully');
    }
    
}
