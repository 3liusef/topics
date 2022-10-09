<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <?php $__currentLoopData = $data['comments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-header">
                        <?php echo e($comment['author']. "  " .$comment['created_at']->diffForHumans()); ?>


                        <div class="card-body">
                            <?php echo e($comment['content']); ?>

                        </div>
                        <?php if( $data['this_id'] == $data['user_id']): ?>
                            <a href="<?php echo e(route('topics.edit',$data['id'])); ?> "> Edit comment </a>
                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

                </div>

            </div>
        </div>
    </div>


</div>


<?php /**PATH C:\xampp\htdocs\topics\resources\views/topics/comments.blade.php ENDPATH**/ ?>