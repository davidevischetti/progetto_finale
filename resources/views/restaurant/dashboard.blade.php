@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{url()->previous()}}" class="mb-5"><< Back</a>

    <div class="row justify-content-start">

        <div class="col-2">
            @include('restaurant/partials/side-bar')
        </div>

        <div class="col-8">
            <h1 class="mb-4">
                Menu online
            </h1>
            <ul class="nav flex-column list-group">
                @foreach ($platesVisible as $plate)
                    <li class="card my-2 p-2">
                        <h2 class="card-title px-0" href="#">{{$plate->name}}</h2>
                        <span>
                            {{$plate->ingredients}}
                        </span>
                    </li>
                @endforeach
            </ul>
            {{ $platesVisible->links() }}
        </div>

    </div>
</div>
@endsection
