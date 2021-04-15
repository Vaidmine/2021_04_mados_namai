

{{-- 
@foreach ($outfits as $outfit)
  <a href="{{route('outfit.edit',[$outfit])}}">{{$outfit->title}} {{$outfit->outfitAuthor->name}} {{$outfit->outfitAuthor->surname}}</a>
  <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach --}}


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
              <div class="card-header">

              <h2>OUTFITS LIST </h2>

                <a href="{{route('outfit.index', ['sort' => 'type'])}}" class="btn btn-outline-primary waves-effect">Sort by Type</a>
                <a href="{{route('outfit.index', ['sort' => 'color'])}}" class="btn btn-outline-primary waves-effect">Sort by Color</a>
                <a href="{{route('outfit.index')}}" class="btn btn-outline-primary waves-effect">Default</a>

              </div>

                <div class="card-body">

                      @foreach ($outfits as $outfit)
                        <li class="list-group-item list-line"> 
                          <div>  
                            Type: {{$outfit->type}} 
                          </div>  
                          <div>
                            Color: {{$outfit->color}} 
                          </div>
                        
                        {{-- from {{$outfit->outfitAuthor->name}} {{$outfit->outfitAuthor->surname}} --}}

                            <div class="list-line__buttons">
                            <a href="{{route('outfit.edit',[$outfit])}}"><button class="btn btn-outline-info waves-effect">EDIT</a></button> 
                            <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
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
