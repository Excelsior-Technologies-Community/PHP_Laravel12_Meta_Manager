<!DOCTYPE html>
<html>
<head>
    <title>SEO Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        SEO Analytics Dashboard
    </h2>

    <div class="row">

        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Total Pages</h5>
                    <h2>{{ $totalPages }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Missing Titles</h5>
                    <h2>{{ $missingTitle }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Missing Description</h5>
                    <h2>{{ $missingDescription }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5>SEO Score</h5>
                    <h2>{{ $seoScore }}%</h2>
                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>