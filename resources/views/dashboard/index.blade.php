@extends('layouts.master')

@section('content')
  @can('admin')
    <h2 class="section-title">Permit Request</h2>

    <div class="card">
      <div class="card-body">
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
                <td class="d-flex justify-content-center my-2">
                  <form action="{{ route('admin.permit.approve', $d->getKey()) }}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-success mr-2"
                      onclick="return confirm('Are you sure?')">Approve</button>
                  </form>
                  <form action="{{ route('admin.permit.reject', $d->getKey()) }}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Reject</button>
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
  @endcan

  @can('user')
    <h2 class="section-title">Permit Request</h2>

    <form action="{{ route('user.permit-request') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="note">Note</label>
        <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" id="note"
          aria-describedby="Note" placeholder="Note" value="{{ old('note') }}">
        @error('note')
          <small id="note" class="form-text text-muted">{{ $message }}</small>
        @enderror
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="from_date">From</label>
          <input type="date" class="form-control @error('from_date') is-invalid @enderror" name="from_date" id="from_date"
            aria-describedby="from_date" placeholder="From" value="{{ old('from_date') }}">
          @error('from_date')
            <small id="from_date" class="form-text text-muted">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="to_date">To</label>
          <input type="date" class="form-control @error('to_date') is-invalid @enderror" name="to_date" id="to_date"
            aria-describedby="to_date" placeholder="To" value="{{ old('to_date') }}">
          @error('to_date')
            <small id="to_date" class="form-text text-muted">{{ $message }}</small>
          @enderror
        </div>
      </div>
      <div class="row">
          <div class="form-group col-md-6">
            <label for="description">Goods</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Write down the goods you left behind">{{ old('description') }}</textarea>
            @error("description")
            <small id="description" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="quantity">Total Quantity</label>
            <input type="number" class="form-control @error("quantity") is-invalid @enderror" name="quantity" id="quantity" aria-describedby="quantity" placeholder="Total Quantity" value="{{ old("quantity") }}">
            @error("quantity")
            <small id="quantity" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="price">Total Price</label>
            <input type="number" class="form-control @error("price") is-invalid @enderror" name="price" id="price" aria-describedby="price" placeholder="Total Price" value="{{ old("price") }}">
            @error("price")
            <small id="price" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="image">Image</label>
            <input type="file" class="form-control @error("image") is-invalid @enderror" name="image" id="image" aria-describedby="image" placeholder="Image" value="{{ old("image") }}">
            @error("image")
            <small id="image" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
        </div>
      <div class="row">
        <div class="col-md-12 d-flex justify-content-center mx-1">
          <button type="reset" class="btn btn-warning mx-1">Reset</button>
          <button type="submit" class="btn btn-success mx-1">Save</button>
        </div>
      </div>
    </form>
  @endcan
@endsection

@push('css')
  <!--- Contoh Stylesheet --->
@endpush

@push('js')
  <!--- Contoh Javascript --->
@endpush
