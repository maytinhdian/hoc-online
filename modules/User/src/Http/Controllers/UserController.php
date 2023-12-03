<?php
namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\src\Http\Requests\UserRequest;
use Modules\User\src\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $pageTitle = 'Quản lý người dùng';

        // $check = $this->userRepository->checkPassword('123456', 2);
        // dd($check);

        $users = $this->userRepository->find(2);
        // dd($users);
        return view('user::lists', compact('pageTitle'));
    }
    public function data(){
        $users=$this->userRepository->getAllUsers();

        $data=[];
        foreach ($users as $user) {
           array_push($data,[
            ...$user->toArray(),
            'edit'=>'<a href="#" class="btn btn-warning">Sửa</a>',
            'delete'=>'<a href="#" class="btn btn-danger">Xóa</a>'
           ]);

        }
        // dd($data);
        return response()->json([
            'draw'=> 1,
            'recordsTotal'=> count($users),
            'recordsFiltered'=> count($users),
            'data'=>$data,
        ]);
    }
    public function create()
    {
        $pageTitle = 'Thêm người dùng';
        return view('user::add', compact('pageTitle'));
    }
    public function detail($id)
    {
        return view('user::detail', compact('id'));
    }
    public function store(UserRequest $request)
    {
        $this->userRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('admin.users.index')->with('msg', __('user::messages.success'));
    }
}
