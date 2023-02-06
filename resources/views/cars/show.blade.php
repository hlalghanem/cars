@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">
          {{ $car->name }}
        </h1>
    </div>
    <div class="row">
      <img src="{{ asset('cars_images/' . $car->image_path) }}" alt="">
        
          <span class="uppercase text-blue-500 font-bold text-xs italic">
            Founded: {{ $car->founded }}
           </span>
          
           <p>
            {{ $car->description }}
           </p>
           
     </div>
<hr>

          

    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>
                    Model
                </th>
                <th>
                    Engines
                </th>
                <th>
                    Production
                </th>
            </tr>
           
                @forelse ($car->carModels as $model)
                <tr>
                    <td>
                        {{ $model['model_name'] }}
                    </td>
                    <td>
                        @foreach ($car->engines as $engine)
                        @if ($model->id == $engine->model_id)
                        {{ $engine['engine_name'] }}
                        @endif
                        @endforeach
                        
                    </td>
                    <td>
                       
                        {{ $car->productionDate->created_at }}
                      
                        
                    </td>
                   
                </tr>
                
                @empty
                No Models found!
                @endforelse
           
    
           </table>



    </div>


</div>
   



@endsection
