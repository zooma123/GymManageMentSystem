<?php

namespace App\Services;
use App\Http\Requests\RequestSubsribtion;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Milon\Barcode\DNS2D;

class SubscriptionService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function CreateSubscription (RequestSubsribtion $request){

        
        Subscription::create($request->validated());

        return "success";

    }




    public function MakeUserSubscription (Request $request){
   $user = User::findorFail($request->user_id);

//Check For Activity Of Subscriptions 
   if( $user->Subscriptions()->wherePivot('isActive', true)->first()){
    return "You Already Subscribed";
   }


      //Validate The Data

$data = $request->validate([
'user_id' => 'required' ,
'subscription_id' => 'required' ,
'count' => 'integer|required|min:1',
'start_date' => 'required|date',
]);




////////////////////

$sub = Subscription::findOrFail($request->subscription_id);


$subprice = $sub->price;
$data['price'] = $data['count'] * $subprice;

$data['start_date'] = Carbon::parse($request->start_date);
$data['end_date'] = $data['start_date']->copy()->addmonths((int )$data['count']);

$user = User::find($request->user_id);

$user->Subscriptions()->attach($request->subscription_id,[    
    'price' => $data['price'],
        'count' => $data['count'],
        'start_date' => $data['start_date'],
        'end_date' => $data['end_date'],
        "isActive" => true 

]);


    return 'success';
    
    }



    public function UserSubscription($id){
$user = User::findOrfail($id);

$data = $user->Subscriptions()->wherePivot('isActive', true)->first();

return $data;

    }  



    public function CheckForEntry($id){

$user = User::findOrfail($id);

$subscribition = $user->Subscriptions()->wherePivot('isActive', true)
->wherePivot('start_date', '<=', now())
->wherePivot('end_date', '>=', now())
->first();
    
if($subscribition){
    return 'true';
}    else {
return false ;

}


}
    

public function showbarcode($id){
    

    $user = User::findOrFail($id);
    $barcodeGenerator = new \Milon\Barcode\DNS2D();

    // Cast to string to prevent type issues
    $barcode = $barcodeGenerator->getBarcodeHTML((string) $user->id, 'QRCODE');


    return view('barcode-view', compact('barcode', 'user'));





}




public function deatcivateSubs($id){

$user = User::FindOrfail($id);

$subscription = $user->subscriptions()->wherePivot('isActive', true)->first();

// Check if there's an active subscription
if ($subscription) {
    // Deactivate it by updating the pivot table
    $user->Subscriptions()->updateExistingPivot($subscription->id, [
        'isActive' => false
    ]);

    return 'success';
}

return 'no active subscription found';




}




}