<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\CommonModel;

class CertificationController extends BaseController
{
  public function getAllData()
  {
    $certification = CommonModel::getAllData('tbl_certification');

    $val = array();
    $cnt = 0;
    foreach ($certification as $item) {
      $val[] = array('cnt' => ++$cnt, 'name' => $item->name, 'data' => array('id' => $item->id, 'name' => $item->name));
    }

    echo json_encode(array('data' => $val));
  }

  public function add(Request $request)
  {
    return CommonModel::addData('tbl_certification', $request);
  }

  public function delete(Request $request)
  {
    return CommonModel::deleteData('tbl_certification', $request);
  }
}
