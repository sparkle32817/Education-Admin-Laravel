<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\CommonModel;

class QualificationController extends BaseController
{
  public function index()
  {
    return view('pages.personal.index');
  }

  public function getAllData()
  {
    $qualification = CommonModel::getAllData('tbl_qualification');

    $val = array();
    $cnt = 0;
    foreach ($qualification as $item) {
      $val[] = array('cnt' => ++$cnt, 'name' => $item->name, 'data' => array('id' => $item->id, 'name' => $item->name));
    }

    echo json_encode(array('data' => $val));
  }

  public function add(Request $request)
  {
    return CommonModel::addData('tbl_qualification', $request);
  }

  public function delete(Request $request)
  {
    return CommonModel::deleteData('tbl_qualification', $request);
  }
}
