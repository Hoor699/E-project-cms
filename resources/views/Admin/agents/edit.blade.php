@extends('admin.master')

@section('main')
<div class="container-fluid p-4">
    <div class="card bg-dark text-white">
        <div class="card-header"><h3 class="card-title">Edit Agent</h3></div>
        <form action="{{ route('agent.update', $agent->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $agent->name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $agent->email }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ $agent->phone }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>City</label>
                    <input type="text" name="city" value="{{ $agent->city }}" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update Agent</button>
            </div>
        </form>
    </div>
</div>
@endsection