<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - TastyBytes Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* 1. Global Reset & Body */
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #121212; /* Black Background */
            display: flex;
            min-height: 100vh;
            color: #f5f6fa;
        }

        /* 2. Side Navigation Bar */
        .sidebar {
            width: 260px;
            background-color: #1f1f1f; /* Dark Grey */
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 100;
            border-right: 1px solid #333;
        }

        .brand-logo {
            padding: 25px;
            font-size: 22px;
            font-weight: 700;
            color: #f1c40f; /* Yellow */
            text-decoration: none;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            flex-grow: 1;
        }

        .nav-links li a {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: #dcdde1;
            text-decoration: none;
            font-size: 15px;
            transition: 0.3s;
            border-left: 4px solid transparent;
        }

        .nav-links li a:hover {
            background-color: rgba(241, 196, 15, 0.1);
            color: #f1c40f;
            border-left-color: #f1c40f;
        }

        .logout-section { padding: 20px; border-top: 1px solid rgba(255,255,255,0.1); }
        .btn-logout {
            width: 100%;
            padding: 12px;
            background-color: #f1c40f;
            color: #2f3640;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-logout:hover { background-color: #f39c12; }

        /* 3. Main Content Area */
        .main-content {
            margin-left: 260px;
            padding: 40px;
            width: 100%;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .page-header h2 { margin: 0; color: #f1c40f; }

        /* 4. Table Styling */
        .table-card {
            background: #1f1f1f;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border-top: 5px solid #f1c40f;
            overflow-x: auto;
            border: 1px solid #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead {
            background-color: #2f3542;
            color: #f1c40f;
        }

        th {
            text-align: left;
            padding: 15px;
            font-weight: 500;
            white-space: nowrap;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #333;
            vertical-align: middle;
            color: #dcdde1;
        }

        tr:hover { background-color: #2f3542; }

        /* Image Styling */
        .food-img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid #333;
        }

        /* Status Badges */
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-processing { background-color: #333; color: #f1c40f; border: 1px solid #f1c40f; }
        .status-delivered { background-color: #27ae60; color: white; }

        /* Action Button */
        .btn-action {
            display: inline-block;
            background-color: #f1c40f;
            color: #2f3640;
            padding: 8px 15px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
            transition: 0.3s;
            cursor: pointer;
        }
        .btn-action:hover { background-color: #f39c12; }

        /* Address Tooltip */
        .address-cell {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: help;
        }

        /* Payment Badge Styling */
        .payment-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }
        .payment-cash { 
            background-color: #2f3542; 
            color: #f1c40f; 
            border: 1px solid #f1c40f; 
        }
        .payment-paid { 
            background-color: #27ae60; 
            color: white; 
        }

        /* Better table responsiveness */
        @media (max-width: 1400px) {
            table {
                font-size: 12px;
            }
            th, td {
                padding: 10px 8px;
            }
            .food-img {
                width: 40px;
                height: 40px;
            }
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            /* Card-based layout for mobile */
            .table-card {
                padding: 15px;
            }
            
            table {
                display: none;
            }
            
            .mobile-order-list {
                display: block;
            }
            
            .mobile-order-card {
                background: #2f3542;
                border-radius: 10px;
                padding: 15px;
                margin-bottom: 15px;
                border: 1px solid #333;
            }
            
            .mobile-order-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 10px;
                padding-bottom: 10px;
                border-bottom: 1px solid #444;
            }
            
            .mobile-order-id {
                font-weight: 600;
                color: #f1c40f;
            }
            
            .mobile-order-body {
                display: grid;
                gap: 8px;
            }
            
            .mobile-order-row {
                display: flex;
                justify-content: space-between;
                font-size: 13px;
            }
            
            .mobile-order-label {
                color: #888;
                font-weight: 500;
            }
            
            .mobile-order-value {
                color: #dcdde1;
                text-align: right;
            }
            
            .mobile-order-actions {
                margin-top: 10px;
                padding-top: 10px;
                border-top: 1px solid #444;
            }
        }
        
        @media (min-width: 993px) {
            .mobile-order-list {
                display: none;
            }
        }
    </style>
</head>
<body>

    <nav class="sidebar">
        <a href="{{ url('/redirect') }}" class="brand-logo">🍔 TastyBytes</a>
        
        <ul class="nav-links">
            <li><a href="{{ url('/redirect') }}">📊 Dashboard</a></li>
            <li><a href="{{ url('/orders') }}">🧾 Orders</a></li>
            <li><a href="{{ url('/view_food') }}">🍔 Food Menu</a></li>
            <li><a href="{{ url('/add_food') }}">➕ Add Food</a></li>
            <li><a href="{{ url('/view_category') }}">🏷️ Categories</a></li>
        </ul>

        <div class="logout-section">
            <form method="POST" action="{{ url('/logout') }}">
                @csrf
                <button class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="main-content">
        
        <div class="page-header">
            <h2>Customer Orders</h2>
        </div>

        <div class="table-card">
            <table id="ordersTable">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>Food Item</th>
                        <th>Price/Qty</th>
                        <th>Total</th>
                        <th>Image</th>
                        <th>Payment</th>
                        <th>Status</th> <th>Assign Delivery</th> </tr>
                </thead>
                <tbody>
                    @foreach($data as $order)
                    <tr>
                        <td>
                            <div style="font-weight: 600; color: #2f3542;">{{ $order->name }}</div>
                            <div style="font-size: 12px; color: #888;">{{ $order->phone }}</div>
                        </td>
                        <td>
                            <div class="address-cell" title="{{ $order->address }}">
                                {{ $order->address }}
                            </div>
                        </td>
                        <td style="font-weight: 500;">{{ $order->foodname }}</td>
                        <td>${{ $order->price }} × {{ $order->quantity }}</td>
                        <td style="font-weight: bold; color: #ff4757;">${{ $order->price * $order->quantity }}</td>
                        <td>
                            @if($order->image)
                                <img src="{{ asset('foodimage/' . $order->image) }}" class="food-img" alt="{{ $order->foodname }}">
                            @else
                                <span style="color:#ccc; font-size:12px;">No Img</span>
                            @endif
                        </td>
                        <td>
                            @if($order->payment_status == 'Paid')
                                <span class="payment-badge payment-paid">{{ $order->payment_status }}</span>
                            @else
                                <span class="payment-badge payment-cash">{{ $order->payment_status }}</span>
                            @endif
                        </td>
                        
                        <td>
                            @if($order->delivery_status == 'processing')
                                <span class="status-badge status-processing">Processing</span>
                            @else
                                <span class="status-badge status-delivered">{{ ucfirst($order->delivery_status) }}</span>
                            @endif
                        </td>

                        <td>
                            @if($order->delivery_status == 'processing')
                                <form action="{{ url('/assign_order') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    
                                    <div style="display: flex; gap: 5px;">
                                        <select name="delivery_boy_id" required style="padding: 6px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;">
                                            <option value="" disabled selected>Select Boy</option>
                                            @foreach($delivery_boys as $boy)
                                                <option value="{{ $boy->id }}">{{ $boy->name }}</option>
                                            @endforeach
                                        </select>
                                        
                                        <button type="submit" class="btn-action" style="background-color: green;">Assign</button>
                                    </div>
                                </form>
                            @else
                                <span style="font-size: 12px; color: #2ed573; font-weight: 600;">
                                    ✓ Assigned
                                </span>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Mobile Order Cards -->
            <div class="mobile-order-list">
                @foreach($data as $order)
                <div class="mobile-order-card">
                    <div class="mobile-order-header">
                        <span class="mobile-order-id">Order #{{ $order->id }}</span>
                        @if($order->delivery_status == 'processing')
                            <span class="status-badge status-processing">Processing</span>
                        @else
                            <span class="status-badge status-delivered">{{ ucfirst($order->delivery_status) }}</span>
                        @endif
                    </div>
                    
                    <div class="mobile-order-body">
                        <div class="mobile-order-row">
                            <span class="mobile-order-label">Customer:</span>
                            <span class="mobile-order-value">{{ $order->name }}</span>
                        </div>
                        <div class="mobile-order-row">
                            <span class="mobile-order-label">Phone:</span>
                            <span class="mobile-order-value">{{ $order->phone }}</span>
                        </div>
                        <div class="mobile-order-row">
                            <span class="mobile-order-label">Food:</span>
                            <span class="mobile-order-value">{{ $order->foodname }}</span>
                        </div>
                        <div class="mobile-order-row">
                            <span class="mobile-order-label">Price:</span>
                            <span class="mobile-order-value">${{ $order->price }} × {{ $order->quantity }}</span>
                        </div>
                        <div class="mobile-order-row">
                            <span class="mobile-order-label">Total:</span>
                            <span class="mobile-order-value" style="color: #f1c40f; font-weight: 600;">${{ $order->price * $order->quantity }}</span>
                        </div>
                        <div class="mobile-order-row">
                            <span class="mobile-order-label">Payment:</span>
                            @if($order->payment_status == 'Paid')
                                <span class="payment-badge payment-paid">{{ $order->payment_status }}</span>
                            @else
                                <span class="payment-badge payment-cash">{{ $order->payment_status }}</span>
                            @endif
                        </div>
                        <div class="mobile-order-row">
                            <span class="mobile-order-label">Address:</span>
                            <span class="mobile-order-value" style="font-size: 12px;">{{ Str::limit($order->address, 30) }}</span>
                        </div>
                    </div>
                    
                    @if($order->delivery_status == 'processing')
                    <div class="mobile-order-actions">
                        <form action="{{ url('/assign_order') }}" method="POST">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            
                            <select name="delivery_boy_id" required style="width: 100%; padding: 10px; border: 1px solid #444; border-radius: 5px; font-size: 14px; background: #1f1f1f; color: #dcdde1; margin-bottom: 10px;">
                                <option value="" disabled selected>Select Delivery Boy</option>
                                @foreach($delivery_boys as $boy)
                                    <option value="{{ $boy->id }}">{{ $boy->name }}</option>
                                @endforeach
                            </select>
                            
                            <button type="submit" class="btn-action" style="width: 100%;">Assign Order</button>
                        </form>
                    </div>
                    @else
                    <div class="mobile-order-actions">
                        <span style="font-size: 13px; color: #2ed573; font-weight: 600;">✓ Order Assigned</span>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>

</body>
</html>