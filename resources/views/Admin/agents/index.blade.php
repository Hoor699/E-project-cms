@extends('admin.master')

@section('main')
<style>
   /* Table ko scrollable banane ke liye container fix */
.table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto !important; /* Forcefully scroll bar layega agar content screen se bahar jaye */
    -webkit-overflow-scrolling: touch;
    border-radius: 0 0 15px 15px;
}

/* Table ki width lock taaki mobile par columns na pichkein */
.table {
    width: 100% !important;
    min-width: 900px !important; /* Mobile par itni width maintain rakhega scroll ke sath */
}

/* Mobile adjustments */
@media (max-width: 768px) {
    .container-fluid.p-4 {
        padding: 10px !important;
    }

    .card-header .d-flex {
        flex-direction: column !important; /* Mobile par heading aur button ko ek ke niche ek kar dega */
        gap: 15px;
        text-align: center;
    }

    .btn-add-agent {
        margin-left: 0 !important;
        width: 100%; /* Mobile par button poori width ka ho jayega */
        justify-content: center;
    }

    .card-title {
        width: 100%;
        margin-bottom: 10px !important;
    }
}
</style>

<div class="container-fluid p-4">
    <div class="row">
        <div class="col-12">
            <div class="card custom-table-card shadow-lg"> 
           <div class="card-header py-3">
    <div class="d-flex align-items-center w-100">
        <h3 class="card-title m-0">All Registered Agents</h3>
        
        <a href="{{ route('agent.create') }}" class="btn-add-agent ms-auto">
            <i class="bi bi-plus-circle-fill"></i> 
            <span>Add New Agent</span>
        </a>
    </div>
</div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Agent Name</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th>City</th>
                                    <th style="width: 250px;">Actions</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agents as $agent)
                                <tr>
                                    <td><span class="badge bg-light text-dark border">#{{ $agent->id }}</span></td>
                                    <td class="fw-bold">{{ $agent->name }}</td>
                                    <td>{{ $agent->email }}</td>
                                    <td>{{ $agent->phone }}</td>
                                    <td>
                                        <i class="bi bi-geo-alt-fill text-danger me-1"></i>{{ $agent->city }}
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.agent.work', $agent->id) }}" class="btn btn-sm btn-warning text-dark" title="View Work">
                                                <i class="bi bi-briefcase"></i> Work
                                            </a>
                                            <a href="{{ route('agent.edit', $agent->id) }}" class="btn btn-sm btn-outline-info mx-1" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('agent.delete', $agent->id) }}" 
                                               onclick="return confirm('Are you sure you want to delete this agent?')" 
                                               class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection