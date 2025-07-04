<x-app-layout>
    <div x-data="resumeEditor()" x-init="initializeData()">
        
            <!-- Main Container -->
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
                                           
                                            <!-- Header Section -->
                            <div class="bg-gradient-to-r from-red-600 to-red-700 shadow-lg">
                                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                                    <div class="flex justify-between items-center">
                                        <!-- Left Side: Title -->
                                        <div class="flex items-center space-x-4">
                                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-red-100 text-sm font-medium uppercase tracking-wider">Editor</div>
                                                <h1 class="text-2xl font-bold text-white">Resume Editor</h1>
                                            </div>
                                        </div>

                                        <!-- Right Side: Action Buttons -->
                                        <div class="flex items-center space-x-3">

                                            <!-- Import Data Button -->
                                            <button @click="openImportModal = true" type="button" class="bg-white/10 hover:bg-white/20 text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition-all duration-200 border border-white/20 flex items-center space-x-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                                </svg>
                                                <span>Import Data</span>
                                            </button>

                                            <!-- Change Template Button -->
                                            <button @click="openTemplateModal = true" type="button" class="bg-white/10 hover:bg-white/20 text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition-all duration-200 flex items-center space-x-2">
                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c.251.023.501.05.75.082m.75.082a24.301 24.301 0 004.5 0m0 0a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-6a2.25 2.25 0 01-2.25-2.25v-7.5a2.25 2.25 0 012.25-2.25z" />
                                                </svg>
                                                <span>Change Template</span>
                                            </button>

                                            <!-- Preview Button (inside a form) -->
                                            <form x-ref="previewForm" action="{{ route('resumes.preview', $resume) }}" method="POST" target="_blank">
                                                @csrf
                                                <input type="hidden" name="payload" :value="JSON.stringify({
                                                    name: resumeName,
                                                    template_id: contact.template_id,
                                                    contact: contact,
                                                    experiences: experiences,
                                                    education: education,
                                                    skills: skills
                                                })">
                                                <button @click="$refs.previewForm.submit()" type="button" class="bg-gray-900 hover:bg-black text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition-all duration-200 flex items-center space-x-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    <span>Preview</span>
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

            <!-- Main Content -->
            <div class="max-w-6xl mx-auto px-4 py-8">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
                    <div class="p-8">
                        <!-- Resume Title Section -->
                        <div class="mb-10">
                            <div class="flex items-center mb-4">
                                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <label for="resume_name" class="text-xl font-bold text-gray-900">Resume Title</label>
                            </div>
                            <input type="text" id="resume_name" x-model="resumeName" class="w-full p-4 border-2 border-gray-200 rounded-xl text-lg font-medium focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200" placeholder="Enter your resume title...">
                        </div>

                        <!-- Contact Information Section -->
                      
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                                <!-- NEW GRID FOR PHOTO + FIELDS -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    
                                    <!-- NEW AJAX UPLOAD -->
                                                <div class="md:col-span-1">
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
                                                    <div class="mt-1">
                                                        <!-- Image Preview -->
                                                        <div class="w-40 h-40 rounded-full bg-gray-200 mb-4 flex items-center justify-center overflow-hidden relative group">
                                                            <!-- Spinner Overlay for Uploading State -->
                                                            <div x-show="isUploadingPhoto" class="absolute inset-0 bg-black/50 flex items-center justify-center z-10" style="display: none;">
                                                                <svg class="w-10 h-10 text-white animate-spin" fill="none" viewBox="0 0 24 24">
                                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                                </svg>
                                                            </div>
                                                            <!-- The Image -->
                                                            <img x-show="contact.photo_path" :src="`/storage/${contact.photo_path}`" alt="Profile Photo" class="w-full h-full object-cover">
                                                            <!-- Placeholder Icon -->
                                                            <svg x-show="!contact.photo_path && !isUploadingPhoto" class="w-20 h-20 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                            </svg>
                                                        </div>

                                                        <!-- Hidden file input that triggers our Alpine function -->
                                                        <input type="file" id="photo" class="hidden" @change="uploadPhoto($event)">
                                                        
                                                        <!-- The button the user actually clicks -->
                                                        <label for="photo" class="cursor-pointer bg-white hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 rounded-lg border border-gray-300 transition-all duration-200 text-sm">
                                                            Upload Image
                                                        </label>
                                                    </div>
                                                </div>

                                    <!-- Right Column: Existing Fields -->
                                    <div class="md:col-span-2 space-y-4">
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                                <input type="text" x-model="contact.full_name" placeholder="Enter your full name" class="w-full p-3 border border-gray-300 rounded-lg ...">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                                <input type="text" x-model="contact.phone" placeholder="Enter your phone number" class="w-full p-3 border border-gray-300 rounded-lg ...">
                                            </div>
                                        </div>
                                    
                                        <div>
                                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                            <input type="text" id="address" x-model="contact.address" placeholder="your email address" 
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 ...">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Professional Summary</label>
                                            <textarea x-model="contact.summary" placeholder="Write a brief professional summary..." rows="4" class="w-full p-3 border border-gray-300 rounded-lg ..."></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        <!-- Work Experience Section -->
                        <div class="mb-10">
                            <div class="flex justify-between items-center mb-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                        </svg>
                                    </div>
                                    <h2 class="text-xl font-bold text-gray-900">Work Experience</h2>
                                </div>
                                <button type="button" @click="addExperience()" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition-all duration-200 flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span>Add Experience</span>
                                </button>
                            </div>
                            <div class="space-y-6">
                                <template x-for="(experience, index) in experiences" :key="index">
                                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 hover:shadow-md transition-all duration-200">
                                        <div class="flex justify-between items-start mb-4">
                                            <div class="flex items-center">
                                                <div class="w-6 h-6 bg-green-200 rounded-full flex items-center justify-center mr-3">
                                                    <span class="text-green-700 text-sm font-bold" x-text="index + 1"></span>
                                                </div>
                                                <h3 class="font-semibold text-gray-900">Experience #<span x-text="index + 1"></span></h3>
                                            </div>
                                            <button type="button" @click="removeExperience(index)" class="text-red-500 hover:text-red-700 text-sm font-medium hover:bg-red-50 px-2 py-1 rounded transition-all duration-200">Remove</button>
                                        </div>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Company Name</label>
                                                <input type="text" x-model="experience.company_name" placeholder="Company Name" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Job Title</label>
                                                <input type="text" x-model="experience.job_title" placeholder="Job Title" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200">
                                            </div>
                                            <!-- In Work Experience section -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                                            <input type="date" x-model="experience.start_date" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                                            <input type="date" x-model="experience.end_date" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200">
                                        </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Job Description</label>
                                            <textarea x-model="experience.description" placeholder="Describe your responsibilities and achievements..." rows="3" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200"></textarea>
                                        </div>
                                    </div>
                                </template>
                                <div x-show="experiences.length === 0" class="text-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">No work experience added yet</p>
                                    <p class="text-gray-400 text-sm">Click "Add Experience" to get started</p>
                                </div>
                            </div>
                        </div>

                        <!-- Skills Section -->
                        <div class="mb-10">
                            <div class="flex justify-between items-center mb-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                        </svg>
                                    </div>
                                    <h2 class="text-xl font-bold text-gray-900">Skills</h2>
                                </div>
                                <button type="button" @click="addSkill()" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition-all duration-200 flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span>Add Skill</span>
                                </button>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Add New Skill</label>
                                    <input type="text" x-model="newSkillName" @keydown.enter.prevent="addSkill()" placeholder="Type a skill and press Enter" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200">
                                </div>
                                <div class="flex flex-wrap gap-3">
                                    <template x-for="(skill, index) in skills" :key="index">
                                        <div class="bg-white border border-gray-300 text-gray-700 font-medium py-2 px-4 rounded-full flex items-center shadow-sm hover:shadow-md transition-all duration-200">
                                            <span x-text="skill.skill_name" class="mr-2"></span>
                                            <button type="button" @click="removeSkill(index)" class="text-red-500 hover:text-red-700 font-bold text-lg leading-none">×</button>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="skills.length === 0" class="text-center py-8">
                                    <svg class="w-10 h-10 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">No skills added yet</p>
                                    <p class="text-gray-400 text-sm">Add your skills to showcase your expertise</p>
                                </div>
                            </div>
                        </div>

                        <!-- Education Section -->
                        <div class="mb-10">
                            <div class="flex justify-between items-center mb-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                        </svg>
                                    </div>
                                    <h2 class="text-xl font-bold text-gray-900">Education</h2>
                                </div>
                                <button type="button" @click="addEducation()" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition-all duration-200 flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span>Add Education</span>
                                </button>
                            </div>
                            <div class="space-y-6">
                                <template x-for="(edu, index) in education" :key="index">
                                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 hover:shadow-md transition-all duration-200">
                                        <div class="flex justify-between items-start mb-4">
                                            <div class="flex items-center">
                                                <div class="w-6 h-6 bg-yellow-200 rounded-full flex items-center justify-center mr-3">
                                                    <span class="text-yellow-700 text-sm font-bold" x-text="index + 1"></span>
                                                </div>
                                                <h3 class="font-semibold text-gray-900">Education #<span x-text="index + 1"></span></h3>
                                            </div>
                                            <button type="button" @click="removeEducation(index)" class="text-red-500 hover:text-red-700 text-sm font-medium hover:bg-red-50 px-2 py-1 rounded transition-all duration-200">Remove</button>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">School/University Name</label>
                                            <input type="text" x-model="edu.school_name" placeholder="School/University Name" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200">
                                        </div>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Degree</label>
                                                <input type="text" x-model="edu.degree" placeholder="Degree (e.g., B.S.)" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Field of Study</label>
                                                <input type="text" x-model="edu.field" placeholder="Field of Study (e.g., Computer Science)" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200">
                                            </div>
                                           <!-- CORRECTED CODE -->
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                                                        <input type="date" x-model="edu.start_date" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200">
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                                                        <input type="date" x-model="edu.end_date" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200">
                                                    </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Additional Details</label>
                                            <textarea x-model="edu.description" placeholder="Description (e.g., GPA, Honors, Relevant Coursework)..." rows="2" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200"></textarea>
                                        </div>
                                    </div>
                                </template>
                                <div x-show="education.length === 0" class="text-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">No education added yet</p>
                                    <p class="text-gray-400 text-sm">Click "Add Education" to include your academic background</p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="border-t border-gray-200 pt-8">
     <div class="flex flex-col sm:flex-row justify-end items-center space-y-3 sm:space-y-0 sm:space-x-4">
        
        <!-- ============================================= -->
        <!-- DOWNLOAD BUTTON (AS A FORM)                   -->
        <!-- ============================================= -->
        <form action="{{ route('resumes.processDownload', $resume) }}" method="POST" target="_blank">
            @csrf
            {{-- This hidden input sends the required 'format' data --}}
            <input type="hidden" name="format" value="pdf">
            
            {{-- This button is styled to look exactly like your old link --}}
            <button type="submit" class="w-full sm:w-auto bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-8 rounded-lg text-center transition-all duration-200 flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span>Download</span>
            </button>
        </form>

        <!-- SHARE BUTTON (This link is correct) -->
        <a href="{{ route('resumes.share', $resume) }}" target="_blank" class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-lg text-center transition-all duration-200 flex items-center justify-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
            </svg>
            <span>Share</span>
        </a>

        <!-- SAVE BUTTON (This button is correct) -->
        <button @click="saveResume()" type="button" class="w-full sm:w-auto bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-lg transition-all duration-200 flex items-center justify-center space-x-2" :disabled="isSaving">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!isSaving">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"></path>
            </svg>
            <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24" x-show="isSaving" style="display: none;">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span x-text="isSaving ? 'Saving...' : 'Save Changes'"></span>
        </button>

        <!-- Template Selection Modal -->
