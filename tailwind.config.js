import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        // The resume templates live as raw HTML strings inside this seeder file
        // (not as .blade.php files), so Tailwind needs to be told to scan it too,
        // otherwise none of the utility classes used inside resume templates
        // (e.g. "bg-blue-900", "grid-cols-12") get compiled into the CSS build,
        // which is what caused downloaded/rendered resumes to show up unstyled.
        './database/seeders/TemplateSeeder.php',
    ],
    // Resume templates are rendered outside the normal request/response cycle
    // (inside DOMPDF / headless Chrome for PDF & PNG downloads), where dynamic
    // class names built from PHP variables can't be picked up by static
    // scanning. Safelisting the full color/spacing palettes used across the
    // 28 templates guarantees every utility a template might need is emitted.
    safelist: [
        {
            pattern: /^(bg|text|border|ring|from|via|to)-(slate|gray|zinc|neutral|stone|red|orange|amber|yellow|lime|green|emerald|teal|cyan|sky|blue|indigo|violet|purple|fuchsia|pink|rose|black|white)(-(50|100|200|300|400|500|600|700|800|900|950))?$/,
        },
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
