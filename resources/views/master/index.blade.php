


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                            <h2> MASTERS LIST </h2>
                            <a href="{{route('master.index', ['sort' => 'name'])}}" class="btn btn-outline-primary waves-effect">Sort by Name</a>
                            <a href="{{route('master.index', ['sort' => 'surname'])}}" class="btn btn-outline-primary waves-effect">Sort by Surname</a>
                            <a href="{{route('master.index')}}" class="btn btn-outline-primary waves-effect">Default</a>

                </div>

                <div class="card-body">
                 
                      @foreach ($masters as $master)
                      <li class="list-group-item list-line">
                        {{$master->name}} {{$master->surname}}
                              
                                  <div class="list-line__buttons">
                                  <a href="{{route('master.edit',[$master])}}"><button type="submit" class="btn btn-outline-primary waves-effect">EDIT</button></a>
                                  <form method="POST" action="{{route('master.destroy', [$master])}}">
                                  @csrf
                                  <button type="submit" class="btn btn-outline-danger waves-effect">DELETE</button>
                                  </form>
                                  <br>
                                  </div>
                       </li>
                      @endforeach
                                  
                      
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
