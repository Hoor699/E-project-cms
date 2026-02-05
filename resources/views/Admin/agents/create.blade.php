@extends('admin.master')

@section('main')
<div class="container-fluid p-4">
    <div class="card card-primary" style="background-color: #1e293b; color: white;">
        <div class="card-header">
            <h3 class="card-title">Add New System User (Admin/Agent)</h3>
        </div>
        
        <form action="{{ route('agent.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    
                    <div class="col-md-6 form-group mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label>Login Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Set Password" required>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label>Assign Role</label>
                        <select name="role" class="form-select" required>
                            <option value="agent">Agent</option>
                            <option value="admin">Sub-Admin</option>
                            <option value="user">Normal User</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label>Assign City</label>
                        <input type="text" name="city" class="form-control" placeholder="Enter City">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info shadow">Create & Register Account</button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Taake form dashboard ke theme se match kare */
    .form-control, .form-select {
        background-color: rgba(255,255,255,0.05) !important;
        color: white !important;
        border: 1px solid #444 !important;
    }
</style>
@endsection