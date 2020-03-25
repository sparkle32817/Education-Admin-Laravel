<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Http\Controllers\CommonController;
use App\Models\EducationModel;
use App\Models\CommonModel;

class EducationController extends BaseController
{
    public function index()
    {
        return view('pages.education.index');
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');

        $data = CommonModel::getDetailData('tbl_education', $id);
    
        unset($data->password);
            
        $data->grade = CommonController::getSelectedName('tbl_grade', $data->grade);
        $data->subject = CommonController::getSelectedName('tbl_subject', $data->subject);
        $data->activity = CommonController::getSelectedName('tbl_activity_content', $data->activity);

        return view('pages.education.detail', compact('data'));
    }
    
    public function getAllData()
    {
        $returnVal = array();
        foreach (CommonModel::getAllData('tbl_education') as $result)
        {
            unset($result->password);

            $result->grade = CommonController::getSelectedName('tbl_grade', $result->grade);
            $result->subject = CommonController::getSelectedName('tbl_subject', $result->subject);
            $result->activity = CommonController::getSelectedName('tbl_activity_content', $result->activity);

            $returnVal[] = $result;
        }

        echo json_encode(array('data'=>$returnVal));
    }

}
