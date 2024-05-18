<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('sidebars.css') }}" rel="stylesheet">
    @include('admin.style')
</head>

<body>
    <main class="d-flex flex-nowrap">
        @include('admin.admin_sidebar')
        <div class="flex-shrink-0 p-3" style="width: 1400px;">
            <li class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom"></li>
            <ul class="list-unstyled ps-0">
                <h1 class="text-center">Welcome to the admin control panel, you can select an item from the menu to
                    continue
                    🎉</h1>
                <li class="border-top my-3"></li>
            </ul>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('sidebars.js') }}"></script>
</body>

</html>
