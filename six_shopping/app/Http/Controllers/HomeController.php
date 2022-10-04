<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\products;
use App\Models\orders;
use App\Models\confirmed;

class HomeController extends Controller
{
    public function redirect(){
        if(auth::id()){
            if(auth::user()->usertype == '1'){
                return view('admin.home');
            }else{
                $user = auth()->user();
                $count = orders::where('phone', $user->phone)->count();
                $data = products::paginate(9);
                return view('user.home', compact('data','count'));
            }
        }else{
            return redirect('index');
        }
    }
    public function index(){
        $data = products::paginate(9);
        return view('user.home', compact('data'));
    }
    public function search(Request $request){
        $search = $request->search;
        if($search == ''){
            $data = products::paginate(3);
            return view('user.home', compact('data'));
        }
        $data = products::where('title', 'Like', '%'. $search. '%')->get();
        return view('user.home', compact('data'));
    }
    public function cart(Request $request, $id){
        if(auth::id()){
            $user = auth()->user();
            $product = products::find($id);
            $cart = new orders;

            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->title = $product->title;
            $cart->description = $product->description;
            $cart->quantity = $product->quantity;
            $cart->price = $product->price;
            $cart->image = $product->image;

            $cart->save();
            return redirect()->back()->with('message', 'Record added to cart!');
        }else{
            return redirect('login');
        }
    }
    public function view_cart(){
        $user = auth()->user();
        $orders = orders::where('phone', $user->phone)->get();
        $count = orders::where('phone', $user->phone)->count();
        return view('user.cart', compact('count', 'orders'));
    }
    public function cancel_order($id){
        $order = orders::find($id);
        $order->delete();
        return redirect()->back()->with('message', 'Record deleted successfuly!');
    }
    public function confirmed_orders(Request $request, $id){
        $user = auth()->user();
        $orders = orders::find($id);
        
        $name = $user->name;
        $phone = $user->phone;
        $email = $user->email;
        $address = $user->address;
        $image = $orders->image;
        foreach($request->title as $key=>$title){
            $confirmed = new confirmed;
            $confirmed->title = $request->title[$key];
            $confirmed->description = $request->description[$key];
            $confirmed->quantity = $request->quantity[$key];
            $confirmed->price = $request->price[$key];
            $confirmed->status = 'Pending';
            $confirmed->name = $name;
            $confirmed->phone = $phone;
            $confirmed->email = $email;
            $confirmed->address = $address;
            $confirmed->image = $image;

            $confirmed->save();
        }
       DB::table('orders')->where('phone', $phone)->delete();
        return redirect()->back();
    }
}
