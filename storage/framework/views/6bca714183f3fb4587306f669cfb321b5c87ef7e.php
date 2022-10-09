<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <?php echo e($data['user_name']."  ". $data['created_at']->diffForHumans()); ?> -
                    <a href="<?php echo e(route('topic.show',$data['id'])); ?> "> Topic Link </a> -
                    <?php if( \Illuminate\Support\Facades\Auth::user()->id == $data['user_id']): ?>
                        <a href="<?php echo e(route('topic.edit',$data['id'])); ?> "> Edit Topic </a>

                    <form  style='display:inline;' method="POST"  action="<?php echo e(url('topic').'/'.$data['id']); ?>" >
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="asText" style='border:none; background-color:inherit; color:red ' > delete</button>
                    </form>



                    <?php endif; ?>

                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>


                    <div class="card-body">
                        <?php echo e($data['content']); ?>

                    </div>

                </div>

                <div class="card-header">
                    <p> <?php echo e($data['likesCount']); ?> likes</p>
                    <?php if($data['isLiked']==0): ?>
                        <a href="<?php echo e(route('topic.show',$data['id'])); ?>/like"> LIKE</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('topic.show',$data['id'])); ?>/unlike"> DISLIKE</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


</div>


<?php /**PATH C:\xampp\htdocs\topics\resources\views/topic/topic.blade.php ENDPATH**/ ?>