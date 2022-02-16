@extends('layouts.home')
@section('main')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container ">
            <div class="col-md-7 col-lg-8">
                <form method="post" action="{{ route('home.post.update', ['id' => $post->id]) }}">
                    @csrf
                    @method('put')
                    <div class="row g-3" style="flex-direction: column;">
                        <div class="col-sm-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder=""
                                   value="{{ $post->title }}">
                        </div>

                        <div class="col-sm-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder=""
                                   value="{{ $post->description }}">
                        </div>

                        <div class="col-6">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="content">{{ $post->content }}</textarea><br>
                        </div>

                        <div class="mb-3 col-6">
                            <label for="category_id">Select Category</label>
                            <select class="form-select" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-3" >
                            <label for="tag-select">Select Under categories</label>
                            <select class="form-select" name="undercategories[]" id="tag-select" multiple>
                                @foreach($undercategories as $undercategory)
                                    <option
                                        value="{{ $undercategory->id }}" @foreach($post->undercategories as $uc){{ $uc->id == $undercategory->id ? 'selected' : '' }} @endforeach>{{ $undercategory->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-3" >
                            <label for="tag-select">Select Tags</label>
                            <select class="form-select" name="tags[]" id="tag-select" multiple>
                                @foreach($tags as $tag)
                                    <option
                                        value="{{ $tag->id }}" @foreach($post->tags as $p){{ $p->id == $tag->id ? 'selected' : '' }} @endforeach>{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
@endsection
