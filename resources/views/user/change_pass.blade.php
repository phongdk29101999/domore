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
                                <h1 data-animation="bounceIn" data-delay="0.2s">Change password</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">All Blog</a></li>
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
            <div class="col-12">
                <div class="comment-form">

                    <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="form-group">
                            <input class="form-control" name="password" id="password" type="text" placeholder="Current Password">
                        </div>


                        <div class="form-group">
                            <input class="form-control" name="password" id="password" type="text" placeholder="New Password">
                        </div>


                        <div class="form-group">
                            <input class="form-control" name="password2" id="password2" type="text" placeholder="Confirm password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="button button-contactForm btn_1 boxed-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
