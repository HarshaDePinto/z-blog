@extends('layouts.app')

@section('styles')
@endsection



@section('header')
    <header id="main-header" class="py-2 bg-success text-white">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h1>
                <i class="fas fa-folder"></i> Tags</h1>
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
            {{isset($tag)?'Edit Tag':'Create Tag'}}
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
            <form action="{{isset($tag)?route('tag.update',$tag->id):route('tag.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($tag))
                        @method('PATCH')
                    @endif
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{isset($tag)?$tag->name:''}}">
                    </div>


                    <div class="form-group">
                         <button class="btn btn-success">{{isset($tag)?'Update Tag':'Add Tag'}}</button>
                    </div>



            </form>





        </div>

    </div>

@endsection

@section('scripts')

@endsection
