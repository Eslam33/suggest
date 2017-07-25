@extends('layout')
@section('content')
    @if(count($user_interesting) > 0)
        @php( $x = 1)
        @else
        @php( $x = 0)
        @endif
        <div class="col-sm-9">
        <div class="topic-header-div topic_es">
            <h4 class="topic-header"><a id="interested-link-head" data-id="{{$x }}" class="topic_link" href="{{$topic_name}}">#{{$topic_name}}</a>

                <input  type="hidden" value="{{$x }}" id="topic_case" />
                <button id="interested-button-head" data-id="{{$x }}" data-name="{{$topic_name}}" class="btn btn-default interested-button">Interested</button></h4>

        </div>

        <!--//////////////////////////////////////////////////////////////////////////////-->
        <br>
        <!--posts -->
        <div class="posts">
            <ul id="ul_for_posts">
                @if(count($posts) == 0)
                    <br>
                    <h4 class="no-itesms">No interested topics</h4>
                @else
                    @foreach($posts as $post)
                        <li id="{{$post->id}}"  class="li_post" data-title="{{$post->id}}">
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
                                        <h4 ><a href="/profile/{{$post->name}}">{{$post->name}}</a><span class="sug4">suggested at</span><a class="topic_link" href="/topic/{{$post->topic_name}}"> {{$post->topic_name}}</a></h4>
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
        <!--///////////////////////////////////////////////////////////////////////////////////////////////-->

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

        <!--//////////////////////////////////////////////////////////////////////////////////////////////-->
    </div>
    @stop