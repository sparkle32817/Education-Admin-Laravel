<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Models\CommonModel;
use DB;

class ActivityController extends Controller
{
	public function index()
	{
		return view('pages.activity.index');
	}

	public function getAllTitleData()
	{
		$title = CommonModel::getAllData('tbl_activity_title');

		$val = array();
		$cnt = 0;
		foreach ($title as $item) {
			$val[] = array('cnt' => ++$cnt, 'name' => $item->name, 'data' => array('id' => $item->id, 'name' => $item->name));
		}

		echo json_encode(array('data' => $val));
	}

	public function addTitle(Request $request)
	{
		return CommonModel::addData('tbl_activity_title', $request);
	}

	public function deleteTitle(Request $request)
	{
		return CommonModel::deleteData('tbl_activity_title', $request);
	}

	public function getAllContentData(Request $request)
	{
		$title = DB::table('tbl_activity_content')->where('title_id', $request->id)->get();

		$val = array();
		$cnt = 0;
		foreach ($title as $item) {
			$val[] = array('cnt' => ++$cnt, 'name' => $item->name, 'data' => array('id' => $item->id, 'name' => $item->name));
		}

		echo json_encode(array('data' => $val));
	}

	public function addContent(Request $request)
	{
		$id = $request->id;
		$title_id = $request->title_id;
		$name = $request->name;

		$exist = DB::table('tbl_activity_content')->where('name', $name)->where('title_id', $title_id)->get();
		if (sizeof($exist) > 0)
			return -1;

		if ($id == 0)                   //Add
		{
			$val = DB::table('tbl_activity_content')->insert(array('title_id' => $title_id, 'name' => $name));
		} else                            //Edit
		{
			$val = DB::table('tbl_activity_content')->where('id', $id)->update(array('name' => $name));
		}

		return strval($val);
	}

	public function deleteContent(Request $request)
	{
		return CommonModel::deleteData('tbl_activity_content', $request);
	}
}