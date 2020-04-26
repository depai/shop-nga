<div class="sticky-wrapper" id="mainmenu-sticky-wrapper">
    <header style="" class="header">
        <nav class="navbar navbar-custom" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="custom-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ route('home') }}">
                                <i class="fa fa-home fa-lg fa-fw"></i>
                                Trang chủ</a></li>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('categories.show', $category->id) }}">
                                    {{ $category->name }}</a>
                            </li>
{{--                            <li class="dropdown">--}}
{{--                                <a href="{{ route('home') }}" class="dropdown-toggle " data-toggle="dropdown" aria-expanded="true">--}}
{{--                                    {{ $category->name }}</a>--}}
{{--                                @foreach($category->childs as $child)--}}
{{--                                    <ul class="dropdown-menu ">--}}
{{--                                        <li><a href="{{ route('home') }}">{{ $child->name }}</a></li>--}}
{{--                                    </ul>--}}
{{--                                @endforeach--}}
{{--                            </li>--}}
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</div>
