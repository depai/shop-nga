<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    //show all category
    public function index(){
        return Category::paginate(PAGE_LIMIT);
    }

    public function getAllCategories(){
        return Category::isNotParent()->get();
    }

    /* menu tree */
    public function treeView(){
        $categories = Category::where('parent_id', '=', NULL)->get();
        $tree='<ul id="browser" class="filetree">';
        foreach ($categories as $category) {
             $tree .='<li class="tree-view closed"><a class="tree-name"><b>'.$category->name.'</b></a>';
             if(count($category->childs)) {
                $tree .=$this->childView($category);
            }
        }
        $tree .='<ul>';
        return $tree;
    }
    public function childView($category){
        $html ='<ul>';
        foreach ($category->childs as $arr) {
            if(count($arr->childs)){
                $html .='<li class="tree-view closed"><a class="tree-name">- '.$arr->name.'</a>';
                $html.= $this->childView($arr);
            }else{
                $html .='<li class="tree-view"><a class="tree-name">- '.$arr->name.'</a>';
                $html .="</li>";
            }
        }

        $html .="</ul>";
        return $html;
    }
    /* end menu tree */

    //add category
    public function addCategory(CategoryRequest $request) {
        $data = $request->all();
        $category = Category::create($data);
        if ($category) {
            return response()->json([
                'status' => 200,
                'message' => 'Tạo danh mục thành công!'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Tạo danh mục thất bại!'
            ]);
        }
    }

    //edit category
    public function editCategory($id) {
        $category = Category::find($id);
        return response($category);
    }

    //update category
    public function updateCategory(CategoryRequest $request, $id) {
        $category = Category::findOrFail($id);
        if ($category) {
            $category->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật danh mục thành công!'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'error' => 'Cập nhật danh mục thất bại!'
            ]);
        }
    }

    //delete category
    public function deleteCategory($id) {
        $category = Category::find($id);
        $deleteCategory = $category->delete($id);
        if ($deleteCategory) {
            return response()->json([
                'status' => 200,
                'message' => 'Xoá danh mục thành công!'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'error' => 'Xoá danh mục thất bại!'
            ]);
        }
    }

    public function allParent() {
        $categoryParent = Category::whereNull('parent_id')->get();
        return $categoryParent;
    }

    public function childrenCate(Request $request) {
        $data = $request->all();
        $childs = Category::whereIn('parent_id', $data)->get();
        return $childs;
    }
}
