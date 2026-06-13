<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Items - TastyBytes Admin</title>
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

        /* Header Section */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .page-header h2 { margin: 0; color: #f1c40f; font-size: 24px; }

        .btn-add {
            background-color: #f1c40f;
            color: #2f3640;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 4px 10px rgba(241, 196, 15, 0.3);
            transition: 0.3s;
        }
        .btn-add:hover { background-color: #f39c12; transform: translateY(-2px); }

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
            font-weight: 600;
            border-bottom: 2px solid #333;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #333;
            vertical-align: middle;
            color: #dcdde1;
        }

        tr:hover { background-color: #2f3542; }

        /* Images */
        .food-img {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid #333;
        }

        /* Price */
        .price-tag {
            font-weight: 700;
            color: #f1c40f;
            font-size: 15px;
        }

        /* Action Buttons */
        .action-container {
            display: flex;
            gap: 8px; /* Space between buttons */
        }

        .btn-edit, .btn-delete {
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            font-family: inherit;
            transition: 0.3s;
        }

        .btn-edit {
            background-color: #2f3542;
            color: #f1c40f;
            border: 1px solid #f1c40f;
        }
        .btn-edit:hover { background-color: #f1c40f; color: #2f3542; }

        .btn-delete {
            background-color: #333;
            color: #ff6b81;
            border: 1px solid #ff6b81;
        }
        .btn-delete:hover { background-color: #ff6b81; color: white; }

        /* Alert Styling */
        .alert-success {
            background-color: #2ecc71;
            color: #0b3d1d;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            border: 1px solid #27ae60;
            display: flex;
            justify-content: space-between;
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
            <h2>All Food Items</h2>
            <a href="{{ url('/add_food') }}" class="btn-add">➕ Add New Item</a>
        </div>

        @if(session('success'))
            <div class="alert-success" role="alert">
                <span>{{ session('success') }}</span>
                <button type="button" onclick="this.parentElement.style.display='none'" style="background:none;border:none;cursor:pointer;color:#155724;">&times;</button>
            </div>
        @endif

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $food)
                    <tr>
                        <td>
                            <img src="{{ asset('foodimage/' . $food->image) }}" class="food-img" alt="{{ $food->title }}">
                        </td>
                        <td style="font-weight: 600; color: #2f3542;">{{ $food->title }}</td>
                        <td style="color: #888; font-size: 13px; max-width: 250px;">
                            {{ Str::limit($food->description, 50) }}
                        </td>
                        <td class="price-tag">${{ $food->price }}</td>
                        <td>
                            <div class="action-container">
                                
                                <form action="{{ url('/edit_food') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $food->id }}">
                                    <button type="submit" class="btn-edit">Edit</button>
                                </form>

                                <form action="{{ url('/delete_food') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $food->id }}">
                                    <button type="submit" class="btn-delete" onclick="return confirm('Delete this item?')">Delete</button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>