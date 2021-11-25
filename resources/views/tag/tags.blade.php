@extends('layout_admin')
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
                                <h1 data-animation="bounceIn" data-delay="0.2s">All {{$tag->tag_title}} Tags</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home Page</a></li>
                                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/home-page') }}">Control
                                                Page</a></li>
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

    @if (!isset($data))
        <h3>Empty Tag</h3>
    @else
        <!-- Courses area start -->
        <div class="courses-area section-padding40 fix">
            <div class="container">
                <div class="row d-flex flex-column" id="table_data">
                    @include('tag.tag_data')
                </div>
            </div>
        </div>
        <!-- Courses area End -->

        <script>
            $(document).ready(function() {
                $(document).on('click', '.pagination a', function(event) {
                    event.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    fetch_data(page);
                });

                function fetch_data(page) {
                    $.ajax({
                        url: "?page=" + page,
                        success: function(data) {
                            $('#table_data').html(data);
                        }
                    });
                }

            });

        </script>
    @endif
@endsection
