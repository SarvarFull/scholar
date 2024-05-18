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
            <div class="col-10 offset-10">
                <a href="{{ route('slider.view') }}" class="btn btn-primary">Back to View
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
                    </svg>
                </a>
            </div>
            <li class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom"></li>
            {{-- @foreach ($sliderss as $sliders) --}}
            <img src="{{ asset($sliders->image) }}" style="border-radius:5%;" width="200px" height="200px"
                class="img-fluid" alt="{{ asset($sliders->image) }}">
            <ul class="list-unstyled ps-0">
                <div class="col-9 p-3">
                    <form action="{{ route('slider.update', $sliders->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="file" name="image"
                                class="form-control @error('image') in-valid @enderror">
                            @error('image')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" name="title" value="{{ $sliders->title }}"
                                class="form-control @error('image') in-valid @enderror" value="{{ old('title') }}">
                            @error('title')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" name="content" value="{{ $sliders->content }}"
                                class="form-control @error('image') in-valid @enderror" value="{{ old('content') }}">
                            @error('content')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning">Save Changes</button>
                    </form>
                </div>
                <li class="border-top my-3"></li>
            </ul>
            {{-- @endforeach --}}
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('sidebars.js') }}"></script>
</body>

</html>
