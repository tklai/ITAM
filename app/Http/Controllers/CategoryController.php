<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return null
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);
        return;
    }
}
