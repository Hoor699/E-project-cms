@extends('Admin.master')

@section('main')
<style>
    .content-wrapper { background-color: #0f172a !important; }
    .content-header { padding: 30px 0.5rem 20px 0.5rem !important; border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important; margin-bottom: 30px !important; }
    .card { background-color: #1e293b !important; border: 1px solid rgba(255, 255, 255, 0.1) !important; border-radius: 15px !important; margin-top: 10px; }
    
    /* Standard Labels for Dark Theme */
    .form-group label { color: #ffffff !important; font-weight: 600; margin-bottom: 8px; }
    
    /* Input Fields Styling */
    .form-control { background-color: rgba(255, 255, 255, 0.05) !important; border: 1px solid rgba(255, 255, 255, 0.2) !important; color: #ffffff !important; border-radius: 8px; padding: 12px; }
    
    /* Special Class for Black Text Inputs (Like you requested for Email) */
    .input-black-text { background-color: rgba(255, 255, 255, 0.05) !important; color: #000000 !important; font-weight: 500; }
    .label-black-text { color: rgba(255, 255, 255, 0.05) !important; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; }

    .card-title, h1 { color: #ffffff !important; }
    select option { background-color: #1e293b !important; color: #ffffff !important; }
</style>

<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0 text-white" style="font-weight: 700;">Book New Shipment</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-lg">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">Shipment Details</h3>
                    </div>

                    <form action="{{ route('courier.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label>Assign Agent</label>
                                <select name="agent_id" class="form-control" required>
                                    <option value="" selected disabled>-- Choose Agent --</option>
                                    @foreach($agents as $agent)
                                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group mb-4">
                                    <label>Sender Name</label>
                                    <input type="text" name="sender_name" class="form-control" value="{{ old('sender_name') }}" placeholder="Full Name" required>
                                </div>
                                <div class="col-md-6 form-group mb-4">
                                    <label>Receiver Name</label>
                                    <input type="text" name="receiver_name" class="form-control" value="{{ old('receiver_name') }}" placeholder="Full Name" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group mb-4">
                                    <label class="label-black-text">Sender Email</label>
                                    <input type="email" name="sender_email" class="form-control input-black-text" 
                                           value="{{ old('sender_email') }}" placeholder="email@example.com" required>
                                </div>
                                <div class="col-md-6 form-group mb-4">
                                    <label>Sender Phone</label>
                                    <input type="text" name="sender_phone" class="form-control" value="{{ old('sender_phone') }}" placeholder="03XXXXXXXXX" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group mb-4">
                                    <label>Origin</label>
                                    <select name="from_city" class="form-control" required>
                                        <option value="" disabled selected>Select City</option>
                                        <option>Karachi</option>
                                        <option>Lahore</option>
                                        <option>Islamabad</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group mb-4">
                                    <label>Destination</label>
                                    <select name="to_city" class="form-control" required>
                                        <option value="" disabled selected>Select City</option>
                                        <option>Karachi</option>
                                        <option>Lahore</option>
                                        <option>Islamabad</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group mb-4">
                                    <label>Weight (KG)</label>
                                    <input type="number" step="0.1" name="weight" class="form-control" value="{{ old('weight') }}" placeholder="0.0" required>
                                </div>
                                <div class="col-md-4 form-group mb-4">
                                    <label>Price (PKR)</label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price') }}" placeholder="0.00" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent border-0 py-4 text-right">
                            <button type="submit" class="btn btn-primary px-5 font-weight-bold shadow">
                                SAVE SHIPMENT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection