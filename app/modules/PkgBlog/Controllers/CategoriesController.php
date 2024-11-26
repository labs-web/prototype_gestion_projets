<?php
// Ce fichier est maintenu par ESSARRAJ Fouad


namespace Modules\PkgBlog\Controllers;


use App\Http\Controllers\AppBaseController;
use Modules\PkgBlog\App\Requests\CategoriesRequest;
use Modules\PkgBlog\Repositories\CategoriesRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Modules\PkgBlog\App\Exports\CategoriesExport;
use Modules\PkgBlog\App\Imports\CategoriesImport;

class CategoriesController extends AppBaseController
{
    protected $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $data = $this->categoriesRepository->searchData($searchQuery);
                return view('PkgBlog::categories.index', compact('data'))->render();
            }
        }

        $data = $this->categoriesRepository->paginate();
        return view('PkgBlog::categories.index', compact('data'));
    }

    public function create()
    {
        $item = $this->categoriesRepository->createInstance();
        return view('PkgBlog::categories.create', compact('item'));
    }

    public function store(CategoriesRequest $request)
    {
        $validatedData = $request->validated();
        $this->categoriesRepository->create($validatedData);
        return redirect()->route('categories.index')->with('success', __('app.addSuccess'));
    }

    public function show(string $id)
    {
        $item = $this->categoriesRepository->find($id);
        return view('PkgBlog::categories.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = $this->categoriesRepository->find($id);
        return view('PkgBlog::categories.edit', compact('item'));
    }

    public function update(CategoriesRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->categoriesRepository->update($id, $validatedData);
        return redirect()->route('categories.index')->with('success', __('app.updateSuccess'));
    }

    public function destroy(string $id)
    {
        $this->categoriesRepository->destroy($id);
        return redirect()->route('categories.index')->with('success', __('app.deleteSuccess'));
    }

    public function export()
    {
        $data = $this->categoriesRepository->all();
        return Excel::download(new CategoriesExport($data), 'categories_export.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new CategoriesImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('categories.index')->withError('Invalid format or missing data.');
        }

        return redirect()->route('categories.index')->with('success', __('app.importSuccess'));
    }
}
