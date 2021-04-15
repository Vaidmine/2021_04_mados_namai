

 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS</div>

               <div class="card-body">
                 
                <form method="POST" action="{{route('master.store')}}">

                    <div class="form-group">
                        <label>Name: </label>
                        <input type="text" class="form-control" name="master_name" value="{{old('master_name')}}">
                        <small class="form-text text-muted">Please enter Masters name</small>
                    </div>

                
                    <div class="form-group">
                        <label>Surname: </label>
                        <input type="text" class="form-control" name="master_surname"value="{{old('master_surname')}}">
                        <small class="form-text text-muted">Please enter Masters surname</small>
                    </div>

                    @csrf
                    <button type="submit" class="btn btn-outline-primary waves-effect">ADD</button>
                 </form>

               </div>
           </div>
       </div>
   </div>
</div>



@endsection