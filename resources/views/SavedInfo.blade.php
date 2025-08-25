@extends('layouts.main')
@section('content')
    <style>
        .SavedInfo-chat-content-wrapper {
            max-width: 100%;
        }

        .savedInfo-gemini-data {
            height: 100%;
        }

        .backdrop {
            display: none !important;
        }
    </style>

    <div class="w-[100%]">
        <div class="backdrop" id="backdrop"></div>
        <div class="gemini-data savedInfo-gemini-data">
            <div class="main-chat-area">
                <div class="chat-content-wrapper SavedInfo-chat-content-wrapper" style="background-color: var(--bg-main);">
                    <div class="container relative">
                        <div class="info">
                            <div class="flex items-center justify-between">
                                <h3 class="text-3xl flex items-center g-2 gap-5">Info you asked YOYO to save
                                    <div class="relative">
                                        <span id="gemini-tool"
                                            class="x-flex material-symbols-outlined rounded-full hover:bg-[--bg-hover] w-[40px] h-[40px] items-center justify-center flex cursor-pointer">
                                            info
                                        </span>
                                        <div id="gemini-tool-show"
                                            class="w-[200px] bg-[#E3E3E3] text-[#272727] text-xs p-1 rounded-md absolute top-[100%] right-0 hidden rounded-md shadow-lg">
                                            <p>Info is saved until you delete it. You can turn this off at any
                                                time.<a rel="stylesheet" class="underline"
                                                    href="https://support.google.com/gemini/answer/15637730?visit_id=638853915152956665-2686517658&p=saved_info&rd=1"
                                                    target="_blank"> Learn how saved info is used </a></p>
                                        </div>
                                    </div>
                                </h3>


                                <label class="switch">
                                    <input id="switch-box" type="checkbox" checked>
                                    <span class="slider round "></span>
                                </label>
                            </div>
                            <p class="text-xl text-[--sidebar-text] mt-5 mb-8 lg:w-[80%] w-full">Share info about
                                your life
                                and preferences to get more
                                helpful responses. Add new info here or ask YOYO to remember something during a
                                chat.
                            </p>
                            <div class="flex mb-8 justify-between items-center">
                                <div class="flex gap-4">
                                    <button id="add-info"
                                        class="bg-[--add-btn] text-[--add-btn-text] text-md hover:bg-[#9BBBEF] py-2 px-5 rounded-3xl font-semibold  flex gap-2 disabled:bg-[--add-diseble-btn] disabled:text-[#7C7C7C]"><span
                                            class="font-semibold ">+</span>Add</button>
                                    <button id="example-info"
                                        class=" text-[--input-border-focus] border border text-md hover:bg-[--examples-btn-hover] py-2 px-5 rounded-3xl font-semibold">Show
                                        examples
                                    </button>
                                </div>

                                <div id="all-delete">
                                    <button id="delete-all-btn"
                                        class="text-[--input-border-focus] border border-[--border-color] text-md hover:bg-[--examples-btn-hover] py-2 px-5 rounded-3xl font-semibold">
                                        Delete All
                                    </button>
                                </div>
                            </div>

                            <div id="savedData"></div>

                        </div>

                    </div>

                    <form id="saveinfo-form" action="{{ route('saveinfostore') }}" method="POST"
                        class="bg-[--form-theme] lg:w-[40%] z-[999] md:w-[60%] sm:w-[80%] w-[90%] p-5 rounded-2xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 absolute hidden rounded-2xl shadow-lg">

                        @csrf <!-- Important: Laravel CSRF token -->

                        <h3 class="text-[--text-main] text-2xl">What do you want YOYO to remember?</h3>

                        <textarea id="message"
                            class="w-full mt-8 font-semibold bg-[--input-bg] h-64 p-3 border text-lg text-[--textarea-text] border-[--border-color]-300 rounded-xl focus:outline-none focus:ring focus:border-[--input-border-focus] focus:ring-[--input-border-focus] resize-none textarea"
                            name="description" placeholder="For example, 'I prefer short, concise responses'" maxlength="1000" required></textarea>

                        <!-- Display validation errors -->
                        @error('description')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror

                        <div class="flex gap-2 justify-end mt-8">
                            <button id="saveform-cancle" type="button"
                                class="text-[--input-border-focus] text-md hover:bg-[--examples-btn-hover] py-2 px-3 rounded-3xl">Cancel</button>
                            <button id="submitBtn" type="submit"
                                class="bg-[--add-btn] text-[--add-btn-text] px-6 py-2 rounded-3xl disabled:bg-[--add-diseble-btn] disabled:text-[--add-diseble-btn-text]"
                                disabled>Submit</button>
                        </div>
                    </form>

                    <form action="" id="example-form"
                        class="bg-[--form-theme] lg:w-[30%] z-[999] md:w-[50%] sm:w-[70%] w-[85%] pt-5 px-8 pb-6  rounded-2xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 absolute hidden rounded-2xl shadow-lg">
                        <div class="flex justify-between items-center mb-8">
                            <h3 class="text-[--text-main] text-2xl ">Examples</h3>
                            <span id="example-close-icon" class="cursor-pointer material-symbols-outlined">
                                close
                            </span>
                        </div>
                        <ul class="list-disc block ml-5 text-[--sidebar-text] text-sm flex flex-col gap-2">
                            @foreach ($saveInfos as $saveInfo)
                                <li>{{ $saveInfo->description }}</li>
                            @endforeach
                        </ul>
                        <div class="flex justify-end mt-8">
                            <button id="example-close"
                                class=" text-[--input-border-focus] text-md hover:bg-[--examples-btn-hover] py-2 px-3 rounded-3xl font-semibold ">Close</button>
                        </div>
                    </form>


                    <div id="deleteModal"
                        class="bg-[--form-theme] pt-5 lg:w-[40%] md:w-[60%] sm:w-[80%] w-[90%] px-8 pb-6 rounded-2xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 absolute hidden z-50 rounded-2xl shadow-lg">
                        <div class="flex justify-between items-center mb-8">
                            <h3 class="text-[--text-main] text-2xl">Delete info?</h3>
                        </div>

                        <div class="flex justify-end mt-8">
                            <button id="cancel-delete-btn"
                                class="text-[--input-border-focus] text-md hover:bg-[--examples-btn-hover] py-2 px-3 rounded-3xl font-semibold">Cancel</button>
                            <button id="confirm-delete-btn"
                                class="text-[--input-border-focus] text-md hover:bg-[--examples-btn-hover] py-2 px-3 rounded-3xl font-semibold">Delete</button>
                        </div>
                    </div>

                    <div id="deleteAllModal"
                        class="bg-[--form-theme] pt-5 lg:w-[40%] md:w-[60%] sm:w-[80%] w-[90%] px-8 pb-6 rounded-2xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 absolute hidden z-50 rounded-2xl shadow-lg">
                        <div class="flex justify-between items-center mb-8">
                            <h3 class="text-[--text-main] text-2xl">Delete info?</h3>
                        </div>
                        <p class="text-[--sidebar-text] mb-4">
                            Everything YOYO has saved about you and your preferences will be permanently deleted.
                            You can still ask YOYO to save new info, unless you turn off this feature.
                        </p>
                        <div class="flex justify-end mt-8">
                            <button id="confirm-delete-all"
                                class="text-[--input-border-focus] text-md hover:bg-[--examples-btn-hover] py-2 px-3 rounded-3xl font-semibold mr-2">
                                Delete all
                            </button>
                            <button id="cancel-delete-all"
                                class="text-[--input-border-focus] text-md hover:bg-[--examples-btn-hover] py-2 px-3 rounded-3xl font-semibold">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
            document.querySelector('input[name="_token"]')?.value;

        // Form elements
        const form = document.getElementById('saveinfo-form');
        const textarea = document.getElementById('message');
        const submitBtn = document.getElementById('submitBtn');
        const cancelBtn = document.getElementById('saveform-cancle');
        const backdrop = document.getElementById('backdrop');

        // Button elements
        const addInfoBtn = document.getElementById('add-info');
        const exampleInfoBtn = document.getElementById('example-info');
        const deleteAllBtn = document.getElementById('delete-all-btn');

        // Modal elements
        const exampleForm = document.getElementById('example-form');
        const exampleCloseBtn = document.getElementById('example-close');
        const exampleCloseIcon = document.getElementById('example-close-icon');
        const deleteModal = document.getElementById('deleteModal');
        const deleteAllModal = document.getElementById('deleteAllModal');
        const cancelDeleteBtn = document.getElementById('cancel-delete-btn');
        const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
        const cancelDeleteAllBtn = document.getElementById('cancel-delete-all');
        const confirmDeleteAllBtn = document.getElementById('confirm-delete-all');

        // Toggle switch
        const switchBox = document.getElementById('switch-box');
        const geminiTool = document.getElementById('gemini-tool');
        const geminiToolShow = document.getElementById('gemini-tool-show');

        // Show backdrop function
        function showBackdrop() {
            if (backdrop) {
                backdrop.style.display = 'block';
            }
        }

        // Hide backdrop function
        function hideBackdrop() {
            if (backdrop) {
                backdrop.style.display = 'none';
            }
        }

        // Show form function
        function showSaveInfoForm() {
            if (form && textarea) {
                form.classList.remove('hidden');
                textarea.focus();
                showBackdrop();
            }
        }

        // Hide form function
        function hideSaveInfoForm() {
            if (form && textarea && submitBtn) {
                form.classList.add('hidden');
                textarea.value = '';
                submitBtn.disabled = true;
                hideBackdrop();
            }
        }

        // Show example modal
        function showExampleModal() {
            if (exampleForm) {
                exampleForm.classList.remove('hidden');
                showBackdrop();
            }
        }

        // Hide example modal
        function hideExampleModal() {
            if (exampleForm) {
                exampleForm.classList.add('hidden');
                hideBackdrop();
            }
        }

        // Show delete modal
        function showDeleteModal() {
            if (deleteModal) {
                deleteModal.classList.remove('hidden');
                showBackdrop();
            }
        }

        // Hide delete modal
        function hideDeleteModal() {
            if (deleteModal) {
                deleteModal.classList.add('hidden');
                hideBackdrop();
            }
        }

        // Show delete all modal
        function showDeleteAllModal() {
            if (deleteAllModal) {
                deleteAllModal.classList.remove('hidden');
                showBackdrop();
            }
        }

        // Hide delete all modal
        function hideDeleteAllModal() {
            if (deleteAllModal) {
                deleteAllModal.classList.add('hidden');
                hideBackdrop();
            }
        }

        // Function to show messages
        function showMessage(message, type = 'info') {
            // Remove existing messages first
            const existingMessages = document.querySelectorAll('.toast-message');
            existingMessages.forEach(msg => msg.remove());

            const messageDiv = document.createElement('div');
            messageDiv.className = `toast-message fixed top-4 right-4 p-4 rounded-lg z-[1000] transition-all duration-300 ${
            type === 'success' ? 'bg-green-500' :
            type === 'error' ? 'bg-red-500' :
            type === 'warning' ? 'bg-yellow-500' : 'bg-blue-500'
        } text-white shadow-lg`;
            messageDiv.textContent = message;

            document.body.appendChild(messageDiv);

            // Auto remove after 4 seconds
            setTimeout(() => {
                if (messageDiv.parentNode) {
                    messageDiv.style.opacity = '0';
                    setTimeout(() => messageDiv.remove(), 300);
                }
            }, 4000);
        }

        // Function to show validation errors
        function showValidationErrors(errors) {
            let errorMessage = 'Please fix the following errors:\n';
            for (const [field, messages] of Object.entries(errors)) {
                errorMessage += `• ${messages.join(', ')}\n`;
            }
            showMessage(errorMessage, 'error');
        }

        // Enable/disable submit button based on textarea content
        if (textarea && submitBtn) {
            textarea.addEventListener('input', function() {
                const trimmedValue = this.value.trim();
                if (trimmedValue.length > 0 && trimmedValue.length <= 1000) {
                    submitBtn.disabled = false;
                } else {
                    submitBtn.disabled = true;
                }
            });
        }

        // Add info button click
        if (addInfoBtn) {
            addInfoBtn.addEventListener('click', function(e) {
                e.preventDefault();
                showSaveInfoForm();
            });
        }

        // Cancel button functionality
        if (cancelBtn) {
            cancelBtn.addEventListener('click', function(e) {
                e.preventDefault();
                hideSaveInfoForm();
            });
        }

        // Example info button click
        if (exampleInfoBtn) {
            exampleInfoBtn.addEventListener('click', function(e) {
                e.preventDefault();
                showExampleModal();
            });
        }

        // Example modal close buttons
        if (exampleCloseBtn) {
            exampleCloseBtn.addEventListener('click', function(e) {
                e.preventDefault();
                hideExampleModal();
            });
        }

        if (exampleCloseIcon) {
            exampleCloseIcon.addEventListener('click', function(e) {
                e.preventDefault();
                hideExampleModal();
            });
        }

        // Delete all button click
        if (deleteAllBtn) {
            deleteAllBtn.addEventListener('click', function(e) {
                e.preventDefault();
                showDeleteAllModal();
            });
        }

        // Delete all modal buttons
        if (cancelDeleteAllBtn) {
            cancelDeleteAllBtn.addEventListener('click', function(e) {
                e.preventDefault();
                hideDeleteAllModal();
            });
        }

        if (confirmDeleteAllBtn) {
            confirmDeleteAllBtn.addEventListener('click', function(e) {
                e.preventDefault();
                // Add your delete all AJAX logic here
                console.log('Delete all confirmed');
                hideDeleteAllModal();
            });
        }

        // Delete modal buttons
        if (cancelDeleteBtn) {
            cancelDeleteBtn.addEventListener('click', function(e) {
                e.preventDefault();
                hideDeleteModal();
            });
        }

        if (confirmDeleteBtn) {
            confirmDeleteBtn.addEventListener('click', function(e) {
                e.preventDefault();
                // Add your delete AJAX logic here
                console.log('Delete confirmed');
                hideDeleteModal();
            });
        }

        // Backdrop click to close modals
        if (backdrop) {
            backdrop.addEventListener('click', function() {
                hideSaveInfoForm();
                hideExampleModal();
                hideDeleteModal();
                hideDeleteAllModal();
            });
        }

        // Toggle switch functionality
        if (switchBox) {
            switchBox.addEventListener('change', function() {
                console.log('Switch toggled:', this.checked);
                // Add your toggle logic here
            });
        }

        // Gemini tool tooltip
        if (geminiTool && geminiToolShow) {
            geminiTool.addEventListener('mouseenter', function() {
                geminiToolShow.classList.remove('hidden');
            });

            geminiTool.addEventListener('mouseleave', function() {
                geminiToolShow.classList.add('hidden');
            });
        }

        // Form submission with AJAX
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Get form data
                const formData = new FormData(this);
                const description = textarea.value.trim();

                // Basic validation
                if (!description || description.length === 0) {
                    showMessage('Please enter some information to save.', 'error');
                    return;
                }

                if (description.length > 1000) {
                    showMessage('Information must be less than 1000 characters.', 'error');
                    return;
                }

                // Disable submit button during request
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Saving...';
                }

                // Prepare fetch options
                const fetchOptions = {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                };

                // Add CSRF token if available
                if (csrfToken) {
                    fetchOptions.headers['X-CSRF-TOKEN'] = csrfToken;
                }

                fetch(this.action, fetchOptions)
                    .then(response => {
                        // Check if response is ok
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            // Show success message
                            showMessage(data.message || 'Information saved successfully!',
                                'success');

                            // Reset form and hide it
                            hideSaveInfoForm();

                            // Reload saved data if function exists
                            if (typeof loadSavedData === 'function') {
                                loadSavedData();
                            }

                            // Or refresh the saved data section
                            refreshSavedData(data.data);

                        } else {
                            // Handle validation errors
                            if (data.errors) {
                                showValidationErrors(data.errors);
                            } else {
                                showMessage(data.message || 'Something went wrong', 'error');
                            }
                        }
                    })
                    .catch(error => {
                        console.error('AJAX Error:', error);

                        // Handle different types of errors
                        if (error.message.includes('422')) {
                            showMessage('Please check your input and try again.', 'error');
                        } else if (error.message.includes('419')) {
                            showMessage('Session expired. Please refresh the page and try again.',
                                'error');
                        } else if (error.message.includes('500')) {
                            showMessage('Server error. Please try again later.', 'error');
                        } else {
                            showMessage(
                                'Network error. Please check your connection and try again.',
                                'error');
                        }
                    })
                    .finally(() => {
                        // Re-enable submit button
                        if (submitBtn) {
                            submitBtn.disabled = textarea.value.trim().length === 0;
                            submitBtn.textContent = 'Submit';
                        }
                    });
            });
        }

        // Function to refresh saved data in the UI (optional)
        function refreshSavedData(newData) {
            const savedDataContainer = document.getElementById('savedData');
            if (savedDataContainer && newData) {
                // You can implement this based on how you display saved data
                console.log('New data saved:', newData);
                // Example: Add the new item to the list
                // addSavedDataItem(newData);
            }
        }

        // Auto-hide existing Laravel flash messages
        const existingMessages = document.querySelectorAll('#success-message, #error-message');
        existingMessages.forEach(msg => {
            setTimeout(() => {
                if (msg.parentNode) {
                    msg.style.opacity = '0';
                    setTimeout(() => msg.remove(), 300);
                }
            }, 4000);
        });

        // Make showSaveInfoForm globally available
        window.showSaveInfoForm = showSaveInfoForm;
    })
</script>
