
<x-app-layout>
    
 @vite('resources/css/tutorial.css')
 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="tutorial-header">
                    <div class="container">
                        <div class="tutorial-hero">
                            <h1>How to Create a Professional Resume</h1>
                            <p>Master the art of resume writing with our comprehensive guide. Learn proven strategies to land your dream job.</p>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="tutorial-nav">
                        <h2>Quick Navigation</h2>
                        <div class="nav-grid">
                            <a href="#basics" class="nav-item">
                                <h3>Resume Basics</h3>
                                <p>Essential components and structure</p>
                            </a>
                            <a href="#sections" class="nav-item">
                                <h3>Key Sections</h3>
                                <p>What to include in each section</p>
                            </a>
                            <a href="#formatting" class="nav-item">
                                <h3>Formatting Tips</h3>
                                <p>Make your resume visually appealing</p>
                            </a>
                            <a href="#mistakes" class="nav-item">
                                <h3>Common Mistakes</h3>
                                <p>What to avoid at all costs</p>
                            </a>
                        </div>
                    </div>

                    <div class="tutorial-section" id="basics">
                        <h2>Resume Basics: Your Foundation for Success</h2>
                        
                        <p>A resume is your personal marketing document that showcases your skills, experience, and achievements to potential employers. It's typically the first impression you make, so it needs to be compelling and professional.</p>

                        <h3>What Makes a Great Resume?</h3>
                        <div class="checklist">
                            <h4>Essential Qualities:</h4>
                            <ul>
                                <li>Clear, scannable format that's easy to read</li>
                                <li>Relevant content tailored to the job you're applying for</li>
                                <li>Quantifiable achievements and results</li>
                                <li>Professional language and tone</li>
                                <li>Error-free grammar and spelling</li>
                                <li>Consistent formatting and design</li>
                            </ul>
                        </div>

                        <div class="tip-box">
                            <h4>💡 Pro Tip</h4>
                            <p>Your resume should tell a story about your career progression and highlight how your experience makes you the perfect fit for the role you're targeting.</p>
                        </div>
                    </div>

                    <div class="tutorial-section" id="sections">
                        <h2>Essential Resume Sections</h2>

                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-content">
                                    <h3>1. Header & Contact Information</h3>
                                    <p>Your name, phone number, email, and LinkedIn profile. Keep it professional and make sure all information is current.</p>
                                    <div class="example-box">
                                        <h4>Example:</h4>
                                        <p><strong>{{ $user->name ?? 'John Smith' }}</strong><br>
                                        {{ $user->phone ?? '(555) 123-4567' }} | {{ $user->email ?? 'john.smith@email.com' }}<br>
                                        {{ $user->linkedin ?? 'linkedin.com/in/johnsmith' }} | {{ $user->location ?? 'New York, NY' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-content">
                                    <h3>2. Professional Summary</h3>
                                    <p>A brief 2-3 sentence overview of your experience, skills, and career goals. This is your elevator pitch.</p>
                                    <div class="example-box">
                                        <h4>Example:</h4>
                                        <p>"Results-driven marketing professional with 5+ years of experience in digital marketing and brand management. Proven track record of increasing brand awareness by 40% and driving revenue growth through innovative campaigns."</p>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-content">
                                    <h3>3. Work Experience</h3>
                                    <p>List your work history in reverse chronological order. Include company name, your title, dates, and bullet points of achievements.</p>
                                    <div class="checklist">
                                        <h4>For Each Position Include:</h4>
                                        <ul>
                                            <li>Job title and company name</li>
                                            <li>Employment dates (month/year)</li>
                                            <li>3-5 bullet points of key achievements</li>
                                            <li>Quantifiable results when possible</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-content">
                                    <h3>4. Education</h3>
                                    <p>Include your degree, school name, graduation date, and relevant coursework or honors.</p>
                                    <div class="tip-box">
                                        <h4>💡 Tip</h4>
                                        <p>If you're a recent graduate, put education before experience. If you have significant work experience, put it after experience.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-content">
                                    <h3>5. Skills</h3>
                                    <p>Highlight technical skills, software proficiencies, and relevant certifications that match the job requirements.</p>
                                    <div class="example-box">
                                        <h4>Example Categories:</h4>
                                        <p><strong>Technical Skills:</strong> Python, JavaScript, SQL, AWS<br>
                                        <strong>Design Tools:</strong> Adobe Creative Suite, Figma, Sketch<br>
                                        <strong>Languages:</strong> English (Native), Spanish (Conversational)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tutorial-section" id="formatting">
                        <h2>Formatting & Design Best Practices</h2>

                        <h3>Layout Guidelines</h3>
                        <div class="checklist">
                            <h4>Design Principles:</h4>
                            <ul>
                                <li>Use consistent fonts (stick to 2 maximum)</li>
                                <li>Maintain proper white space and margins</li>
                                <li>Use bullet points for easy scanning</li>
                                <li>Keep it to 1-2 pages maximum</li>
                                <li>Use bold text sparingly for emphasis</li>
                                <li>Ensure consistent alignment and spacing</li>
                            </ul>
                        </div>

                        <h3>ATS-Friendly Formatting</h3>
                        <p>Many companies use Applicant Tracking Systems (ATS) to screen resumes. Here's how to make yours ATS-friendly:</p>
                        
                        <div class="tip-box">
                            <h4>🤖 ATS Optimization</h4>
                            <ul style="margin-top: 0.5rem;">
                                <li>Use standard section headings (Experience, Education, Skills)</li>
                                <li>Avoid images, graphics, or complex formatting</li>
                                <li>Use standard fonts like Arial, Calibri, or Times New Roman</li>
                                <li>Save as both .docx and .pdf formats</li>
                                <li>Include relevant keywords from the job posting</li>
                            </ul>
                        </div>

                        @if(isset($templates) && count($templates) > 0)
                        <div class="example-box">
                            <h4>📋 Available Templates</h4>
                            <p>Choose from our {{ count($templates) }} professionally designed templates that are both ATS-friendly and visually appealing.</p>
                            <a href="{{ route('templates.index') }}" class="btn btn-sm btn-primary">View Templates</a>
                        </div>
                        @endif
                    </div>

                    <div class="tutorial-section" id="mistakes">
                        <h2>Common Resume Mistakes to Avoid</h2>

                        <div class="warning-box">
                            <h4>🚫 Critical Errors</h4>
                            <ul>
                                <li><strong>Spelling and Grammar Errors:</strong> Always proofread multiple times</li>
                                <li><strong>Generic Content:</strong> Tailor your resume for each application</li>
                                <li><strong>Outdated Information:</strong> Keep contact info and experience current</li>
                                <li><strong>Inconsistent Formatting:</strong> Maintain uniform style throughout</li>
                                <li><strong>Too Long:</strong> Keep it concise and relevant</li>
                            </ul>
                        </div>

                        <h3>Content Mistakes</h3>
                        <div class="checklist">
                            <h4>What NOT to Include:</h4>
                            <ul>
                                <li>Personal information (age, marital status, photo)</li>
                                <li>Irrelevant work experience or hobbies</li>
                                <li>Salary requirements or references</li>
                                <li>Negative language about previous employers</li>
                                <li>Excessive personal pronouns (I, me, my)</li>
                            </ul>
                        </div>

                        <div class="tip-box">
                            <h4>💡 Final Check</h4>
                            <p>Before submitting, ask yourself: "Would I hire this person based on this resume?" If the answer isn't a confident yes, keep refining.</p>
                        </div>
                    </div>

                    <div class="tutorial-section">
                        <h2>Step-by-Step Resume Writing Process</h2>
                        <p>Follow this proven process to create a compelling resume:</p>

                        @php
                        $steps = [
                            ['title' => 'Research & Planning', 'progress' => 20, 'description' => 'Analyze the job posting and identify key requirements and keywords.'],
                            ['title' => 'Content Creation', 'progress' => 40, 'description' => 'Write your professional summary and detailed experience sections.'],
                            ['title' => 'Formatting & Design', 'progress' => 60, 'description' => 'Apply consistent formatting and choose an appropriate template.'],
                            ['title' => 'Review & Optimize', 'progress' => 80, 'description' => 'Proofread, check for ATS compatibility, and get feedback.'],
                            ['title' => 'Final Submission', 'progress' => 100, 'description' => 'Submit your polished resume and prepare for interviews.']
                        ];
                        @endphp

                        @foreach($steps as $index => $step)
                        <div class="progress-container">
                            <div class="step-title">Step {{ $index + 1 }}: {{ $step['title'] }}</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ $step['progress'] }}%"></div>
                            </div>
                            <div class="step-description">{{ $step['description'] }}</div>
                        </div>
                        @endforeach
                    </div>

                    <div class="cta-section">
                        <h2>Ready to Build Your Perfect Resume?</h2>
                        <p>Put your knowledge into practice with our easy-to-use resume builder. Create a professional resume in minutes with our guided process and expert templates.</p>
                        <a href="{{ route('templates.index') }}" class="btn-cta btn-secondary">View Templates</a>
                    </div>
                </div>
</div>
        </div>
                <script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add animations when sections come into view
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.tutorial-section').forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
        section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(section);
    });

    // Progress bar animation
    const progressBars = document.querySelectorAll('.progress-fill');
    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const width = entry.target.style.width;
                entry.target.style.width = '0%';
                setTimeout(() => {
                    entry.target.style.width = width;
                }, 200);
            }
        });
    }, observerOptions);

    progressBars.forEach(bar => {
        progressObserver.observe(bar);
    });
});
</script>
</x-app-layout>