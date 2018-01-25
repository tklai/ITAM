<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\AssetModel;
use App\Category;
use App\Http\Requests\AssetModelRequest;

class AssetModelController extends Controller
{

    public function getList() {
        return AssetModel::with('category')->get();
    }

    public function getAdd() {
        $categories = Category::all();
        return view('admin.model.add')
            ->with('categories', $categories);
    }

    public function getDetail($id = null) {
        $model = AssetModel::find($id);
        return view('admin.model.detail')
            ->with('model', $model);
    }

    public function getDetailList($id = null) {
        $this->checkNull($id, 'model');
        return Asset::with('assetModel')
            ->with('vendor')
            ->with('location')
            ->where('asset_model_id', $id)
            ->get();
    }

    public function postAdd(AssetModelRequest $request) {
        AssetModel::create([
            'name'        => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'details'     => $request->input('details')
        ]);
        return redirect()->route( 'model.index');
    }

    public function getEdit($id = null) {
        $this->checkNull($id, 'model');
        $model      = AssetModel::find($id);
        $categories = Category::all();
        return view('admin.model.edit')
            ->with('model', $model)
            ->with('categories', $categories);
    }

    public function putUpdate(AssetModelRequest $request, $id = null) {
        $this->checkNull($id, 'model');
        AssetModel::find($id)->update([
            'name'        => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'details'     => $request->input('details')
        ]);
        return redirect()->route('model.index');
    }

    public function postDelete($id = null) {
        $this->checkNull($id, 'model');
        AssetModel::destroy($id);
        return;
    }

}
