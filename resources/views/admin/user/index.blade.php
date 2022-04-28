@extends('layouts.master')

@section('content')
    <div class="card">
      <div class="card-body">
      <div class="d-flex flex-row-reverse mb-3">
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Add data</a>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $d)
          <tr>
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->email }}</td>
            <td>{{ $d->role->value }}</td>
            <td>
              <form action="{{ route('admin.user.destroy', $d->getKey()) }}" method="post">
                @csrf
                @method('delete')
                <a href="{{ route('admin.user.edit', $d->getKey()) }}" class="btn btn-warning">Edit</a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $users->links() }}
    </div>
  </div>
@endsection

@push('css')
  <!--- Contoh Stylesheet --->
@endpush

@push('js')
  <!--- Contoh Javascript --->
@endpush
