<?php

namespace App\Http\Controllers\Home;

use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    // get view of all categories
    public function AllCategories()
    {
        $allCategories = Categories::all();
        return view('admin.blog.all_categories', compact('allCategories'));
    }

    //Add category view
    public function AddCategory()
    {
        return view('admin.blog.add_category');
    }

    // Store Category
    public function StoreCategory(Request $request)
    {
        $validateField = $request->validate([
            'cat_title' => 'required|min:3'
        ], [
            'cat_title.required' => 'Category title cannot be empty',
            'cat_title.min' => 'Category title must at least 3 characters'
        ]);

        Categories::create([
            'cat_title' => $request->cat_title
        ]);

        session()->flash('message', 'Category successfully created');
        return redirect(route('all_categories'));
    }

    //Edit Category
    public function EditCategory($id)
    {
        $editCategory = Categories::find($id);
        return view('admin.blog.edit_category', compact('editCategory'));
    }

    //Update Category
    public function UpdateCategory(Request $request, $id)
    {
        $validateField = $request->validate([
            'cat_title' => 'required|min:3'
        ], [
            'cat_title.required' => 'Category title cannot be empty',
            'cat_title.min' => 'Category title must at least 3 characters'
        ]);

        Categories::findOrFail($id)->update([
            'cat_title' => $request->cat_title
        ]);

        session()->flash('message', 'Category successfully updated');
        return redirect(route('all_categories'));
    }

    // Delete Category
    public function DeleteCategory($id)
    {
        Categories::findOrFail($id)->delete();
        session()->flash('message', 'Category successfully deleted');
        return redirect(route('all_categories'));
    }

    // BLOGS SECTION

    // All blogs
    public function AllBlogs()
    {
        $allBlogs = Blogs::latest()->get();
        return view('admin.blog.all_blogs', compact('allBlogs'));
    }

    //Add blog view
    public function AddBlog()
    {
        $blogs = Blogs::all();
        $categories = Categories::all();
        return view('admin.blog.add_blog', compact('categories', 'blogs'));
    }

    //Store Blog post
    public function StoreBlog(Request $request)
    {
        $validateData = $request->validate([
            'blog_title' => 'required|min:3',
            'blog_description' => 'required|min:3',
            'blog_content' => 'required',
            'blog_image' => 'required'
        ], [
            'blog_title.required' => 'Blog title cannot be empty',
            'blog_title.min' => 'Blog title must be at least three characters',
            'blog_description.required' => 'Blog description cannot be empty',
            'blog_description.min' => 'Blog description must be at least three characters',
            'blog_content.required' => 'Blog content cannot be empty',
            'blog_image' => 'Blog Image is required',
        ]);

        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(430, 327)->save('uploads/blogs/' . $imageName);
            $saveUrl = 'uploads/blogs/' . $imageName;

            Blogs::create([
                'blog_title' => $request->blog_title,
                'blog_description' => $request->blog_description,
                'blog_content' => $request->blog_content,
                'categories_id' => $request->category,
                'blog_image' => $saveUrl
            ]);

            session()->flash('message', 'Blog Successfully created');
            return redirect(route('all_blogs'));
        }
    }
}
