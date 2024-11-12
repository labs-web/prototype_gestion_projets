<?php

namespace App\Http\Controllers\GestionProjets;

use App\Exceptions\GestionProjets\ProjectAlreadyExistException;
use App\Http\Controllers\Controller;
use App\Imports\GestionProjets\ProjetImport;
use App\Models\GestionProjets\Projet;
use Illuminate\Http\Request;
use App\Http\Requests\GestionProjets\projetRequest;
use App\Repositories\GestionProjets\ProjetRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use App\Exports\GestionProjets\projetExport;
use App\Http\Requests\GestionProjets\tagRequest;
use App\Repositories\GestionProjets\TagRepository;
use Maatwebsite\Excel\Facades\Excel;

class TagController extends AppBaseController
{
    protected $tagRepository;
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $tagsData = $this->tagRepository->searchData($searchQuery);
                return view('GestionProjets.tag.index', compact('tagsData'))->render();
            }
        }
        $tagsData = $this->tagRepository->paginate();
        return view('GestionProjets.tag.index', compact('tagsData'));
    }


    public function create()
    {
        $dataToEdit = null;
        return view('GestionProjets.tag.create', compact('dataToEdit'));
    }


    public function store(tagRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $this->tagRepository->create($validatedData);
            return redirect()->route('tags.index')->with('success', __('GestionProjets/tag.singular') . ' ' . __('app.addSucées'));
        } catch (ProjectAlreadyExistException $e) {
            return back()->withInput()->withErrors(['tag_exists' => __('GestionProjets/projet/message.createProjectException')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }


    public function show(string $id)
    {
        $fetchedData = $this->tagRepository->find($id);
        return view('GestionProjets.tag.show', compact('fetchedData'));
    }


    public function edit(string $id)
    {
        $dataToEdit = $this->tagRepository->find($id);
        return view('GestionProjets.tag.edit', compact('dataToEdit'));
    }


    public function update(projetRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->tagRepository->update($id, $validatedData);
        return redirect()->route('tags.index', $id)->with('success', __('GestionProjets/tag.singular') . ' ' . __('app.updateSucées'));
    }


    public function destroy(string $id)
    {
        $this->tagRepository->destroy($id);
        return redirect()->route('tags.index')->with('success', 'Le tag a été supprimer avec succés.');
    }

}
