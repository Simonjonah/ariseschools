<?php

namespace App\Http\Controllers;

use App\Models\Datasubscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;
class DatasubscriptionController extends Controller
{
    //

    public function mtndata(){
        $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=mtn-data');
        
        if ($response->successful()) {
            $variations = $response->json()['content']['varations'];
            return view('dashboard.admin.vtu.mtndata', compact('variations'));
        }
    
        return back()->with('error', 'Unable to fetch variations.');
    
    }


    public function airteldata(){
        $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=airtel-data');
        
        if ($response->successful()) {
            $variations = $response->json()['content']['varations'];
            return view('dashboard.admin.vtu.airteldata', compact('variations'));
        }
    
        return back()->with('error', 'Unable to fetch variations.');
    
    }


    public function glodata(){
        $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=glo-data');
        
        if ($response->successful()) {
            $variations = $response->json()['content']['varations'];
            return view('dashboard.admin.vtu.glodata', compact('variations'));
        }
    
        return back()->with('error', 'Unable to fetch variations.');
    
    }



    public function ninemobiledata(){
        $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=etisalat-data');
        
        if ($response->successful()) {
            $variations = $response->json()['content']['varations'];
            return view('dashboard.admin.vtu.ninemobiledata', compact('variations'));
        }
    
        return back()->with('error', 'Unable to fetch variations.');
    
    }
    
    
    public function viewdatasales(){
        $view_datasales = Datasubscription::latest()->get();
        return view('dashboard.admin.vtu.viewdatasales', compact('view_datasales'));
    }

    public function createdata(Request $request){
       
        // date_default_timezone_set('Africa/Lagos');
        // $currentTime = Carbon::now('Africa/Lagos')->format('YmdHi'); // e.g., 202412141630
        // // $currentTime = Carbon::now('Africa/Lagos')->setTimezone('Africa/Lagos')->format('h'); // e.g., 202412141630
        // $randomString = bin2hex(random_bytes(5)); // Generates a random string
        // $man =  $currentTime . $randomString;
        // dd($man);
      
            try {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'api-key' => '7b52bc44745a46b5f32de1111dc7b490',
                    'secret-key' => 'SK_3141f63b14985c711dd7673e3cbdcdec61cfebd883c'
                ])->post('https://sandbox.vtpass.com/api/pay', [
                    'variation_amount' => $request->variation_amount,
                    'serviceID' => $request->serviceID,
                     "request_id" => $request->request_id,
                     'phone' => $request->phone,
                     'billersCode' => $request->billersCode,
                     'variation_code' => $request->variation_code,
                     
                   'callback_url' => route('transaction.callback'), 
    
                ]);
                
    
                $responseData = json_decode($response->getBody()->getContents(), true);
            //    dd($responseData);
                if ($responseData['code'] === '000') {
                    $transaction = $responseData['content']['transactions'];
                    if ($transaction['status'] == 'delivered') {
                        $totalAmount = $transaction['total_amount'];
                        $commission = $totalAmount * 0.01; // 1% of total_amount
                        $remainingBalance = $totalAmount - $commission;
                        // $transaction = Vtu::where('transaction_id', $transaction['transactionId'])->first();
                    //    dd($transaction);
                        $user = Datasubscription::create([
                            'status' => $transaction['status'],
                            'transaction_id' => $transaction['transactionId'],
                            'product_name' => $transaction['product_name'],
                            'unique_element' => $transaction['unique_element'],
                            'commission' => $transaction['commission'],
                            'total_amount' => $remainingBalance,
                            'balance' => $commission,
                            'type' => $transaction['type'],

                            'email' => $transaction['email'],
                            'phone' => $transaction['phone'],
                            'unit_price' => $transaction['unit_price'],
                            'quantity' => $transaction['quantity'],
                            'platform' => $transaction['platform'],
                            'method' => $transaction['method'],
                            'unit_price' => $transaction['unit_price'],
                            "request_id" => $request->request_id,
                            'serviceID' => $request->serviceID,
                            'name' => 'Admin',
                            'email' => Auth::guard('admin')->user()->email,
                            'user_id' => Auth::guard('admin')->user()->id,
                            'amount' => $request->amount,
                            'billersCode' => $request->billersCode,
                            'variation_code' => $request->variation_code,
                            
                            'response_description' => $request->response_description,
                            
                            'phone' => $request->phone,
                            'ref_no' => substr(rand(0,time()),0, 9),
                        ]);
    
                       
            
                    }elseif($transaction['content']['status'] === 'pending'){
                        $responseData = Datasubscription::create([
                        'name' => 'Admin',
                        'email' => Auth::guard('admin')->user()->email,
                        'user_id' => Auth::guard('admin')->user()->id,
                        'amount' => $request->amount,
                        "request_id" => $request->request_id,
                        'serviceID' => $request->serviceID,
                        'phone' => $request->phone,
                        'status' => 'pending',
                        'ref_no' => substr(rand(0,time()),0, 9),
                    ]);
                    }elseif($transaction['content']['status'] === 'initiated'){
                        $responseData = Datasubscription::create([
                            'name' => 'Admin',
                            'email' => Auth::guard('admin')->user()->email,
                            'user_id' => Auth::guard('admin')->user()->id,
                            'amount' => $request->amount,
                            "request_id" => $request->request_id,

                            'serviceID' => $request->serviceID,
                            'phone' => $request->phone,
                            'status' => 'pending',
                            'ref_no' => substr(rand(0,time()),0, 9),
                        ]); 
                    }
                // dd($responseData);
    
                if ($transaction['status'] == 'delivered') {
                    return redirect()->back()->with('success', 'Transaction  successful');
                }
                return redirect()->back()->with('fail', 'Transaction not successful');
        
            }
            return redirect()->back()->with('fail', 'Transaction not successful');
    
            } catch (RequestException $e) {
    
                throw $e;
            }
        }
    
}
