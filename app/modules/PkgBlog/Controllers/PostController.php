<?php
// Ce fichier est maintenu par ESSARRAJ Fouad



namespace Modules\PkgBlog\Controllers;

use App\Http\Controllers\Controller;
use Modules\PkgBlog\App\Requests\PostRequest;
use Modules\PkgBlog\Repositories\PostRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
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
                return view('pkg_blog::post.index', compact('data'))->render();
            }
        }

        $data = $this->postRepository->paginate();
        return view('pkg_blog::post.index', compact('data'));
    }

    public function create()
    {
        return view('pkg_blog::post.create');
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
        return view('pkg_blog::post.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = $this->postRepository->find($id);
        return view('pkg_blog::post.edit', compact('item'));
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
}
