<?php

namespace Modules\Courses\src\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;

use Yajra\DataTables\Facades\DataTables;
use Modules\Courses\src\Http\Requests\CoursesRequest;
use Modules\Courses\src\Repositories\CoursesRepository;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;

class CoursesController extends Controller{
    protected $coursesRepository;
    public function __construct(CoursesRepositoryInterface $coursesRepository)
    {
        $this->coursesRepository = $coursesRepository;
    }
    public function index()
    {
        $pageTitle = 'Quản lý khoá học';

        return view('courses::lists', compact('pageTitle'));
    }
    public function data()
    {
        $courses = $this->coursesRepository->getAllCourses();

        return DataTables::of($courses)
            ->addColumn('edit', function ($courses) {return '<a href="' . route('admin.users.edit', $courses->id) . '" class="btn btn-warning">Sửa</a>';})
            ->addColumn('delete', function ($courses) {return '<a href="' . route('admin.users.delete', $courses->id).'" class="btn btn-danger delete-action">Xóa</a>';})
            ->editColumn('created_at', function ($courses) {return Carbon::parse($courses->created_at)->format('d/m/Y H:i:s');})
            ->rawColumns(['edit', 'delete'])
            ->toJson();

    }
    public function create()
    {
        $pageTitle = 'Thêm khóa học';
        return view('courses::add', compact('pageTitle'));
    }
    public function detail($id)
    {
        return view('courses::detail', compact('id'));
    }
    public function store(CoursesRequest $request)
    {
        $this->coursesRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('admin.courses.index')->with('msg', __('courses::messages.create.success'));
    }
    public function edit($id)
    {
        $pageTitle = 'Cập nhật thông tin khóa học';
        $courses = $this->coursesRepository->find($id);
        if (!$courses) {
            abort(404);
        }
        return view('courses::edit', compact('course', 'pageTitle'));
    }
    public function update(CoursesRequest $request, $id)
    {

    }
    public function delete($id) {
        $this->coursesRepository->delete($id);
        return back()->with('msg', __('courses::messages.delete.success'));
    }
}
