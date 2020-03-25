<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\CommonModel;

class LocationController extends BaseController
{
    public function index()
    {
        return view('pages.location.index');
    }

    public function getAllData()
    {
        $grade = CommonModel::getAllData('tbl_location');

        $val = array(); $cnt = 0;
        foreach($grade as $item)
        {
            $val[] = array('cnt'=>++$cnt, 'name'=>$item->name, 'data'=>array('id'=>$item->id, 'name'=>$item->name));
        }
        
        echo json_encode(array('data'=>$val));
    }

    public function add(Request $request)
    {
        return CommonModel::addData('tbl_location', $request);
    }
    
    public function delete(Request $request)
    {
        return CommonModel::deleteData('tbl_location', $request);
    }
}
