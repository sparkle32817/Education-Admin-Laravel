<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Models\AuthModel;
use DB;

class AuthController extends Controller
{
  //
  public function index()
  {
  }

  public function checkLogin(Request $request)
  {
    if (AuthModel->where([['username', $request->user], ['password', $request->pass]])->get()->count()) {
      return 'success';
    }
    return 'fail';
  }
}
