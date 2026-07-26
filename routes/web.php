    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\TemplateController;
    use App\Http\Controllers\ResumeController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\TutorialController;

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Handles the form on the homepage for pasting a share link
    Route::post('/view-resume-from-link', [ResumeController::class, 'redirectFromLink'])->name('resumes.viewFromLink');
    Route::get('/resumes/public/{shareUrl}', [App\Http\Controllers\ResumeShareController::class, 'publicShow'])->name('resumes.public.show');

    Route::get('/tutorial', [TutorialController::class, 'howToCreateResume'])->name('tutorial');


    Route::middleware(['auth', 'verified'])->group(function () {
        
        // --- Dashboard ---
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // --- Profile Management (from Breeze) ---
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // --- Resume Management & Actions ---
        
        // Page to choose a template
        Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
        
        // Standard Resume Actions (CRUD)
        Route::post('/resumes', [ResumeController::class, 'store'])->name('resumes.store');
        Route::get('/resumes/{resume}/edit', [ResumeController::class, 'edit'])->name('resumes.edit');
        Route::put('/resumes/{resume}', [ResumeController::class, 'update'])->name('resumes.update');
        Route::delete('/resumes/{resume}', [ResumeController::class, 'destroy'])->name('resumes.destroy');

        // Custom Resume Actions
        Route::match(['get', 'post'], '/resumes/{resume}/preview', [ResumeController::class, 'preview'])->name('resumes.preview');
        Route::patch('/resumes/{resume}/toggle-status', [ResumeController::class, 'toggleStatus'])->name('resumes.toggleStatus');
        Route::post('/resumes/{resume}/photo', [ResumeController::class, 'updatePhoto'])->name('resumes.photo.update');
        
    
        // Sharing Routes
        Route::get('/resumes/{resume}/share', [ResumeController::class, 'showSharePage'])->name('resumes.share');
        Route::put('/resumes/{resume}/share', [ResumeController::class, 'updateShareSettings'])->name('resumes.share.update');

        // Downloading Route (The POST action is what matters)
        Route::post('/resumes/{resume}/download', [ResumeController::class, 'processDownload'])->name('resumes.processDownload');
        Route::get('/resumes/{resume}/import-data', [ResumeController::class, 'getDataForImport'])->name('resumes.import.data');
        

        // This route will handle the form submission from your "Change Template" modal.
        Route::put('/resumes/{resume}/change-template', [ResumeController::class, 'changeTemplate'])->name('resumes.template.change');

    });



    require __DIR__.'/auth.php';