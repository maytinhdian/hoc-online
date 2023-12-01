<?php
namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\src\Models\User;
use Modules\User\src\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepo;
    /**
     * Class constructor.
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function index()
    {
        $users = $this->userRepo->getUsers();
        dd($users);
        return view('user::lists');
    }
    public function detail($id)
    {
        return view('user::detail',compact('id'));
    }
    public function create(){
        $user = new User();
        $user->name = 'Le Thanh Nha';
        $user->email = 'tnhalk@maytinhdian.com';
        $user->save();
    }
}
