<?php

namespace App\Http\Controllers;

use App\Models\Permit;
use Illuminate\Http\Request;

class RejectPermitController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request, Permit $permit)
  {
    $permit->update([
      'status' => 'rejected',
      'admin_id' => auth()->id(),
      'responded_at' => now(),
    ]);

    return redirect()->route('dashboard')->with('success', 'Permit rejected successfully.');
  }
}
