<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food - TastyBytes Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        /* 1. Global Reset & Body */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #121212; /* Black Admin Background */
            color: #f5f6fa;
        }

        /* 2. Navigation Bar */
        .navbar {
            background-color: #1f1f1f; /* Dark Grey */
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-bottom: 1px solid #333;
        }
        .navbar a {
            color: #f1c40f; /* Brand Yellow */
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }
        .navbar a:hover {
            color: white;
        }

        /* 3. Main Container */
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* 4. Admin Card Style */
        .admin-card {
            background: #1f1f1f;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border-top: 5px solid #f1c40f; /* Yellow Top Border */
            border: 1px solid #333;
        }

        h3 {
            text-align: center;
            color: #f1c40f;
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 24px;
        }

        /* 5. Form Elements */
        .form-group {
            margin-bottom: 20px;
        }

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
            box-sizing: border-box; /* Fixes padding issues */
            font-family: inherit;
            font-size: 14px;
            background-color: #121212;
            color: #f5f6fa;
        }

        .form-control:focus {
            outline: none;
            border-color: #f1c40f;
        }

        textarea.form-control {
            height: 100px;
            resize: vertical;
        }

        /* 6. Upload Button */
        .btn-upload {
            width: 100%;
            padding: 14px;
            background-color: #f1c40f;
            color: #2f3640;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn-upload:hover {
            background-color: #f39c12;
        }

        /* 7. Alerts */
        .alert-success {
            background-color: #2ecc71;
            color: #0b3d1d;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #27ae60;
            display: flex;
            justify-content: space-between;
        }
        .close-btn {
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
            color: #0b3d1d;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div>
            <a href="{{ url('/redirect') }}"> &larr; Back to Dashboard</a>
        </div>
    </nav>

    <div class="container">
        
        @if(session('success'))
            <div class="alert-success" role="alert">
                <span>{{ session('success') }}</span>
                <button type="button" class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
            </div>
        @endif

        <div class="admin-card">
            <h3>Add New Menu Item</h3>
            
            <form action="{{ url('/upload_food') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                
                <div class="form-group">
                    <label for="title">Food Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="e.g. Cheese Burger" required>
                </div>

                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="e.g. 12.99" step="0.01" required>
                </div>
                
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="" selected disabled>Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Food Image</label>
                    <input type="file" name="image" class="form-control" required accept="image/*" style="padding: 9px;">
                </div>

                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="description" id="desc" class="form-control" placeholder="Write a delicious description..." required></textarea>
                </div>

                <div>
                    <button type="submit" class="btn-upload">Upload Food</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>