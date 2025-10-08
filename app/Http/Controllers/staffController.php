<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;

class staffController extends Controller
{

    
    public function index()
    {
    
            $staff=staff::all();
            if($staff->count()>0){

        return response()->json([
            'status'=>200,
            'staff'=> $staff],200);

        }else{

            return response()->json([
                'status'=>404,
                'Message'=> 'NO Record found'],404);
    

        }
        
    }
    public function store(Request $request)
    {
        $validator = validator::make($request -> all(),[
            
            'staffname'=>'required|string|max:200',
            'email'=>'required|email|max:200',
            'address'=>'required|string|max:200',
            'phone'=>'required|digits:10',  
            'qualification'=>'required|string|max:200',
            'bloodtype'=>'required|string|max:200',
            'university'=>'required|string|max:200',
]);
    if($validator->fails())
{
return response()->json([
'status' => 422,
'errors' => $validator->Messages()
],422);
}
else
{
    $staff=staff::create([
        'staffname'     => $request->staffname,
        'email'         => $request->email,
        'address'       => $request->address,
        'phone'         => $request->phone,
        'qualification' => $request->qualification,
        'bloodtype'     => $request->bloodtype,
        'university'    => $request->university,
    ]);
    if($staff)
    {
        return response()->json([
'status'  => 200,
'message' => "staff create successfully"

        ],200);
    }
    else
    {
        return response()->json([
            'status'  => 500,
            'message' => "something wrong"
            
                    ],500);
            
                }
            }
        }
        public function show($id)
        {
$staff = staff::find($id);
if($staff)
{
    return response()->json(['status'=>204,'staff'=>$staff],200);

}else{
    return response()->json(['status'=>404,'message'=>"No staff record wrong"],404);
}
        }
        public function update(request $request,int $id)
        {
            $validator = validator::make($request -> all(),[
            
                'staffname'=>'required|string|max:200',
                'email'=>'required|email|max:200',
                'address'=>'required|string|max:200',
                'phone'=>'required|digits:10',
                'qualification'=>'required|string|max:200',
                'bloodtype'=>'required|string|max:200',
                'university'=>'required|string|max:200',
    ]);
        if($validator->fails())
    {
    return response()->json([
    'status' => 422,
    'errors' => $validator->Messages()
    ],422);
    }
    else
    {
        $staff=staff::find($id);

        if($staff)
        {
            $staff->update([
                'staffname'     => $request->staffname,
                'email'         => $request->email,
                'address'       => $request->address,
                'phone'         => $request->phone,
                'qualification' => $request->qualification,
                'bloodtype'     => $request->bloodtype,
                'university'    => $request->university,
            ]);
           
            return response()->json([
    'status'  => 200,
    'message' => "staff updated successfully"
    
            ],200);
        }
        else
        {
            return response()->json([
                'status'  => 404,
                'message' => "No staff record found"
                
                        ],404);
                
                    }
                }
        }
        public function destroy($id)
        {
            $staff=staff::find($id);
            if($staff)
            {
            $staff->delete();
            return response()->json(['message'=> 'staff record delete successfully'],200);
            }
            else
            {

            return response()->json(['status'  => 404,'message' => "No staff record found"],404);
            }
        }
    }


