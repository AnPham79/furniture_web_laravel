<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankForRegister;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function process_login(loginRequest $request)
    {
        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                ->firstOrFail();

            if (Hash::check($request->get('password'), $user->password)) {
                session()->put('id', $user->id);
                session()->put('name', $user->name);
                session()->put('avartar', $user->avatar);
                session()->put('email', $user->email);
                session()->put('password', $user->password);
                session()->put('phone', $user->phone);
                session()->put('address', $user->address);
                session()->put('role', $user->role);

                if (session()->get('role') == 2 || session()->get('role') == 3) {
                    return redirect()->route('Product.index');
                } else {
                    return redirect()->route('index');
                }
            } else {
                return redirect()->route('login')->withErrors(['error' => 'Email hoặc mật khẩu không trùng khớp']);
            }
        } catch (\Throwable $th) {
            return redirect()->route('login')->withErrors(['error' => 'Email hoặc mật khẩu không trùng khớp']);
        }
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function process_register(UserRequest $request)
    {
        $data = new User;
        // // $data->password = Hash::make($request->password);
        // sử dụng cái này để mã hóa pass thây vì hash
        $data->fill($request->except('_token'));
        $data->password = bcrypt($request->password);

        Mail::to($request->email)->send(new ThankForRegister($request->name));
        $data->save();

        return redirect()->route('login');
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('index');
    }

    public function changePassword()
    {
        return view('changePassword');
    }

    public $current_password;
    public $password;
    public $password_confirmation;

    public function ProcessChangePassword(Request $request)
    {
        $user = User::query()
            ->where('email', session()->get('email'))
            ->firstOrFail();
        if (Hash::check($request->get('current_password'), $user->password)) {
            $user->password = Hash::make($request->get('password'));
            $user->save();
            session()->flash('message', 'Your password has been changed successfully');
            return redirect()->back();
        } else {
            session()->flash('message', 'Your current password is incorrect!');
            return redirect()->back();
        }
    }

    public function changeInformation()
    {
        $user = User::where('id', session()->get('id'))->first();
        return view('changeInformation', compact('user'));
    }

    public $name;
    public $avatar;
    public $phone;
    public $address;
    public $email;

    public function processChangeInformation(Request $request)
    {
        $user = User::where('id', session()->get('id'))->first();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->email = $request->input('email');

        if ($request->hasFile('avatar')) {
            $avatarFile = $request->file('avatar');
            $imageName = Carbon::now()->timestamp . '.' . $avatarFile->extension();
            // $avatarFile->storeAs('img/avt', $imageName);
            $avatarFile->move(public_path('img/avt'), $imageName);
            $user->avatar = $imageName;
        }

        $user->save();

        session()->flash('success', 'Your information has been successfully updated!!!');

        return redirect()->back();
    }
}
