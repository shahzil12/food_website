<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Food - TastyBytes Admin</title>
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

        /* Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .page-header h2 { margin: 0; color: #f1c40f; font-size: 24px; }
        
        .btn-back {
            color: #f1c40f;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid #f1c40f;
            padding: 8px 20px;
            border-radius: 30px;
            transition: 0.3s;
        }
        .btn-back:hover { background-color: #f1c40f; color: #2f3640; }

        /* 4. Form Styling */
        .admin-card {
            background: #1f1f1f;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border-top: 5px solid #f1c40f;
            max-width: 700px;
            margin: 0 auto;
            border: 1px solid #333;
        }

        .form-group { margin-bottom: 25px; }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #dcdde1;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 2px solid #333;
            border-radius: 8px;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 14px;
            background-color: #121212;
            color: #f5f6fa;
        }
        .form-control:focus { outline: none; border-color: #f1c40f; }

        textarea.form-control { height: 120px; resize: vertical; }

        /* Current Image Preview */
        .img-preview {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #333;
            margin-bottom: 10px;
        }

        /* Submit Button */
        .btn-update {
            width: 100%;
            padding: 14px;
            background-color: #f1c40f;
            color: #2f3640;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }
        .btn-update:hover { background-color: #f39c12; }

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
            <h2>Edit Food Item</h2>
            <a href="{{ url('/view_food') }}" class="btn-back">&larr; Back to Menu</a>
        </div>

        <div class="admin-card">
            
            <form action="{{ url('/update_food') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <input type="hidden" name="id" value="{{ $data->id }}">
                
                <div class="form-group">
                    <label>Current Image</label>
                    <img src="{{ asset('foodimage/' . $data->image) }}" class="img-preview" alt="Current Food Image">
                </div>

                <div class="form-group">
                    <label for="title">Food Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $data->price }}" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="description" id="desc" class="form-control" required>{{ $data->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Change Image (Optional)</label>
                    <input type="file" name="image" class="form-control" accept="image/*" style="padding: 9px;">
                </div>

                <div>
                    <button type="submit" class="btn-update">Update Item</button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>