@extends('layouts.app')

@section('content')
<div>
    <a href="/cars" class="btn btn-outline-info">
        &leftarrow; back 
    </a>
   </div>
<h2>Edit Car</h2>

<div>
    <div class="flex justify-center pt-20">
        <form action="/cars/{{ $car->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row text-center">
                <input class="form-control col-lg-6"
                type="text" 
                class="block"
                name="name" 
                placeholder="Brand name"
                value="{{ $car->name }}"
                >

                <input class="form-control col-lg-6"
                type="text" 
                class="block"
                name="founded" 
                placeholder="founded.."
                value="{{ $car->founded }}">

                <input class="form-control col-lg-6"
                type="text" 
                class="block"
                name="description" 
                placeholder="description.."
                value="{{ $car->description }}">
<br>
                <button type="submit"  class="btn btn-outline-info">
                    Update
                </button>
            </div>
        </form>
        @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <li class="text-danger">
                    {{ $error }}
                </li>
            @endforeach
        </div>
            
        @endif
    </div>
</div>
@endsection
