<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
{
    // 1. Agar User Login Hai, tabhi Role check karo
    if (Auth::id()) {
        
        $role = Auth::user()->role;

        // --- ADMIN (Role 0) ---
        if($role == '0') { 
            return view('admin.dashboard'); 
        }

        // --- DELIVERY BOY (Role 2) ---
        if($role == '2') { 
            $userId = Auth::id();
            
            // A. Pending/Active Orders nikalo
            $orders = Order::where('delivery_user_id', $userId)->get();
            
            // B. Total Earnings Calculate karo (Jo deliver ho chuke hain)
            $total_earnings = Order::where('delivery_user_id', $userId)
                                   ->where('delivery_status', 'Delivered')
                                   ->sum('delivery_fee'); // Database column 'delivery_fee'

            // C. View mein orders aur earnings dono bhejo
            return view('delivery.dashboard', compact('orders', 'total_earnings')); 
        }
    }

    // 2. Agar banda GUEST hai (Login nahi hai) YA Customer hai (Role 1)
    // To usko seedha Food Menu dikhao
    $data = Food::all();
    return view('dashboard', compact('data'));
}
    // --- DELIVERY BOY: Mark Order as Completed ---
    public function complete_delivery(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);
        
        $order->delivery_status = "Delivered";
        $order->payment_status = "Paid";
        
        // 🔥🔥 IMP: Yahan Fee Set kar rahe hain ($5 Example)
        $order->delivery_fee = 5; 
        
        $order->save();
        
        return redirect()->back()->with('success', 'Order Delivered Successfully!');
    }

    // --- CUSTOMER: Add to Cart ---
    public function add_cart(Request $request)
    {
        if (Auth::id()) {
            $user_id = Auth::id();
            $food_id = $request->id;
            $quantity = $request->quantity;

            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;
            $cart->save();

            return redirect()->back()->with('success', 'Product Added to Cart!');
        } else {
            return redirect('/login');
        }
    }

    // --- CUSTOMER: Show Cart ---
    public function show_cart()
    {
        if(Auth::id()) {
            $id = Auth::id();
            $cart = Cart::where('user_id', $id)
                        ->join('food', 'carts.food_id', '=', 'food.id')
                        ->select('carts.*', 'food.title', 'food.price', 'food.image')
                        ->get();
            return view('show_cart', compact('cart'));
        } else {
            return redirect('/login');
        }
    }

    // --- CUSTOMER: Remove from Cart ---
    public function remove_cart(Request $request)
    {
        $id = $request->id;
        $cart = Cart::find($id);
        if($cart) { $cart->delete(); }
        return redirect()->back();
    }

    // --- CUSTOMER: Confirm Order ---
    public function confirm_order(Request $request)
    {
        $user = Auth::user();
        $userid = $user->id;

        $data = Cart::where('user_id', $userid)->join('food', 'carts.food_id', '=', 'food.id')->get();

        foreach($data as $cart_item) {
            $order = new Order;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->user_id = $userid;
            $order->foodname = $cart_item->title;
            $order->price = $cart_item->price;
            $order->quantity = $cart_item->quantity;
            $order->image = $cart_item->image;
            $order->payment_status = 'Cash on Delivery';
            $order->delivery_status = 'processing';
            
            // Default Fee 0 rakh rahe hain, jab deliver hoga tab update hogi
            $order->delivery_fee = 0; 
            
            $order->save();
        } 

        Cart::where('user_id', $userid)->delete();
        return redirect('/redirect')->with('success', 'Order Placed Successfully!');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contact_post(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }
}