<x-layout>

   <div class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center">{{$gallery->name}}</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="lightgallery">

            @unless (count($images)==0)

            @foreach ($images as $image)

            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" 
              data-src="{{$image->path ? asset('storage/'.$image->path): asset('images/person_1.jpg')}}" 
              data-sub-html="<h4>{{$image->photo_comment}}</h4><p>{{$image->photo_description}}</p>">

                <a href="/gallery/{{$image->gallery_id}}/photos/{{$image->id}}">
                <img src="{{$image->path ? asset('storage/'.$image->path) : asset('images/person_1.jpg')}}" 
                alt="IMage" class="img-fluid"><a href="/gallery/{{$gallery->id}}/photos/{{$image->id}}/edit" class="btn btn-primary">Edit</a></a>
                
                <div class="text-center mt-4">
                  <a href="/gallery/{{$gallery->id}}/photos/{{$image->id}}/edit" class="btn btn-primary">Edit</a>
                 </div>

            </div>
            @endforeach
            
            @else
            <p>No Image(s) Found</p>
            @endunless
        </div>
        <div class="text-center mt-4">
          <a href="/gallery/{{$gallery->id}}/upload" class="btn btn-primary">
             Upload New Photos
          </a>   
       </div>
       {{-- <div class="text-center mt-4">
        <a href="/gallery/{{$gallery->id}}/photos/{{$image->id}}/edit" class="btn btn-primary">Edit</a>
       </div> --}}
      </div>
   </div>
</x-layout>

