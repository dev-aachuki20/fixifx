<?php

use Carbon\Carbon;
use App\Models\Country;
use App\Models\Setting;
use Illuminate\Support\Str;
use Buglinjo\LaravelWebp\Webp;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

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

function getCurrencyFlag($currency_code)
{
    // return Country::where('currency_code', $currency_code)->pluck('flag')->first();
    return asset('front/img/flag/' . strtolower($currency_code) . '.svg') ?: Country::where('currency_code', $currency_code)->pluck('flag')->first();
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
    $access_key = env('CURRENCY_KEY');
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
