<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\BannerFacade;

class BannerController extends ParentController
{
    public function insert(){
        $response['banners'] = BannerFacade::all();
        return view('pages\banner\banner')->with($response);
    }

    public function store(Request $request){
        BannerFacade::store($request->all());
        return redirect()->route('dash');
    }

    public function delete($banner_id){
        BannerFacade::delete($banner_id);
        return redirect()->back();
    }

    public function status($banner_id){
        BannerFacade::status($banner_id);
        return redirect()->back();
    }
}
