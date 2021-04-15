

 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">EDIT MASTER</div>

               <div class="card-body">
                 
                <form method="POST" action="{{route('master.update',[$master->id])}}">


                    <div class="form-group">
                        <label>Name: </label>
                        <input type="text" class="form-control" name="master_name" value="{{old('master_name',$master->name)}}">
                        <small class="form-text text-muted">Please edit Masters name</small>
                    </div>

                
                    <div class="form-group">
                        <label>Surname: </label>
                        <input type="text" class="form-control"  name="master_surname" value="{{old('master_name',$master->name)}}">
                        <small class="form-text text-muted">Please edit Masters surname</small>
                    </div>

                    @csrf
                    <button type="submit" class="btn btn-outline-primary waves-effect">EDIT</button>
                </form>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection

