@extends('layouts.welcome')

@section('style')
<style>

    /* Center website */
    .main {
    max-width: 1000px;
    margin: auto;
    }

    h1 {
    font-size: 50px;
    word-break: break-all;
    }

    .row {
    margin: 8px -16px;
    }

    /* Add padding BETWEEN each column */
    .row,
    .row > .column {
    padding: 8px;
    }

    /* Create four equal columns that floats next to each other */
    .column {
    float: left;
    width: 25%;
    }

    /* Clear floats after rows */
    .row:after {
    content: "";
    display: table;
    clear: both;
    }

    /* Content */
    .content {
    background-color: white;
    padding: 10px;
    }

    /* Responsive layout - makes a two column-layout instead of four columns */
    @media screen and (max-width: 900px) {
    .column {
        width: 50%;
    }
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
    .column {
        width: 100%;
    }
    }


</style>
@endsection



@section('content')

<!-- MAIN (Center website) -->
<div class="main mt-5">

    <h1>MYLOGO.COM</h1>
    <hr>
    <div class="container">
        @foreach ($categories as $category)

                        <a class="btn btn-primary float-right mx-2 btn-xl" href="#">{{$category->name}}</a>

        @endforeach

    </div>
    <h2>Latest Update</h2>
    <p>Resize the browser window to see the responsive effect.</p>

    <!-- Portfolio Gallery Grid -->
    {{-- @if ($main)


    @foreach ($main as $ma)
        <div class="content">
        <img src="{{asset("storage/$ma->image")}}" alt="Bear" style="width:100%">
        <h3>{{$ma->title}}</h3>
        <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
        <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
        <a href="#" class="btn btn-primary">Read More &rarr;</a>
        </div>
    @endforeach
    @endif --}}


    <div class="row">
        @if ($posts)


        @foreach ($posts as $post)
            <div class="column">
                <div class="content">
                    <h3>{{$post->title}}</h3>
                <a href="{{route('blog',$post->id)}}">
                    <img src="{{asset("storage/$post->image")}}" alt="Mountains" style="width:100%"></a>



                <p>{!!$post->description!!}</p>

                </div>
            </div>

        @endforeach
        @endif
    <!-- END GRID -->
    </div>



    <!-- END MAIN -->
    </div>

@endsection
