<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-primary">
                <div class="container">
                    <a href="{{ route('home') }}"
                        @if (request()->routeIs('home'))
                            class="navbar-brand text-white"
                        @else
                            class="navbar-brand text-black"
                        @endif
                    >Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}"
                                    @if(request()->routeIs('admin.dashboard'))
                                        class="nav-link text-white fw-bold"
                                    @else
                                        class="nav-link"
                                    @endif
                                    >Admin Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.projects.index') }}"
                                    @if(request()->routeIs('admin.projects.index'))
                                        class="nav-link text-white fw-bold"
                                    @else
                                        class="nav-link"
                                    @endif
                                    >Go to all projects
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.types.index') }}"
                                    @if(request()->routeIs('admin.types.index'))
                                        class="nav-link text-white fw-bold"
                                    @else
                                        class="nav-link"
                                    @endif
                                    >Go to all types
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.technologies.index') }}"
                                    @if(request()->routeIs('admin.technologies.index'))
                                        class="nav-link text-white fw-bold"
                                    @else
                                        class="nav-link"
                                    @endif
                                    >Go to all technologies
                                </a>
                            </li>
                        </ul>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-outline-danger">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-4">
            <div class="container">
                @yield('main-content')
            </div>
        </main>
    </body>
</html>
