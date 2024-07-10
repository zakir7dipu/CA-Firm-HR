<?php
    $chatgpt = Utility::getValByName('enable_chatgpt');
?>


<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Create Job')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link href="<?php echo e(asset('public/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('css/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    
    <script src="<?php echo e(asset('public/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>

    <script>
        var e = $('[data-toggle="tags"]');
        e.length && e.each(function() {
            $(this).tagsinput({
                tagClass: "badge badge-primary"
            })
        });
    </script>
    <script src="<?php echo e(asset('css/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('job.index')); ?>"><?php echo e(__('Manage Job')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Create Job')); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php if($chatgpt == 'on'): ?>
        <div class="text-end">
            <a href="#" class="btn btn-sm btn-primary" data-size="medium" data-ajax-popup-over="true"
                data-url="<?php echo e(route('generate', ['job'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
                <i class="fas fa-robot"></i><?php echo e(__(' Generate With AI')); ?>

            </a>
        </div>
    <?php endif; ?>

    <?php echo e(Form::open(['url' => 'job', 'method' => 'post'])); ?>

    <div class="row mt-3">
        <div class="col-md-6 ">
            <div class="card card-fluid job-card">
                <div class="card-body ">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo Form::label('title', __('Job Title'), ['class' => 'col-form-label']); ?>

                            <?php echo Form::text('title', old('title'), [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => 'Enter job title',
                            ]); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('branch', __('Branch'), ['class' => 'col-form-label']); ?>

                            <?php echo e(Form::select('branch', $branches, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('category', __('Job Category'), ['class' => 'col-form-label']); ?>

                            <?php echo e(Form::select('category', $categories, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

                        </div>

                        <div class="form-group col-md-6">
                            <?php echo Form::label('position', __('No. of Positions'), ['class' => 'col-form-label']); ?>

                            <?php echo Form::text('position', old('positions'), [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => 'Enter job Positions',
                            ]); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('status', __('Status'), ['class' => 'col-form-label']); ?>

                            <?php echo e(Form::select('status', $status, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('start_date', __('Start Date'), ['class' => 'col-form-label']); ?>

                            <?php echo Form::date('start_date', old('start_date'), [
                                'class' => 'form-control current_date',
                                'autocomplete' => 'off',
                                'placeholder' => 'Select start date',
                            ]); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('end_date', __('End Date'), ['class' => 'col-form-label']); ?>

                            <?php echo Form::date('end_date', old('end_date'), [
                                'class' => 'form-control current_date',
                                'autocomplete' => 'off',
                                'placeholder' => 'Select end date',
                            ]); ?>

                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="skill"><?php echo e(__('Skill Box')); ?></label>
                            <input type="text" class="form-control" value="" data-toggle="tags" name="skill"
                                placeholder="Skill" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card card-fluid job-card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6><?php echo e(__('Need to Ask ?')); ?></h6>
                                <div class="my-4">
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="gender"
                                            id="check-gender">
                                        <label class="form-check-label" for="check-gender"><?php echo e(__('Gender')); ?> </label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="dob"
                                            id="check-dob">
                                        <label class="form-check-label" for="check-dob"><?php echo e(__('Date Of Birth')); ?></label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="address"
                                            id="check-address">
                                        <label class="form-check-label" for="check-address"><?php echo e(__('Address')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6><?php echo e(__('Need to show Options ?')); ?></h6>
                                <div class="my-4">
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="profile"
                                            id="check-profile">
                                        <label class="form-check-label" for="check-profile"><?php echo e(__('Profile Image')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="resume"
                                            id="check-resume">
                                        <label class="form-check-label" for="check-resume"><?php echo e(__('Resume')); ?></label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="letter"
                                            id="check-letter">
                                        <label class="form-check-label" for="check-letter"><?php echo e(__('Cover Letter')); ?></label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]"
                                            value="terms" id="check-terms">
                                        <label class="form-check-label"
                                            for="check-terms"><?php echo e(__('Terms And Conditions')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <h6><?php echo e(__('Custom Questions')); ?></h6>
                            <div class="my-4">
                                <?php $__currentLoopData = $customQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="custom_question[]"
                                            value="<?php echo e($question->id); ?>" <?php if($question->is_required == 'yes'): ?> required <?php endif; ?>
                                            id="custom_question_<?php echo e($question->id); ?>">
                                        <label class="form-check-label"
                                            for="custom_question_<?php echo e($question->id); ?>"><?php echo e($question->question); ?>

                                            <?php if($question->is_required == 'yes'): ?>
                                                <span class="text-danger">*</span>
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-fluid job-card">
                <div class="card-body ">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo Form::label('description', __('Job Description'), ['class' => 'col-form-label']); ?>

                            <textarea class="form-control editor summernote-simple-2" name="description" id="description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-fluid job-card">
                <div class="card-body ">
                    <div class="row">


                        <div class="form-group col-md-12">
                            <?php echo Form::label('requirement', __('Job Requirement'), ['class' => 'col-form-label']); ?>

                            <?php if($chatgpt == 'on'): ?>
                                <a href="#" data-size="md" class="btn btn-primary btn-icon btn-sm float-end"
                                    data-ajax-popup-over="true" id="grammarCheck"
                                    data-url="<?php echo e(route('grammar', ['grammar'])); ?>" data-bs-placement="top"
                                    data-title="<?php echo e(__('Grammar check with AI')); ?>">
                                    <i class="ti ti-rotate"></i> <span><?php echo e(__('Grammar check with AI')); ?></span>
                                </a>
                            <?php endif; ?>
                            <textarea class="form-control editor summernote-simple" name="requirement" id="requirement" rows="3"></textarea>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-end">
            <div class="form-group">
                <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function() {
            var now = new Date();
            var month = (now.getMonth() + 1);
            var day = now.getDate();
            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;
            var today = now.getFullYear() + '-' + month + '-' + day;
            $('.current_date').val(today);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bizz Solutions PLC\CA-Firm-HR-main\resources\views/job/create.blade.php ENDPATH**/ ?>