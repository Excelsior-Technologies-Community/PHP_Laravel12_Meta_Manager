<!DOCTYPE html>
<html>

<head>
    <title>Create Meta Tag</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2>Create SEO Meta Tag</h2>

        @if(session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
        @endif

        <form action="/meta-tags" method="POST">
            @csrf

            <div class="mb-3">
                <label>Page Name</label>
                <input type="text"
                    name="page_name"
                    id="page_name"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text"
                    name="meta_title"
                    id="meta_title"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="meta_description"
                    id="meta_description"
                    class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Keywords</label>
                <input type="text"
                    name="meta_keywords"
                    class="form-control">
            </div>

            <button class="btn btn-primary">
                Save Meta Tag
            </button>
        </form>

        <hr>

        <h3>Google Search Preview</h3>

        <div class="border p-3 rounded">

            <h4 id="preview_title"
                style="color:#1a0dab">
                Home Page Title
            </h4>

            <p style="color:green"
                id="preview_url">
                www.yoursite.com/home
            </p>

            <p id="preview_description">
                Meta description preview appears here...
            </p>

        </div>

    </div>

    <script>
        document.getElementById('meta_title')
            .addEventListener('keyup', function() {

                document.getElementById('preview_title')
                    .innerText = this.value;
            });

        document.getElementById('page_name')
            .addEventListener('keyup', function() {

                document.getElementById('preview_url')
                    .innerText =
                    'www.yoursite.com/' +
                    this.value.toLowerCase().replaceAll(' ', '-');
            });

        document.getElementById('meta_description')
            .addEventListener('keyup', function() {

                document.getElementById('preview_description')
                    .innerText = this.value;
            });
    </script>

</body>

</html>