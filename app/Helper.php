<?php

use Carbon\Carbon;
use App\Models\Country;
use App\Models\Setting;
use Illuminate\Support\Str;
use Buglinjo\LaravelWebp\Webp;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

function getYouTubeUniqueString($full_link)
{
    $video_id = explode("?v=", $full_link);
    $video_embed_id = explode("embed/", $full_link);

    if (isset($video_id[1])) {
        $video_id = $video_id[1];
    } else if (isset($video_embed_id[1])) {
        $video_id = $video_embed_id[1];
    } else {
        $video_id = $video_id[0];
    }

    return $video_id;
}


function uploadFile($file, $dir)
{
    if ($file) {
        if ($dir == "ArticleThumb") {
            $media_image = time() . '.' . $file->getClientOriginalExtension();

            $destinationPath = storage_path('app/public') . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR;

            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }
            Image::make($file->getRealPath())->resize(610, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . $media_image);

            return $media_image;
        } else {
            $destinationPath =  storage_path('app/public') . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR;

            $media_image = $file->hashName();

            $file->move($destinationPath, $media_image);

            return $media_image;
        }

        /* $destinationPath = public_path('/images');
        $image->move(public_path('storage/images', $input['imagename'])); */

        /* $imageName = Str::random(30) . time() . '.webp';
    
        $StorageLocation = storage_path('app/public') . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR;

        File::isDirectory($StorageLocation) or File::makeDirectory($StorageLocation, 0777, true, true);
        $webp = Webp::make($file);

        if ($webp->save($StorageLocation . $imageName)) {

            return $imageName;
        } else {
            return false;
        } */
    }
}

function getSettingValue($key)
{
    $setting = Setting::where('key', $key)->pluck('value')->toArray();

    if (!empty($setting))
        return $setting[0] ?: null;
}

function timeDiff($date)
{
    $str = config('app.locale') == 'en' ? 'ago' : '前';
    $now = Carbon::now();
    $created_at = Carbon::parse($date);
    $diffHuman = $created_at->diffForHumans($now, true) . $str;

    return $diffHuman;
}

// function getCurrencyFlag($currency_code)
// {
//     // return Country::where('currency_code', $currency_code)->pluck('flag')->first();
//     return asset('front/img/flag/' . strtolower($currency_code) . '.svg') ?: Country::where('currency_code', $currency_code)->pluck('flag')->first();


// }

function getCurrencyFlag($currency_code)
{
    $flagPath = 'front/img/flag/' . strtolower($currency_code) . '.svg';
    $fallbackFlagPath = 'front/img/flag/usd.svg';

    // Check if the flag file exists, if not, use the fallback flag
    if (file_exists(public_path($flagPath))) {
        return asset($flagPath);
    } else {
        return asset($fallbackFlagPath);
    }
}

function getAllChangeCurrency()
{
    $sources = ['USD', 'EUR', 'GBP', 'AUD', 'NZD'];
    $result = [];

    foreach ($sources as $key => $source) {
        $result[] = getChangeRate($source);
    }

    return array_merge($result[0], $result[1], $result[2], $result[3], $result[4]);
}


function getChangeRate($source)
{
    $access_key = "156008d1a480152fc96284714da5a892"; //env('CURRENCY_KEY');
    // $access_key = config('app.currency_key'); //env('CURRENCY_KEY');
    if ($source == 'EUR') {
        $currencies = 'USD,JPY,GBP';
    } else if ($source == 'USD') {
        $currencies = 'JPY,CAD,CHF,CNY';
    } else if ($source == 'GBP') {
        $currencies = 'USD,JPY';
    } else if ($source == 'AUD') {
        $currencies = 'USD';
    } else if ($source == 'NZD') {
        $currencies = 'USD';
    }

    $response  = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->get('https://api.currencylayer.com/change?access_key=' . $access_key . '&source=' . $source . '&currencies=' . $currencies);

    $response = json_decode($response->body());

    $data = [];
    $currency = (array) $response->quotes;

    foreach ($currency as $key => $value) {
        $data[$key]['start_rate'] = $value->start_rate;
        $data[$key]['end_rate'] = $value->end_rate;
        $data[$key]['change_pct'] = $value->change_pct;
        $data[$key]['flag_1'] = getCurrencyFlag(substr($key, 0, 3));
        $data[$key]['flag_2'] = getCurrencyFlag(substr($key, 3, 6));
    }

    return $data;
}


function getAllCurrency()
{
    $cacheKey = 'all_currencies';
    return Cache::remember($cacheKey, now()->addDays(30), function () {
        $sources = ['USD', 'EUR', 'GBP', 'AUD', 'NZD', 'CHF', 'CAD', 'JPY', 'CADD', 'TRY', 'MXN', 'ZAR', 'CNH', 'DKK', 'NOK', 'PLN', 'XAU', 'XAG'];
        $result = [];

        foreach ($sources as $source) {
            $flags = getFlags($source);
            if ($flags !== null) {
                $result = array_merge($result, $flags);
            }
        }
        return $result;
    });
}


