<?php

namespace App\Http\Controllers\Web;
use App\Helpers\UrlGen;
use Larapen\LaravelMetaTags\Facades\MetaTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends FrontController
{
      /**
     * Display the courses page.
     */
    public function index()
    {
               		// Meta Tags
		[$title, $description, $keywords] = getMetaTag('contact');
		MetaTag::set('title', $title);
		MetaTag::set('description', strip_tags($description));
		MetaTag::set('keywords', $keywords);

        return view('courses.index');
    }
}
