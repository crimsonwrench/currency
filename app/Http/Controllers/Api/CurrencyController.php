<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CurrencyController extends Controller
{
    public function fetch($firstCurrency, $secondCurrency)
    {
        // API key for accessing https://free.currencyconverterapi.com
        $api_key = '93efd5057e26066fb2be';

        $conversion = $firstCurrency . '_' . $secondCurrency;

        if(!Cache::has($conversion))
        {
            //Retrieve data from remote API
            $json_data = file_get_contents('https://free.currencyconverterapi.com/api/v6/convert?q='
                . $conversion . '&compact=ultra&apiKey=' . $api_key);

            $decoded_data = json_decode($json_data, true);

            Cache::put($conversion, 
                $decoded_data[$conversion], 
                now()->addMinutes(60)
            );

            return response()->json([
                'timestamp' => now()->timestamp,
                'rate' => $decoded_data[$conversion],
            ]);
        }
        
        return response()->json([
            'timestamp' => now()->timestamp,
            'rate' => Cache::get($conversion)
        ]);

    }
}
