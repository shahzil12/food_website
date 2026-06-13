<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - TastyBytes Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        /* 1. Global Reset & Body */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #121212; /* Black Background */
            color: #f5f6fa;
        }

        /* 2. Navigation */
        .navbar {
            background-color: #1f1f1f;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-bottom: 1px solid #333;
        }
        .navbar a {
            color: #f1c40f;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }
        .navbar a:hover { color: white; }

        /* 3. Layout */
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .row {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        /* 4. Cards */
        .admin-card {
            background: #1f1f1f;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border-top: 5px solid #f1c40f;
            border: 1px solid #333;
        }

        .col-add { flex: 1; min-width: 300px; }
        .col-list { flex: 2; min-width: 300px; }

        h4 {
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 20px;
            color: #f1c40f;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        /* 5. Forms */
        .form-group { margin-bottom: 20px; }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
            color: #dcdde1;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #333;
            border-radius: 8px;
            box-sizing: border-box;
            font-family: inherit;
            background-color: #121212;
            color: #f5f6fa;
        }
        input:focus { outline: none; border-color: #f1c40f; }
        
        input[type="file"] {
            border: 2px solid #333;
            width: 100%;
            padding: 8px;
            border-radius: 8px;
            box-sizing: border-box;
            background-color: #121212;
            color: #dcdde1;
        }

        .btn-submit {
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
        .btn-submit:hover { background-color: #f39c12; }

        /* 6. Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            text-align: left;
            padding: 15px;
            background-color: #2f3542;
            color: #f1c40f;
            font-size: 14px;
            border-bottom: 2px solid #333;
        }
        td {
            padding: 15px;
            border-bottom: 1px solid #333;
            vertical-align: middle;
            color: #dcdde1;
        }
        tr:hover { background-color: #2f3542; }

        .cat-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #333;
        }

        /* Updated Delete Button for Form */
        .btn-delete {
            color: #ff6b81;
            background: transparent;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            padding: 5px 10px;
            border: 1px solid #ff6b81;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            font-family: inherit;
        }
        .btn-delete:hover {
            background-color: #ff6b81;
            color: white;
        }

        /* 7. Alerts */
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

    <nav class="navbar">
        <div>
            <a href="{{ url('/redirect') }}"> &larr; Back to Dashboard</a>
        </div>
    </nav>

    <div class="container">
        
        @if(session('success'))
            <div class="alert-success" role="alert">
                <span>{{ session('success') }}</span>
                <button type="button" onclick="this.parentElement.style.display='none'" style="background:none;border:none;cursor:pointer;">&times;</button>
            </div>
        @endif

        <div class="row">
            
            <div class="col-add">
                <div class="admin-card">
                    <h4>Add Category</h4>
                    <form action="{{ url('/add_category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="name" placeholder="e.g. Burgers" required>
                        </div>
                        <div class="form-group">
                            <label>Category Image</label>
                            <input type="file" name="image" accept="image/*">
                        </div>
                        <button type="submit" class="btn-submit">Add Category</button>
                    </form>
                </div>
            </div>

            <div class="col-list">
                <div class="admin-card">
                    <h4>All Categories</h4>
                    <div style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th style="text-align: right;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $category)
                                <tr>
                                    <td>
                                        @if($category->image)
                                            <img src="{{ asset('categoryimage/' . $category->image) }}" class="cat-img" alt="{{ $category->name }}">
                                        @else
                                            <span style="color:#ccc;">No Img</span>
                                        @endif
                                    </td>
                                    <td style="font-weight: 500;">{{ $category->name }}</td>
                                    <td style="text-align: right;">
                                        
                                        <form action="{{ url('/delete_category') }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                            
                                            <button type="submit" class="btn-delete" onclick="return confirm('Delete category?')">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>