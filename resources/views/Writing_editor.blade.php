@extends('layouts.main')
@section('content')
  <style>
    /* Base light theme variables */
    :root {
      --bg-main: #ffffff;
      --text-main: #1f1f1f;
      --text-muted: #5f6368;
      --icon-bg: #f2ccff;
      --icon-color: #9700d2;
      --card-bg: #f1f5f9;
      --card-hover-bg: #dde3ea;
      --button-bg: #4285f4;
      --button-text: white;
      --button-hover-bg: #3367d6;
      --scrollbar-track: #f0f0f0;
      --scrollbar-thumb: #c0c0c0;
      --scrollbar-thumb-hover: #a0a0a0;
    }

    /* Dark theme variables */
    body.dark {
      --bg-main: #1b1c1d;
      --text-main: #e0e0e0;
      --text-muted: #a0a0a0;
      --icon-bg: #5f0084;
      --icon-color: #f2ccff;
      --card-bg: #282a2c;
      --card-hover-bg: #3a3a3a;
      --button-bg: #7da5ff;
      --button-text: black;
      --button-hover-bg: #5c84e0;
      --scrollbar-track: #3a3a3a;
      --scrollbar-thumb: #555555;
      --scrollbar-thumb-hover: #777777;
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
      /* Default text color for these elements */
    }

    /* Specific overrides for elements with hardcoded Tailwind classes */
    .bg-white {
      background-color: var(--bg-main) !important;
    }

    .text-\[\#1F1F1F\] {
      color: var(--text-main) !important;
    }

    .bg-\[\#f2ccff\] {
      background-color: var(--icon-bg) !important;
    }

    .text-\[\#9700d2\] {
      color: var(--icon-color) !important;
    }

    .text-md {
      /* Targeting the description paragraph */
      color: var(--text-muted) !important;
    }

    .bg-\[\#f1f5f9\] {
      background-color: var(--card-bg) !important;
    }

    .hover\:bg-\[\#dde3ea\]:hover {
      background-color: var(--card-hover-bg) !important;
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
    <div class="gemini-data ">
      <div class="main-chat-area">
        <div class="chat-content-wrapper" style="background-color: var(--bg-main);">
          <div class="p-10 min-h-screen flex items-center justify-center">
            <div class="max-w-3xl mx-auto w-full">


              <div class="flex flex-wrap sm:flex-nowrap items-start sm:items-center gap-4 mb-6">
                <div class="w-16 h-16 rounded-full flex items-center justify-center shrink-0"
                  style="background-color: var(--icon-bg);">
                  <i class="fas fa-bold text-3xl" style="color: var(--icon-color);"></i>
                </div>
                <div>
                  <h1 class="text-3xl" style="color: var(--text-main);"> Writing editor </h1>
                  <p class="text-md" style="color: var(--text-muted);">
                    Elevate your writing. Get clear, constructive feedback, from grammar to structure.
                  </p>
                </div>
              </div>

              <div class="block md:hidden overflow-x-auto" style="display: block;">
                <div class="flex gap-4 w-max">
                  <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                    style="background-color: var(--card-bg); color: var(--text-main);"
                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                    Fix grammatical errors.
                  </div>
                  <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                    style="background-color: var(--card-bg); color: var(--text-main);"
                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                    Edit this for a specific style guide.
                  </div>
                  <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                    style="background-color: var(--card-bg); color: var(--text-main);"
                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                    Rewrite this sentence to make it clearer.
                  </div>
                  <div class="w-[180px] h-[160px] p-3 rounded-xl cursor-pointer text-sm flex items-start"
                    style="background-color: var(--card-bg); color: var(--text-main);"
                    onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                    onmouseout="this.style.backgroundColor='var(--card-bg)'">
                    Improve the sentence flow, word choice, and overall style consistency in this article.
                  </div>
                </div>
              </div>

              <div class="hidden md:grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div class="h-[160px] p-4 rounded-xl cursor-pointer text-sm"
                  style="background-color: var(--card-bg); color: var(--text-main);"
                  onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                  onmouseout="this.style.backgroundColor='var(--card-bg)'">
                  Fix grammatical errors.
                </div>
                <div class="h-[160px] p-4 rounded-xl cursor-pointer text-sm"
                  style="background-color: var(--card-bg); color: var(--text-main);"
                  onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                  onmouseout="this.style.backgroundColor='var(--card-bg)'">
                  Edit this for a specific style guide.
                </div>
                <div class="h-[160px] p-4 rounded-xl cursor-pointer text-sm"
                  style="background-color: var(--card-bg); color: var(--text-main);"
                  onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                  onmouseout="this.style.backgroundColor='var(--card-bg)'">
                  Rewrite this sentence to make it clearer.
                </div>
                <div class="h-[160px] p-4 rounded-xl cursor-pointer text-sm"
                  style="background-color: var(--card-bg); color: var(--text-main);"
                  onmouseover="this.style.backgroundColor='var(--card-hover-bg)'"
                  onmouseout="this.style.backgroundColor='var(--card-bg)'">
                  Improve the sentence flow, word choice, and overall style consistency in this article.
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
  