@extends('layout')

@section('content')
    <div class="col-sm-6">
        <div class="post">
            <!-- Left-aligned media object -->
            <div class="media suggest-block">
                <div class="media-left">
                    <a href=""><img src="images/img_avatar3.png" class="media-object img-circle" style="width:60px">
                    </a>
                </div>
                <div class="media-body">
                    <form class="suggest-data">
                        <div class="input-group">
                <textarea class="form-control suggest-text" rows="5" cols="70" id="comment">
                </textarea>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input id="topic" type="text" class="form-control suggest-topic" name="msg" placeholder="Topic Name">
                        </div>
                        <div class="suggest-bar">
                            <ul >
                                <li>
                                    <a href="#" >
                                        <span class="glyphicon glyphicon-camera"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-paperclip"></span>
                                    </a>
                                </li>
                            </ul>
                            <button class="btn btn-default suggest-button">Suggest</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <!--posts -->
        <div class="posts">
            <ul>
                <li>
                    <div class="media">
                        <div class="media-left">
                            <a href=""><img src="images/img_avatar2.png" class="media-object img-circle" style="width:60px">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <div class="dropdown posts-choose">
                                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#">Save Post</a></li>
                                        <li><a href="#">Turn on Notifications</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Unfollow gota</a></li>
                                    </ul>
                                </div>
                                <h4 ><a href="">kota </a><span class="sug4">suggest </span><a href="">@web development</a></h4>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="media-bottom">
                            <hr>
                            <h5>
                                <a href="#">Likes <span class="badge">5</span></a>
                                <a href="" id="comm" class="comm">Comments <span class="badge">10</span></a></h5>
                        </div><!--end-media-bottom-->
                    </div>
                </li>
            </ul>
        </div>
        <!--comments-->

        <div id="comments" class="comments">
            <!-- Left-aligned media object -->
            <div class="media user-comment">
                <div class="media-left">
                    <img src="images/img_avatar.png" class="media-object img-circle" style="width:40px">
                </div>
                <div class="media-body media-middle">
                    <p><input type="text" class=" form-control" name="" placeholder="comment"></p>
                </div>
            </div>
            <!-- Left-aligned media object -->
            <div class="media user-comment">
                <div class="media-left">
                    <img src="images/img_avatar2.png" class="media-object img-circle" style="width:40px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><a href="">kota</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>

            <hr>
        </div>
        <!--//////////comments-->
        <br>
        <!--///////////////////////////////////////////////////////////////////////////////////////////////-->

        <!--//////////////////////////////////////////////////////////////////////////////////////////////-->
    </div>
    <div class="col-sm-3">
        <div class="activities">
            <h5 class="activities-title"> <span class="glyphicon glyphicon-chevron-up"></span></h5>
            <hr>
            <ul>
                <li>
                    <a href="">
                        <!-- Left-aligned media object -->
                        <div class="media">
                            <div class="media-left">
                                <a href=""><img src="images/img_avatar2.png" class="media-object img-circle" style="width:60px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="">kota </a><span class="sug">suggest </span><a href="">@web development</a></h4>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <!-- Left-aligned media object -->
                        <div class="media">
                            <div class="media-left">
                                <a href=""><img src="images/img_avatar.png" class="media-object img-circle" style="width:60px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="">mohamed </a><span class="sug">suggest </span><a href="">@android development</a></h4>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <!-- Left-aligned media object -->
                        <div class="media">
                            <div class="media-left">
                                <a href=""><img src="images/img_avatar3.png" class="media-object img-circle" style="width:60px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="">ahmed </a><span class="sug">suggest </span><a href="">@web design</a></h4>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@stop