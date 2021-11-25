<div class="row justify-content-center">
    @foreach ($data as $tag)
        <div class="col-lg-4">
            <div class="properties properties2 mb-30">
                <div class="properties__card">
                    <div class="properties__caption">
                        <h3>{{ $tag->tag_title }}</h3>
                        <a href="{{ URL::to('admin/tags/' . $tag->tag_id) }}" class="border-btn border-btn2">Read
                            more</a>
                        <a href="{{URL::to('/admin/tags/delete/' . $tag->tag_id) }}" class="border-btn border-btn2">Delete this tag </div>
                    </div>
                </div>
            </div>
    @endforeach
</div>

{!! $data->links() !!}
