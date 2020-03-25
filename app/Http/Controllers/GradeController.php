<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\CommonModel;

class GradeController extends BaseController
{
    public function index()
    {
        return view('pages.grade.index');
    }

    public function getAllData()
    {
        $grade = CommonModel::getAllData('tbl_grade');

        $val = array(); $cnt = 0;
        foreach($grade as $item)
        {
            $val[] = array('cnt'=>++$cnt, 'name'=>$item->name, 'data'=>array('id'=>$item->id, 'name'=>$item->name));
        }
        
        echo json_encode(array('data'=>$val));
    }

    public function add(Request $request)
    {
        return CommonModel::addData('tbl_grade', $request);
    }
    
    public function delete(Request $request)
    {
        return CommonModel::deleteData('tbl_grade', $request);
    }
}