function getFlags($source)
{
    $cacheKey = 'currency_flags_' . $source;

    return Cache::remember($cacheKey, now()->addDays(30), function () use ($source) {
        ini_set('max_execution_time', '0');
        $access_key = env('CURRENCY_KEY');
        $currencies = '';

        // Your existing code for $currencies goes here
        // EUR,AUD,GBP,NZD, USD, CAD,CHF,XAG,XAU
        if ($source == 'EUR') {
            $currencies = 'USD,JPY,GBP,CHF,AUD,CAD,NZD,TRY';
        } else if ($source == 'USD') {
            $currencies = 'JPY,CAD,CHF,CNY,TRY,MXN,ZAR,CNH,DKK,NOK,PLN';
        } else if ($source == 'GBP') {
            $currencies = 'USD,AUD,CADD,CHF,JPY';
        } else if ($source == 'AUD') {
            $currencies = 'USD,JPY,CAD,CHF,NZD';
        } else if ($source == 'NZD') {
            $currencies = 'USD,JPY';
        } else if ($source == 'CAD') {
            $currencies = 'CHF,JPY';
        } else if ($source == 'CHF') {
            $currencies = 'JPY';
        } else if ($source == 'XAG') {
            $currencies = 'USD';
        } else if ($source == 'XAU') {
            $currencies = 'USD';
        }

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->get('https://api.currencylayer.com/live', [
            'access_key' => $access_key,
            'source' => $source,
            'currencies' => $currencies,
        ]);

        $response = json_decode($response->body());

        if (isset($response->quotes)) {
            $data = [];
            $currency = (array) $response->quotes;

            foreach ($currency as $key => $value) {
                $data[$key]['start_rate'] = $value;
                $data[$key]['end_rate'] = 0; // You may adjust this as needed
                $data[$key]['change_pct'] = 0; // You may adjust this as needed
                $data[$key]['flag_1'] = getCurrencyFlag(substr($key, 0, 3));
                $data[$key]['flag_2'] = getCurrencyFlag(substr($key, 3, 6));
            }

            return $data;
        }

        return null;
    });
}


// function getAllCurrency()
// {
//     $sources = ['USD', 'EUR', 'GBP', 'AUD', 'NZD', 'CHF', 'CAD', 'JPY', 'CADD', 'TRY', 'MXN', 'ZAR', 'CNH', 'DKK', 'NOK', 'PLN', 'XAU', 'XAG'];
//     $result = [];

//     foreach ($sources as $source) {
//         $flags = getFlags($source);
//         if ($flags !== null) {
//             $result = array_merge($result, $flags);
//         }
//         // $result = array_merge($result, getFlags($source));
//     }

//     // return array_merge($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8]);
//     return $result;
// }

// function getFlags($source)
// {
//     ini_set('max_execution_time', '0');
//     $access_key = env('CURRENCY_KEY');
//     $currencies = '';
//     // EUR,AUD,GBP,NZD, USD, CAD,CHF,XAG,XAU
//     if ($source == 'EUR') {
//         $currencies = 'USD,JPY,GBP,CHF,AUD,CAD,NZD,TRY';
//     } else if ($source == 'USD') {
//         $currencies = 'JPY,CAD,CHF,CNY,TRY,MXN,ZAR,CNH,DKK,NOK,PLN';
//     } else if ($source == 'GBP') {
//         $currencies = 'USD,AUD,CADD,CHF,JPY';
//     } else if ($source == 'AUD') {
//         $currencies = 'USD,JPY,CAD,CHF,NZD';
//     } else if ($source == 'NZD') {
//         $currencies = 'USD,JPY';
//     } else if ($source == 'CAD') {
//         $currencies = 'CHF,JPY';
//     } else if ($source == 'CHF') {
//         $currencies = 'JPY';
//     } else if ($source == 'XAG') {
//         $currencies = 'USD';
//     } else if ($source == 'XAU') {
//         $currencies = 'USD';
//     }

//     $response = Http::withHeaders([
//         'Content-Type' => 'application/json',
//     ])->get('https://api.currencylayer.com/live', [
//         'access_key' => $access_key,
//         'source' => $source,
//         'currencies' => $currencies,
//     ]);
//     $response = json_decode($response->body());
//     // dd($response->quotes);

//     if (isset($response->quotes)) {
//         $data = [];
//         $currency = (array) $response->quotes;
//         // $currency = (array) $response->rates;

//         foreach ($currency as $key => $value) {
//             $data[$key]['start_rate'] = $value;
//             $data[$key]['end_rate'] = 0; // You may adjust this as needed
//             $data[$key]['change_pct'] = 0; // You may adjust this as needed
//             $data[$key]['flag_1'] = getCurrencyFlag(substr($key, 0, 3));
//             $data[$key]['flag_2'] = getCurrencyFlag(substr($key, 3, 6));
//         }

//         return $data;
//     }

//     return null;
// }

// avtar with initials
function getInitials($name)
{
    $words = explode(' ', $name);
    $initials = '';
    foreach ($words as $word) {
        $initials .= strtoupper($word[0]);
    }
    return $initials;
}

function getRandomColor()
{
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}
