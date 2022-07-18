<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    use ApiResponseTrait;
    public function index($id=null)
    {
        $users = User::when($id != null, function($q) use($id){
                $q->where('id', $id);
        })->orderBy('id', 'DESC')->get();

        if($users){
            return $this->apiResponse(UserResource::collection($users) , 200 , 'users found');
        }else{
            return $this->apiResponse(null , 404 , 'users not found');

        }
    }

    public function register(UserRequest $request)
    {
        $request_data = $request->all();

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/users/'), $file_name);
            $request_data['img'] = $file_name;
        }

        $request_data['password'] = bcrypt($request->password);
        $request_data['email_verified_at'] = now();
        $request_data['remember_token'] = Str::random(10);

        $user = User::create($request_data);

        if($user){
            $token = $user->createToken('token-name')->plainTextToken;

            $response = [
            'user' => new UserResource($user),
            'token' => $token
            ];

            return $this->apiResponse($response , 200 , 'user created sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'user not found');
        }



    }

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
/*
    public function getUser($id)
    {
       $user = User::Where('id' , $id)->first();

       if($user){
          return $this->apiResponse( new UserResource($user) , 200 , 'user find sucess');
       }else{
        return $this->apiResponse(null , 404 , 'not found');
       }
    }
*/
    public function update(Request $request , $id)
    {

        $user = User::where('id' , $id)->first();
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


    public function destroy($id)
    {
        $old_file_name = '';

        $user = User::where('id' , $id)->first();
        if($user){
            $user->id = $id;

            $old_file_name = $user->img;

            if (!empty($user->name)) {

                Storage::disk('users')->delete('/'.$old_file_name);
            }
            User::destroy($id);

            return $this->apiResponse(true , 200 , 'user deleted sucessfully');

        }else{
            return $this->apiResponse(false , 404 , 'user not found');
        }


    }






}
