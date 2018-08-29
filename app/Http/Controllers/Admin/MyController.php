<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class MyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 更改密码页面加载
     */
    public function passwordForm()
    {
        return view('admin.my.passwordForm');
    }

    /**
     * @param AdminPost $request
     * 更改密码处理
     */
    public function changePassword(AdminPost $request)
    {
        $model = Auth::guard('admin')->user();
        $model->password = bcrypt($request['password']);
        $model->save();
        flash('密码修改成功,请重新登录')->overlay();
        return redirect()->back();
    }
}
