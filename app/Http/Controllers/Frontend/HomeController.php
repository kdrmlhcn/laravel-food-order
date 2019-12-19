<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $slides = Slider::all();

        return view('frontend.home', compact('categories', 'slides'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function menu()
    {
        $categories = Category::all();

        return view('frontend.menu', compact('categories'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
