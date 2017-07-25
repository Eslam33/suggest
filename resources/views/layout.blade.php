<!DOCTYPE html>
<html lang="en">
<head>
    <title>Suggestions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="token" name="token" value="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--fonts-->
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Habibi' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:900' rel='stylesheet' type='text/css'>

    <!--style.css-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!-- ptivate script-->

    <script src="{{ asset('js/myscript.js') }}"></script>


</head>
<body>
<!--///header-->
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <h1 class="text1"> Suggestion </h1>
            </div>
            <div class="col-sm-6">
                <form>
                    <input type="text" class="search-text" name="search" placeholder="Search..">
                </form>
            </div>
            <div class="col-sm-4 user-nav-bar">
                <ul class="user-nav-bar-ul" >
                    <li class="text2">
                        <a href="{{ url('/profile') }}"><img src="/images/img_avatar3.png" class="media-object img-circle" style="width:40px;height: 40px;">
                        </a>
                    </li>
                    <li class="text2">
                        <h4 class="text1"><a href="#"><span class="glyphicon glyphicon-home"></span></a></h4>
                    </li>
                    <li class="text2">
                        <h4 class="text1"><a href="#"><span class="glyphicon glyphicon-bell"></span></a></h4>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right user-buttons">
                                <li><a href="{{ url('/profile') }}">Profile</a></li>
                                <li><a href="#">Settings</a></li>
                                <li class="divider"></li>
                                <!--<li><a href="#">Logout</a></li>-->
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--///header-->
<!--start-Content-->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="who-to-follow">
                    <h4 class="who-to-follow-title">Who to follow </h4>
                    <hr>
                    <ul>
                        <li>
                            <div class="media">
                                <div class="media-left">
                                    <a href=""><img src="/images/img_avatar3.png" class="media-object img-circle" style="width:60px">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="Profile.html">gaga </a></h3>
                                    <span class="sug2">Followed By </span><a href="">Hessien Ahmed</a>
                                    <br> <button class="btn btn-default follow-button">Follow</button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-left">
                                    <a href=""><img src="/images/img_avatar2.png" class="media-object img-circle" style="width:60px">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="Profile.html">kota </a></h3>
                                    <span class="sug2">Followed By </span><a href="">Hessien Ahmed</a>
                                    <br> <button class="btn btn-default follow-button">Follow</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <br>
                <!--trends-->
                <div class="trends">
                    <h4 class="trends-title">Trends</h4>
                    <hr>
                    <ul>
                        <li>
                            <a href="topic.html"><h5 class="text4">@Web_development</h5><span class="sug3">1.4 Suggestions </span></a>
                            <br> <button class="btn btn-default interested-button">interested</button>
                        </li>
                        <li>
                            <a href="topic.html"><h5 class="text4">@Web_design</h5><span class="sug3">2.5 Suggestions </span></a>
                            <br> <button class="btn btn-default interested-button">interested</button>
                        </li>
                        <li>
                            <a href="topic.html"><h5 class="text4">@android_development</h5><span class="sug3">1.2 Suggestions </span></a>
                            <br> <button class="btn btn-default interested-button">interested</button>
                        </li>
                    </ul>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>





</body>
</html>
