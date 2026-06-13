<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        /* --- 1. BASIC RESET --- */
        * { box-sizing: border-box; }
        body {
            margin: 0; padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            display: flex;
            min-height: 100vh;
        }

        /* --- 2. SIDEBAR STYLING --- */
        .sidebar {
            width: 250px; background-color: #2f3542; color: white;
            display: flex; flex-direction: column; position: fixed;
            height: 100%; top: 0; left: 0;
        }

        .brand {
            font-size: 20px; font-weight: bold; text-align: center; padding: 25px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1); background-color: #ff4757;
        }

        .menu { list-style: none; padding: 0; margin-top: 20px; flex-grow: 1; }
        .menu li a {
            display: block; padding: 15px 25px; color: #dfe6e9; text-decoration: none;
            transition: 0.3s; border-left: 4px solid transparent; cursor: pointer; /* Pointer add kiya */
        }
        .menu li a:hover { background-color: rgba(255, 71, 87, 0.1); color: #ff4757; border-left-color: #ff4757; }

        .logout-box { padding: 20px; border-top: 1px solid rgba(255,255,255,0.1); }
        .btn-logout { width: 100%; padding: 12px; background-color: #ff4757; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; }

        /* --- 3. MAIN CONTENT AREA --- */
        .main-content { margin-left: 250px; padding: 30px; width: 100%; }

        /* --- 4. TABS & CARDS --- */
        .tabs { margin-bottom: 20px; display: flex; gap: 10px; }
        .tab-btn { padding: 10px 20px; border: none; background-color: white; font-weight: bold; cursor: pointer; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .tab-btn.active { background-color: #2f3542; color: white; }

        .earn-card {
            background: linear-gradient(135deg, #2ed573 0%, #7bed9f 100%);
            color: white; padding: 20px; border-radius: 10px; margin-bottom: 25px;
            display: flex; justify-content: space-between; align-items: center;
            box-shadow: 0 5px 15px rgba(46, 213, 115, 0.3);
        }

        .card { background: white; padding: 20px; margin-top: 15px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-left: 5px solid #ff4757; }
        .history-card { border-left: 5px solid #2ed573; background-color: #fff; }
        
        /* Profile Card Specific */
        .profile-card { border-left: 5px solid #2f3542; }
        .profile-row { display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid #eee; }
        .profile-row:last-child { border-bottom: none; }
        .label { color: #777; font-weight: 500; }
        .value { color: #333; font-weight: bold; }

        .btn-action { width: 100%; padding: 10px; margin-top: 10px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .btn-call { background-color: #f1f2f6; color: #333; text-decoration: none; display: block; text-align: center; }
        .btn-done { background-color: #2ed573; color: white; }

        .hidden { display: none; }
        .alert-success { background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px; }

        @media (max-width: 768px) {
            body { flex-direction: column; }
            .sidebar { width: 100%; height: auto; position: relative; }
            .main-content { margin-left: 0; }
            .menu { display: flex; overflow-x: auto; margin: 0; }
            .menu li a { padding: 10px; font-size: 12px; }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="brand">🚴 TastyDelivery</div>
        
        <ul class="menu">
            <li><a onclick="showTab('current')">📦 Current Tasks</a></li>
            <li><a onclick="showTab('history')">📜 Order History</a></li>
            <li><a onclick="showTab('profile')">👤 My Profile</a></li>
        </ul>

        <div class="logout-box">
            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button class="btn-logout">Logout</button>
            </form>
        </div>
    </div>

    <div class="main-content">
        
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div id="current-tab">
            <div class="earn-card">
                <div><small>Total Earnings</small><h1 style="margin:0;">${{ $total_earnings }}</h1></div>
                <div style="font-size: 40px;">💰</div>
            </div>

            <div class="tabs">
                <button class="tab-btn active" onclick="showTab('current')">Active Orders</button>
                <button class="tab-btn" onclick="showTab('history')">Completed</button>
            </div>

            <h3>Pending Deliveries</h3>
            @foreach($orders as $order)
                @if($order->delivery_status != 'Delivered')
                <div class="card">
                    <h3>{{ $order->name }}</h3>
                    <p>📍 {{ $order->address }}</p>
                    <p>🍔 {{ $order->foodname }} (x{{ $order->quantity }})</p>
                    <p style="color:red;">Collect Cash: ${{ $order->price * $order->quantity }}</p>
                    <a href="tel:{{ $order->phone }}" class="btn-action btn-call">📞 Call Customer</a>
                    <form action="{{ url('/complete_delivery') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <button class="btn-action btn-done" onclick="return confirm('Order Delivered?')">✅ Mark Delivered</button>
                    </form>
                </div>
                @endif
            @endforeach
        </div>

        <div id="history-tab" class="hidden">
            <div class="earn-card">
                <div><small>Total Earnings</small><h1 style="margin:0;">${{ $total_earnings }}</h1></div>
                <div style="font-size: 40px;">💰</div>
            </div>
            
            <div class="tabs">
                <button class="tab-btn" onclick="showTab('current')">Active Orders</button>
                <button class="tab-btn active" onclick="showTab('history')">Completed</button>
            </div>

            <h3>Delivery History</h3>
            @foreach($orders as $order)
                @if($order->delivery_status == 'Delivered')
                <div class="card history-card">
                    <h3>{{ $order->name }} (Done)</h3>
                    <p>📍 {{ $order->address }}</p>
                    <p>💰 Cash Collected: ${{ $order->price * $order->quantity }}</p>
                    <p style="color:green; font-weight:bold;">+ ${{ $order->delivery_fee }} Fee Earned</p>
                    <small>Time: {{ $order->updated_at->diffForHumans() }}</small>
                </div>
                @endif
            @endforeach
        </div>

        <div id="profile-tab" class="hidden">
            <h2 style="border-bottom: 2px solid #ddd; padding-bottom: 10px;">My Profile</h2>
            
            <div class="card profile-card">
                <div style="text-align: center; margin-bottom: 20px;">
                    <div style="font-size: 50px;">👤</div>
                    <h3>{{ Auth::user()->name }}</h3>
                    <span style="background: #2f3542; color: white; padding: 4px 10px; border-radius: 15px; font-size: 12px;">Delivery Partner</span>
                </div>

                <div class="profile-row">
                    <span class="label">Email ID</span>
                    <span class="value">{{ Auth::user()->email }}</span>
                </div>
                <div class="profile-row">
                    <span class="label">User ID</span>
                    <span class="value">#{{ Auth::user()->id }}</span>
                </div>
                <div class="profile-row">
                    <span class="label">Total Earned</span>
                    <span class="value" style="color: green;">${{ $total_earnings }}</span>
                </div>
                <div class="profile-row">
                    <span class="label">Account Status</span>
                    <span class="value" style="color: #2ed573;">Active ✅</span>
                </div>
                
                <br>
                <button style="width:100%; padding:10px; border:1px solid #ddd; background:white; border-radius:5px; cursor:pointer;">
                    Edit Profile (Coming Soon)
                </button>
            </div>
        </div>

    </div>

    <script>
        function showTab(tabName) {
            // 1. Sab tabs ko chupa do
            document.getElementById('current-tab').classList.add('hidden');
            document.getElementById('history-tab').classList.add('hidden');
            document.getElementById('profile-tab').classList.add('hidden');
            
            // 2. Jo click kiya usse dikha do
            document.getElementById(tabName + '-tab').classList.remove('hidden');
        }
    </script>

</body>
</html>