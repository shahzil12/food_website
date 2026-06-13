<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TastyBytes Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* 1. Global Reset */
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #121212; /* Black Background */
            display: flex; /* Creates the Side-by-Side layout */
            min-height: 100vh;
            color: #f5f6fa;
        }

        /* 2. Side Navigation Bar */
        .sidebar {
            width: 260px;
            background-color: #1f1f1f; /* Dark Card Grey */
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed; /* Stays in place when scrolling */
            height: 100%;
            top: 0;
            left: 0;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
            border-right: 1px solid #333;
        }

        .brand-logo {
            padding: 25px;
            font-size: 22px;
            font-weight: 700;
            color: #f1c40f; /* Yellow */
            text-decoration: none;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: block;
            text-align: center;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            flex-grow: 1; /* Pushes logout to bottom */
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

        /* Logout Section in Sidebar */
        .logout-section {
            padding: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        .btn-logout {
            width: 100%;
            padding: 12px;
            background-color: #f1c40f; /* Yellow */
            color: #2f3640;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }
        }
        .btn-logout:hover {
            background-color: #f39c12;
        }

        /* 3. Main Content Area */
        .main-content {
            margin-left: 260px; /* Same width as sidebar */
            padding: 40px;
            width: 100%;
        }

        /* 4. Dashboard Header */
        .header {
            margin-bottom: 40px;
        }
        .header h1 {
            color: #f1c40f;
            margin: 0;
            font-size: 28px;
        }
        .header p {
            color: #dcdde1;
            margin-top: 5px;
        }

        /* 5. Dashboard Grid (The 4 Boxes) */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
        }

        .stat-card {
            background: #1f1f1f;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-decoration: none;
            color: #f5f6fa;
            transition: transform 0.3s, box-shadow 0.3s;
            border-top: 4px solid transparent;
            display: block;
            border: 1px solid #333;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-top-color: #f1c40f;
        }

        .icon-circle {
            width: 50px;
            height: 50px;
            background-color: rgba(241, 196, 15, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
            color: #f1c40f;
        }

        .stat-card h5 {
            margin: 0 0 10px 0;
            font-size: 18px;
            font-weight: 600;
        }

        .stat-card p {
            margin: 0;
            font-size: 13px;
            color: #dcdde1;
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
            <li><a href="{{ url('/view_messages') }}">📩 Messages</a></li>
        </ul>

        <div class="logout-section">
            <form method="POST" action="{{ url('/logout') }}">
                @csrf
                <button class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="main-content">
        
        <div class="header">
            <h1>Admin Dashboard</h1>
            <p>Welcome back! Manage your food, orders, and categories from one place.</p>
        </div>

        <div class="dashboard-grid">
            
            <a href="{{ url('/orders') }}" class="stat-card">
                <div class="icon-circle">🧾</div>
                <h5>Orders</h5>
                <p>View and manage customer orders</p>
            </a>

            <a href="{{ url('/add_food') }}" class="stat-card">
                <div class="icon-circle">➕</div>
                <h5>Add Food</h5>
                <p>Create new delicious menu items</p>
            </a>

            <a href="{{ url('/view_food') }}" class="stat-card">
                <div class="icon-circle">🍔</div>
                <h5>Food Menu</h5>
                <p>Edit or delete existing items</p>
            </a>

            <a href="{{ url('/view_category') }}" class="stat-card">
                <div class="icon-circle">🏷️</div>
                <h5>Categories</h5>
                <p>Organize your menu structure</p>
            </a>

        </div>
    </div>

</body>
</html>