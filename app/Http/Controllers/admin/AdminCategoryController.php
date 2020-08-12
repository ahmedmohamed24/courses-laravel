<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\traits\ImageUploader;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    use ImageUploader;
    public function getCats()
    {
        $cats = Category::paginate(9);
        return view('admin.cats', ["cats" => $cats]);
    }
    public function createCat()
    {
        return view('admin.createCat');
    }
    public function saveCat(Request $request)
    {
        $request->validate([
            'name' => 'string|max:100|required|unique:categories,name',
            'img' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $newName = $this->upload($request->file('img'), 'uploads/categories');
        Category::create(['name' => $request->name, 'img' => $newName]);
        $request->session()->flash('isUploaded', true);
        return redirect(route('admin.createCategory'));
    }

    public function catEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.catEdit', ['category' => $category]);
    }
    public function catUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'img' => 'nullable|mimes:png,jpg,jpeg|image',
            'id' => 'numeric'
        ]);
        if ($request->hasFile('img')) {
            //delete old image
            $oldName = Category::findOrFail($request->id)->img;
            unlink(public_path('uploads/categories/') . $oldName);
            //upload new image
            $newName = $this->upload($request->file('img'), 'uploads/categories');
            Category::findOrFail($request->id)->update(['name' => $request->name, 'img' => $newName]);
        } else
            Category::findOrFail($request->id)->update(['name' => $request->name]);
        $request->session()->flash('isUpdated', true);
        return redirect(route('admin.catEdit', $request->id));
    }
    public function catDelete($id)
    {
        $hasCourses = Course::where("cat_id", '=', $id)->get();
        if (count($hasCourses) === 0) {
            Category::findOrFail($id)->delete();
            session()->flash('isDeleted', true);
        } else {
            session()->flash('isNotDeleted', true);
        }
        $cats = Category::paginate(9);
        return redirect(route('admin.cats'));
    }
}
