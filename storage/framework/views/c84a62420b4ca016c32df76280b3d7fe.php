<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="bg-gradient-to-r from-red-600 to-red-800 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <h2 class="font-bold text-2xl text-white leading-tight flex items-center">
                <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <?php echo e(__('Dashboard')); ?>

            </h2>
            <p class="text-red-100 mt-2 text-lg">Welcome back, <?php echo e(Auth::user()->name); ?> — here's an overview of your resumes</p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <?php if(session('status')): ?>
                <div class="mb-6 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-lg">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <!-- ACCOUNT SUMMARY -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-10">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-gradient-to-r from-red-600 to-red-800 rounded-full flex items-center justify-center text-white font-bold text-xl mr-4 flex-shrink-0">
                        <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-900"><?php echo e(Auth::user()->name); ?></p>
                        <p class="text-sm text-gray-500"><?php echo e(Auth::user()->email); ?></p>
                        <p class="text-xs text-gray-400 mt-1">Member since <?php echo e(Auth::user()->created_at->format('M Y')); ?></p>
                    </div>
                </div>
                <a href="<?php echo e(route('profile.edit')); ?>" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-2 px-6 rounded-full transition-all duration-200 text-center">
                    Edit Profile
                </a>
            </div>

            <!-- ACCOUNT STATISTICS -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-10">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 flex items-center">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900"><?php echo e($resumes->count()); ?></div>
                        <div class="text-sm text-gray-500">Total Resumes</div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 flex items-center">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900"><?php echo e($resumes->sum('views')); ?></div>
                        <div class="text-sm text-gray-500">Total Views</div>
                    </div>
                </div>
                <a href="<?php echo e(route('templates.index')); ?>" class="bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-900 rounded-2xl shadow-lg p-6 flex items-center text-white transition-all duration-200 transform hover:scale-105">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold">Create New Resume</div>
                        <div class="text-sm text-red-100">Start from a template</div>
                    </div>
                </a>
            </div>

            <!-- MY RESUMES -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold flex items-center text-gray-900">
                    <div class="w-8 h-8 bg-red-100 rounded-lg mr-3 flex items-center justify-center text-red-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    My Resumes
                </h2>
                <a href="<?php echo e(route('templates.index')); ?>" class="bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-900 text-white font-bold py-2 px-4 rounded-lg transform hover:scale-105 transition-all duration-200 shadow-lg">+ Create New Resume</a>
            </div>

            <!-- RESUME LIST -->
            <div class="space-y-6">
                <?php $__empty_1 = true; $__currentLoopData = $resumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-white text-gray-800 p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Top part: Info and Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-between">
                            <div class="flex items-start mb-4 sm:mb-0">
                                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0 text-red-600">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo e($resume->name); ?></h3>
                                    <div class="space-y-1">
                                        <p class="text-sm text-gray-500 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.414L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg>
                                            Last updated <?php echo e($resume->updated_at->format('Y-m-d')); ?>

                                        </p>
                                        <p class="text-sm text-gray-500 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <?php echo e($resume->views ?? 0); ?> views
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2 mt-4 sm:mt-0 flex-wrap gap-2">
                                <a href="<?php echo e(route('resumes.preview', $resume)); ?>" target="_blank" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded-lg text-sm transform hover:scale-105 transition-all duration-200">View</a>
                                <a href="<?php echo e(route('resumes.edit', $resume)); ?>" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded-lg text-sm transform hover:scale-105 transition-all duration-200">Edit</a>
                                <a href="<?php echo e(route('resumes.share', $resume)); ?>" class="bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-900 text-white font-bold py-2 px-4 rounded-lg text-sm transform hover:scale-105 transition-all duration-200 shadow-md">Share</a>
                                <form action="<?php echo e(route('resumes.destroy', $resume)); ?>" method="POST" onsubmit="return confirm('Delete this resume? This cannot be undone.');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="bg-white border border-red-200 hover:bg-red-50 text-red-600 font-bold py-2 px-4 rounded-lg text-sm transform hover:scale-105 transition-all duration-200">Delete</button>
                                </form>
                            </div>
                        </div>

                        <div class="border-t my-4 border-gray-100"></div>

                        <!-- Bottom part: Functional Visibility Toggle -->
                        <div class="flex items-center bg-gray-50 p-3 rounded-lg">
                            <span class="mr-3 font-bold text-sm flex items-center text-gray-700">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                </svg>
                                VISIBILITY
                            </span>

                            <!-- This form makes the toggle work -->
                            <form action="<?php echo e(route('resumes.toggleStatus', $resume)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button type="submit"
                                        aria-label="Toggle Visibility"
                                        class="relative inline-flex items-center h-6 rounded-full w-11 transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 <?php echo e($resume->status === 'public' ? 'bg-green-500' : 'bg-gray-300'); ?>">
                                    <span class="inline-block w-4 h-4 transform bg-white rounded-full transition-transform <?php echo e($resume->status === 'public' ? 'translate-x-6' : 'translate-x-1'); ?>"></span>
                                </button>
                            </form>

                            <span class="ml-3 font-semibold text-sm uppercase flex items-center <?php echo e($resume->status === 'public' ? 'text-green-700' : 'text-gray-500'); ?>">
                                <?php if($resume->status === 'public'): ?>
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                                <?php else: ?>
                                    <div class="w-2 h-2 bg-gray-400 rounded-full mr-2"></div>
                                <?php endif; ?>
                                <?php echo e($resume->status); ?>

                            </span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="bg-white text-gray-800 p-12 text-center rounded-2xl shadow-lg border border-gray-100">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 text-red-600">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="text-xl text-gray-900 font-semibold">You haven't created any resumes yet.</p>
                        <p class="text-gray-500 mt-1">Pick a template to get started — it only takes a few minutes.</p>
                        <a href="<?php echo e(route('templates.index')); ?>" class="inline-block mt-6 bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-900 text-white font-bold py-3 px-6 rounded-full transform hover:scale-105 transition-all duration-200 shadow-lg">
                            Create Your First Resume
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\CS262-Frontend-ResumeBuilder-Ver2\resources\views/dashboard.blade.php ENDPATH**/ ?>