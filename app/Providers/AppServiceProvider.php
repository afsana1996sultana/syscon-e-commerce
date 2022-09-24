<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Menuvisibility;
use App\Models\Submenu;
use App\Models\Topbarcontact;
use App\Models\Footer;
use App\Models\Firstcolumnlink;
use App\Models\Secondcolumnlink;
use App\Models\Sociallink;
use App\Models\Products;
use App\Models\Blog;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view)
       {
        $data=Category::all(); 
        View::share('categories', $data);
       });


       View::composer('*', function($view1)
       {
        $data=Subcategory::all(); 
        View::share('subcategories', $data);
       });


       View::composer('*', function($view2)
       {
        $data=Childcategory::all(); 
        View::share('childcategories', $data);
       });

       View::composer('*', function($view3)
       {
        $data=Menuvisibility::all(); 
        View::share('visibility', $data);
       });

       View::composer('*', function($view4)
       {
        $data=Topbarcontact::all(); 
        View::share('topbarcontact', $data);
       });

       View::composer('*', function($view5)
       {
        $data=Submenu::all(); 
        View::share('submenu', $data);
       });

       View::composer('*', function($view6)
       {
        $data=Footer::all(); 
        View::share('footer', $data);
       });

       View::composer('*', function($view7)
       {
        $data=Firstcolumnlink::all(); 
        View::share('firstcolumnlink', $data);
       });

       View::composer('*', function($view8)
       {
        $data=Secondcolumnlink::all(); 
        View::share('secondcolumnlink', $data);
       });

       Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('M d/y @ h:ma'); ?>";
        });


    }

    public function product_details(Request $request){

        $data['ProductData'] = Products::where('products.slug',$request->slug)
        ->join('categories','categories.id', '=', 'products.category')
        ->join('brands','brands.id', '=', 'products.brand')
        ->select('categories.c_name', 'brands.name', 'products.*')
        ->first();

         return view('pages.frontends.product-details.index', $data);

    }

    public function blog_details(Request $request){

        $data['BlogData'] = Blog::where('blogs.slug',$request->slug)
        ->join('blogcategories','blogcategories.id', '=', 'blogs.category')
        ->select('blogcategories.name', 'blogs.*')
        ->first();

        return view('pages.frontends.blog_details.index', $data);
    }
}
