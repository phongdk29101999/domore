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
                            <h1 data-animation="bounceIn" data-delay="0.2s">All {{$user->user_name}}'s posts</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{URL::to('/posts')}}">All post</a></li>
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

    <!-- Courses area start -->
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <?php
                            $title = Session::get("title");
                            if($title){
                                echo "<h2>$title</h2>";
                                Session::put("title",null);
                            }else{
                                echo "<h2>Posts</h2>";
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row d-flex flex-column" id="table_data">
                <div class="row justify-content-center">
                    @foreach($posts as $post)
                        <div class="col-lg-4">
                            <div class="properties properties2 mb-30">
                                <div class="properties__card">
                                    <div class="properties__caption">
                                        <h3>{{$post->title}}</h3>
                                        <p>{{$post->description}}</p>
                                        <a href="{{URL::to('/posts/'.$post->post_id)}}" class="border-btn border-btn2">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <!-- Courses area End -->

    <script>
        $(document).ready(function(){

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"?page="+page,
                    success:function(posts)
                    {
                        $('#table_data').html(posts);
                    }
                });
            }

        });
    </script>
@endsection
