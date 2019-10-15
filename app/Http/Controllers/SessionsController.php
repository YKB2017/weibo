<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //显示登录页面
    public function create()
    {
        return view('sessions.create');
    }

    //登录
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            // 登录成功后的相关操作
            session()->flash('success','欢迎回来！');
            return redirect()->route('users.show',[Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    //退出登录
    public function destroy()
    {
        Auth::logout();
        session()->flash('success','您已退出成功！');
        return redirect('login');
    }
}
