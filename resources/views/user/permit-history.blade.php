@extends('layouts.master')

@section('content')
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Note</th>
            <th>Period</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($permits as $d)
            <tr>
              <td scope="row">{{ $loop->iteration }}</td>
              <td>{{ $d->note }}</td>
              <td>{{ $d->from_date->format('d F Y') }} - {{ $d->to_date->format('d F Y') }}</td>
              <td>
                {{ $d->status }}
                @if ($d->responded_at)
                  <br>
                  <small>{{ $d->responded_at->format('d F Y') }} by {{ $d->admin->name }}</small>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center">No data</td>
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
