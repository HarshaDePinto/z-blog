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
<br><br><br><br>
<div class="main mt-5">

    <h1>{{$blog->title}}</h1>
    <hr>
    <div class="container">
        {!!$blog->description!!}
    </div>


    <!-- Portfolio Gallery Grid -->

        <div class="content">

        <img src="{{asset("storage/$blog->image")}}" alt="Bear" style="width:100%">

        <p>{!!$blog->content!!}</p>
            <div class="container">
            <iframe width="560" height="315" src="{{$blog->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        </div>



    <div class="row">
        @if ($posts)


        @foreach ($posts as $post)
            <div class="column">
                <div class="content">
                    <h3>{{$post->title}}</h3>
                <a href="#">
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

