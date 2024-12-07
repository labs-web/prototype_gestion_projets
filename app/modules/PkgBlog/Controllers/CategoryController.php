<?php
// Ce fichier est maintenu par ESSARRAJ Fouad


namespace Modules\PkgBlog\Controllers;


use App\Http\Controllers\AppBaseController;
use Modules\PkgBlog\App\Requests\CategoryRequest;
use Modules\PkgBlog\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Modules\PkgBlog\App\Exports\CategoryExport;
use Modules\PkgBlog\App\Imports\CategoryImport;

class CategoryController extends AppBaseController
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $data = $this->categoryRepository->searchData($searchQuery);
                return view('PkgBlog::category.index', compact('data'))->render();
            }
        }

        $data = $this->categoryRepository->paginate();
        return view('PkgBlog::category.index', compact('data'));
    }

    public function create()
    {
        $item = $this->categoryRepository->createInstance();
        return view('PkgBlog::category.create', compact('item'));
    }

    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();
        $this->categoryRepository->create($validatedData);
        return redirect()->route('categories.index')->with('success', __('app.addSuccess'));
    }

    public function show(string $id)
    {
        $item = $this->categoryRepository->find($id);
        return view('PkgBlog::category.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = $this->categoryRepository->find($id);
        return view('PkgBlog::category.edit', compact('item'));
    }

    public function update(CategoryRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->categoryRepository->update($id, $validatedData);
        return redirect()->route('categories.index')->with('success', __('app.updateSuccess'));
    }

    public function destroy(string $id)
    {
        $this->categoryRepository->destroy($id);
        return redirect()->route('categories.index')->with('success', __('app.deleteSuccess'));
    }

    public function export()
    {
        $data = $this->categoryRepository->all();
        return Excel::download(new CategoryExport($data), 'category_export.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new CategoryImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('categories.index')->withError('Invalid format or missing data.');
        }

        return redirect()->route('categories.index')->with('success', __('app.importSuccess'));
    }
}
