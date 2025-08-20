<?php
namespace App\Controllers;
use App\Models\Category;
class CategoryController extends BaseController
{
    public static function list()
    {
        $categories = Category::all();
        self::loadView('categories/list', ['categories' => $categories]);
    }
    public static function create()
    {
        self::loadView('categories/create');
    }
    public static function store()
    {
        $name = trim($_POST['name'] ?? '');
        if ($name) {
            Category::create(['name' => $name]);
            self::redirect('/categories');
        } else {
            self::loadView('categories/create', ['error' => 'Name is required.']);
        }
    }
    public static function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            self::loadView('errors/404', ['title' => 'Category Not Found']);
            return;
        }
        self::loadView('categories/edit', ['category' => $category]);
    }
    public static function update($id)
    {
        $category = Category::find($id);
        $name = trim($_POST['name'] ?? '');
        if ($category && $name) {
            $category->name = $name;
            $category->save();
            self::redirect('/categories');
        } else {
            self::loadView('categories/edit', ['category' => $category, 'error' => 'Name is required.']);
        }
    }
    public static function delete($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
        }
        self::redirect('/categories');
    }
}
