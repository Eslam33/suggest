@extends('layout')
@section('content')

    @if(count($user_following) > 0)
        @php( $y = 1)
    @else
        @php( $y = 0)
    @endif

    <div class="col-sm-9">


        <div class="user-profile-div">

            <!-- Left-aligned media object -->
            <div class="media user-profile-data">
                <div class="media-left user-profile-img">
                    <img src="/images/img_avatar.png" class="media-object avatar-pic img-circle" >
                </div>
                <div class="media-body user-profile-body">

                    <h2 class="media-heading new_name"> {{$userdata->name }} </h2>
                    <p class="new_carrier">{{ $userdata->Carrier }}</p>
                    <p><span class="small-title new_current_job">Current:</span> <strong>{{$userdata->current_job}}</strong></p>
                    <p><span class="small-title new_previous_job">Pervious:</span>  <strong>{{$userdata->previous_job}}</strong></p>
                    <p><span class="small-title new_email">Email:</span>  <strong>{{ $userdata->email }}</strong></p>
                    <br>
                    <button id="follow-button-head" class="btn btn-default follow-button-profile f-button follow_link" data-content="{{$y }}" data-id="{{$userdata->id}}">Follow</button>
                </div>
            </div>
            <hr>
            <div class="user-tabs">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#Suggestions">My Suggestions</a></li>
                    <li class="abc"><a data-toggle="tab" href="#interested">My Interested</a></li>
                    <li class="def"><a data-toggle="tab" href="#Following">Following</a></li>
                    <li class="gij"><a data-toggle="tab" href="#Followers">Followers</a></li>
                    <li class="klm"><a data-toggle="tab" href="#Likes">Likes</a></li>
                </ul>

                <div class="tab-content">
                    <div id="Suggestions" class="tab-pane fade in active">

                        <!--//////////////////////////////////////////////////////////////////////////////-->
                        <br>
                        <!--posts -->
                        <div class="posts">
                            <ul>
                                @if(count($posts) == 0)
                                    <br>
                                    <h4 class="no-itesms">No interested topics</h4>
                                @else
                                    @foreach($posts as $post)
                                        <li >
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href=""><img src="/images/img_avatar2.png" class="media-object img-circle" style="width:60px">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <div class="dropdown posts-choose">
                                                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                                                <span class="caret"></span></button>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li ><button type="button"  data-name="{{$post->topic_name}}" class="btn btn-link edit-topic" data-toggle="modal" data-target="#edit-topic"><span class="e-text-btn-link">Edit Topic Name</span></button></li>
                                                                <li ><button type="button" data-id="{{$post->id}}"  data-content="{{$post->content}}" class="btn btn-link edit-content" data-toggle="modal" data-target="#edit-content"><span class="e-text-btn-link">Edit Content</span></button></li>



                                                                <li ><button type="button"  class="btn btn-link delete-post" data-id="{{$post->topic_name}}" data-toggle="modal" data-target="#delete-post"><span class="e-text-btn-link">Delete Post</span></button></li>

                                                                <!--<li><a href="" id="delete-post" class="delete-post">Action Post</a></li>-->

                                                                <li class="divider"></li>
                                                                <li><a href="">Unfollow gota</a></li>
                                                            </ul>
                                                        </div>
                                                        <h4 ><a href="/profile">{{$post->name}}</a><span class="sug4">suggested at</span><a href="/topic/{{$post->topic_name}}"> {{$post->topic_name}}</a></h4>
                                                    </div>
                                                    <p>{{$post->content}}</p>
                                                </div>
                                                <div class="media-bottom">
                                                    <hr>
                                                    <h5 >
                                                        <a href="">Likes <span class="badge">5</span></a>
                                                        <a href="" id="comm" class="comm">Comments <span class="badge">10</span></a></h5><hr style="border-bottom: 1px solid #aaaaaa;">
                                                </div><!--end-media-bottom-->
                                            </div>
                                        </li>

                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <!--comments-->

                        <div id="comments" class="comments">
                            <!-- Left-aligned media object -->
                            <div class="media user-comment">
                                <div class="media-left">
                                    <img src="/images/img_avatar.png" class="media-object img-circle" style="width:40px">
                                </div>
                                <div class="media-body media-middle">
                                    <p><input type="text" class=" form-control" name="" placeholder="comment"></p>
                                </div>
                            </div>
                            <!-- Left-aligned media object -->
                            <div class="media user-comment">
                                <div class="media-left">
                                    <img src="/images/img_avatar2.png" class="media-object img-circle" style="width:40px">
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




                        <!--edit - topic-name  in post - modal  -->

                        <div class="modal fade" id="edit-topic" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h2 class="modal-title">Edit Form</h2>
                                    </div>
                                    <div class="modal-body">
                                        <!--////////////////////////////////////-->
                                        <form class="form-horizontal" role="form" >
                                            {{csrf_field()}}
                                            <input type="hidden" id="e_id_topic" name="e_id_topic">
                                            <div class="form-group">
                                                <label for="">Let your text not ambigous.</label>
                                                <p class="error text-center alert alert-danger hidden"></p>
                                                <input type="text" class="form-control" id="e_topic_name" name="e_topic_name" value="" placeholder="Write Topic" required>
                                            </div>
                                        </form>
                                        <!--////////////////////////-->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-default e-t-save-post-button" >
                                            Update
                                        </button>
                                        <!--<button type="submit"  form="updateform" value="submit" class="btn btn-default user-form-save" data-dismiss="modal">Save Changes</button>-->
                                        <button type="button" class="btn btn-default user-form-close" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--////////////// end edit - topic-name  in post - modal -->


                        <!--edit - content  in post - modal  -->

                        <div class="modal fade" id="edit-content" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h2 class="modal-title">Edit Form</h2>
                                    </div>
                                    <div class="modal-body">
                                        <!--////////////////////////////////////-->
                                        <form class="form-horizontal" role="form" >
                                            {{csrf_field()}}
                                            <input type="hidden" id="e_id_post" name="e_id_post">
                                            <div class="form-group">
                                                <label for="">Let your text not ambigous.</label>
                                                <p class="error text-center alert alert-danger hidden"></p>
                                                <textarea class="form-control" rows="4" name="e_content2" id="e_content2" placeholder="Suggest Something..." required></textarea>
                                            </div>
                                        </form>
                                        <!--////////////////////////-->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-default e-c-save-post-button" >
                                            Update
                                        </button>
                                        <!--<button type="submit"  form="updateform" value="submit" class="btn btn-default user-form-save" data-dismiss="modal">Save Changes</button>-->
                                        <button type="button" class="btn btn-default user-form-close" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--////////////// end edit - content  in post - modal -->

                        <!-- delete post modal -->
                        <div id="delete-post" class="modal" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Form</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="loginform" class="form-horizontal" role="form">
                                            {{csrf_field()}}
                                            <input type="hidden" name="d_id" id="d_id">
                                            <h3>Are you sure you want to delete this ? <span
                                                        class="hidden did"></span></h3>

                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary delete-post-button" data-dismiss="modal">Remove</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--// end delete post modal -->
                        <!--///////////////////////////////////////////////////////////////////////////////////////////////-->

                    </div>
                    <!-- interested div -->
                    <div id="interested" class="tab-pane fade following">

                        <ul>
                            @if(count($topics) == 0)
                                <br>
                                <h4 class="no-itesms">No interested topics</h4>
                            @else
                                @foreach($topics as $topic)
                                    <li >
                                        <div class="media">
                                            <div class="media-body">
                                                <br>
                                                <h3 class="media-heading"><a href="">#{{$topic->topic_name}}</a></h3>
                                                <span class="sug5">{{count($topics)}} suggestions </span>
                                                <!--<button class="btn btn-default follow-button-following">interest</button>-->
                                                <button id="interested-button-head" data-name="{{$topic->topic_name}}" class="btn btn-default interested-button">Interested</button>
                                            </div>
                                        </div>
                                    </li>
                                    <hr>
                                @endforeach
                            @endif
                            <br>
                        </ul>



                    </div>
                    <!--/////// end interested div-->

                    <!-- following div -->
                    <div id="Following" class="tab-pane fade following">

                        <ul>
                            @foreach($following as $person)
                                <li >
                                    <div class="media">
                                        <div class="media-left">
                                            <a href=""><img src="/images/img_avatar3.png" class="media-object img-circle" style="width:60px">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h3 class="media-heading"><a href="/profile/{{$person->name}}">{{$person->name}} </a></h3>
                                            <span class="sug5">Followed By </span><a href="">Hessien Ahmed</a>
                                            <button class="btn btn-default follow-button-following f-button">Follow</button>
                                        </div>
                                    </div>
                                </li>
                                <hr>
                            @endforeach

                            <br>
                        </ul>




                    </div>
                    <!--/////// end following div-->

                    <!-- followers div -->
                    <div id="Followers" class="tab-pane fade followers">

                        <ul>
                            @foreach($followers as $person)
                                @foreach($following as $per)
                                    @if( $person->email == $per->email)
                                        <li class="f_f" data-id="{{1}}">
                                    @else
                                        <li class="f_f" data-id="{{0}}">
                                            @endif
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href=""><img src="/images/img_avatar3.png" class="media-object img-circle" style="width:60px">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="media-heading"><a href="/profile/{{$person->name}}">{{$person->name}} </a></h3>
                                                    <span class="sug6">Followed By </span><a href="">Hessien Ahmed</a>
                                                    <button id="follow-button-head" class="btn btn-default follow-button-followers">Follow</button>
                                                </div>
                                            </div>
                                        </li>
                                        <hr>
                                        @endforeach
                                        @endforeach
                        </ul>

                    </div>
                    <!--// end followers div -->
                    <!--like div -->
                    <div id="Likes" class="tab-pane fade">

                        <!--//////////////////////////////////////////////////////////////////////////////-->
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

                    </div>
                    <!--/// end like div -->
                </div>


            </div>


        </div>
        <!--//////////////////////////////////////////////////////////////////////////////////////////////-->
    </div>
@stop