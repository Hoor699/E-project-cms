<!DOCTYPE html>
<html>
<head>
    <title>Branch Report - {{ $agent->name }}</title>
    <style>
        /* 1. Browser ke Headers/Footers ko khatam karne ke liye */
        @page { 
            margin: 0; 
            size: auto; 
        }

        body { 
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 1.5cm; /* Paper ke andar ka margin */
            background-color: white;
            color: black;
        }

        /* 2. Professional Header Styling */
        .header { 
            text-align: center; 
            margin-bottom: 30px; 
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        
        .header h2 { margin: 0; text-transform: uppercase; letter-spacing: 1px; }
        .header p { margin: 5px 0; color: #555; }

        /* 3. Table Styling */
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px;
        }
        
        th, td { 
            border: 1px solid #444; 
            padding: 10px; 
            text-align: center; 
            font-size: 13px;
        }

        th { 
            background-color: #f2f2f2 !important; 
            font-weight: bold;
            -webkit-print-color-adjust: exact; 
        }

        /* 4. Force Print Settings */
        @media print {
            header, footer, .no-print { display: none !important; }
            body { -webkit-print-color-adjust: exact; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Branch Performance Report</h2>
        <p><strong>Agent:</strong> {{ $agent->name }} &nbsp; | &nbsp; <strong>City:</strong> {{ $agent->city }}</p>
        <p><small>Generated on: {{ date('d-M-Y H:i A') }}</small></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Tracking No</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($couriers as $courier)
            <tr>
                <td><strong>{{ $courier->tracking_no }}</strong></td>
                <td>{{ $courier->sender_name }}</td>
                <td>{{ $courier->receiver_name }}</td>
                <td>{{ $courier->price }}</td>
                <td>{{ $courier->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 30px; text-align: right;">
        <p>____________________</p>
        <p>Authorized Signature</p>
    </div>
</body>
</html>