@extends('layout_admin')
@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/home-page') }}" class="nav-link active">Admin
                        Page</a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('/home-page') }}" class="nav-link active">Home Page</a>
                </li>
        </ul>
    </div>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Edit tag</h1>
                                <!-- breadcrumb Start-->
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">

        <form class="form-contact comment_form" action="edit" id="commentForm" method="post">
            @csrf
            <div class="form-group">
                <label>Edit tag title:</label>
                <input class="form-control" name="title" id="title" type="text" placeholder="title" value={{ $tag->tag_title }}></br>
                <small>
                    <span>
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </small>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-secondary btn-lg" name="Edit Tag">Edit</button>
            </div>
        </form>
    </div>
    <div class="container">
        @include('admin.tags_show')
    </div>
@endsection
