@extends('layout_user')
@section('content')
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                            <div class="hero__caption hero__caption2">
                                <div class="row">
                                    <div class="col-sm-8"><h1 data-animation="bounceIn" data-delay="0.2s"><img src="{{asset('/user/img/hero/image1.png')}}" alt="" ></h1></div>

                                    <div class="col-sm-4">
                                        <a class="btn_1_1" href="{{ URL::to('create_post') }}" > 投稿しましょう！</a>
                                    </div>
                                    </div>

                            </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses area start -->
    <div class="courses-area fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center">
                        <h2>{{$title}}</h2>
                    </div>
                </div>
            </div>

            <div class="row d-flex flex-column" id="table_data">
                @include('post.post_data')
                <div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>

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
                    success:function(data)
                    {
                        console.log("data is "+data)
                        $('#table_data').html(data);
                    }
                });
            }

        });
    </script>
@endsection
