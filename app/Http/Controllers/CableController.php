<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;

class CableController extends Controller
{
    //
    public function dstvsub(){
        $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=dstv');
        
        if ($response->successful()) {
            $variations = $response->json()['content']['varations'];
            return view('dashboard.admin.vtu.dstvsub', compact('variations'));
        }
    
        return back()->with('error', 'Unable to fetch variations.');
    
    }



    public function verifydstv(Request $request){
       
        // date_default_timezone_set('Africa/Lagos');
        // $currentTime = Carbon::now()->format('YmdHi'); // e.g., 202412141630
        // $randomString = bin2hex(random_bytes(5)); // Generates a random string
        // $man =  $currentTime . $randomString;
        // // dd($man);
        
            try {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'api-key' => '7b52bc44745a46b5f32de1111dc7b490',
                    'secret-key' => 'SK_3141f63b14985c711dd7673e3cbdcdec61cfebd883c'
                ])->post('https://sandbox.vtpass.com/api/merchant-verify', [
                    'billersCode' => $request->billersCode,
                    'serviceID' => $request->serviceID,
                    //  "request_id" => $man,
                    // 'callback_url' => route('transaction.callback'), 
    
                ]);
                
    
                $responseData = json_decode($response->getBody()->getContents(), true);
        dd($responseData);
               
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
    
}
