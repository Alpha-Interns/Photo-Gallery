<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

<div class="container-fluid" data-aos="fade" data-aos-delay="500">
<div class="row">

<?php if (! (count($galleries)==0)): ?>
<?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-lg-4">

    <div class="image-wrap-2">
      <div class="image-info">

        <div class="mt-4 p-2 flex space-x-6 ">
          <a href="/gallery/<?php echo e($gallery->id); ?>/edit">Edit</a>
         </div>

         <form  method="post" action="/gallery/<?php echo e($gallery->id); ?>">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button class=" btn-outline-white py-2 px-4">Delete</button>
        </form>

        <h2 class="mb-3"><?php echo e($gallery->name); ?></h2>
        
        <a href="/gallery/<?php echo e($gallery->id); ?>" class="btn btn-outline-white py-2 px-4">More Photos</a>
      </div>
      <img src="<?php echo e($gallery->thumbnail ? asset('storage/'.$gallery->thumbnail) : asset('images/person_1.jpg')); ?>"
       alt="Image" class="img-fluid">
      
       
    </div>

</div>   
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<p>No galleries Found</p>    
<?php endif; ?>

</div>
</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\Users\Lenovo\Desktop\Photo-Gallery\resources\views/gallerys/index.blade.php ENDPATH**/ ?>