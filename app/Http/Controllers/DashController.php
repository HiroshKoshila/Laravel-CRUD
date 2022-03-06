<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\BannerFacade;

class DashController extends ParentController
{
    public function dash(){      
         
        $response['banners'] = BannerFacade::allActive();
        return view('pages\dashboard\dash')->with($response);
    }
}
