<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\CommonModel;

class CommonController extends BaseController
{
    static function getSelectedName($tableName, $ids)
    {
        $names = array();
        foreach(CommonModel::getSelectedName( $tableName, $ids) as $nameArr)
        {
            array_push($names, $nameArr->name);
        }

        return implode(', ', $names);
    }

}
