@extends('layouts.master')

@section('content')
    <div class="card">
      <div class="card-body">
      <div class="d-flex flex-row-reverse mb-3">
        <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Cancel</a>
      </div>
      <form action="{{ route('admin.user.update', $user->getKey()) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control @error("name") is-invalid @enderror" name="name" id="name" aria-describedby="name" placeholder="Name" value="{{ old("name", $user->name) }}">
            @error("name")
            <small id="name" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="text" class="form-control @error("email") is-invalid @enderror" name="email" id="email" aria-describedby="email" placeholder="Email" value="{{ old("email", $user->email) }}">
            @error("email")
            <small id="email" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" class="form-control @error("password") is-invalid @enderror" name="password" id="password" aria-describedby="password" placeholder="Password">
            @error("password")
            <small id="password" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="role">Role</label>
            <select class="form-control @error("role") is-invalid @enderror" name="role" id="role">
              <option value="">Choose Role</option>
              <option value="admin" @selected(old("role", $user->role->value) == "admin")>Admin</option>
              <option value="user" @selected(old("role", $user->role->value) == "user")>User</option>
            </select>
            @error("role")
            <small id="role" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="password_confirmation" class="d-block">Gender</label>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="gender" id="gender" value="Male" @checked($user->gender == "Male")>
                      Male
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="gender" id="gender" value="Female" @checked($user->gender == "Female")>
                      Female
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 d-flex justify-content-center mx-1">
            <button type="reset" class="btn btn-warning mx-1">Reset</button>
            <button type="submit" class="btn btn-success mx-1">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('css')
  <!--- Contoh Stylesheet --->
@endpush

@push('js')
  <!--- Contoh Javascript --->
@endpush
