@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection



@section('header')
    <header id="main-header" class="py-2 bg-success text-white">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h1>
                <i class="fas fa-folder"></i> Categories</h1>
            </div>
        </div>
        </div>
    </header>
@endsection

@section('search')
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Categories...">
        <div class="input-group-append">
        <button class="btn btn-success">Search</button>
        </div>
    </div>
@endsection


@section('content')

    <div class="card card-default mb-4">
        <div class="card-header">
            {{isset($category)?'Edit Category':'Create Category'}}
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

            <form action="{{isset($category)?route('category.update',$category->id):route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($category))
                        @method('PATCH')
                    @endif
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{isset($category)?$category->name:''}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input id="description" type="hidden" name="description" value="{{isset($category)?$category->description:''}}">
                        <trix-editor input="description"></trix-editor>
                    </div>

                @if (isset($category))
                    <div class="form-group">
                        <img src="{{asset("storage/$category->image")}}" alt="">
                    </div>
                @endif
                    <div class="form-group">
                        <label for="image">Image</label>
                    <input id="image" name="image" type="file" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="video">Video</label>
                    <input id="video" name="video" type="text" class="form-control" value="{{isset($category)?$category->video:''}}">
                    </div>
                    <div class="form-group">
                         <button class="btn btn-success">{{isset($category)?'Update Category':'Add Category'}}</button>
                    </div>



            </form>





        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr('#published_at',{
            enableTime:true
        })
    </script>

@endsection
