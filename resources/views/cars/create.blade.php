@extends('layouts.app')

@section('content')
<div>
    <a href="/cars" class="btn btn-outline-info">
        &leftarrow; back 
    </a>
   </div>
<h2>Add a new car</h2>

<div>
    <div class="flex justify-center pt-20">
        <form action="/cars" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block">

                <input type="file"  name="image" >


                <input 
                type="text" 
                class="block"
                name="name" 
                placeholder="Brand name">

                <input 
                type="text" 
                class="block"
                name="founded" 
                placeholder="founded..">

                <input 
                type="text" 
                class="block"
                name="description" 
                placeholder="description..">

                <button type="submit"  class="btn btn-outline-info">
                    Submit
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
