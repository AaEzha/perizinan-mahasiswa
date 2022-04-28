@extends('layouts.master')

@section('content')
    <div class="card">
      <div class="card-body">
      <div class="d-flex flex-row-reverse mb-3">
        <a href="{{ route('admin.permit.index') }}" class="btn btn-primary">Cancel</a>
      </div>
      <form action="{{ route('admin.permit.update', $permit->getKey()) }}" method="post">
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
