<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h5 class="text-white">Tag's catalog:</h5>
                    <nav class="nav flex-column">
                        @foreach($tagsCloud as $tag)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tags.show', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
                            </li>
                        @endforeach
                    </nav>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h5 class="text-white">Categories:</h5>
                    <ul>
                        @foreach($categories as $category)
                            <li class="list-group-item"><a class="nav-link" href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $category->title }}</a></li>
                            <ul>
                                @foreach($category->underCategories as $uc)
                                    @if($category->id == $uc->category_id)
                                        <li class="list-group-item"><a class="nav-link" href="">{{ $uc->title }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand d-flex flex-grow-1 align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2"
                     viewBox="0 0 24 24">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                    <circle cx="12" cy="13" r="4"/>
                </svg>
                <strong>Main page</strong>
            </a>
            <div class="p-2">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class=" text-decoration-none text-light">{{ auth()->user()->name }} | Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-link text-decoration-none text-light">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class=" text-decoration-none text-light">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-decoration-none text-light">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
            <button class="navbar-toggler p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
