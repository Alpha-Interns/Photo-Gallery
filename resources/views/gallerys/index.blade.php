<x-layout>

<div class="container-fluid" data-aos="fade" data-aos-delay="500">
<div class="row">

@unless (count($galleries)==0)
@foreach ($galleries as $gallery)

<div class="col-lg-4">

    <div class="image-wrap-2">
      <div class="image-info">
        <h2 class="mb-3">{{$gallery->name}}</h2>
        <a href="/gallery/{{$gallery->id}}" class="btn btn-outline-white py-2 px-4">More Photos</a>
  
      </div>
      <img src="{{$gallery->thumbnail ? asset('storage/'.$gallery->thumbnail) : asset('images/person_1.jpg')}}"
       alt="Image" class="img-fluid">
    </div>

</div>

{{-- <h2>
    <a href="/gallery/{{$gallery->id}}">{{$gallery->id}} {{$gallery->name}}</a>
    <p>{{$gallery->description}}</p>
</h2> --}}
    
@endforeach
@else
<p>No galleries Found</p>    
@endunless

</div>
</div>

</x-layout>