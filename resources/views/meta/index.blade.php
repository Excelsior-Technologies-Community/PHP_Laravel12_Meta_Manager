<!DOCTYPE html>
<html>

<head>
    <title>Meta Tags</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <div class="d-flex justify-content-between">

            <h2>Meta Tags</h2>

            <a href="/meta-tags/create"
                class="btn btn-success">
                Add Meta Tag
            </a>

        </div>

        <table class="table table-bordered mt-3">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Page</th>
                    <th>Slug</th>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @foreach($metaTags as $meta)

                <tr>
                    <td>{{ $meta->id }}</td>
                    <td>{{ $meta->page_name }}</td>
                    <td>{{ $meta->slug }}</td>
                    <td>{{ $meta->meta_title }}</td>
                    <td>
                        {{ $meta->status ? 'Active' : 'Inactive' }}
                    </td>
                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</body>

</html>