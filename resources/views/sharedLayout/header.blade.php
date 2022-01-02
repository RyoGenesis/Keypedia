<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid px-5 mx-4">
            <div>
                <a class="navbar-brand" href="/">KEYPEDIA</a>
            </div>  
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapsed" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapsed">
                <ul class="ms-auto navbar-nav mb-2 mb-lg-0">
                    @guest         
                    
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('login.index') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('register.index') }}">Register</a>
                    </li>
                    @endguest                   
                   
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item" href="{{ url('categories/'.$category->id)}}">{{$category->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->username}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role->role_name == "Manager")
                                <li><a class="dropdown-item" href="{{ route('keyboard.add.index') }}">Add Keyboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('category.add.index') }}">Add Category</a></li>
                                <li><a class="dropdown-item" href="{{ route('category.manage') }}">Manage Categories</a></li>                             
                            @endif

                            @if(Auth::user()->role->role_name == "Customer")
                                <li><a class="dropdown-item" href="{{ route('cart-index') }}">My Cart</a></li>
                                <li><a class="dropdown-item" href="{{ route('my-transaction') }}">Transaction History</a></li>
                            @endif

                                <li><a class="dropdown-item" href="{{ route('change-pass.index') }}">Change Password</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>  
                    @endauth
                    <p class="navbar-text ms-2 mb-0">@php date_default_timezone_set('Asia/Jakarta'); echo date("D, d-M-Y"); @endphp</p>     
                </ul>
            </div>
        </div>
    </nav>
</header>

