@extends('layouts.master')

@section('content')
  <div class="card">
    <div class="card-body">
      <div class="d-flex flex-row-reverse mb-3">
        <a href="{{ route('admin.permit.create') }}" class="btn btn-primary">Add data</a>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Period</th>
            <th>Status</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($permits as $d)
            <tr>
              <td scope="row">{{ $loop->iteration }}</td>
              <td>{{ $d->user->name }}</td>
              <td>{{ $d->from_date->format('d F Y') }} - {{ $d->to_date->format('d F Y') }}</td>
              <td>
                {{ $d->status }}
                @if ($d->responded_at)
                  <br>
                  <small>{{ $d->responded_at->format('d F Y') }} by {{ $d->admin->name }}</small>
                @endif
              </td>
              <td>
                <form action="{{ route('admin.permit.destroy', $d->getKey()) }}" method="post">
                  @csrf
                  @method('delete')
                  <a href="{{ route('admin.permit.edit', $d->getKey()) }}" class="btn btn-warning">Edit</a>
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center">No data</td>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $permits->links() }}
    </div>
  </div>
@endsection

@push('css')
  <!--- Contoh Stylesheet --->
@endpush

@push('js')
  <!--- Contoh Javascript --->
@endpush
