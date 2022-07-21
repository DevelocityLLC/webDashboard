<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    use ApiResponseTrait;

        
    public function login(Request $request)
    {

        if(!auth('user')->attempt($request->only(['email', 'password']))){
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not match with our record.',
            ], 401);
        }else{

            $user = User::where(['email' => $request->email])->first();
            $response = [
                'user' => new UserResource($user) ,
                'token' => $user->createToken('token-name')->plainTextToken
            ];

            return $this->apiResponse($response , 200 , 'user login sucessfully');
        }

    }

        
    public function update(Request $request)
    {

        $user = auth('user-api')->user();
        if($user){
            $request_data = $request->all();
            $request_data['password'] = bcrypt($request->password);
            $request_data['email_verified_at'] = now();
            $request_data['remember_token'] = Str::random(10);
            $user->update($request_data);

            if ($request->hasFile('img')) {
                $new_file_name = $request->file('img')->getClientOriginalName();
                $old_file_name = $user->img;
                $user->img = $new_file_name ;
                Storage::disk('users')->delete('/'.$old_file_name);
                $request->img->move(public_path('/Attachments/users/'), $new_file_name);
            }

            $user->save();
            $response =[
                'user' => new UserResource($user) ,
                'token' => $user->createToken('token-name')->plainTextToken
            ];

            return $this->apiResponse($response , 200 , 'user update sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'not found');
        }



    }

    public function profile()
    {
        $user = auth('user-api')->user();

        if($user){
            return $this->apiResponse( new UserResource($user), 200 , 'user profile');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }
}
