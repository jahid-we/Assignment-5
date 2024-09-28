<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    // Admin Controller start
    function carCreate(Request $request){
       try{
        $userId=$request->header("id");
        $userRoll=$request->header("userRoll");
           Car::where('user_id', $userId)->where('role',$userRoll)->create([
               'name' => $request->input('name'),
               'brand' => $request->input('brand'),
               'model' => $request->input('model'),
               'year' => $request->input('year'),
               'car_type' => $request->input('car_type'),
               'daily_rent_price' => $request->input('daily_rent_price'),
               'image' => $request->input('image'),
               'user_id' => $userId
           ]);

           return response()->json([
               'status' => 'success',
               'message' => 'Car Info Created Successfully'
           ], 200);

       }catch(Exception $e){
           return response()->json([
               'status' => 'failed',
               'message' => 'Car Info Creation Failed'
           ], 500);
       }
    }

    function CarList(Request $request){
        try{
           $car= Car::all();
            return response()->json([
                'status'=> 'success',
                'data'=> $car
                ],200);

        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Car List Fetch Failed'
            ], 500);
        }


    }

    function carUpdate(Request $request){
       try{
           Car::where("id", $request->input('id'))
           ->update([
               'name' => $request->input('name'),
               'brand' => $request->input('brand'),
               'model' => $request->input('model'),
               'year' => $request->input('year'),
               'car_type' => $request->input('car_type'),
               'daily_rent_price' => $request->input('daily_rent_price'),
               'availability' =>(bool)$request->input('availability'),
               'image' => $request->input('image'),
           ]);
           return response()->json([
               'status' => 'success',
               'message' => 'Car Info Updated Successfully'
           ], 200);
       }catch(Exception $e){
           return response()->json([
               'status' => 'failed',
               'message' => 'Car Info Update Failed'
           ], 500);
       }
    }


    function carByID(Request $request)
    {
        try{
            $car_id=$request->input('id');
            $car=Car::where('id',$car_id)->first();
        return response()->json([
            'status' => 'success',
            'data' => $car
        ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Car Info Fetch Failed'
            ], 500);
        }

    }

    function carDelete(Request $request){
        try{
            $car_id=$request->input('id');
            Car::where("id", $car_id)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Car Info Deleted Successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Car Info Deletion Failed'
            ], 500);
        }
    }



    // Admin Controller end
}
