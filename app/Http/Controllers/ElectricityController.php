<?php

namespace App\Http\Controllers;

use App\Models\Electricity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Log;
class ElectricityController extends Controller
{
    //
    public function ikedcpay(){

        return view('dashboard.admin.vtu.ikedcpay');
    }

    public function ekedcpay(){

        return view('dashboard.admin.vtu.ekedcpay');
    }

    public function kedcopay(){

        return view('dashboard.admin.vtu.kedcopay');
    }

    public function phedpay(){

        return view('dashboard.admin.vtu.phedpay');
    }

    public function jecpay(){

        return view('dashboard.admin.vtu.jecpay');
    }
    
    
    
    public function ikejaverify(Request $request){

        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'api-key' => '7b52bc44745a46b5f32de1111dc7b490',
                'secret-key' => 'SK_3141f63b14985c711dd7673e3cbdcdec61cfebd883c'
            ])->post('https://sandbox.vtpass.com/api/merchant-verify', [
                'billersCode' => $request->billersCode,
                'serviceID' => $request->serviceID,
                'type' => $request->type,
            ]);
            

            $responseData = json_decode($response->getBody()->getContents(), true);
            // dd($responseData);
            
                if (array_key_exists('error', $response['content'])) {
                    return redirect()->back()->with('fail', $response['content']['error']);
                }else{
                $user = Electricity::create([
                    'billersCode' => $request->billersCode,
                    'serviceID' => $request->serviceID,
                    'ref_no' => substr(rand(0,time()),0, 9),
                    'name' => 'Admin',
                    'email' => Auth::guard('admin')->user()->email,
                    'user_id' => Auth::guard('admin')->user()->id,
                    'type' => $request->type,
                ]);
    
                return redirect()->route('admin.payelectiricty', ['ref_no' =>$user->ref_no]); 
            }
            
            } catch (RequestException $e) {
    
                throw $e;
        } 
            
            
    }


    public function payelectiricty($ref_no){
        $electricpay = Electricity::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.vtu.payelectiricty', compact('electricpay'));
    }


    public function createlecticpayment(Request $request){
       
        date_default_timezone_set('Africa/Lagos');
        $currentTime = Carbon::now('Africa/Lagos')->format('YmdHi'); // e.g., 202412141630
        // $currentTime = Carbon::now('Africa/Lagos')->setTimezone('Africa/Lagos')->format('h'); // e.g., 202412141630
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
                     'billersCode' => $request->billersCode,
                     'variation_code' => $request->variation_code,
                     
                    'callback_url' => route('transaction.callback'), 
    
                ]);
                
    
                $responseData = json_decode($response->getBody()->getContents(), true);
            //    dd($responseData);
            // $cable = Cable::where('ref_no', $ref_no)->first();
               

                if ($responseData['code'] === '000') {
                    $transaction = $responseData['content']['transactions'];
                    if ($transaction['status'] == 'delivered') {
                        $totalAmount = $transaction['total_amount'];
                        $commission = $totalAmount * 0.01; // 1% of total_amount
                        $remainingBalance = $totalAmount - $commission;
                        // dd($cable);
                        $electricpay = Electricity::create([
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
                            'billersCode' => $request->billersCode,
                            'variation_code' => $request->variation_code,
                            'response_description' => $request->response_description,
                            'phone' => $request->phone,
                            'ref_no' => substr(rand(0,time()),0, 9),
                            'subscription_type' => $request->subscription_type,
                        ]);
    
                       
            
                    }elseif($transaction['status'] == 'pending'){
                        $responseData = Electricity::create([
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
                    }elseif($transaction['status'] == 'initiated'){
                        $responseData = Electricity::create([
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
}
