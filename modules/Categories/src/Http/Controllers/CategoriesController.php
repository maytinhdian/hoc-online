<?php
namespace Modules\Categories\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Modules\Categories\src\Http\Requests\CategoryRequest;
use Modules\Categories\src\Repositories\CategoriesRepository;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{
    protected $categoryRepository;
    /**
     * Class constructor.
     */
    public function __construct(CategoriesRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $pageTitle = 'Quản lý danh mục';

        // $categories = $this->categoryRepository->getTreeCategories()->toArray();
        // dd($categories);

        return view('categories::lists', compact('pageTitle'));
    }
    public function data()
    {
        $categories = $this->categoryRepository->getCategories();

        $categories = DataTables::of($categories)->toArray();

        $categories['data'] = $this->getCategoriesTable($categories['data']);
        return $categories;
    }

    public function getCategoriesTable($categories, $char = '', &$result = [])
    {
        if (!empty($categories)) {
            foreach ($categories as $key => $category) {

                $row = $category;
                $row['name'] = $char . $row['name'];
                $row['edit'] = '<a href="' . route('admin.categories.edit', $category['id']) . '" class="btn btn-warning">Sửa</a>';
                $row['delete'] = '<a href="' . route('admin.categories.delete', $category['id']) . '" class="btn btn-danger delete-action">Xóa</a>';
                $row['link']='<a href="/danh-muc/' . $category['slug'] . '" class="btn btn-primary">Xem</a>';
                $row['created_at']=Carbon::parse($category['created_at'])->format('d/m/Y H:i:s');
                unset($row['sub_categories']);
                unset($row['updated_at']);
                $result[] = $row;
                if (!empty($category['sub_categories'])) {

                    $result = $this->getCategoriesTable($category['sub_categories'], $char . '|--', $result);
                }
            }
        }
        return $result;
    }

    public function create()
    {
        $pageTitle = 'Thêm danh mục';
        $categories = $this->categoryRepository->getAllCategories();
        return view('categories::add', compact('pageTitle', 'categories'));
    }
    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->create([
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,

        ]);
        return redirect()->route('admin.categories.index')->with('msg', __('categories::messages.create.success'));
    }
    public function edit($id)
    {
        $pageTitle = 'Cập nhật danh mục';

        $category = $this->categoryRepository->find($id);
        if (!$category) {
            abort(404);
        }
        $categories = $this->categoryRepository->getAllCategories();

        return view('categories::edit', compact('category', 'pageTitle', 'categories'));
    }
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->except('_token');

        $this->categoryRepository->update($id, $data);
        return back()->with('msg', __('categories::messages.update.success'));
    }
    public function delete($id)
    {
        $this->categoryRepository->delete($id);
        return back()->with('msg', __('categories::messages.delete.success'));
    }
}
