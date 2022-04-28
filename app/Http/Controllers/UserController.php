<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.user.index', [
      'title' => 'Users',
      'users' => User::paginate(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.user.create', [
      'title' => 'Create User',
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreUserRequest $request)
  {
    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'role' => $request->role,
    ]);

    return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  User $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  User $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    return view('admin.user.edit', [
      'title' => 'Edit User',
      'user' => $user,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  User $user
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateUserRequest $request, User $user)
  {
    $user->update([
      'name' => $request->name,
      'email' => $request->email,
      'role' => $request->role,
    ]);

    if ($request->filled('password')) {
      $user->update([
        'password' => bcrypt($request->password),
      ]);
    }

    return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  User $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    $user->delete();

    return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
  }
}
