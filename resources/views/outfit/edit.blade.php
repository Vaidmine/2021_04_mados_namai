

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">EDIT OUTFIT</div>

               <div class="card-body">
                 
                <form method="POST" action="{{route('outfit.update',[$outfit])}}">

                    <div class="form-group">
                        <label>Type: </label>
                        <input type="text" class="form-control" name="outfit_type" value="{{$outfit->type}}">
                        <small class="form-text text-muted">Please edit Type</small>
                    </div>

                    <div class="form-group">
                        <label>Color: </label>
                        <input type="text" class="form-control" name="outfit_color" value="{{$outfit->color}}">
                        <small class="form-text text-muted">Please edit Color</small>
                    </div>

                    <div class="form-group">
                        <label>Size: </label>
                        <input type="text" class="form-control" name="outfit_size" value="{{$outfit->size}}">
                        <small class="form-text text-muted">Please edit Size</small>
                    </div>

                    <div class="form-group">
                    About: <textarea name="outfit_about"  class="form-control" id="summernote">{{$outfit->about}}</textarea>
                    <select name="master_id">
                        <div>
                        @foreach ($masters as $master)
                            <option value="{{$master->id}}" @if($master->id == $outfit->master_id) selected @endif>
                                {{$master->name}} {{$master->surname}}
                            </option>
                        @endforeach
                        </div>
                    </select>
                    </div>

                   
             

                    @csrf
                    <button type="submit"class="btn btn-outline-primary waves-effect">EDIT</button>
                    

                </form>


               </div>
           </div>
       </div>
   </div>
</div>


<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>
@endsection
