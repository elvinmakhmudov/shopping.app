<?php namespace App\Http\Composers;

use App\Shop\Models\Category;

class SidebarComposer
{

    public function compose($view)
    {
        $categories = $this->getCategories();

        $view->with('categories', $categories);
    }

    public function getCategories()
    {
        $categories = Category::with('products')->get();

        //convert them to tree
        return $categories->linkNodes()->toTree();
    }

}