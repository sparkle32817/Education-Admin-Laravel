<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Models\CommonModel;
use DB;

class SubjectController extends Controller
{
    public function getAllData(Request $request)
    {
        $grade = DB::table('tbl_subject')->where('grade_id', $request->id)->get();

        $val = array(); $cnt = 0;
        foreach($grade as $item)
        {
            $val[] = array('cnt'=>++$cnt, 'name'=>$item->name, 'data'=>array('id'=>$item->id, 'name'=>$item->name));
        }
        
        echo json_encode(array('data'=>$val));
    }

    public function add(Request $request)
    {
        $id = $request->id;
        $grade_id = $request->grade_id;
        $name = $request->name;

        $exist = DB::table('tbl_subject')->where('name', $name)->where('grade_id', $grade_id)->get();
        if (sizeof($exist) > 0)
            return -1;

        if ($id == 0)                   //Add
        {
            $val = DB::table('tbl_subject')->insert(array('grade_id'=>$grade_id,'name'=>$name));            
        }
        else                            //Edit
        {
            $val = DB::table('tbl_subject')->where('id', $id)->update(array('name'=>$name));
        }

        return strval($val);
    }
    
    public function delete(Request $request)
    {
        return CommonModel::deleteData('tbl_subject', $request);
    }
}
