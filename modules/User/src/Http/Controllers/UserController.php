<?php
namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\src\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $pageTitle = 'Quản lý người dùng';
        return view('user::lists',compact('pageTitle'));
    }
    public function create()
    {
        $pageTitle = 'Thêm người dùng';
        return view('user::add',compact('pageTitle'));
    }
    public function detail($id)
    {
        return view('user::detail',compact('id'));
    }
    // public function create(){
    //     $user = new User();
    //     $user->name = 'Le Thanh Nha';
    //     $user->email = 'tnhalk@maytinhdian.com';
    //     $user->save();
    // }
}
