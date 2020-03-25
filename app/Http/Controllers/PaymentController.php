<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Http\Controllers\CommonController;
use App\Models\CommonModel;
use DB;

class PaymentController extends BaseController
{
    public function index()
    {
        return view('pages.payment.index');
    }

    public function getAllData()
    {
        $result = array(); $cnt = 0;
        foreach(CommonModel::getAllData('tbl_payment') as $item)
        {
            $res = array();
            $res['cnt'] = ++$cnt;
            $res['user_type'] = $item->user_type;
            $res['user_name'] = DB::table('tbl_'.$item->user_type)->where('id', $item->user_id)->first()->name;
            $res['amount'] = $item->amount;
            $res['description'] = $item->description;

            $result[] = $res;
        }
        echo json_encode(array('data'=>$result));
    }

}
