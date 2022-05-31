@extends('layouts.home')
@section('main')
    <div class="container">
        @foreach($show as $s)
            <h1 class="text-center">{{ $s->title }}</h1>
            <h2>{{ $s->category->title }}</h2>
            <p>@foreach($s->undercategories as $uc) {{ $uc->title }}@endforeach</p>
            <p>@foreach($s->tags as $t) {{ $t->title }}@endforeach</p>
            <p>{{ $s->content }}</p>
            <small>{{ $s->created_at }}</small>
    </div>
@foreach($s->comments as $comment)
    <div class="container mb-5 mt-5">

        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center mb-5">
                        Nested comment section
                    </h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="media">
                                <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview"
                                     src="https://i.imgur.com/stD0Q19.jpg"/>
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-8 d-flex">
                                            <h5>{{ $comment->user->name }}</h5>
                                            <span>- 2 hours ago</span>
                                        </div>

                                        <div class="col-4">

                                            <div class="pull-right reply">

                                                <a href="#"><span><i class="fa fa-reply"></i> reply</span></a>

                                            </div>

                                        </div>
                                    </div>

                                    {{ $comment->body }}

                                    <div class="media mt-4">
                                        <a class="pr-3" href="#"><img class="rounded-circle"
                                                                      alt="Bootstrap Media Another Preview"
                                                                      src="https://i.imgur.com/xELPaag.jpg"/></a>
                                        <div class="media-body">

                                            <div class="row">
                                                <div class="col-12 d-flex">
                                                    <h5>Simona Disa</h5>
                                                    <span>- 3 hours ago</span>
                                                </div>


                                            </div>

                                            letters, as opposed to using 'Content here, content here', making it look
                                            like readable English.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
    @if(Auth::check())
        <div class="container mt-5">
            <div class="col-md-8">
                <div class="d-flex flex-column comment-section">
                    <div class="bg-light p-2">
                        <form method="post"
                              action="{{ route('comment.add', ['title' => $s->slug, 'category' => $s->category->slug]) }}">
                            @csrf
                            <div class="d-flex flex-row align-items-start">
                                <textarea class="form-control ml-1 shadow-none textarea" name="body"
                                          placeholder="Write a comment"></textarea>
                                <input type="hidden" name="post_id" value="{{ $s->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            </div>
                            <div class="mt-2 text-right">
                                <button class="btn btn-primary btn-sm shadow-none" type="submit">Post comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(!Auth::check())
        <div class="container mt-5">
            <div class="col-md-8">
                <div class="d-flex flex-column comment-section">
                    <div class="bg-light p-2">
                        <div class="d-flex flex-row align-items-start">
                            <textarea disabled="disabled" class="form-control ml-1 shadow-none textarea" id="comment"
                                      name="comment">You should be registered</textarea>
                        </div>
                        <div class="mt-2 text-right">
                            <button disabled="disabled" class="btn btn-primary btn-sm shadow-none" type="submit">Post
                                comment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif



    @endforeach
@endsection
