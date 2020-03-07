@extends('layouts.app')

@section('header')
    <header id="main-header" class="py-2 bg-success text-white">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h1>
                <i class="fas fa-folder"></i> Posts</h1>
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

    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                        <h4>Latest Posts</h4>
                        </div>
                        @if ($posts->count()>0)
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                        <td>
                                        <img src="{{asset("storage/$post->image")}}" width="60" alt="">
                                        </td>
                                            <td>{{$post->title}}</td>
                                            <td>
                                                @if (!$post->trashed())
                                                <a href="{{route('post.edit',$post->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                @endif

                                            </td>
                                            <td>

                                                <form action="{{route('post.destroy',$post->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">{{$post->trashed()?'Delete':'Trash'}}</button>

                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach



                                </tbody>
                            </table>


                        @else
                            <h3>No Post To Show</h3>

                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        function handleDelete(id){

            var form = document.getElementById('deleteCategory')
            form.action='/post/'+id

        }

    </script>
@endsection
