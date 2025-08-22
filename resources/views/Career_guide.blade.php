@extends('layouts.main')
@section('content')
    <style>
        /* Base light theme variables */
        :root {
            --bg-main: #ffffff;
            --text-main: #1f1f1f;
            --text-muted: #5f6368;
            --icon-bg: #ffcbda;
            /* pink-200 equivalent */
            --icon-color: #9e4f6d;
            --card-bg: #f1f5f9;
            --card-hover-bg: #dde3ea;
            --button-bg: #4285f4;
            /* Theme toggle button default */
            --button-text: white;
            /* Theme toggle button default */
            --button-hover-bg: #3367d6;
            /* Theme toggle button hover */
            --scrollbar-track: #f0f0f0;
            --scrollbar-thumb: #c0c0c0;
            --scrollbar-thumb-hover: #a0a0a0;
            --dropdown-hover: #dfe3e7;
        }

        /* Dark theme variables */
        body.dark {
            --bg-main: #1b1c1d;
            --text-main: #e0e0e0;
            --text-muted: #a0a0a0;
            --icon-bg: #5a3c4f;
            /* Darker pink for dark mode */
            --icon-color: #ffb8d9;
            /* Lighter pink for dark mode */
            --card-bg: #282a2c;
            --card-hover-bg: #3a3a3a;
            --button-bg: #7da5ff;
            /* Dark theme toggle button */
            --button-text: black;
            /* Dark theme toggle button */
            --button-hover-bg: #5c84e0;
            /* Dark theme toggle button hover */
            --scrollbar-track: #3a3a3a;
            --scrollbar-thumb: #555555;
            --scrollbar-thumb-hover: #777777;
            --dropdown-hover: #3b3d3f;
        }

        /* Apply variables to base elements and custom classes */
        body {
            background-color: var(--bg-main);
            color: var(--text-main);
            transition: background-color 0.3s ease, color 0.3s ease;
            /* Smooth transition */
        }

        /* Direct styling for elements using CSS variables */
        h1,
        h2,
        h3,
        p {
            /* Apply text color to common elements */
            color: var(--text-main);
        }

        /* Specific override for muted text */
        .text-\[\#5F6368\] {
            color: var(--text-muted) !important;
        }

        /* Styles for icon container */
        .w-16.h-16.rounded-full.bg-pink-200 {
            /* Targeting original classes */
            background-color: var(--icon-bg);
        }

        /* Styles for icon */
        .ph.ph-briefcase.text-4xl.text-\[\#9e4f6d\] {
            /* Targeting original classes */
            color: var(--icon-color);
        }

        /* Styles for cards */
        .bg-\[\#f1f5f9\] {
            /* Targeting original classes */
            background-color: var(--card-bg);
        }

        .hover\:bg-\[\#dde3ea\]:hover {
            /* Targeting original classes for hover */
            background-color: var(--card-hover-bg);
        }

        /* Styles for the theme toggle button */
        #themeToggle {
            background-color: var(--button-bg);
            color: var(--button-text);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        #themeToggle:hover {
            background-color: var(--button-hover-bg);
        }

        /* Custom scrollbar for webkit browsers to match theme */
        ::-webkit-scrollbar {
            height: 8px;
            width: 8px;
            /* For vertical scrollbars, if any */
        }

        ::-webkit-scrollbar-track {
            background: var(--scrollbar-track);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--scrollbar-thumb);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--scrollbar-thumb-hover);
        }
    </style>
        <div class="gemini-data">
            <div class="main-chat-area">
                <div class="chat-content-wrapper" style="background-color: var(--bg-main);">
                    <div class="p-10 min-h-screen flex items-center justify-center">
                        <div class="max-w-3xl mx-auto w-full">

                            <!-- Header -->
                            <div class="flex flex-wrap sm:flex-nowrap items-start sm:items-center gap-4 mb-6">
                                <div class="w-16 h-16 rounded-full flex items-center justify-center shrink-0"
                                    style="background-color: var(--icon-bg);">
                                    <i class="fas fa-briefcase text-3xl" style="color: var(--icon-color);"></i>
                                </div>
                                <div class="flex-1 min-w-[200px]">
                                    <h1 class="text-2xl sm:text-4xl font-semibold" style="color: var(--text-main);">
                                        Career guide</h1>
                                    <p class="text-sm sm:text-base text-\[\#5F6368\]">
                                        Unlock your career potential. Get a detailed plan to refine your skills and
                                        achieve your career
                                        goals.
                                    </p>
                                </div>
                            </div>

                            <!-- Scroll wrapper only for small screens -->
                            <div class="block md:hidden overflow-x-auto">
                                <div class="flex gap-4 w-max">
                                    <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                        style="background-color: var(--card-bg); color: var(--text-main);"
                                        onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                        I’d like to improve my presentation skills.
                                    </div>
                                    <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                        style="background-color: var(--card-bg); color: var(--text-main);"
                                        onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                        Help me figure out how to advocate with my manager for a promotion.
                                    </div>
                                    <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                        style="background-color: var(--card-bg); color: var(--text-main);"
                                        onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                        How do I prepare for a job interview with behavioral questions?
                                    </div>
                                    <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                        style="background-color: var(--card-bg); color: var(--text-main);"
                                        onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                        Give me advice on how to find a mentor.
                                    </div>
                                </div>
                            </div>

                            <!-- Grid layout for medium and up -->
                            <div class=" md:grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                <div class="h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                    style="background-color: var(--card-bg); color: var(--text-main);"
                                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                    I’d like to improve my presentation skills.
                                </div>
                                <div class="h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                    style="background-color: var(--card-bg); color: var(--text-main);"
                                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                    Help me figure out how to advocate with my manager for a promotion.
                                </div>
                                <div class="h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                    style="background-color: var(--card-bg); color: var(--text-main);"
                                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                    How do I prepare for a job interview with behavioral questions?
                                </div>
                                <div class="h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                    style="background-color: var(--card-bg); color: var(--text-main);"
                                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                    Give me advice on how to find a mentor.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

