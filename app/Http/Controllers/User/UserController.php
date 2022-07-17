<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
class UserController extends Controller
{
    public function edit_profile()
    {
        return view('backend.user.users.edit');
    }

    public function update_profile(UpdateProfileRequest $request)
    {

        $user = auth('user')->user();

        $data = $request->except(['password']);
        
        if(request()->has('password') && request('password') != null){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        if ($request->hasFile('img')) {
            $file_name = $request->file('img')->getClientOriginalName();
            $user->img = $file_name ;
            Storage::disk('users')->delete('/'.$user->img);
            $request->img->move(public_path('/Attachments/users/'), $file_name);
        }

        $user->save();

        toastr()->success('profile has been updated successfully!');
        return redirect()->route('profile.edit');
    }
    
        
    public function activate_account($activation_code = null){
        

        $user = User::where(['activation_code' => $activation_code])->first();
        
        if($user){
            $user->is_active = 1;
            $user->save();
            toastr()->success('Your account activate successfuly!');
            return redirect()->route('login');
        }
        
        toastr()->error('Invalid activation code!');
        return redirect()->route('login');
    }
}
