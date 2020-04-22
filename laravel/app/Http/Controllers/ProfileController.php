<?php


namespace App\Http\Controllers;


use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function update(Request $request) {
        $user = Auth::user();

        $errors = [];
        if($request->isMethod('post')) {

            $this->validate($request, $this->validateRules(), [], $this->attributeNames());

            if(Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                    'password' => Hash::make($request->post('newPassword')),
                ]);
                $user->save();
                return redirect()->route('profile.showProfile')->with('success', 'Данные пользователя успешно изменены');
            } else {
                $errors['password'][] = 'Неверно введён текущий пароль';
                //dd($errors);
            }
            return redirect()->route('profile.showProfile')->withErrors($errors);
        }
        return view('profile', ['user' => $user]);
    }

    protected function validateRules() {
        return [
            'name' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|string|min:3',
        ];
    }

    protected function attributeNames() {
        return ['newPassword' => 'Новый пароль'];
    }
}
