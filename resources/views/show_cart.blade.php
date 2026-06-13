<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart - TastyBytes</title>
    <base href="/public">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* 1. Global Reset */
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #121212; /* Black */
            padding-top: 90px;
            color: #f5f6fa; /* Light Text */
        }

        /* 2. Top Navigation Bar */
        .navbar {
            background-color: #1f1f1f; /* Dark Grey */
            height: 70px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
        }

        .nav-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand-logo {
            font-size: 24px;
            font-weight: 700;
            color: #f1c40f; /* Yellow */
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .nav-controls {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-greeting {
            color: #dcdde1;
            font-size: 14px;
            display: none;
        }
        @media(min-width: 768px) { .user-greeting { display: block; } }

        .btn-menu {
            color: #f5f6fa;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: 0.3s;
            border: 1px solid #f1c40f;
            padding: 6px 15px;
            border-radius: 20px;
        }
        .btn-menu:hover { border-color: #f1c40f; background: #f1c40f; color: #2f3640; }

        .btn-logout {
            background-color: transparent;
            border: none;
            color: #a4b0be;
            cursor: pointer;
            font-size: 13px;
            font-family: inherit;
            transition: 0.3s;
            text-decoration: underline;
        }
        .btn-logout:hover { color: #f1c40f; }


        /* 3. Page Layout */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .page-header h1 { margin: 0; color: #f1c40f; font-size: 32px; }
        .page-header p { margin-top: 5px; color: #dcdde1; }

        /* 4. Cart Grid */
        .cart-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }
        @media(min-width: 992px) {
            .cart-grid { grid-template-columns: 2fr 1fr; }
        }

        /* 5. Cart Items Styling */
        .cart-list {
            background: #1f1f1f;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border-top: 4px solid #f1c40f;
            border: 1px solid #333;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #333;
        }
        .cart-item:last-child { border-bottom: none; }

        .item-info {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-grow: 1;
        }

        .item-img {
            width: 70px;
            height: 70px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid #333;
        }

        .item-details h4 { margin: 0; font-size: 16px; color: #f5f6fa; }
        .item-details .price { color: #f1c40f; font-weight: 600; font-size: 14px; }

        .badge-qty {
            background-color: #121212;
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            color: #dcdde1;
            border: 1px solid #333;
        }

        .btn-remove {
            color: #ff6b81; /* Keep red for destructive action, but lighter */
            background: transparent;
            text-decoration: none;
            font-size: 13px;
            border: 1px solid #ff6b81;
            padding: 5px 10px;
            border-radius: 5px;
            transition: 0.3s;
            cursor: pointer;
            font-family: inherit;
        }
        .btn-remove:hover { background-color: #ff6b81; color: white; }

        /* Total Section */
        .total-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px dashed #333;
            font-size: 20px;
            font-weight: 700;
        }
        .total-price { color: #f1c40f; }

        /* 6. Checkout Form Styling */
        .checkout-card {
            background: #1f1f1f;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            height: fit-content;
            border: 1px solid #333;
        }

        .checkout-card h2 { margin-top: 0; font-size: 20px; border-bottom: 2px solid #333; padding-bottom: 15px; margin-bottom: 20px; color: #f5f6fa; }

        .form-group { margin-bottom: 15px; }
        
        label { display: block; margin-bottom: 5px; font-weight: 500; font-size: 13px; color: #dcdde1; }
        
        .form-control {
            width: 100%;
            padding: 12px;
            border: 2px solid #333;
            background-color: #121212;
            color: #f5f6fa;
            border-radius: 8px;
            font-family: inherit;
        }
        .form-control:focus { outline: none; border-color: #f1c40f; }

        .btn-checkout {
            width: 100%;
            background-color: #f1c40f;
            color: #2f3640;
            border: none;
            padding: 15px;
            font-size: 16px;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }
        .btn-checkout:hover { background-color: #f39c12; transform: translateY(-2px); }

        /* Empty State */
        .empty-cart {
            text-align: center;
            background: #1f1f1f;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            color: #dcdde1;
            border: 1px solid #333;
        }
        .btn-browse {
            display: inline-block;
            margin-top: 20px;
            background-color: #f1c40f;
            color: #2f3640;
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ url('/dashboard') }}" class="brand-logo">🍔 TastyBytes</a>
            
            <div class="nav-controls">
                <span class="user-greeting">Hi, <strong>{{ Auth::user()->name }}</strong></span>
                
                <a href="{{ url('/dashboard') }}" class="btn-menu">
                    &larr; Back to Menu
                </a>

                <form action="{{ url('/logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h1>Your Cart</h1>
            <p>Review your order and proceed to checkout</p>
        </div>

        @if(count($cart) > 0)
            <div class="cart-grid">
                
                <div class="cart-list">
                    <h4>Cart Items</h4>

                    <?php $totalprice = 0; ?>
                    
                    @foreach($cart as $cart_item)
                    <div class="cart-item">
                        <div class="item-info">
                            <img src="{{ asset('foodimage/' . $cart_item->image) }}" class="item-img" alt="{{ $cart_item->title }}">
                            <div class="item-details">
                                <h4>{{ $cart_item->title }}</h4>
                                <div class="price">${{ $cart_item->price }}</div>
                            </div>
                        </div>
                        
                        <div style="text-align: right;">
                            <span class="badge-qty">Qty: {{ $cart_item->quantity }}</span>
                            <br><br>
                            
                            <form action="{{ url('/remove_cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cart_item->id }}">
                                
                                <button type="submit" class="btn-remove" onclick="return confirm('Remove this item?')">
                                    Remove
                                </button>
                            </form>

                        </div>
                    </div>
                    
                    <?php $totalprice = $totalprice + ($cart_item->price * $cart_item->quantity); ?>
                    @endforeach

                    <div class="total-box">
                        <span>Total Amount</span>
                        <span class="total-price">${{ $totalprice }}</span>
                    </div>
                </div>

                <div class="checkout-card">
                    <h2>Delivery Details</h2>
                    
                    <form action="{{ url('confirm_order') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required placeholder="John Doe">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required placeholder="mail@example.com">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="+1 234 567 890" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Delivery Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="House No, Street, City" required>
                        </div>

                        <button type="submit" class="btn-checkout">
                            Place Order (COD)
                        </button>
                    </form>
                </div>
            </div>

        @else
            <div class="empty-cart">
                <h3>Your cart is empty 🍔</h3>
                <p>Add some delicious items to get started!</p>
                <a href="{{ url('/dashboard') }}" class="btn-browse">
                    Browse Menu
                </a>
            </div>
        @endif
    </div>
    <!-- Expanded Footer -->
    <style>
        .footer {
            background-color: #1a1a1a;
            color: #a4b0be;
            padding: 60px 0 20px;
            margin-top: 80px;
            border-top: 1px solid #333;
            font-size: 14px;
        }
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }
        .footer-col h3 {
            color: #f1c40f;
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .footer-col p {
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .footer-brand {
            font-size: 24px;
            font-weight: 700;
            color: #f1c40f;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 15px;
        }
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-links li {
            margin-bottom: 10px;
        }
        .footer-links a {
            color: #dcdde1;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
        }
        .footer-links a:hover {
            color: #f1c40f;
            transform: translateX(5px);
        }
        .social-icons {
            display: flex;
            gap: 15px;
        }
        .social-btn {
            width: 35px;
            height: 35px;
            background: #2f3640;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f1c40f;
            text-decoration: none;
            transition: 0.3s;
        }
        .social-btn:hover {
            background: #f1c40f;
            color: #2f3640;
        }
        .copyright {
            text-align: center;
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #333;
            color: #747d8c;
        }
    </style>
    <footer class="footer">
        <div class="footer-container">
            <!-- Brand Column -->
            <div class="footer-col">
                <a href="{{ url('/') }}" class="footer-brand">🍔 TastyBytes</a>
                <p>Taste the difference with our premium ingredients and lightning-fast delivery. Quality food, right at your doorstep.</p>
                <div class="social-icons">
                    <a href="#" class="social-btn">F</a>
                    <a href="#" class="social-btn">T</a>
                    <a href="#" class="social-btn">I</a>
                </div>
            </div>

            <!-- Links Column -->
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/categories') }}">Browse Menu</a></li>
                    <li><a href="{{ url('/about') }}">Our Story</a></li>
                    <li><a href="{{ url('/contact') }}">Get in Touch</a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div class="footer-col">
                <h3>Contact Us</h3>
                <ul class="footer-links">
                    <li>📍 123 Food Street, Tasty City</li>
                    <li>📞 +1 234 567 890</li>
                    <li>✉️ hello@tastybytes.com</li>
                    <li>🕒 Mon - Sun: 10am - 11pm</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; 2025 TastyBytes. All rights reserved.
        </div>
    </footer>

</body>
</html>