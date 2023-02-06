@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">
            Cars
        </h1>
       <div>
        <a href="/cars/create" class="btn btn-outline-info">
            Add a new car &rarr;
        </a>
       </div>
   
    </div>
    <div class="w-5/6 py-10">
        <div class="m-auto">
          @foreach ($cars as $car)
          <span class="uppercase text-blue-500 font-bold text-xs italic">
            Founded: {{ $car->founded }}
           </span>
           <h2>
            <a href="/cars/{{ $car->id }}">{{ $car->name }}</a>
            
           </h2>
           <p>
            {{ $car->description }}
           </p>
           <div>
            <a class="btn btn-outline-warning" href="cars/{{ $car->id }}/edit">Edit</a>

            <form  class="m-3" action="/cars/{{ $car->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" >Delete</a>
            </form>
           </div>
<hr>
              
          @endforeach
        </div>
   

</div>
   
</div>

@endsection
