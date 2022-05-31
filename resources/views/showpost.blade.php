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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center mb-5">
                    Nested comment section
                </h3>
            @foreach($s->comments as $comment)
                <div class="col-md-8 mt-4">
                    <div class="media g-mb-30 media-comment">
                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="#" alt="Image Description">
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                            <div class="g-mb-15">
                                <h5 class="h5 g-color-gray-dark-v1 mb-0">{{ $comment->user->name }}</h5>
                                <span class="g-color-gray-dark-v4 g-font-size-12">{{ $comment->created_at }}</span>
                            </div>

                            <p>{{ $comment->body }}</p>

                            <ul class="list-inline d-sm-flex my-0">
                                <li class="list-inline-item g-mr-20">
                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                        <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                        178
                                    </a>
                                </li>
                                <li class="list-inline-item g-mr-20">
                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                        <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                                        34
                                    </a>
                                </li>
                                <li class="list-inline-item ml-auto">
                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                                        Reply
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
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
