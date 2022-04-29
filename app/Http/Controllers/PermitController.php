<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermitRequest;
use App\Http\Requests\UpdatePermitRequest;
use App\Models\Permit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PermitController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.permit.index', [
      'title' => 'Permits',
      'permits' => Permit::latest()->paginate(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.permit.create', [
      'title' => 'Create Permit',
      'users' => User::whereRole('user')->get(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StorePermitRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePermitRequest $request)
  {
    $request->merge([
      'admin_id' => Auth::id(),
      'responded_at' => now(),
    ]);

    $permit = Permit::create($request->except('description', 'quantity', 'price', 'image'));

    $good = $permit->permit_good()->create($request->only('description', 'quantity', 'price'));

    $good->update([
      'image' => $request->file('image')->store('permit'),
    ]);

    return redirect()->route('admin.permit.index')->with('success', 'Permit created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Permit  $permit
   * @return \Illuminate\Http\Response
   */
  public function show(Permit $permit)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Permit  $permit
   * @return \Illuminate\Http\Response
   */
  public function edit(Permit $permit)
  {
    return view('admin.permit.edit', [
      'title' => 'Edit Permit',
      'permit' => $permit,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePermitRequest  $request
   * @param  \App\Models\Permit  $permit
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePermitRequest $request, Permit $permit)
  {
    $request->merge([
      'admin_id' => Auth::id(),
      'responded_at' => now(),
    ]);

    $permit->update($request->except('description', 'quantity', 'price', 'image'));

    $permit->permit_good()->update($request->only('description', 'quantity', 'price'));

    $permit->permit_good()->update([
      'image' => $request->file('image')->store('permit'),
    ]);

    return redirect()->route('admin.permit.index')->with('success', 'Permit updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Permit  $permit
   * @return \Illuminate\Http\Response
   */
  public function destroy(Permit $permit)
  {
    $permit->delete();

    return redirect()->route('admin.permit.index')->with('success', 'Permit deleted successfully.');
  }
}
