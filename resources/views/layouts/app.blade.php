<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('/css/font-awesome.css')}})">
    <link rel="stylesheet" href="{{asset('/css/fastbootstrap.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('/css/select-input.css')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <title>{{ config('app.name', 'EPPMASTER') }}</title>

    


</head>
<body>
    <div id="app">
       <header>
            
            <div class="px-3 py-2 border-bottom mb-3">
            <div class="container d-flex flex-wrap justify-content-center">
                <div class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
                    <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                        <span class="fs-4"><strong>Agence Benin Intérim</strong></span>
                    </a>
                </div>

                <div class="text-end justify-content-end float-right">
                    <a href="{{route('missions.create')}}" class="btn btn-light text-dark me-2">Créer une nouvelle mission</a>
                    <a href="{{route('competences.index')}}" class="btn btn-primary">Gestion des compétences</a>
                </div>
            </div>
            </div>
        </header>
        <main class="py-2">
            @yield('content')
        </main>
    </div>

    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/multi-select.js')}}"></script>
    {{-- <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script> --}}
    <script src="{{asset('/js/fastbootstrap.min.js')}}"></script>

    @include('partials.script')
</body>
</html>
