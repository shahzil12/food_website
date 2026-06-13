<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - TastyBytes</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Shared Styles */
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            padding-top: 80px; 
            color: #f5f6fa;
        }

        /* Navbar */
        .navbar {
            background-color: #1f1f1f;
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
            color: #f1c40f; 
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .nav-links {
            display: none;
            gap: 25px;
            margin-right: 30px;
        }
        .nav-links a {
            color: #dcdde1;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: 0.3s;
        }
        .nav-links a:hover { color: #f1c40f; }
        @media(min-width: 992px) { .nav-links { display: flex; } }

        .nav-controls {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .btn-nav {
            background-color: #f1c40f;
            color: #2f3640;
            text-decoration: none;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 5px;
            border: 1px solid #f1c40f;
        }
        .btn-nav:hover { background-color: #f39c12; transform: translateY(-2px); }
        .btn-outline {
            background-color: transparent;
            border: 1px solid #f1c40f;
            color: #f5f6fa;
        }
        .btn-outline:hover { background-color: #f1c40f; color: #2f3640; }

        /* Contact Page Specifics */
        .contact-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 40px;
        }
        @media(min-width: 768px) {
            .contact-container { grid-template-columns: 1fr 1fr; }
        }

        .contact-info {
            background: #1f1f1f;
            color: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border: 1px solid #333;
        }
        .contact-info h1 { margin-top: 0; font-size: 2.5rem; color: #f1c40f; }
        .contact-info p { opacity: 0.9; margin-bottom: 30px; color: #dcdde1; }
        
        .info-item { margin-bottom: 25px; display: flex; align-items: center; gap: 15px; font-size: 1.1rem; color: #f5f6fa; }
        .info-icon { font-size: 20px; color: #f1c40f; }

        .contact-form-card {
            background: #1f1f1f;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid #333;
        }
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; margin-bottom: 8px; font-weight: 500; color: #dcdde1; }
        .form-input, .form-textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #333;
            background-color: #121212;
            color: #f5f6fa;
            border-radius: 10px;
            font-family: inherit;
            transition: 0.3s;
        }
        .form-input:focus, .form-textarea:focus { border-color: #f1c40f; outline: none; }
        .form-textarea { height: 150px; resize: none; }

        .btn-submit {
            background-color: #f1c40f;
            color: #2f3640;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
        }
        .btn-submit:hover { background-color: #f39c12; transform: translateY(-3px); }

    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="brand-logo">🍔 TastyBytes</a>
            

            <div style="display: flex; align-items: center;">
                <div class="nav-links">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/categories') }}">Categories</a>
                    <a href="{{ url('/about') }}">About Us</a>
                    <a href="{{ url('/contact') }}">Contact Us</a>
                </div>

                <div class="nav-controls">
                @auth
                    <a href="{{ url('/show_cart') }}" class="btn-nav">🛒 Cart</a>
                @else
                    <a href="{{ route('login') }}" class="btn-nav btn-outline">Log in</a>
                @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="contact-container">
        <div class="contact-info">
            <h1>Get in Touch</h1>
            <p>Have a question or feedback? We'd love to hear from you. Fill out the form or reach us via:</p>
            
            <div class="info-item">
                <span class="info-icon">📍</span>
                <span>123 Food Street, Tasty City</span>
            </div>
            <div class="info-item">
                <span class="info-icon">📞</span>
                <span>+1 234 567 890</span>
            </div>
            <div class="info-item">
                <span class="info-icon">✉️</span>
                <span>support@tastybytes.com</span>
            </div>
        </div>

        <div class="contact-form-card">
            <h2 style="margin-top:0; color:#f5f6fa;">Send Message</h2>

            @if(session('success'))
                <div style="background:#2ecc71; color:#0b3d1d; padding:15px; text-align:center; margin-bottom:20px; border-radius: 8px; font-size: 14px;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/contact-post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-input" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-textarea" placeholder="How can we help?" required></textarea>
                </div>
                <button type="submit" class="btn-submit">Submit</button>
            </form>
        </div>
    </div>

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
