<?php

namespace App\Http\Controllers;

use App\Models\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermitHistoryController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    return view('user.permit-history', [
      'title' => 'Permit History',
      'permits' => Permit::where('user_id', Auth::id())->latest()->paginate(),
    ]);
  }
}
