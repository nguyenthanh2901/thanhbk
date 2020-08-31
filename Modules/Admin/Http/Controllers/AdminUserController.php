<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->paginate(10);
        $countUser = User::count('id');
        $viewData = [
          'users'=>$users,
          'countUser'=>$countUser,
        ];
        return view('admin::user.index',$viewData);
    }
    public function delete($id)
    {
        \DB::table('users')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
