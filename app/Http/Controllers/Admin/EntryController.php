<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EntryController extends Controller
{
    /**
     * EntryController constructor.
     * 引入验证中间件
     */
    public function __construct()
    {
        $this->middleware('admin.auth')->except('loginForm','login');
    }

    /**
     * @return string
     * 后台首页模板加载
     */
    public function index()
    {
        return view('admin.entry.index');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 登陆视图
     */
    public function loginForm()
    {
        return view('admin.entry.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 后台登陆处理
     */
    public function login(Request $request)
    {
        $status = Auth::guard('admin')->attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);

        if ($status) {
            return redirect('/admin/index');
        }
            return redirect('admin/login')->with('error', '您的账号密码有误');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 后台退出处理
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('admin/login');
    }

}
