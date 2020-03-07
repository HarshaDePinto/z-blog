@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endsection



@section('header')
    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h1>
                <i class="fas fa-pencil-alt"></i> Posts</h1>
            </div>
        </div>
        </div>
    </header>
@endsection

@section('search')
    <div class="input-group">
    <input type="text" class="form-control" placeholder="Search Posts...">
    <div class="input-group-append">
      <button class="btn btn-primary">Search</button>
    </div>
    </div>
@endsection


@section('content')

    <div class="card card-default mb-4">
        <div class="card-header">
            {{isset($post)?'Edit Post':'Create Post'}}
        </div>
        <div class="card-body">
            {{-- Errors --}}
                @if($errors->any())

                    <div class="alert alerr-danger">

                        <ul class="list-group">
                            @foreach ($errors->all() as $error)

                            <li class="list-group-item text-danger">
                                {{$error}}
                            </li>

                            @endforeach

                        </ul>

                    </div>


                @endif

            <form action="{{isset($post)?route('post.update',$post->id):route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

                @if (isset($post))
                @method('PATCH')
                @endif

                <div class="form-group">
                    <label for="title">Title</label>
                <input id="title" name="title" type="text" class="form-control" value="{{isset($post)?$post->title:''}}">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">

                        @foreach ($categories as $category)
                        <option value="{{$category->id}}"

                            @if (isset($post))

                                @if ($category->id==$post->category_id)
                                selected

                                @endif

                            @endif

                            >{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>
            @if ($tags->count()>0)
                <div class="form-group">
                    <label for="tags">Tags</label>


                    <select name="tags[]" id="tags" class="form-control tag-selector" multiple>

                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}"

                            @if (isset($post))

                            @if ($post->hasTag($tag->id))
                            selected

                            @endif

                            @endif

                            >{{$tag->name}}</option>
                        @endforeach

                    </select>


                                </div>

            @endif
                <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" type="hidden" name="description">
                    <trix-editor input="description"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>
                </div>



                <div class="form-group">
                        <label for="published_at">Published At</label>
                    <input id="published_at" name="published_at" type="text" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                <input id="image" name="image" type="file" class="form-control" value="{{isset($post)?$post->image:''}}">
                </div>

                <div class="form-group">
                    <label for="video">Video</label>
                <input id="video" name="video" type="text" class="form-control">
                </div>

                 <button class="btn btn-success">{{isset($post)?'Update Post':'Add Post'}}</button>

            </form>




        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script>
        flatpickr('#published_at',{
            enableTime:true
        })

        $(document).ready(function() {
            $('.tag-selector').select2();
            });
    </script>

@endsection
