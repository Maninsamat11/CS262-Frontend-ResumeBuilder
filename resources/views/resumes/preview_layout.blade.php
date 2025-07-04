<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Preview</title>
    <style>
        
        /* A little reset for consistency */
        body, html {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        /* Use a light gray background to make the white page stand out */
        body {
            background-color: #E6E6E6;
            display: flex;
            justify-content: center;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        /* This is the magic part: The A4 Page Container */
        .page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            /* Add a shadow to look like a real page */
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);

            /* A4 Dimensions */
            width: auto;
            height: auto;

            /* Add padding for the content (page margins) */
            padding: 2cm;
            box-sizing: border-box; /* Important to include padding in the width/height */
        }
        
        /* This is for the content that will be generated from your template */
        .resume-content {
            width: 100%;
            height: 100%;
        }

        /* For printing, hide the shadow and background */
        @media print {
            body {
                background-color: #FFF;
                padding: 0;
            }
            .page {
                box-shadow: none;
                margin: 0;
                height: auto; /* Allow content to flow across pages */
            }
        }
    </style>
</head>
<body>

    <!-- This is where your generated resume will be injected -->
    <div class="page">
        <div class="resume-content">
            {!! $content !!}
        </div>
    </div>

</body>
</html>