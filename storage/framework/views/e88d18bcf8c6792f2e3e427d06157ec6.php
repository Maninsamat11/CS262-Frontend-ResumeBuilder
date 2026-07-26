<?php
    // Resume templates used to rely on the Tailwind CDN <script>, which
    // generates CSS via JavaScript in the browser. That works fine for a live
    // browser tab, but silently produces ZERO styling when this view is
    // rendered by DOMPDF (no JS engine at all) or by a headless-Chrome tool
    // in an environment where the CDN request fails/is blocked (e.g. a
    // serverless function with no outbound internet). Instead, we inline the
    // real, pre-compiled Tailwind CSS (built via `npm run build`) directly
    // into the page. This is 100% static CSS with no JS or network
    // dependency, so it renders identically in the browser, DOMPDF, and
    // Browsershot alike.
    $inlineCss = '';
    $manifestPath = public_path('build/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);
        $cssFile = $manifest['resources/css/app.css']['file'] ?? null;

        if ($cssFile) {
            $cssPath = public_path('build/' . $cssFile);
            if (file_exists($cssPath)) {
                $inlineCss = file_get_contents($cssPath);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Preview</title>
    <?php if($inlineCss): ?>
        <style><?php echo $inlineCss; ?></style>
    <?php else: ?>
        
        <script src="https://cdn.tailwindcss.com"></script>
    <?php endif; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Poppins:wght@400;600;800&family=Roboto:wght@300;400;700&family=Playfair+Display:wght@700&family=Raleway:wght@400;500&family=Montserrat:wght@400;700&family=Merriweather:wght@700&family=Lato:wght@400;700&family=Inter:wght@400;700;900&family=Source+Sans+Pro:wght@400;600;700&family=Cormorant+Garamond:wght@600&family=Open+Sans:wght@400;600&family=Bangers&display=swap" rel="stylesheet">
    
<style>
    *, *::before, *::after {
        box-sizing: border-box;
    }
    body, html {
        margin: 0;
        padding: 0;
    }
    body {
        background-color: #E6E6E6;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 2rem;
        min-height: 100vh;
    }
    .page {
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
        width: 210mm;
        height: 297mm;
        overflow: hidden;
        margin: 0 auto;
        display: flex;
    }
    #resume-container {
        width: 100%;
        height: 100%;
        display: flex;
    }
    #resume-container > * {
        width: 100%;
        height: 100%;
    }
    
  
    #resume-container > * > :first-child {
        margin-top: 0;
    }

    @media print {
        body { background-color: #FFF; padding: 0; }
        .page { box-shadow: none; margin: 0; width: 100%; height: auto; }
    }
</style>
</head>
<body>
    <div class="page">
        <div id="resume-container">
            <?php echo $content; ?>

        </div>
    </div>
</body>
</html><?php /**PATH C:\wamp64\www\CS262-Frontend-ResumeBuilder-Ver2\resources\views/resumes/preview_layout.blade.php ENDPATH**/ ?>