# 🎨 TastyBytes Food Delivery - Design System Documentation

## "Savory Theme" - Complete UI/UX Guidelines

---

## 📐 Design Philosophy

A modern, clean, and appetizing design system for a food delivery platform. The design emphasizes:
- **Clarity**: Easy to scan and understand
- **Consistency**: Unified visual language across all pages
- **Responsiveness**: Mobile-first, works on all devices
- **Accessibility**: High contrast, readable fonts

---

## 🎨 Color Palette

### Primary Colors
```css
--primary-red: #ff4757        /* Main brand color - buttons, CTAs, highlights */
--primary-red-hover: #ff6b81  /* Hover states */
--success-green: #2ed573      /* Success messages, prices, positive actions */
--dark-slate: #2f3542         /* Navbar, headers, dark text */
```

### Background Colors
```css
--body-bg: #f4f6f9           /* Main page background (NEVER pure white) */
--card-bg: #ffffff           /* Card/container backgrounds */
```

### Text Colors
```css
--text-dark: #2f3542         /* Primary text */
--text-muted: #747d8c        /* Secondary text, descriptions */
```

---

## 🔤 Typography

### Font Family
```css
font-family: 'Poppins', sans-serif;
```

### Font Weights
- **300**: Light (subtle text)
- **400**: Regular (body text)
- **500**: Medium (labels)
- **600**: Semi-bold (subheadings)
- **700**: Bold (headings, buttons)

### Font Sizes
- **Hero Title**: 2.8rem (mobile: 2rem)
- **Page Title**: 2.5rem (mobile: 1.8rem)
- **Section Heading**: 2rem (mobile: 1.5rem)
- **Card Title**: 1.3rem
- **Body Text**: 0.9-1rem
- **Small Text**: 0.75-0.85rem

---

## 🧩 UI Components

### Buttons

#### Primary Button (CTA)
```css
background-color: #ff4757;
color: white;
border: none;
padding: 12px 30px;
border-radius: 30px;  /* Pill shape */
font-weight: 700;
transition: all 0.3s ease;
```

**Hover State:**
```css
background-color: #ff6b81;
transform: translateY(-2px);
box-shadow: 0 8px 20px rgba(255, 71, 87, 0.3);
```

#### Success Button (Order/Submit)
```css
background-color: #2ed573;
/* Same styling as primary, different color */
```

#### Outline Button (Secondary)
```css
background-color: transparent;
border: 2px solid rgba(255,255,255,0.3);
color: white;
```

### Cards

```css
background: white;
border: none;
border-radius: 15px;
padding: 20-40px;
box-shadow: 0 5px 15px rgba(0,0,0,0.05);
transition: all 0.3s ease;
```

**Hover State:**
```css
transform: translateY(-8px);
box-shadow: 0 15px 30px rgba(0,0,0,0.1);
```

### Forms

**Use Bootstrap Floating Labels for ALL forms:**
```html
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="name" placeholder="Name">
    <label for="name"><i class="bi bi-person-fill me-2"></i>Full Name</label>
</div>
```

**Focus State:**
```css
border-color: #ff4757;
box-shadow: 0 0 0 3px rgba(255, 71, 87, 0.1);
```

### Tables

```html
<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <!-- Headers -->
        </thead>
        <tbody>
            <!-- Rows -->
        </tbody>
    </table>
</div>
```

### Badges

```css
background-color: #2ed573;  /* or #ff4757 */
color: white;
padding: 5px 12px;
border-radius: 20px;
font-size: 0.75rem;
font-weight: 600;
```

### Icons

**Always use Bootstrap Icons:**
```html
<i class="bi bi-cart-fill me-2"></i>
```

**Icon Sizes:**
- Small: 1rem (inline with text)
- Medium: 2.5-3rem (card icons)
- Large: 3.5-5rem (hero sections)

---

## 📱 Responsive Design

### Breakpoints
```css
/* Mobile First Approach */
@media (max-width: 576px) { /* Extra small */ }
@media (max-width: 768px) { /* Small */ }
@media (max-width: 992px) { /* Medium */ }
@media (max-width: 1200px) { /* Large */ }
```

### Grid System
```html
<!-- 4 columns on large, 3 on medium, 2 on small, 1 on mobile -->
<div class="col-lg-3 col-md-4 col-sm-6">
```

---

## 🏗️ Layout Structure

### Navbar (All Pages)
```html
<nav class="navbar navbar-expand-lg navbar-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="bi bi-[icon] me-2"></i>TastyBytes
        </a>
        <!-- Right side content -->
    </div>
</nav>
```

