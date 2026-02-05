@extends('admin.master')

@section('main')
<style>
    /* Professional Gradient Button */
    .btn-print {
        transition: all 0.3s ease;
        border: none;
        background: linear-gradient(45deg, #1e3c72, #2a5298);
        color: white;
        padding: 10px 25px;
        border-radius: 5px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-print:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(30, 60, 114, 0.4);
        color: white;
        background: linear-gradient(45deg, #2a5298, #1e3c72);
    }

    /* Card styling for Dashboard */
    .report-card {
        border: 1px solid #2d2d2d;
        border-radius: 8px;
        overflow: hidden;
    }
</style>
<div class="container-fluid py-4"> <div class="card bg-dark text-white mb-4 no-print report-card shadow">
        <div class="card-header border-secondary p-4"> <div class="row align-items-center">
                <div class="col-md-7">
                    <h3 class="mb-1 text-uppercase fw-bold" style="letter-spacing: 1px; color: #fff;">
                        Agent Performance Report
                    </h3>
                    <p class="text-secondary mb-0">Detailed work history and status tracking</p>
                </div>
                
                <div class="col-md-5 text-md-end text-start mt-md-0 mt-3">
                    <button onclick="printReport()" class="btn-print shadow-sm">
                        <i class="bi bi-printer-fill"></i>
                        <span class="fw-bold text-uppercase">Print Receipt</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


  <div class="card border-0 shadow-sm mt-3">
        <div id="print-area">
            <div class="receipt-container" style="background: white !important; color: black !important; padding: 40px; border-radius: 8px;">
            
            <div style="text-align: center; border-bottom: 3px double #000; padding-bottom: 20px; margin-bottom: 30px;">
                <h1 style="margin: 0; font-size: 32px; font-weight: 900; color: black !important;">COURIER MANAGEMENT SYSTEM</h1>
                <p style="margin: 5px 0; font-size: 14px; letter-spacing: 3px; color: #444 !important; text-transform: uppercase;">Reliable Logistics Solutions</p>
            </div>

            <div style="display: flex; justify-content: space-between; margin-bottom: 30px; font-size: 15px; color: black !important;">
                <div>
                    <h4 style="margin-bottom: 10px; text-decoration: underline;">AGENT DETAILS</h4>
                    <p style="margin: 3px 0;"><strong>Name:</strong> {{ $agent->name }}</p>
                    <p style="margin: 3px 0;"><strong>City/Branch:</strong> {{ $agent->city ?? 'Main Hub' }}</p>
                </div>
                <div style="text-align: right;">
                    <h4 style="margin-bottom: 10px; text-decoration: underline;">REPORT INFO</h4>
                    <p style="margin: 3px 0;"><strong>Date:</strong> {{ date('d F, Y') }}</p>
                    <p style="margin: 3px 0;"><strong>Ref No:</strong> CMS/REP/{{ date('Y') }}/{{ rand(100, 999) }}</p>
                </div>
            </div>

            <table style="width: 100%; border-collapse: collapse; border: 2px solid black;">
                <thead>
                    <tr style="background-color: #f0f0f0 !important; border-bottom: 2px solid black;">
                        <th style="border: 1px solid black; padding: 12px; text-align: center; font-weight: bold; color: black !important;">TRACKING NO</th>
                        <th style="border: 1px solid black; padding: 12px; text-align: left; font-weight: bold; color: black !important;">SENDER</th>
                        <th style="border: 1px solid black; padding: 12px; text-align: left; font-weight: bold; color: black !important;">RECEIVER</th>
                        <th style="border: 1px solid black; padding: 12px; text-align: center; font-weight: bold; color: black !important;">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($couriers as $courier)
                    <tr>
                        <td style="border: 1px solid black; padding: 12px; text-align: center; font-family: monospace; font-size: 16px; color: black !important;">{{ $courier->tracking_no }}</td>
                        <td style="border: 1px solid black; padding: 12px; color: black !important;">{{ $courier->sender_name }}</td>
                        <td style="border: 1px solid black; padding: 12px; color: black !important;">{{ $courier->receiver_name }}</td>
                        <td style="border: 1px solid black; padding: 12px; text-align: center; font-weight: bold; color: black !important;">{{ strtoupper($courier->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top: 60px; display: flex; justify-content: space-between; align-items: flex-end; color: black !important;">
                <div style="text-align: center;">
                    <div style="border-top: 1px solid black; width: 200px; margin-bottom: 5px;"></div>
                    <p style="margin: 0; font-weight: bold;">Agent Signature</p>
                </div>
                <div style="text-align: center;">
                    <p style="font-size: 12px; margin-bottom: 50px; font-style: italic;">This is a computer-generated document.<br>No physical signature required for verification.</p>
                    <div style="border-top: 1px solid black; width: 200px; margin-bottom: 5px;"></div>
                    <p style="margin: 0; font-weight: bold;">Authorized Stamp</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function printReport() {
    var prtContent = document.getElementById("print-area");
    var WinPrint = window.open('', '', 'width=1100,height=900,toolbar=0,scrollbars=0,status=0');
    
    WinPrint.document.write('<html><head><title>Official_Report_{{ $agent->name }}</title>');
    WinPrint.document.write('<style>');
    // URL/Date hatane ki trick
    WinPrint.document.write('@page { margin: 0; size: auto; }'); 
    WinPrint.document.write('body { margin: 1.5cm; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; background: white !important; color: black !important; }');
    WinPrint.document.write('table { width: 100%; border-collapse: collapse; }');
    WinPrint.document.write('th, td { border: 1px solid black; padding: 10px; }');
    WinPrint.document.write('</style></head><body>');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.write('</body></html>');
    
    WinPrint.document.close();
    WinPrint.focus();
    
    setTimeout(function() {
        WinPrint.print();
        WinPrint.close();
    }, 700);
}
</script>
@endsection