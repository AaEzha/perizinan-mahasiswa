<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermitRequest;
use App\Models\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermitRequestController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(PermitRequest $request)
  {
    $request->merge([
      'user_id' => Auth::id(),
      'status' => 'pending',
    ]);

    // cek permit sebelumnya
    $cek = Permit::where('status', 'pending')->where('user_id', Auth::id())->first();
    if ($cek) {
      return redirect()->back()->with('error', 'Anda memiliki permintaan yang belum disetujui');
    }

    $permit = Permit::create($request->all());

    $good = $permit->permit_good()->create($request->only('description', 'quantity', 'price'));

    $good->update([
      'image' => $request->file('image')->store('permit'),
    ]);

    return redirect()->route('user.permit-history')->with('success', 'Permit request has been submitted.');
  }
}
