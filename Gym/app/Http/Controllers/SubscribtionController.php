<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSubsribtion;
use App\Models\User;
use App\Services\SubscriptionService;
use Exception;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class SubscribtionController extends Controller
{
    protected $subsservice;

public function __construct(SubscriptionService $subsservice){

    $this->subsservice= $subsservice;

}


public function CreateSubscription(RequestSubsribtion $request){
try{
$result = $this->subsservice->CreateSubscription($request);

response()->json([
"message" => $result
]);
}catch(Exception $ex){
return response()->json([
"message" => $ex->getMessage()
]);
}
}


    

public function MakeUserSubscription (Request $request){

$result = $this->subsservice->MakeUserSubscription($request);


return response()->json([

$result

]);


}


public function UserSubscription($id){
$result = $this->subsservice->UserSubscription($id);
return response()->json([
$result 
]);
}

public function CheckForEntry($id){

$result = $this->subsservice->CheckForEntry($id);
return response()->json([
$result 

]);

}








}





