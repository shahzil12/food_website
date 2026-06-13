<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Admin - User Messages</title>

    <!-- Shared Admin Styles (Assuming from existing admin files) -->
    <!-- You might want to extend a layout here, but keeping it standalone for now as per other admin files -->
    <style>
        body { font-family: sans-serif; background-color: #121212; margin: 0; color: #f5f6fa; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        
        .header { background: #1f1f1f; color: #f1c40f; padding: 20px; margin-bottom: 30px; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; border: 1px solid #333; }
        .header h1 { margin: 0; font-size: 24px; }
        .btn-back { color: #f5f6fa; text-decoration: none; border: 1px solid #f1c40f; padding: 8px 15px; border-radius: 5px; transition: 0.3s; }
        .btn-back:hover { background: #f1c40f; color: #2f3640; }

        .messages-table { width: 100%; border-collapse: collapse; background: #1f1f1f; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-radius: 8px; overflow: hidden; border: 1px solid #333; }
        .messages-table th, .messages-table td { padding: 15px; text-align: left; border-bottom: 1px solid #333; }
        .messages-table th { background-color: #f1c40f; color: #2f3640; font-weight: 600; }
        .messages-table tr:hover { background-color: #2f3542; }
        
        .no-msg { text-align: center; padding: 40px; color: #747d8c; }
        .date { font-size: 12px; color: #dcdde1; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>User Complaints & Suggestions</h1>
        <!-- Ideally link back to dashboard main -->
        <a href="{{ url('/redirect') }}" class="btn-back">Back to Dashboard</a> 
    </div>

    <table class="messages-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th style="width: 50%;">Message</th>
            </tr>
        </thead>
        <tbody>
            @if($data->count() > 0)
                @foreach($data as $msg)
                <tr>
                    <td class="date">{{ $msg->created_at->format('d M Y, h:i A') }}</td>
                    <td>{{ $msg->name }}</td>
                    <td>{{ $msg->email }}</td>
                    <td>{{ $msg->message }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="no-msg">No messages found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

</body>
</html>
