@extends('layout.frontends.master')
@section('main_content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--blog area start-->
<div class="blog_page_section mt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog_wrapper">
                    <div class="blog_header">
                        <h1>Blog</h1>
                    </div>
                    <div class="row">
                        @foreach($blog as $val)
                        <div class="col-lg-6 col-md-6">
                            <article class="single_blog mb-60">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="{{URL::to('blog_details/'.$val->slug)}}"><img src="{{ asset('img/' . $val->thumbnail_img) }}" alt=""></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <h3><a href="blog-details.html">{{$val->title}}</a></h3>
                                        <div class="blog_meta">
                                            <span class="author">Posted by : <a href="">admin</a> / </span>
                                            <span class="post_date">On : <a href="">{{ date('M d, Y', strtotime($val->published_date)) }}</a></span>
                                        </div>
                                        <div class="blog_desc">
                                            <p>{!! \Illuminate\Support\Str::words($val->description, 50,'....')  !!}</p>
                                        </div>
                                        <footer class="readmore_button">
                                            <a href="{{URL::to('blog_details/'.$val->slug)}}">read more</a>
                                        </footer>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="blog_sidebar_widget">
                    <div class="widget_list widget_post">
                        <h3>Recent Posts</h3>
                        @foreach($blog as $val)
                        <div class="post_wrapper">
                            <div class="post_thumb">
                                <a href="{{URL::to('blog_details/'.$val->slug)}}"><img src="{{ asset('img/' . $val->banner_img) }}" alt=""></a>
                            </div>
                            <div class="post_info">
                                <h3><a href="{{URL::to('blog_details/'.$val->slug)}}">{{$val->title}}</a></h3>
                                <span>{{ date('M d, Y', strtotime($val->published_date)) }} </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="widget_list widget_categories">
                        <h3>Archives</h3>
                        <ul>
                            <li><a href="">August 2022</a></li>
                        </ul>
                    </div>
                    <div class="widget_list widget_categories">
                        <h3>Categories</h3>
                        <ul>
                            @foreach($blogcategories as $val)
                                <li><a href="{{$val->slug}}">{{$val->name}}</a></li> 
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget_list widget_tag">
                        <h3>Tag products</h3>
                        <div class="tag_widget">
                            <ul>
                                <li><a href="#">asian</a></li>
                                <li><a href="#">brown</a></li>
                                <li><a href="#">euro</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--blog area end-->
@endsection