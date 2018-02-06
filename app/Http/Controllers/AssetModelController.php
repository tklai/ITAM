<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetModelRequest;
use App\Asset;
use App\AssetModel;
use App\Category;

class AssetModelController extends Controller
{

    /**
     * Display an index page of Asset Model Management.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('models.index');
    }

    /**
     * Display a listing of the models.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        $assetModels = AssetModel::with('category')->get();
        return $assetModels;
    }

    /**
     * Show the form for creating a new model.
     *
     * @return \Illuminate\View\View|\Illuminate\Database\Eloquent\Collection
     */
    public function create()
    {
        $categories = Category::all();
        return view('models.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created model in storage.
     *
     * @param  \App\Http\Requests\AssetModelRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AssetModelRequest $request)
    {
        $model = AssetModel::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'details' => $request->input('details')
        ]);
        if ($request->ajax()) {
            return $model;
        } else {
            return redirect()->route('models.index');
        }
    }

    /**
     * Display the specified model.
     *
     * @param  int $id
     * @return \Illuminate\View\View|\Illuminate\Database\Eloquent\Collection
     */
    public function show($id)
    {
        $model = AssetModel::findOrFail($id);
        return view('models.show')
            ->with('model', $model);
    }

    /**
     * Display a listing of the assets that related to this asset model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function assetsList($id = null)
    {
        $this->checkNull($id, 'models');
        return Asset::with('assetModel')
            ->with('vendor')
            ->with('location')
            ->where('asset_model_id', $id)
            ->get();
    }

    /**
     * Show the form for editing the specified model.
     *
     * @param  int $assetModel
     * @return \Illuminate\View\View|\Illuminate\Database\Eloquent\Collection
     */
    public function edit($assetModel)
    {
        $this->checkNull($assetModel, 'models');
        $model = AssetModel::findOrFail($assetModel);
        $categories = Category::all();
        return view('models.edit')
            ->with('model', $model)
            ->with('categories', $categories);
    }

    /**
     * Update the specified model in storage.
     *
     * @param  \App\Http\Requests\AssetModelRequest $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AssetModelRequest $request, $id)
    {
        $this->checkNull($id, 'models');
        AssetModel::findOrFail($id)->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'details' => $request->input('details')
        ]);
        return redirect()->route('models.index');
    }

    /**
     * Remove the specified model from storage.
     *
     * @param  int $id
     * @return null
     */
    public function destroy($id)
    {
        $this->checkNull($id, 'models');
        AssetModel::destroy($id);
        return;
    }

}
