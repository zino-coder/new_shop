<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with((['parent']))->paginate(10);
        $parentCate = Category::where('parent_id', '=', 0)->get();

        return view('admin.category.index', ['categories' => $categories, 'parentCategories' => $parentCate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();

        $category->create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'parent_id' => $request->input('parent_id'),
            'status' => $request->input('status') ? 1 : 0,
        ]);

        return redirect()->route('categories.index')->with('success', 'Create Category Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parentCate = Category::where('parent_id', '=', 0)->get();
        $category = Category::where('id', $id)->first();

        return view('admin.category.edit', ['parentCategories' => $parentCate, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
            'status' => $request->status ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Update Category Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->delete();

        return redirect()->route('categories.index')->with('success', 'Delete category successfully!');
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');

        $category = Category::find($id);
        $category->update([
            'status' => $request->input('status') == 'true' ? 1 : 0,
        ]);
        $message = array('message' => 'Success!', 'name' => $category->name);

        return response()->json($message);
    }
}
