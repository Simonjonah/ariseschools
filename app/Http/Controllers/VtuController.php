<?php

namespace App\Http\Controllers;

use App\Models\Scrachcard;
use App\Models\Vtu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;

class VtuController extends Controller
{
    //

    public function vtudashboard(){
        $countwaec = Scrachcard::where('type', 'WAEC')->count();
        $countneco = Scrachcard::where('type', 'NECO')->count();
        $countaecused = Scrachcard::where('type', 'WAEC')->where('status', 'used')->count();
        $countwaecavailable = Scrachcard::where('type', 'NECO')->where('status', null)->Orwhere('status', 'pending')->count();
       
        
        $countnecoused = Scrachcard::where('type', 'NECO')->where('status', 'used')->count();
        $countnecoavail = Scrachcard::where('type', 'NECO')->where('status', null)->Orwhere('status', 'pending')->count();
        return view('dashboard.admin.vtu.vtudashboard', compact('countwaecavailable', 'countaecused', 'countnecoavail', 'countnecoused', 'countneco', 'countwaec'));
    }

   

    public function mtnairtime(){
        
        return view('dashboard.admin.vtu.mtnairtime');
    }


    public function gloairtime(){
        
        return view('dashboard.admin.vtu.gloairtime');
    }

    public function airtelairtime(){
        
        return view('dashboard.admin.vtu.airtelairtime');
    }


    public function ninemobileairtime(){
        
        return view('dashboard.admin.vtu.ninemobileairtime');
    }

    public function viewairtimesales(){
        $viewairtimes = Vtu::latest()->get();
        return view('dashboard.admin.vtu.viewairtimesales', compact('viewairtimes'));
    }
    
    
    

    public function createmtnairtime(Request $request){
        // $formattedDate = Carbon::now('Africa/Lagos')->format('Ymdhi');
        // $formattedDate = date_default_timezone_set('Africa/Lagos');
        // $request_id = $formattedDate . date('Ymdhi', time());
    //    dd($request_id);
    date_default_timezone_set('Africa/Lagos');
    $currentTime = Carbon::now()->format('YmdHi'); // e.g., 202412141630
    $randomString = bin2hex(random_bytes(5)); // Generates a random string
    $man =  $currentTime . $randomString;
    // dd($man);
    
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'api-key' => '7b52bc44745a46b5f32de1111dc7b490',
                'secret-key' => 'SK_3141f63b14985c711dd7673e3cbdcdec61cfebd883c'
            ])->post('https://sandbox.vtpass.com/api/pay', [
                'amount' => $request->amount,
                'serviceID' => $request->serviceID,
                 "request_id" => $man,
                 'phone' => $request->phone,
                'callback_url' => route('transaction.callback'), 

            ]);
            

            $responseData = json_decode($response->getBody()->getContents(), true);
           
            if ($responseData['code'] === '000') {
                $transaction = $responseData['content']['transactions'];
                if ($transaction['status'] == 'delivered') {
                    $totalAmount = $transaction['total_amount'];
                    $commission = $totalAmount * 0.01; // 1% of total_amount
                    $remainingBalance = $totalAmount - $commission;
                    // $transaction = Vtu::where('transaction_id', $transaction['transactionId'])->first();
                //    dd($transaction);
                    $user = Vtu::create([
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
                        "request_id" => $man,
                        'serviceID' => $request->serviceID,
                        'name' => 'Admin',
                        'email' => Auth::guard('admin')->user()->email,
                        'user_id' => Auth::guard('admin')->user()->id,
                        'amount' => $request->amount,
                        'response_description' => $request->response_description,
                        
                        'phone' => $request->phone,
                        'ref_no' => substr(rand(0,time()),0, 9),
                    ]);

                    // $user->update([

                    // ]);
        
                }elseif($transaction['content']['status'] === 'pending'){
                    $responseData = Vtu::create([
                    'name' => 'Admin',
                    'email' => Auth::guard('admin')->user()->email,
                    'user_id' => Auth::guard('admin')->user()->id,
                    'amount' => $request->amount,
                    "request_id" => $man,
                    'serviceID' => $request->serviceID,
                    'phone' => $request->phone,
                    'status' => 'pending',
                    'ref_no' => substr(rand(0,time()),0, 9),
                ]);
                }elseif($transaction['content']['status'] === 'initiated'){
                    $responseData = Vtu::create([
                        'name' => 'Admin',
                        'email' => Auth::guard('admin')->user()->email,
                        'user_id' => Auth::guard('admin')->user()->id,
                        'amount' => $request->amount,
                        "request_id" => $man,
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



    // public function callback(Request $request){
    //     $request_id = $request->query('request_id');
    //    //  dd($reference);
    //     if (!$request_id) {
    //         return back()->with('error', 'No payment reference provided.');
    //     }
       
    //     // Verify the payment using Paystack API
    //     try {
    //         $response = Http::withToken("sk_live_25adf80a8fac8e8a139ada7ad5b2bb6cf8af80fa")
    //             ->get('https://api.paystack.co/transaction/verify/' . $reference);

    //         $transaction = $response->json();
    //         $reference = $request->query('reference');
            
    //         if ($transaction['status'] && $transaction['data']['status'] == 'success') {
                
    //            $transaction = Transaction::where('reference', $reference)->first();
    //            $user = User::where('reference', $reference)->first();
    //            $subscription = Subscription::where('reference', $reference)->first();
    //            $transaction->update([
    //                'status' => 'success',
    //                'user_id' =>$user->id,
    //            ]);
    //            $user->update([
    //                'status' => 'success',
                   
    //            ]);

    //            $subscription->update([
    //                'status' => 'success',
    //                'user_id' =>$user->id,
    //            ]);
              
    //             return redirect()->route('login')->with('success', 'Payment successful!');
    //         } else {
    //             return redirect()->route('payment.failed')->with('error', 'Payment failed. Please try again.');
    //         }
    //     } catch (RequestException $e) {
            
    //         return redirect()->route('payment.failed')->with('error', 'An error occurred. Please try again.');
    //     }

    //     throw $e; // or handle the error as needed

    // }


    
}
