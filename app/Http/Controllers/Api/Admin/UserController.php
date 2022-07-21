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

    public function store(UserRequest $request)
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


    public function getUser($id)
    {
       $user = User::Where('id' , $id)->first();

       if($user){
          return $this->apiResponse( new UserResource($user) , 200 , 'user find sucess');
       }else{
        return $this->apiResponse(null , 404 , 'not found');
       }
    }


    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        if(!$user){
            return $this->apiResponse(null , 404 , 'user not found');
        }

        $request_data = $request->all();

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/users/'), $file_name);
            $request_data['img'] = $file_name;
        }
        if(request()->has('password') && $request->password != null){
            $request_data['password'] = bcrypt($request->password);
        }

        $user->fill($request_data);
        
        $user->save();

        if($user){

            $token = $user->createToken('token-name')->plainTextToken;

            $response = [
                'user' => new UserResource($user),
                'token' => $token
            ];

            return $this->apiResponse($response , 200 , 'user created sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'something went wrong');
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
