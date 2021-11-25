<!-- DataTables Example -->
<div class="card mb-3 edus-content-item-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        All Tags
        <div class="float-right"><a href="{{ URL::to('tags/new') }}"><button class="btn btn-outline-secondary btn-sm">Add new tag</button></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tag name</th>
                        <th>Posts</th>
                        <th>Detail</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tag name</th>
                        <th>Posts</th>
                        <th>Detail</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td><a href="{{ URL::to('tags/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a></td>
                            <td>{{ $tag->posts->count() }}</td>
                            <td><a class="btn btn-primary btn-sm" href={{ URL::to('tags/' . $tag->tag_id) }}>Show all post</a></td>
                            <td><a class="btn btn-primary btn-sm" href={{ URL::to('tags/' . $tag->tag_id) . '/edit' }}>Edit</a></td>
                            <td><a class="btn btn-danger btn-sm" href={{ URL::to('tags/delete/' . $tag->tag_id) }}  onclick="return alert_delete('Are you sure to delete?');">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function alert_delete($message) {
        if(!confirm($message))
        event.preventDefault();
    }
</script>
