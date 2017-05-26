<title>The Beershop - {{ $title }}</title>
@php
    $categories = App\categorie::all();
@endphp
@section('navigation')
    <nav id="header">
        <ul>
            <li><img src="{{ URL::asset('assets/header.png') }}" width="250px" height="40px"></li>
            <li><a href="{{URL::route('home')}}"><b>Home</b></a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn"><b>Categories</b></a>
                <div class="dropdown-content">
                    @foreach($categories as $cat)
                        @php
                            $route = "/category/".$cat->id;
                            echo "<a href='".$route."'>".$cat->name." </a>"
                        @endphp
                    @endforeach
                </div>
            </li>
            <li><a href="/"><b>Compare</b></a></li>
        </ul>
    </nav>
@show
