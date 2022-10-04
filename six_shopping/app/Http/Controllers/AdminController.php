<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\confirmed;


class AdminController extends Controller
{
    public function add_products(){
        if(auth::id()){
            if(auth::user()->usertype=='1'){
                return view('admin.add_products');
            }else{
                return redirect()->back();
            }
           
        }else{
            return redirect('login');
        }
       
    }
    public function add_new(Request $request){
        $data = new products;
        $image = $request->file;
        $imageName = time(). '.' .$image->getClientOriginalExtension();
        $request->file->move('productImages', $imageName);
        $data->image = $imageName;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->price = $request->price;

        $data->save();
        return redirect()->back()->with('message', 'Product saved successfully!');

    }
    public function view_products(){
        $products = products::all();
        return view('admin.view_products', compact('products'));

    }
    public function delete($id){
        $record = products::find($id);
        $record->delete();
        return redirect()->back()->with('message', 'record deleted successfuly!');
    }
    public function update($id){
        $record = products::find($id);
        return view('admin.update', compact('record'));

    }
    public function update_product(Request $request , $id){
        $data = products::find($id);
        $image = $request->file;
        if($image){
            $imageName = time(). '.'. $image->getClientOriginalExtension();
            $request->file->move('productImages', $imageName);
            $data->image = $imageName;
        }
        $data->title = $request->title;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->price = $request->price;

        $data->save();
        return redirect()->back()->with('message', 'Product updated successfully!');
    }
    public function deliveries(){
        $orders = confirmed::all();
        return view('admin.deliveries', compact('orders'));
    }
}