<div x-show="openTemplateModal" @click.away="openTemplateModal = false" x-cloak class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 p-4" style="display: none;">
    <div
        class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-4xl transform transition-all"
        x-show="openTemplateModal"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
    >
        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-900">Select a New Template</h3>
            <button @click="openTemplateModal = false" class="text-gray-400 hover:text-gray-600">×</button>
        </div>

        <!-- Templates Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-h-[70vh] overflow-y-auto p-2">
            <template x-for="template in templates" :key="template.id">
                <div @click="selectTemplate(template.id)"
                    class="cursor-pointer border-4 rounded-lg overflow-hidden transition-all duration-200"
                    :class="template.id === contact.template_id ? 'border-red-500' : 'border-transparent hover:border-red-300'">
                    <img :src="template.preview_image_url" :alt="template.name" class="w-full h-auto object-cover">
                    <div class="p-3 bg-gray-50 text-center">
                        <p class="font-semibold text-gray-800" x-text="template.name"></p>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>

    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Import Modal -->
        <div x-show="openImportModal" @click.away="openImportModal = false" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" style="display: none;">
            <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-lg text-black transform transition-all duration-300" x-show="openImportModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Import Resume Data</h3>
                </div>
                
                <div class="mb-6">
                    <label for="import-source" class="block font-semibold text-gray-700 mb-3">Select resume to import from:</label>
                    <select id="import-source" x-model="selectedResumeId" class="block w-full p-3 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200">
                        <option value="">-- Please choose a resume --</option>
                        @foreach(Auth::user()->resumes()->where('resume_id', '!=', $resume->resume_id)->get() as $otherResume)
                            <option value="{{ $otherResume->resume_id }}">{{ $otherResume->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-8">
                    <p class="block font-semibold text-gray-700 mb-4">Sections to import:</p>
                    <div class="space-y-3">
                        <label class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <input type="checkbox" x-model="sectionsToImport.contact" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 mr-3">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="font-medium">Contact Information</span>
                            </div>
                        </label>
                        <label class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <input type="checkbox" x-model="sectionsToImport.experiences" class="rounded border-gray-300 text-green-600 focus:ring-green-500 mr-3">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                </svg>
                                <span class="font-medium">Work Experience</span>
                            </div>
                        </label>
                        <label class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <input type="checkbox" x-model="sectionsToImport.education" class="rounded border-gray-300 text-yellow-600 focus:ring-yellow-500 mr-3">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                </svg>
                                <span class="font-medium">Education</span>
                            </div>
                        </label>
                        <label class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <input type="checkbox" x-model="sectionsToImport.skills" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500 mr-3">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                                <span class="font-medium">Skills</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end space-x-3">
                    <button @click="openImportModal = false" type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition-all duration-200">Cancel</button>
                    <button @click="importData()" type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-200 flex items-center space-x-2" :disabled="!selectedResumeId">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                        </svg>
                        <span>Import Selected</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    

<!-- JavaScript -->
<script>
 // In <script> tag

// Our standard placeholder data for taking screenshots.
const dummyData = {
    name: 'Classic Professional Template',
    contact: {
        full_name: 'Alexandria Doe',
        phone: '(555) 123-4567',
        address: '123 Innovation Drive, Tech City, 12345',
        summary: 'A highly motivated and detail-oriented Full-Stack Developer with over 5 years of experience in building and maintaining scalable web applications. Proficient in modern frameworks and passionate about creating clean code and exceptional user experiences.'
        // No email here, as it's pulled from the user account.
        // No photo_path, as we don't need one for template previews.
    },
    experiences: [
        {
            company_name: 'Innovatech Solutions',
            job_title: 'Senior Software Engineer',
            start_date: '2020-01-01',
            end_date: '2024-01-01',
            description: '• Led the development of new features for a flagship SaaS product.\n• Mentored junior developers and conducted code reviews.\n• Optimized application performance, reducing page load times by 30%.'
        },
        {
            company_name: 'Digital Creations Agency',
            job_title: 'Web Developer',
            start_date: '2018-06-01',
            end_date: '2019-12-31',
            description: '• Developed custom WordPress themes and plugins for various clients.\n• Translated Figma mockups into responsive, functional websites.'
        }
    ],
    education: [
        {
            school_name: 'State University',
            degree: 'B.S. in Computer Science',
            field: 'Software Engineering',
            start_date: '2014-08-01',
            end_date: '2018-05-01',
            description: '• Graduated Magna Cum Laude (3.9 GPA)\n• President of the University Coding Club'
        }
    ],
    skills: [
        { skill_name: 'PHP & Laravel' },
        { skill_name: 'JavaScript & Vue.js' },
        { skill_name: 'MySQL & PostgreSQL' },
        { skill_name: 'Docker & CI/CD' },
        { skill_name: 'API Design (RESTful)' },
        { skill_name: 'Agile Methodologies' }
    ]
};


    function resumeEditor() {
        return {
            // STEP 1: All state variables are initialized as empty/default first.
            resumeName: '',
            contact: { full_name: '', phone: '', address: '', summary: '' },
            experiences: [],
            education: [],
            skills: [],
            newSkillName: '',
            isSaving: false,
            isUploadingPhoto: false,
            openImportModal: false,
            selectedResumeId: '',
            sectionsToImport: { contact: true, experiences: true, education: true, skills: true },
            // NEW: This variable controls the template selection modal
            openTemplateModal: false, // <<-- THIS LINE IS ESSENTIAL. Make sure it's here.
            templates: [], 

            // STEP 2: This function runs on page load because of `x-init="initializeData()"`.
            // It populates the empty variables above with data from your Laravel controller.
            initializeData() {
                // this.resumeName = '{{ addslashes($resume->name) }}';
                // this.contact = {!! json_encode($contactInfo) !!} || { full_name: '', phone: '', address: '', summary: '' };
                // this.experiences = {!! json_encode($experiences) !!} || [];
                // this.education = {!! json_encode($education) !!} || [];
                // this.skills = {!! json_encode($skills) !!} || [];
                    this.resumeName    = dummyData.name;
                    this.contact       = dummyData.contact;
                    this.experiences   = dummyData.experiences;
                    this.education     = dummyData.education;
                    this.skills        = dummyData.skills;
            },
              // --- ADD THIS ENTIRE NEW METHOD ---

    async uploadPhoto(event) {  

    const file = event.target.files[0];
    if (!file) return;

    this.isUploadingPhoto = true;

    // FormData is the standard way to send files
    const formData = new FormData();
    formData.append('photo', file);

    try {
        // Use the correct route and simplified FormData
        const response = await fetch('{{ route("resumes.photo.update", $resume) }}', {
            method: 'POST', // Use POST directly
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token is crucial
            },
            body: formData
        });

        if (response.ok) {
            const result = await response.json();
            // This is the key part: update the 'contact' object in Alpine's state.
            // This will automatically update the <img> src attribute.
            this.contact.photo_path = result.photo_path; 
            this.showSuccessMessage('Photo uploaded successfully!');
        } else {
            // If the server returns an error, we can try to show it.
            const errorResult = await response.json();
            alert('Upload failed: ' + (errorResult.message || 'Unknown error'));
        }
    } catch (error) {
        alert('An error occurred while uploading the photo.');
        console.error('Upload error:', error);
    } finally {
        this.isUploadingPhoto = false;
        event.target.value = null; // Clear the file input
    }
},

            // --- All your feature methods remain unchanged ---

            // Methods for adding/removing items dynamically
            addExperience() {
                this.experiences.push({ company_name: '', job_title: '', start_date: '', end_date: '', description: '' });
            },
            removeExperience(index) {
                this.experiences.splice(index, 1);
            },
            addEducation() {
                this.education.push({ school_name: '', degree: '', field: '', start_date: '', end_date: '', description: '' });
            },
            removeEducation(index) {
                this.education.splice(index, 1);
            },
            addSkill() {
                if (this.newSkillName.trim()) {
                    this.skills.push({ skill_name: this.newSkillName.trim(), level: 'Proficient' });
                    this.newSkillName = '';
                }
            },
            removeSkill(index) {
                this.skills.splice(index, 1);
            },

            // Method to save all data to the backend
            async saveResume() {
                this.isSaving = true;

                const payload = {
                    name: this.resumeName,
                    contact: this.contact,
                    experiences: this.experiences,
                    education: this.education,
                    skills: this.skills,
                };

                try {
                    const response = await fetch('{{ route("resumes.update", $resume) }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            _method: 'PUT',
                            ...payload
                        })
                    });

                    if (response.ok) {
                        const result = await response.json();
                        this.showSuccessMessage('Resume saved successfully!');
                    } else {
                        const errorData = await response.json();
                        let errorMessage = 'An error occurred. Please check your input.';
                        if (errorData.errors) {
                            errorMessage = Object.values(errorData.errors).flat().join('\n');
                        }
                        alert(errorMessage);
                    }
                } catch (error) {
                    alert('A network error occurred while saving. Please check your connection.');
                } finally {
                    this.isSaving = false;
                }
            },

            // Method to import data from another resume
          

                async importData() {
                    if (!this.selectedResumeId) {
                        alert('Please select a resume to import from.');
                        return;
                    }

                    try {
                        // CORRECTED: Use the new route name to build the URL
                        const response = await fetch(`/resumes/${this.selectedResumeId}/data`); // Corrected URL

                        if (!response.ok) {
                            throw new Error('Failed to fetch resume data. Please try again.');
                        }

                        const sourceData = await response.json();

                        // Helper function to strip out Laravel's timestamps and IDs
                        const cleanItems = (items) => {
                            if (!Array.isArray(items)) return [];
                            return items.map(item => {
                                const { id, user_id, resume_id, created_at, updated_at, ...rest } = item;
                                // For skills and experiences, you might have different IDs
                                const { exp_id, edu_id, skill_id, ...finalRest } = rest;
                                return finalRest;
                            });
                        };

                        // Now, update the current form's state based on user's checkbox selections
                        if (this.sectionsToImport.contact && sourceData.contactInfo) {
                            // We only update the fields, we don't want to overwrite the photo path logic
                            const { photo_path, ...contactDetails } = sourceData.contactInfo;
                            this.contact = { ...this.contact, ...contactDetails };
                        }
                        if (this.sectionsToImport.experiences && sourceData.experiences) {
                            this.experiences = cleanItems(sourceData.experiences);
                        }
                        if (this.sectionsToImport.education && sourceData.educations) {
                            this.education = cleanItems(sourceData.educations);
                        }
                        if (this.sectionsToImport.skills && sourceData.skills) {
                            this.skills = cleanItems(sourceData.skills);
                        }

                        // Close the modal and show a success message
                        this.openImportModal = false;
                        this.showSuccessMessage('Data imported successfully!');

                    } catch (error) {
                        console.error('Import Error:', error);
                        alert(error.message);
                    }
                },
                            // Helper method for showing a success notification
            showSuccessMessage(message) {
                const successDiv = document.createElement('div');
                successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center space-x-2';
                successDiv.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>${message}</span>
                `;
                document.body.appendChild(successDiv);
                setTimeout(() => successDiv.remove(), 3000);
            }
        }
    }
</script>
</x-app-layout>
        