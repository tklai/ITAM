<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller {

    public function postAdd(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);
        return;
    }

}
