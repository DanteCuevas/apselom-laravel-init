<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJson()
    {
        $categories = Category::pluck('name', 'id');

        return response()->json([
            'data'      => $categories,
            'success'   => true
        ]);
    }
    
}
