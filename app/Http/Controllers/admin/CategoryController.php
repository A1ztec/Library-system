<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $records = Category::paginate(20);
        return view('admin.categories.index', compact('records'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cat_name' => 'required|string|max:255|unique:categories,cat_name',
        ]);
        $model = Category::create($data);
        flash()->success('Category Created Successfully');

        return redirect(route('categories.index'));
    }


    public function edit(string $id)
    {
        $model = Category::findOrFail($id);
        return view('admin.categories.edit', compact('model'));


    }


    public function update(Request $request, string $id)
    {
        $model = Category::findOrFail($id);
        $data = $request->validate([
            'cat_name' => 'required|string|max:255|unique:categories,cat_name,' . $model->id,
        ]);
        $model->update($data);
        flash()->success('Category Updated Successfully');

        return  redirect(route('categories.index'));
    }


    public function destroy(string $id)
    {
        $model = Category::findOrFail($id);


        $model->delete();
        flash('Category Deleted Successfully')->success();
        return redirect(route('categories.index'));
    }
}
