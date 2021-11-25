@extends('layout_admin')
@section('content')
    <!--? slider Area Start-->
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
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Tags <i>{{ $tag->tag_title }}</i></h1>
                                <!-- breadcrumb Start-->
                                <!-- breadcrumb End -->
                                <h4 data-animation="bounceIn" data-delay="0.2s">All Posts of Tags</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    @if (!isset($posts))
        <h3>No post attached</h3>
    @else
    <div class="container">
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                All Post
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                {{-- <th>Tag (redirect to tag page)</th> --}}
                                <th>Author</th>
                                <th>Created at</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                {{-- <th>Tag</th> --}}
                                <th>Author</th>
                                <th>Created at</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post)

                                    <td><a href="{{ URL::to('posts/' . $post->post_id) }}">{{ $post->title }}</a></td>
                                    {{-- <td>Post's tags</td> --}}
                                <td><a href={{ URL::to('users/' . $post->user_id) }}>{{$post->user->user_name}}</a>
                                    </td>
                                    <td>{{ $post->date_create }}</td>
                                    <td><a href={{ URL::to('posts/' . $post->post_id) }}>Show<a></td>
                                    <td><a href={{ URL::to('posts/delete/' . $post->post_id) }}>Destroy<a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            --}}
        </div>
    </div>
    @endif
@endsection
