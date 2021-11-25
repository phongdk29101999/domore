<!-- DataTables Example -->
<div class="card mb-3 edus-content-item-2">
    <div class="card-header">
        <i class="fas fa-table"></i>
        All Post
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        {{-- <th>Tag</th> --}}
                        <th>Author</th>
                        <th>Created at</th>
                        <th>Detail</th>
                        <th>Actions</th>
                </thead>
                <tfoot>
                    <tr>
                        <th>Title</th>
                        {{-- <th>Tag</th> --}}
                        <th>Author</th>
                        <th>Created at</th>
                        <th>Detail</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($posts as $post)

                            <td><a href="{{ URL::to('posts/' . $post->post_id) }}">{{ $post->title }}</a></td>
                            {{-- <td>Post's tags</td> --}}
                        <td><a href={{ URL::to('users/' . $post->user_id) }}>{{$post->user->user_name}}</a>
                            </td>
                            <td>{{ $post->date_create }}</td>
                            <td><a class="btn btn-primary btn-sm" href={{ URL::to('posts/' . $post->post_id) }}>Show</a></td>
                            <td><a class="btn btn-danger btn-sm" href={{ URL::to('posts/delete/' . $post->post_id) }} onclick="return alert_delete('Are you sure to delete?');">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    --}}
</div>
