@extends('layouts.main')
@section('content')
    <style>
        /* Base light theme variables */
        :root {
            --bg-main: #ffffff;
            --text-main: #1f1f1f;
            --text-muted: #5f6368;
            --icon-bg: #ffd289;
            --icon-color: #7e5700;
            --card-bg: #f1f5f9;
            --card-hover-bg: #dde3ea;
            --experiment-tag-bg: #ffffff;
            --experiment-tag-text: #000000;
            --experiment-tag-border: #000000;
            --button-bg: #4285f4;
            --button-text: white;
            --button-hover-bg: #3367d6;
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
            --icon-bg: #7e5700;
            /* Darker background for the icon */
            --icon-color: #ffd289;
            /* Lighter icon for contrast */
            --card-bg: #282a2c;
            --card-hover-bg: #3a3a3a;
            --experiment-tag-bg: #3a3a3a;
            --experiment-tag-text: #e0e0e0;
            --experiment-tag-border: #777777;
            --button-bg: #7da5ff;
            --button-text: black;
            --button-hover-bg: #5c84e0;
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
        }

        h1,
        p,
        span {
            color: var(--text-main);
        }

        /* Specific overrides for elements with hardcoded Tailwind classes */
        .bg-white {
            background-color: var(--bg-main) !important;
        }

        .text-\[\#1F1F1F\] {
            color: var(--text-main) !important;
        }

        .bg-\[\#ffd289\] {
            background-color: var(--icon-bg) !important;
        }

        .text-\[\#7e5700\] {
            color: var(--icon-color) !important;
        }

        .bg-\[\#f1f5f9\] {
            background-color: var(--card-bg) !important;
        }

        .hover\:bg-\[\#dde3ea\]:hover {
            background-color: var(--card-hover-bg) !important;
        }

        .text-md {
            color: var(--text-muted);
        }

        /* Experiment tag styling */
        .ml-1.text-sm.border.px-2.py-0.rounded-full.bg-white.text-black.border-black {
            background-color: var(--experiment-tag-bg) !important;
            color: var(--experiment-tag-text) !important;
            border-color: var(--experiment-tag-border) !important;
        }
    </style>
        <div class="gemini-data ">
            <div class="main-chat-area">
                <div class="chat-content-wrapper" style="background-color: var(--bg-main);">
                    <div class="p-10 min-h-screen flex items-center justify-center">
                        <div class="max-w-3xl mx-auto w-full">


                            <div class="flex flex-wrap sm:flex-nowrap items-start sm:items-center gap-4 mb-6">
                                <div class="w-16 h-16 rounded-full flex items-center justify-center shrink-0"
                                    style="background-color: var(--icon-bg);">
                                    <i class="fas fa-chess-queen text-3xl" style="color: var(--icon-color);"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h1 class="text-3xl" style="color: var(--text-main);">Chess champ</h1>
                                        <span class="ml-1 text-sm border px-2 py-0 rounded-full"
                                            style="background-color: var(--experiment-tag-bg); color: var(--experiment-tag-text); border-color: var(--experiment-tag-border);">
                                            Experiment
                                        </span>
                                    </div>
                                    <p class="text-md" style="color: var(--text-muted);">
                                        Play chess with a language model. Make your first move using chess notation
                                        to
                                        start your match.
                                    </p>
                                </div>
                            </div>

                            <div class="block md:hidden overflow-x-auto">
                                <div class="flex gap-4 w-max">
                                    <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                        style="background-color: var(--card-bg); color: var(--text-main);"
                                        onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                        Let's play chess! I start with e4.
                                    </div>
                                    <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                        style="background-color: var(--card-bg); color: var(--text-main);"
                                        onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                        I start with moving my knight to f3. Write a verse after every move.
                                    </div>
                                    <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                        style="background-color: var(--card-bg); color: var(--text-main);"
                                        onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                        My move is d4. Comment on the game as Sherlock Holmes.
                                    </div>
                                    <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                                        style="background-color: var(--card-bg); color: var(--text-main);"
                                        onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                        How do I make a move?
                                    </div>
                                </div>
                            </div>

                            <div class="block md:grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                <div class="h-[160px] p-4 rounded-xl cursor-pointer text-sm"
                                    style="background-color: var(--card-bg); color: var(--text-main);"
                                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                    Let's play chess! I start with e4.
                                </div>
                                <div class="h-[160px] p-4 rounded-xl cursor-pointer text-sm"
                                    style="background-color: var(--card-bg); color: var(--text-main);"
                                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                    I start with moving my knight to f3. Write a verse after every move.
                                </div>
                                <div class="h-[160px] p-4 rounded-xl cursor-pointer text-sm"
                                    style="background-color: var(--card-bg); color: var(--text-main);"
                                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                    My move is d4. Comment on the game as Sherlock Holmes.
                                </div>
                                <div class="h-[160px] p-4 rounded-xl cursor-pointer text-sm"
                                    style="background-color: var(--card-bg); color: var(--text-main);"
                                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                                    How do I make a move?
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
