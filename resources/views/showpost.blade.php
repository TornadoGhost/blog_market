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
    @if(Auth::check())
        <div class="container mt-5">
            <div class="col-md-8">
                <div class="d-flex flex-column comment-section">
                    <div class="bg-light p-2">
                        <form method="post"
                              action="{{ route('comment.add', ['title' => $s->slug, 'category' => $s->category->slug]) }}">
                            @csrf
                            <div class="d-flex flex-row align-items-start">
                                <textarea class="form-control ml-1 shadow-none textarea" name="body" placeholder="Write a comment"></textarea>
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
                                    <textarea disabled="disabled" class="form-control ml-1 shadow-none textarea" id="comment" name="comment">You should be registered</textarea>
                                </div>
                                <div class="mt-2 text-right">
                                    <button disabled="disabled" class="btn btn-primary btn-sm shadow-none" type="submit">Post comment</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
    @endforeach
@endsection
