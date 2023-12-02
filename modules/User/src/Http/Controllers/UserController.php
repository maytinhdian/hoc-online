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

        $check = $this->userRepository->checkPassword('1233456', 1);
      
        return view('user::lists', compact('pageTitle'));
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

    }
}
