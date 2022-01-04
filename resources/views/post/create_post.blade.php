@extends('layout_user')
@section('content')
<!--? slider Area Start-->

<section class="slider-area slider-area2">
    
</section>

<div class="container">
    <div class="row">
        <div class="comment-form">
            <h4 class="title">あなたの質問</h4>
            <form class="form-contact comment_form" action="{{URL::to('/create_post')}}" id="commentForm" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <input class="form-control" name="title" id="title" type="text" placeholder="タイトル">
                            @error('title')
                            <b><span style="color: red;">{{ $message }}</span></b>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="col-xs-12 " style="display: flex;">
                            <img src="{{ asset('/user/img/logo/Vector.png') }}" alt="">
                            <label for="post_url" class="btn btn3 custom-file-upload">
                                画像をアップロード
                            </label>
                            <input type="file" name="post_url" class="file-upload" id="post_url">
                            <button  class="btn btn_ntc ">
                            誰があなたのポストを見ることができますか?
                            </label>
                        </div>
                        <div class="vspace-12-sm"></div>
                    </div>

                    <div class="col-12">
                        <div class="form-group" style="text-align: center;">
                        <h2>科目</h2>
                            @foreach($tags as $tag)
                            <label class="checkbox-inline"><input type="checkbox" name="tags[]" value="{{$tag->tag_id}}">{{$tag->tag_title}}</label>
                            @endforeach
                            <br/>
                                @error('tags')
                                <b><span style="color: red;">{{ $message }}</span></b>
                                @enderror
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" name="description" id="comment" cols="30" rows="1" placeholder="説明"></textarea>
                            @error('description')
                            <b><span style="color: red;">{{ $message }}</span></b>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">コンテンツを編集</a></li>
                            <li role="presentation"><a href="#preview" aria-controls="preview" role="tab" data-toggle="tab">プレビューの変更</a></li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <!-- Tab panes -->
                            {{-- <div class="tab-content"> --}}
                                <div role="tabpanel" class="tab-pane active" id="content">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="detail_content" id="post-content" cols="50" rows="30" placeholder="コンテンツ"></textarea>
                                        @error('detail_content')
                                        <b><span style="color: red;">{{ $message }}</span></b>
                                        @enderror
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="preview" style="padding: 40px 70px 40px 70px">
                                    <script src="https://cdn.jsdelivr.net/npm/markdown-element/dist/markdown-element.min.js"></script>
                                    <mark-down>

                                    </mark-down>
                                </div>
                            {{-- </div> --}}
                        </div>

                    </div>
                </div>
                <div class="form-group" >
                    <button type="submit" class="button button-contactForm btn_1 boxed-btn" style="background-color: #C3EF13;">ポースト</button>
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
