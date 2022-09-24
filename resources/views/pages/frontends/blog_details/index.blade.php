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
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--blog body area start-->
<div class="blog_details mt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <!--blog grid area start-->
                <div class="blog_wrapper">
                    <article class="single_blog">
                        <figure>
                            <div class="post_header">
                                <h3 class="post_title">{{$BlogData->title}}</h3>
                                <div class="blog_meta">
                                    <span class="author">Posted by : <a href="">admin</a> / </span>
                                    <span class="post_date">On : <a href="">{{ date('M d, Y', strtotime($BlogData->published_date)) }}</a> /</span>
                                    <span class="post_category">In : <a href="">Company, Image, Travel</a></span>
                                </div>
                            </div>
                            <div class="blog_thumb">
                                <a href=""><img src="{{ asset('img/' . $BlogData->thumbnail_img) }}" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <div class="post_content">
                                    <p>{{$BlogData->meta_title}}</p>
                                    <blockquote>
                                        <p>{{$BlogData->meta_title}}</p>
                                    </blockquote>
                                    <p>{!! $BlogData->description !!}</p>
                                </div>
                                <div class="entry_content">
                                    <div class="post_meta">
                                        <span>Tags: </span>
                                        <span><a href="#">, fashion</a></span>
                                        <span><a href="#">, t-shirt</a></span>
                                        <span><a href="#">, white</a></span>
                                    </div>

                                    <div class="social_sharing">
                                        <p>share this post:</p>
                                        <ul>
                                            <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </article>

                    <div class="related_posts">
                        <h3>Related posts</h3>
                        <div class="row">
                            @foreach($blog as $val)
                            <div class="col-lg-4 col-md-6">
                                <article class="single_related">
                                    <figure>
                                        <div class="related_thumb">
                                            <img src="{{ asset('img/' . $val->thumbnail_img) }}" alt="">
                                        </div>
                                        <figcaption class="related_content">
                                            <div class="blog_meta">
                                                <span class="author">By : <a href="{{URL::to('blog_details/'.$val->slug)}}">admin</a> / </span>
                                                <span class="post_date">{{ date('M d, Y', strtotime($BlogData->published_date)) }}</span>
                                            </div>
                                            <h4><a href="{{URL::to('blog_details/'.$val->slug)}}">{{$val->title}}</a></h4>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="comments_box">
                        <h3>Comments </h3>
                        @foreach($comments as $val)
                            <div class="comment_list">
                                <div class="comment_thumb">
                                    <img src="{{url('frontends/assets/img/blog/comment3.png.jpg')}}" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">{{$val->name}}</a></h5>
                                        <span>October 16, 2018 at 1:38 am</span>
                                    </div>
                                    <p>{{$val->comments}}</p>

                                    <div class="comment_reply">
                                        <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#comment_reply{{$val->id}}"
                                        aria-expanded="true">Reply</a>
                                    </div>

                                    <div class="user-actions">
                                        <div id="comment_reply{{$val->id}}" class="collapse" data-parent="#accordion">
                                            <div class="comments_form">
                                                <form action="{{url('comment-post')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="hidden" value="{{$BlogData->id}}" id="cmbBlogId" name="cmbBlogId" >
                                                            <input type="hidden" value="{{$val->id}}" id="txtReplyId" name="txtReplyId" >
                                                            <textarea name="txtComment" id="txtComment"></textarea>
                                                        </div>
                                                    </div>
                                                    <button class="button" type="submit"> <span>Post Reply</span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><br> 
                            </div>
                            @php
                                $reply = App\Models\Comment::where("reply_id",$val->id)
                                ->join('users','users.id', '=', 'comments.user_id')
                                ->select('users.name', 'comments.*')->get();
                            @endphp
                            @foreach($reply as $data)
                           
                            <div class="comment_list list_two">
                                <div class="comment_thumb">
                                    <img src="{{url('frontends/assets/img/blog/comment3.png.jpg')}}" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">{{$data->name}}</a></h5>
                                        <span>October 16, 2018 at 1:38 am</span>
                                    </div>
                                    <p>{{$data->comments}}</p>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                    
                    <div class="comments_form">
                        <h3>Leave a Reply </h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form action="{{url('comment-post')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" value="{{$BlogData->id}}" id="cmbBlogId" name="cmbBlogId" >
                                    <label for="review_comment">Comment </label>
                                    <textarea name="txtComment" id="txtComment"></textarea>
                                </div>
                            </div>
                            <button class="button" type="submit"> <span>Post Comment</span></button>
                        </form>
                    </div>
                </div>
                <!--blog grid area start-->
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="blog_sidebar_widget">
                    <div class="widget_list widget_search">
                        <h3>Search</h3>
                        <form action="#">
                            <input placeholder="Search..." type="text">
                            <button type="submit">search</button>
                        </form>
                    </div> 
                    <div class="widget_list comments">
                        <h3>Recent Comments</h3>
                        @foreach($comments as $val)
                        <div class="post_wrapper">
                            <div class="post_thumb">
                                <a href=""><img src="{{url('frontends/assets/img/blog/comment2.png.jpg')}}" alt=""></a>
                            </div>
                            <div class="post_info">
                                <span><a href="">{{$val->name}}</a> says:</span>
                                <a href="">{{ \Illuminate\Support\Str::limit($val->comments, 20, $end='...') }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div class="widget_list widget_post">
                        <h3>Recent Posts</h3>
                        @foreach($blog as $val)
                        <div class="post_wrapper">
                            <div class="post_thumb">
                                <a href="{{URL::to('blog_details/'.$val->slug)}}"><img src="{{ asset('img/' . $val->banner_img) }}" alt=""></a>
                            </div>
                            <div class="post_info">
                                <h3><a href="{{URL::to('blog_details/'.$val->slug)}}">{{$val->title}}</a></h3>
                                <span>{{ date('M d, Y', strtotime($BlogData->published_date)) }} </span>
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
<!--blog section area end-->
@endsection