@extends('layout_user')
@section('content')
<!--? slider Area Start-->
<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">{{$post->title}}</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{URL::to('/posts')}}">All Blog</a></li>
                                </ol>
                            </nav>
                            <!-- breadcrumb End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="comment-form">
            <h4>Your blog</h4>
            <form class="form-contact comment_form" action="{{URL::to('/edit/'.$post->post_id)}}" id="commentForm" method="post" enctype="multipart/form-data" onsubmit="return validateData()">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input class="form-control" name="title" id="title" type="text" placeholder="Title" value="{{$post->title}}" >
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="col-xs-12 col-sm-8">
                            <label for="post_url" class="btn btn3 custom-file-upload">
                                 Upload cover image
                            </label>

                            <input type="file" name="post_url" class="file-upload" id="post_url">
                            {{-- <input type="file" name="post_url" id="post_url"> --}}
                        </div>
                        <div class="vspace-12-sm"></div>
                    </div>

                    <div class="col-12">
                        <p>Tags</p>
                        <div class="form-group">
                            @foreach($tags as $tag)
                            <label class="checkbox-inline" >
                                @if(in_array($tag->tag_id, $selected_tags_array))
                                    <input type="checkbox" name="tags[]" value="{{$tag->tag_id}}" checked><b>{{$tag->tag_title}}</b>
                                @else
                                    <input type="checkbox" name="tags[]" value="{{$tag->tag_id}}">{{$tag->tag_title}}
                                @endif
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" name="description" id="comment" cols="30" rows="1" placeholder="Description">{{$post->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">Edit content</a></li>
                            <li role="presentation"><a href="#preview" aria-controls="preview" role="tab" data-toggle="tab">Preview changes</a></li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <!-- Tab panes -->
                            {{-- <div class="tab-content"> --}}
                                <div role="tabpanel" class="tab-pane active" id="content">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="detail_content" id="post-content" cols="50" rows="30" placeholder="Content">{{$post->content}}</textarea>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="preview" style="padding: 40px  70px 40px 70px">
                                    <script src="https://cdn.jsdelivr.net/npm/markdown-element/dist/markdown-element.min.js"></script>
                                    <mark-down >
                                        {{$post->content}}
                                    </mark-down>
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#post-content").change(function(){
            $("mark-down").html($(this).val())
        });
    });

    function validateData(){
        var tags = document.getElementsByName('tags[]');
        for(let i = 0; i < tags.length; i++){
            if(tags[i].checked)
                return true;
        }
        alert("Please choose tag");
        return false;
    }
</script>
@endsection
