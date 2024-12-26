<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasubscription extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'request_id',
        'transaction_id',
        'serviceID',
        'amount',
        'balance',
        'variation_cade',
        'phone',
        'status',
        'product_name',
        'unique_element',
        'unit_price',
        'quantuty',
        'service_verification',
        'channel',
        'commission',
        'total_amount',
        'discount',
        'type',
        'email',
        'name',
        'convinience_fee',
        'platform',
        'method',
        'transactionID',
        'response_description',
        'requestId',
        'timezone_type',
        'timezone',
        'ref_no',
    ]; 


    }
