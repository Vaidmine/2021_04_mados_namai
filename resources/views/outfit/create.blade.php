
 
 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                <h2>     CREATE OUTFIT </h2>
                </div>

               <div class="card-body">
                 
                <form method="POST" action="{{route('outfit.store')}}">

                    <div class="form-group">
                        <label>Type: </label>
                        <input type="text" class="form-control" name="outfit_type">
                        <small class="form-text text-muted">Please enter Type</small>
                    </div>

                    <div class="form-group">
                        <label>Color:  </label>
                        <input type="text" class="form-control" name="outfit_color">
                        <small class="form-text text-muted">Please enter Color</small>
                    </div>

                    <div class="form-group">
                        <label>Size: </label>
                        <input type="text" class="form-control" name="outfit_size">
                        <small class="form-text text-muted">Please enter Size</small>
                    </div>

                    <div class="form-group">
                        About: <textarea name="outfit_about" class="form-control" id="summernote"></textarea>
                        <select name="master_id">
                        @foreach ($masters as $master)
                        <div>
                        <option value="{{$master->id}}">{{$master->name}} {{$master->surname}}</option>
                        @endforeach
                        </div>
                        </select>
                    </div>



                    
                    @csrf
                    <button type="submit"class="btn btn-outline-primary waves-effect">ADD</button>
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
