<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEO Meta Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #0f172a;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .dashboard-card {
            background: #1e293b;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .4);
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #94a3b8;
        }

        .btn-add {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            color: white;
            font-weight: 600;
        }

        .btn-add:hover {
            color: white;
        }

        .search-box {
            height: 55px;
            background: #0f172a;
            border: 1px solid #334155;
            color: white;
        }

        .search-box::placeholder {
            color: #94a3b8;
        }

        .search-box:focus {
            background: #0f172a;
            color: white;
            border-color: #6366f1;
            box-shadow: none;
        }

        .btn-search {
            height: 55px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            font-weight: 600;
        }

        .table-wrapper {
            background: #1e293b;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .4);
        }

        table {
            width: 100%;
            margin: 0;
            background: #1e293b !important;
            color: white !important;
        }

        thead {
            background: #0f172a;
        }

        thead th {
            color: #f8fafc !important;
            border-bottom: 1px solid #334155 !important;
            padding: 20px !important;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tbody tr {
            background: #1e293b !important;
            transition: .3s;
        }

        tbody tr:hover {
            background: #273549 !important;
        }

        tbody td {
            color: #e2e8f0 !important;
            padding: 20px !important;
            border-top: 1px solid #334155 !important;
            vertical-align: middle;
        }

        code {
            background: #0f172a;
            color: #60a5fa;
            padding: 6px 10px;
            border-radius: 8px;
        }

        .badge-active {
            background: #16a34a;
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 13px;
        }

        .badge-inactive {
            background: #dc2626;
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 13px;
        }

        .btn-delete {
            border-radius: 10px;
        }

        .pagination .page-link {
            background: #1e293b;
            color: white;
            border-color: #334155;
        }

        .pagination .active .page-link {
            background: #6366f1;
            border-color: #6366f1;
        }

        .pagination .page-link:hover {
            background: #334155;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="dashboard-card mb-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h1 class="page-title">
                        🚀 SEO Meta Manager
                    </h1>

                    <p class="page-subtitle">
                        Manage SEO Meta Tags Professionally
                    </p>
                </div>

                <a href="/meta-tags/create" class="btn btn-add">
                    + Add Meta Tag
                </a>

            </div>

        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="dashboard-card mb-4">

            <form method="GET" action="/meta-tags">

                <div class="row g-3">

                    <div class="col-md-10">

                        <input type="text" name="search" class="form-control search-box"
                            placeholder="Search by Page Name or Meta Title..." value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-search w-100">
                            Search
                        </button>

                    </div>

                </div>

            </form>

        </div>

        <div class="table-wrapper">

            <table class="table table-dark align-middle">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Page Name</th>
                        <th>Slug</th>
                        <th>Meta Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($metaTags as $meta)

                        <tr>

                            <td>#{{ $meta->id }}</td>

                            <td>{{ $meta->page_name }}</td>

                            <td>
                                <code>{{ $meta->slug }}</code>
                            </td>

                            <td>{{ $meta->meta_title }}</td>

                            <td>
                                @if($meta->status)
                                    <span class="badge-active">
                                        Active
                                    </span>
                                @else
                                    <span class="badge-inactive">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <td>

                                <form action="/meta-tags/{{ $meta->id }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete this Meta Tag?')"
                                        class="btn btn-danger btn-sm btn-delete">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-5">
                                No Meta Tags Found
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        @if($metaTags->lastPage() > 1)

            <div class="d-flex justify-content-center mt-4">

                <ul class="pagination">

                    @for($i = 1; $i <= $metaTags->lastPage(); $i++)

                        <li class="page-item {{ $metaTags->currentPage() == $i ? 'active' : '' }}">

                            <a class="page-link" href="{{ $metaTags->url($i) }}">

                                {{ $i }}

                            </a>

                        </li>

                    @endfor

                </ul>

            </div>

        @endif

    </div>

</body>

</html>