<x-layout>


<div class="container-fluid" data-aos="fade" data-aos-delay="500">
<div class="row">

@unless (count($galleries)==0)
@foreach ($galleries as $gallery)

<div class="col-lg-4">

    <div class="image-wrap-2">
      <div class="image-info">

        <div class="mt-4 p-2 flex space-x-6 ">
          <a href="/gallery/{{$gallery->id}}/edit">Edit</a>
         </div>

         <form  method="post" action="/gallery/{{$gallery->id}}">
          @csrf
          @method('DELETE')
          <button class=" btn-outline-white py-2 px-4">Delete</button>
        </form>

        <h2 class="mb-3">{{$gallery->name}}</h2>
        
        <a href="/gallery/{{$gallery->id}}" class="btn btn-outline-white py-2 px-4">More Photos</a>
      </div>
      <img src="{{$gallery->thumbnail ? asset('storage/'.$gallery->thumbnail) : asset('images/person_1.jpg')}}"
       alt="Image" class="img-fluid">
      
       
    </div>

</div>   
@endforeach
@else
<p>No galleries Found</p> 
<a href="{{ route('galleries.create') }}" class="btn btn-primary">Create New Gallery</a>   
@endunless
<a href="{{ route('galleries.create') }}" class="btn btn-primary">Create New Gallery</a>
</div>
</div>
 </div>
</x-layout>