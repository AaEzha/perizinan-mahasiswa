@extends('layouts.master')

@section('content')
    <div class="card">
      <div class="card-body">
      <div class="d-flex flex-row-reverse mb-3">
        <a href="{{ route('admin.permit.index') }}" class="btn btn-primary">Cancel</a>
      </div>
      <form action="{{ route('admin.permit.update', $permit->getKey()) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="form-group col-md-6">
            <label for="user_id">Student</label>
            <input type="text" class="form-control id="user_id" aria-describedby="user_id" placeholder="user_id" value="{{ $permit->user->name }}" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="note">Note</label>
            <input type="text" class="form-control @error("note") is-invalid @enderror" name="note" id="note" aria-describedby="Note" placeholder="Note" value="{{ old("note", $permit->note) }}">
            @error("note")
            <small id="note" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="from_date">From</label>
            <input type="date" class="form-control @error("from_date") is-invalid @enderror" name="from_date" id="from_date" aria-describedby="from_date" placeholder="From" value="{{ old("from_date", $permit->from_date->format('Y-m-d')) }}">
            @error("from_date")
            <small id="from_date" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="to_date">To</label>
            <input type="date" class="form-control @error("to_date") is-invalid @enderror" name="to_date" id="to_date" aria-describedby="to_date" placeholder="To" value="{{ old("to_date", $permit->to_date->format('Y-m-d')) }}">
            @error("to_date")
            <small id="to_date" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="status">Status</label>
            <select class="form-control @error("status") is-invalid @enderror" name="status" id="status">
              <option value="">Choose status</option>
              <option value="approved" @selected(old('status', $permit->status) == "approved")>Approved</option>
              <option value="rejected" @selected(old('status', $permit->status) == "rejected")>Rejected</option>
            </select>
            @error("status")
            <small id="status" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" id="address" rows="3">{{ old('address', $permit->address) }}</textarea>
            @error("address")
            <small id="address" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="description">Goods</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Write down the goods you left behind">{{ old('description', $permit->permit_good->description) }}</textarea>
            @error("description")
            <small id="description" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="quantity">Total Quantity</label>
            <input type="number" class="form-control @error("quantity") is-invalid @enderror" name="quantity" id="quantity" aria-describedby="quantity" placeholder="Total Quantity" value="{{ old("quantity", $permit->permit_good->quantity) }}">
            @error("quantity")
            <small id="quantity" class="form-text text-muted">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="price">Total Price</label>
            <input type="number" class="form-control @error("price") is-invalid @enderror" name="price" id="price" aria-describedby="price" placeholder="Total Price" value="{{ old("price", $permit->permit_good->price) }}">
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
            <img src="{{ Storage::url($permit->permit_good->image) }}" class="img-fluid mt-3">
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
