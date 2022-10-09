<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <?php $__currentLoopData = $data['comments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-header">
                        <?php echo e($comment['user_name']. "  " .$comment['created_at']->diffForHumans()); ?>


                        <div class="card-body">
                            <?php echo e($comment['content']); ?>

                        </div>

                        <?php if( \Illuminate\Support\Facades\Auth::user()->id == $comment['user_id']): ?>
                        <!--  TODO: EDIT COMMENT -->
                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

                </div>

            </div>
        </div>
    </div>


</div>


<?php /**PATH C:\xampp\htdocs\topics\resources\views/topic/comments.blade.php ENDPATH**/ ?>