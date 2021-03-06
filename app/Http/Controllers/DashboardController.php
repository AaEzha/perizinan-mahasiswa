<?php

namespace App\Http\Controllers;

use App\Enum\Status;
use App\Models\Permit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    return view('dashboard.index', [
      'title' => 'Dashboard',
      'permits' => Permit::where('status', 'pending')->paginate(),
    ]);
  }
}
