<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food; 
use App\Models\Order;
use App\Models\Category;
use App\Models\Contact;
use App\Models\User;

class AdminController extends Controller
{
    // --- FOOD LOGIC ---

    public function add_food_view()
{
    $categories = Category::all();
    
    // 1. Variable sahi karein: compact('categories')
    // 2. View ka naam check karein: Agar file ka naam 'add_food.blade.php' hai to wahi likhein
    return view('admin.add_food', compact('categories')); 
}

    public function upload_food(Request $request)
    {
        $data = new Food;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->category = $request->category; 

        $image = $request->file('image');
        if($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('foodimage', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        return redirect()->back()->with('success', 'Food Added Successfully!');
    }

    public function view_food()
    {
        $data = Food::all();
        return view('admin.show_food', compact('data'));
    }

    // 🔥 EDIT (POST Request)
    public function edit_food(Request $request)
    {
        $id = $request->id; // Hidden input se ID li
        $data = Food::findOrFail($id);
        return view('admin.update_food', compact('data'));
    }

    // 🔥 UPDATE (POST Request)
    public function update_food(Request $request)
    {
        $id = $request->id; // Hidden input se ID li
        $data = Food::findOrFail($id);

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $image = $request->file('image');
        if($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('foodimage', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        return redirect('/view_food')->with('success', 'Food Updated Successfully!');
    }

    // 🔥 DELETE (POST Request)
    public function delete_food(Request $request)
    {
        $id = $request->id;
        $data = Food::findOrFail($id);
        
        if($data->image && file_exists(public_path('foodimage/'.$data->image))) {
            unlink(public_path('foodimage/'.$data->image));
        }

        $data->delete();
        return redirect()->back()->with('success', 'Food Deleted Successfully');
    }


    // --- ORDER LOGIC ---

    // public function orders()
    // {
    //     $data = Order::all();
    //     return view('admin.orders', compact('data'));
    // }

    public function delivered(Request $request)
    {
        $id = $request->id;
        $order = Order::findOrFail($id);
        
        $order->delivery_status = "delivered";
        $order->payment_status = "Paid";
        
        $order->save();
        return redirect()->back()->with('success', 'Order status updated!');
    }


    // --- CATEGORY LOGIC ---

    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;
        $data->name = $request->name;

        $image = $request->file('image');
        if($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('categoryimage', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        return redirect()->back()->with('success', 'Category Added!');
    }

    public function delete_category(Request $request)
    {
        $id = $request->id;
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Category Deleted!');
    }


// 1. Show Orders Page (Updated)
    public function orders()
    {
        $data = Order::all();
        // Sirf Delivery Boys (Role 2) ko fetch karein dropdown ke liye
        $delivery_boys = User::where('role', '2')->get(); 
        
        // Agar file resources/views/admin/orders.blade.php hai
          return view('admin.orders', compact('data', 'delivery_boys'));
    }

    // 2. Assign Order to Delivery Boy (New Function)
    public function assign_order(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->delivery_user_id = $request->delivery_boy_id;
        $order->delivery_status = "On the way"; // Status update
        $order->save();

        return redirect()->back()->with('success', 'Order Assigned to Delivery Boy!');
    }


    // --- MESSAGES LOGIC ---
    public function view_messages()
    {
        $data = Contact::all();
        return view('admin.messages', compact('data'));
    }







}