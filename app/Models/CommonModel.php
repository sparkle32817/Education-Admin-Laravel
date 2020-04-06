<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommonModel extends Model
{
  //
  static function getSelectedName($tableName, $ids)
  {
    $users = DB::table($tableName)
      ->whereIn('id', explode(',', $ids))
      ->get();
    return $users;
  }

  static function getAllData($tableName)
  {
    return DB::table($tableName)->get();
  }

  static function getDetailData($tableName, $id)
  {
    return DB::table($tableName)->where('id', $id)->first();
  }

  static function addData($tableName, $postedData)                //Assist Table Management
  {
    $id = $postedData->id;
    $name = $postedData->name;

    $exist = DB::table($tableName)->where('name', $name)->get();
    if (sizeof($exist) > 0)
      return -1;

    if ($id == 0)                   //Add
    {
      $val = DB::table($tableName)->insert(array('name' => $name));
    } else                            //Edit
    {
      $val = DB::table($tableName)->where('id', $id)->update(array('name' => $name));
    }

    return strval($val);
  }

  static function deleteData($tableName, $postedData)           //Assist Table Management
  {
    return DB::table($tableName)->where("id", $postedData->id)->delete();
  }

  static function changeApproveStatus($tableName, $id, $status)
  {
    return DB::table($tableName)
      ->where('id', $id)
      ->update(['activated' => $status]);
  }
}
