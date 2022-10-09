    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Create Comment')); ?></div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>


                        <div class="card-body">
                            <form method="POST" action="<?php echo e(url('comments')); ?>">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="topic_id" value="<?php echo e($data['id']); ?>">
                                <div class="row mb-3"><label for="comment_content"
                                                             class="col-md-4 col-form-label text-md-end"></label>
                                    <div class="col-md-10 r-md-50">
                                        <textarea id="comment_content" type="text" class="form-control"
                                                  name="comment_content"
                                                  required="" autocomplete="comment_content"
                                                  autofocus="" value="" >

                                        </textarea>
                                        <?php $__errorArgs = ['comment_content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary"> comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php /**PATH C:\xampp\htdocs\topics\resources\views/topics/createComment.blade.php ENDPATH**/ ?>