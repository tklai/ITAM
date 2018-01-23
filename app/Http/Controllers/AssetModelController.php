<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function postAdd(AssetModelRequest $request) {
        AssetModel::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'details' => $request->input('details')
        ]);
        return redirect()->route( 'model.index');
    }

    public function getEdit($id = null) {
        if ($id == null) {
            return redirect()->route('model.index');
        }

        $model = AssetModel::find($id);
        $categories = Category::all();
        return view('admin.model.edit')
            ->with('model', $model)
            ->with('categories', $categories);
    }

    public function putUpdate(AssetModelRequest $request, $id = null) {
        if ($id == null) {
            return redirect()->route('model.index');
        }

        AssetModel::find($id)->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'details' => $request->input('details')
        ]);
        return redirect()->route('model.index');
    }

    public function postDelete($id) {
        if ($id == null) {
            return redirect()->route('model.index');
        }

        AssetModel::destroy($id);
        return;
    }

}
