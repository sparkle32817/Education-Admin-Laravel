<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Http\Controllers\CommonController;
use App\Models\CommonModel;

class StudentController extends BaseController
{
  public function index()
  {
    return view('pages.student.index');
  }

  public function detail(Request $request)
  {
    $id = $request->input('id');

    $data = CommonModel::getDetailData('tbl_student', $id);

    unset($data->password);

    $data->grade = CommonController::getSelectedName('tbl_grade', $data->grade);
    $data->subject = CommonController::getSelectedName('tbl_subject', $data->subject);
    $data->activity = CommonController::getSelectedName('tbl_activity_content', $data->activity);
    $data->location = CommonController::getSelectedName('tbl_location', $data->location);

    return view('pages.student.detail', compact('data'));
  }

  public function getAllData()
  {
    $returnVal = array();
    foreach (CommonModel::getAllData('tbl_student') as $result) {
      unset($result->password);

      $result->grade = CommonController::getSelectedName('tbl_grade', $result->grade);
      $result->subject = CommonController::getSelectedName('tbl_subject', $result->subject);
      $result->activity = CommonController::getSelectedName('tbl_activity_content', $result->activity);
      $result->location = CommonController::getSelectedName('tbl_location', $result->location);
      $result->activatedStatus = array('id' => $result->id, 'status' => $result->activated);

      $returnVal[] = $result;
    }

    echo json_encode(array('data' => $returnVal));
  }

  public function setChangeApproveStatus(Request $request)
  {
    return CommonModel::changeApproveStatus('tbl_student', $request->id, $request->status);
  }
}
