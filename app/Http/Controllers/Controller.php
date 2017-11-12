<?php

namespace App\Http\Controllers;

use App\Http\Models\News;
use App\Http\Models\Settings;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        //Check if not exist site setting
        $setting_live_screen = Settings::where('setting', 'live_screen')->first();
        if ( count($setting_live_screen) < 1 ){
            $add_row = new Settings();
            $add_row->setting = 'live_screen';
            $add_row->value = 2;
            $add_row->save();
        }
    }
}
