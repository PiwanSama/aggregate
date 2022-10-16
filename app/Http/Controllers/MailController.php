<?php
 
namespace App\Http\Controllers;
 
use App\Mail\ProfileCreated;
//use App\Models\Order;
use Illuminate\Support\Facades\Mail;
 
class MailController extends Controller
{
    /**
     * Notify the user of a created profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function notifyNewUser()
    {
        //$order = Order::findOrFail($request->order_id);
 
        Mail::to("piwan.summerlee@gmail.com")->send(new ProfileCreated());
    }
}