**Styling:**
```css
background-color: #2f3542;
box-shadow: 0 2px 10px rgba(0,0,0,0.1);
```

### Hero Section (Dashboard Pages)
```css
background: linear-gradient(45deg, #ff4757, #ff6b81);
color: white;
border-radius: 15px;
padding: 40px;
margin-bottom: 30px;
box-shadow: 0 10px 20px rgba(255, 71, 87, 0.3);
```

### Container Spacing
```css
padding: 20-40px;
margin-bottom: 30-40px;
```

---

## 🎭 Animation & Transitions

### Standard Transition
```css
transition: all 0.3s ease;
```

### Hover Lift Effect
```css
transform: translateY(-8px);
box-shadow: 0 15px 30px rgba(0,0,0,0.1);
```

### Button Press Effect
```css
transform: translateY(-2px);
```

---

## 📄 Page Templates

### Admin Dashboard
- Hero card with gradient background
- 4-column grid of action cards (col-lg-3)
- Each card has large icon, title, description
- Hover effects on all cards

### Customer Dashboard
- Navbar with cart and logout
- Hero section with title and subtitle
- Food grid (col-lg-3 col-md-4 col-sm-6)
- Each food card: image, title, description, price, quantity, add button

### Forms (Add/Edit Pages)
- Centered layout (col-lg-8 or col-md-6)
- White card with padding
- Floating labels for all inputs
- Primary button at bottom

### Tables (Orders, Food List)
- Full-width responsive table
- Light header background
- Hover effect on rows
- Action buttons in last column

---

## ✅ Best Practices

### DO:
✅ Use `#f4f6f9` for body background  
✅ Use floating labels for forms  
✅ Add hover effects to interactive elements  
✅ Use Bootstrap Icons consistently  
✅ Maintain 15px border-radius for cards  
✅ Use pill-shaped buttons (30px radius)  
✅ Add box-shadows for depth  
✅ Test on mobile devices  

### DON'T:
❌ Use pure white (#ffffff) for body background  
❌ Mix different button styles  
❌ Forget hover states  
❌ Use inline styles (use classes)  
❌ Ignore mobile responsiveness  
❌ Use default Bootstrap colors without customization  

---

## 🔗 CDN Links (Required)

```html
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<!-- Google Fonts - Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Bootstrap 5 JS Bundle (before closing body tag) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
```

---

## 📦 File Structure

```
resources/views/
├── dashboard.blade.php          (Customer food menu)
├── show_cart.blade.php          (Shopping cart & checkout)
├── admin/
│   ├── dashboard.blade.php      (Admin control panel)
│   ├── add_food.blade.php       (Add new food item)
│   ├── show_food.blade.php      (Food list table)
│   ├── update_food.blade.php    (Edit food item)
│   ├── category.blade.php       (Manage categories)
│   └── orders.blade.php         (Customer orders with DataTables)
└── delivery/
    └── dashboard.blade.php      (Delivery rider panel)
```

---

## 🎯 Component Examples

### Food Card
```html
<div class="food-card">
    <div class="position-relative">
        <span class="badge-popular">Popular</span>
        <img src="..." class="food-img">
    </div>
    <div class="food-body">
        <h3 class="food-title">Title</h3>
        <p class="food-description">Description</p>
        <div class="food-price">$10</div>
        <form>
            <div class="quantity-control">...</div>
            <button class="btn-add-cart">Add to Cart</button>
        </form>
    </div>
</div>
```

### Stat/Action Card (Admin)
```html
<a href="..." class="stat-card">
    <div class="icon-box"><i class="bi bi-receipt"></i></div>
    <h5 class="card-title">Orders</h5>
    <p class="card-text">View and manage customer orders</p>
</a>
```

---

## 🚀 Quick Start Checklist

When creating a new page:

1. ✅ Add all CDN links (Bootstrap, Icons, Fonts)
2. ✅ Set body background to `#f4f6f9`
3. ✅ Add navbar with `#2f3542` background
4. ✅ Use container for content
5. ✅ Add hero section if dashboard page
6. ✅ Use white cards with shadows for content
7. ✅ Apply hover effects to interactive elements
8. ✅ Use floating labels for forms
9. ✅ Test mobile responsiveness
10. ✅ Ensure all buttons are pill-shaped

---

**Design System Version:** 1.0  
**Last Updated:** December 2025  
**Framework:** Bootstrap 5.3.0  
**Font:** Poppins (Google Fonts)  
**Icons:** Bootstrap Icons 1.11.1
