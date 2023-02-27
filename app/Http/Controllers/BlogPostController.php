<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$blogs = BlogPost::all();
        
        //return $blogs[0]->title;

        //$lang = session()->get('localeDB');
// return $lang;
//         $blogs = BlogPost::select
//         ('id', DB::raw("(case when title$lang is null then title else title$lang end) as title"), DB::raw("(case when blog$lang is null then blog else blog$lang end) as blog"), 'user_id'     )
//                     ->orderby('title')
//                     ->get();

            $blog = new BlogPost;
            $blogs = $blog->selectLang();

           // return $blogs;
        
        return view('blog.index', ['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //$category =  new Category;
        //$category = $category->selectCategory();

    

       // return  $category;

        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => '',
            'title_fr' => '',
            'blog'=>'required',
            'blog_fr'=>'required',
          
            
        ]);
       
            $newPost = BlogPost::create([
                'title' => $request->title,
                'title_fr' => $request->title_fr,
                'blog'  => $request->blog,
                'blog_fr'  => $request->blog_fr,
                'user_id' => Auth::user()->id,
               
            ]);

            return redirect(route('blog.show', $newPost->id));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
           //select * from blog_posts where id = $blogPost" 

           $blog = new BlogPost;
           $post = $blog->selectLangPost($blogPost->id);


        return view('blog.show', ['blogPost' => $post[0]]);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {

                  return view('blog.edit', ['blogPost' => $blogPost, 
                                ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //update where blogPost->id  => select where blogPost->id
        $blogPost->update([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'blog'  => $request->blog,
            'blog_fr'  => $request->blog_fr,
            'user_id' => Auth::user()->id,
           
        ]);

        return redirect(route('blog.show', $blogPost->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return redirect(route('blog.index'));
    }

    public function query(){

        $query = BlogPost::Select()
                ->where('user_id', '=', 1)
                ->where('title', '=', 'Title 1')
                ->get();

        
        //OR
       //SELECT  * from blog_posts where user_id = ? OR title = ?;
       $query = BlogPost::Select()
       ->where('user_id', '=', 2)
       ->orWhere('title', '=', 'Title 1')
       ->get();

       //ORDER BY
        //SELECT  * from blog_posts ORDER BY title;
        $query = BlogPost::Select()
        //->where("user_id", ">", 2)
        ->orderBy('title', 'desc')
        ->get();

        //INNER
        //SELECT * FROM blog_posts INNER JOIN users ON user_id = users.id;
        $query = BlogPost::select()
                ->join('users', 'users.id', '=', 'user_id')
                ->get();
        
          //OUTER
        //SELECT * FROM blog_posts RIGHT OUTER JOIN users ON user_id = users.id;
        $query = BlogPost::select()
                ->rightjoin('users', 'users.id', '=', 'user_id')
                ->get();

        //aggregation

        //$query = BlogPost::max('id');
        $query = BlogPost::select()
                ->count();
        


        // Raw Query
        // SELECT count(*) as blogs, user_id  * FROM blog_posts group by user_id;
        $query = BlogPost::select(DB::raw('count(*) as blogs, user_id '))
        ->groupBy('user_id')
        ->get();


        return $query;

    }

    public function page(){
        $blogPosts = BlogPost::select()
                ->paginate(5);

                return view('blog.page', ['blogPosts' => $blogPosts]);
    }
}


