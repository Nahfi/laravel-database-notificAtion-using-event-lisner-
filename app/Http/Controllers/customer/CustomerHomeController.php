<?php

namespace App\Http\Controllers\customer;

use App\Events\ProductInsertEvent;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserNotification;
use Notification;

class CustomerHomeController extends Controller
{
    public function index()
    {
        return view('customer.pages.home');
    }
    public function updatePasswordForm()
    {
        return view('customer.pages.update');
    }
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers',
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        if(Hash::check($request->old_password, Auth::guard('customer')->user()->password)){

        $customer =  Customer::where('email',$request->email)->first();
        if($customer){
            $customer->password = Hash::make($request->password);
            $customer->save();
            Auth::guard('customer')->logout();
            return redirect()->route('customer.login')->with('message','password updated');
            return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/customer/login');
        }
        else{
            return back()->with('message','something went wrong');
        }
    }
    else{
        return back()->with('message','old password doesnot match');

    }

    }
    public function store(Request $request){
        $user = Customer::get();
        $product =  new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->save();
        event(new ProductInsertEvent($product));
        return back();
    }

    public function serach(){
        $data = request()->get('search');
        return view('customer.pages.home');
    }

}
