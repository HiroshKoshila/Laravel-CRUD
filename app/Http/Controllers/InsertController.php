<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use domain\Facades\ItemFacade;

class InsertController extends ParentController
{


    public function insert(){
        $response['tasks'] = ItemFacade::all();
        return view('pages\insert\insert')->with($response);
    }

    public function store(Request $request){
        ItemFacade::store($request->all());
        return redirect()->route('dash');
    }

    public function delete($it_id){
        ItemFacade::delete($it_id);
        return redirect()->back();
    }

    public function active($it_id){
        ItemFacade::active($it_id);
        return redirect()->back();
    }

    public function edit(Request $request){
        $response['task'] = ItemFacade::get($request['it_id']);
        return view('pages\update\intEdit')->with($response);
    }

    public function update(Request $request, $it_id){
        ItemFacade::update($request->all(), $it_id);
        return redirect()->back();
    }
}
