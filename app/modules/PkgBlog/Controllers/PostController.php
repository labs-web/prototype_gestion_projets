<?php
// Ce fichier est maintenu par ESSARRAJ Fouad

namespace Modules\PkgBlog\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\PkgBlog\App\Requests\PostRequest;
use Modules\PkgBlog\Repositories\PostRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Modules\PkgBlog\App\Exports\PostExport;
use Modules\PkgBlog\App\Imports\PostImport;

class PostController extends AppBaseController
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $data = $this->postRepository->searchData($searchQuery);
                return view('PkgBlog::post.index', compact('data'))->render();
            }
        }

        $data = $this->postRepository->paginate();
        return view('PkgBlog::post.index', compact('data'));
    }

    public function create()
    {
        $item = $this->postRepository->createInstance();
        return view('PkgBlog::post.create', compact('item'));
    }

    public function store(PostRequest $request)
    {
        $validatedData = $request->validated();
        $this->postRepository->create($validatedData);
        return redirect()->route('posts.index')->with('success', __('app.addSuccess'));
    }

    public function show(string $id)
    {
        $item = $this->postRepository->find($id);
        return view('PkgBlog::post.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = $this->postRepository->find($id);
        return view('PkgBlog::post.edit', compact('item'));
    }

    public function update(PostRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->postRepository->update($id, $validatedData);
        return redirect()->route('posts.index')->with('success', __('app.updateSuccess'));
    }

    public function destroy(string $id)
    {
        $this->postRepository->destroy($id);
        return redirect()->route('posts.index')->with('success', __('app.deleteSuccess'));
    }

    public function export()
    {
        $projects = $this->postRepository->all();
        return Excel::download(new PostExport($projects), 'post_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new PostImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('posts.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('posts.index')->with('success', __('pkg_posts::post.singular') . ' ' . __('app.addSucées'));
    }
}
