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

   <div class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center"><?php echo e($gallery->name); ?></h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="lightgallery">

            <?php if (! (count($images)==0)): ?>

            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" 
              data-src="<?php echo e($image->path ? asset('storage/'.$image->path): asset('images/person_1.jpg')); ?>" 
              data-sub-html="<h4><?php echo e($image->photo_comment); ?></h4><p><?php echo e($image->photo_description); ?></p>">

                <a href="/gallery/<?php echo e($image->gallery_id); ?>/photos/<?php echo e($image->id); ?>">
                <img src="<?php echo e($image->path ? asset('storage/'.$image->path) : asset('images/person_1.jpg')); ?>" 
                alt="IMage" class="img-fluid"></a>
                
                <div class="text-center mt-4">
                 </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <?php else: ?>
            <p>No Image(s) Found</p>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
          <a href="/gallery/<?php echo e($gallery->id); ?>/upload" class="btn btn-primary">
             Upload New Photos
          </a>   
       </div>
       
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
<?php endif; ?>

<?php /**PATH C:\Users\Lenovo\Desktop\Photo-Gallery\resources\views/gallerys/show.blade.php ENDPATH**/ ?>