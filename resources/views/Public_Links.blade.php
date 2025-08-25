
@extends('layouts.main')
@section('content')


    <div class="w-[100%]">
        <div class="backdrop" id="backdrop"></div>


        <div class="gemini-data ">
            <div class="main-chat-area">
                <div class="chat-content-wrapper" style="background-color: var(--bg-main);">
                    <!-- Profile Tooltip -->
                    {{-- <div class="absolute top-6 right-6 group">

                        <div
                            class="absolute right-0 mt-2 p-2 rounded-md bg-[var(--tooltip-bg)] text-[var(--tooltip-text)] text-sm shadow-lg opacity-0 group-hover:opacity-100 transition duration-200 z-10">
                            <div class="font-semibold">YOYO Account</div>
                            <div>denish.kalathiyainfotech</div>
                            <div>denish.kalathiyainfotech@gmail.com</div>
                        </div>
                    </div> --}}

                    <!-- Main Content -->
                    <main class="text-center px-4 pt-40">
                        <h1 class="text-3xl md:text-4xl font-medium mb-4">Your public links</h1>
                        <p class=" mb-6 w-[36rem] mx-auto">
                            You can share chats or an individual prompt & response. Once you do, you can manage
                            public
                            links that you've
                            created and see their details here.
                        </p>
                        <a href="{{ route('index') }}"
                            class="bg-[#0b57d0] hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-full transition">
                            Chat with YOYO
                        </a>
                    </main>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------->
    <!-- Help Center -->
    <div id="help_Data"
        class="flex flex-col hidden  justify-start fixed top-[100px] rounded-2xl right-[10px] bg-[--bg-main] shadow-[0_1px_3px_0_rgba(60,64,67,0.3),_0_4px_8px_3px_rgba(60,64,67,0.15)]  lg:w-[23%] md:w-[40%] sm:w-[50%] w-[90%] h-[70vh] overflow-y-auto">

        <!-- Sticky Header -->
        <div class="sticky top-0 left-0 py-3 pb-8 w-full flex items-center justify-between bg-[--bg-main] z-10">
            <p class="text-2xl text-[--text-main] text-center w-full">Help</p>
            <button id="help_close" class="absolute right-4 top-3">
                <i class="fa-solid fa-xmark text-2xl text-[--text-main]"></i>
            </button>
        </div>

        <!-- Scrollable Content -->
        <div class="text-[--text-main] space-y-3 pb-4 text-left">
            <h6 class="text-[16px] text-[--text-main] ps-4">Popular help resources</h6>


            <div class="flex items-center gap-3 hover:bg-[--dropdown-hover] py-2 px-4 cursor-pointer">
                <div
                    class="w-[40px] h-[40px] min-h-[40px] min-w-[40px] rounded-full bg-[--examples-btn-hover]  flex justify-center items-center ">
                    <i class="fa-regular fa-file-lines text-[--add-btn]"></i>
                </div>
                <span class="text-[16px] text-[--text-main]">Manage & delete your YOYO Apps activity</span>
            </div>
            <div class="flex items-center gap-3 hover:bg-[--dropdown-hover] py-2 px-4 cursor-pointer">
                <div
                    class="w-[40px] h-[40px] min-h-[40px] min-w-[40px] rounded-full bg-[--examples-btn-hover] flex justify-center items-center">
                    <i class="fa-regular fa-file-lines text-[--add-btn]"></i>
                </div>
                <span class="text-[16px] text-[--text-main]">Use YOYO Apps</span>
            </div>
            <div class="flex items-center gap-3 hover:bg-[--dropdown-hover] py-2 px-4 cursor-pointer">
                <div
                    class="w-[40px] h-[40px] min-h-[40px] min-w-[40px] rounded-full bg-[--examples-btn-hover] flex justify-center items-center">
                    <i class="fa-regular fa-file-lines text-[--add-btn]"></i>
                </div>
                <span class="text-[16px] text-[--text-main]">Use & manage apps in YOYO</span>
            </div>
            <div class="flex items-center gap-3 hover:bg-[--dropdown-hover] py-2 px-4 cursor-pointer">
                <div
                    class="w-[40px] h-[40px] min-h-[40px] min-w-[40px] rounded-full bg-[--examples-btn-hover] flex justify-center items-center">
                    <i class="fa-regular fa-file-lines text-[--add-btn]"></i>
                </div>
                <span class="text-[16px] text-[--text-main]">Find & manage your recent chats in YOYO Apps</span>
            </div>
            <div class="flex items-center gap-3 hover:bg-[--dropdown-hover] py-2 px-4 cursor-pointer">
                <div
                    class="w-[40px] h-[40px] min-h-[40px] min-w-[40px] rounded-full bg-[--examples-btn-hover] flex justify-center items-center">
                    <i class="fa-regular fa-file-lines text-[--add-btn]"></i>
                </div>
                <span class="text-[16px] text-[--text-main]">Where you can use the YOYO web app</span>
            </div>


            <a href="" class="text-[14px] text-[--add-btn] w-full block hover:bg-[--bg-hover] py-4 px-10">Visit help
                forum <i class="fa-solid fa-arrow-up-right-from-square"></i></a>

            <div class="bg-[--dropdown-hover] py-3 mx-5 rounded-full flex items-center px-5 cursor-pointer">
                <i class="fa-solid fa-magnifying-glass me-3"></i>
                <input type="search" class="w-full bg-transparent outline-none border-0 cursor-pointer">
            </div>

            <div class="py-4 border-t-[8px] border-b-[8px] border-[--border-color]-500">
                <p class="text-[--text-main] ps-4">Need more help?</p>
                <div class="flex items-center gap-3 hover:bg-[--dropdown-hover] py-2 px-4 mt-3  cursor-pointer">
                    <div
                        class="w-[40px] h-[40px] min-h-[40px] min-w-[40px] rounded-full bg-[--examples-btn-hover] flex justify-center items-center">
                        <i class="fa-solid fa-message text-[--add-btn]"></i>
                    </div>
                    <div>
                        <p class="text-[--text-main] text-[16px]">Ask the Help Community</p>
                        <span class="text-[--text-muted] text-[16px]">Get answers from community experts</span>
                    </div>
                </div>

            </div>

            <div class="flex items-center gap-3 hover:bg-[--dropdown-hover] py-2 px-4 mt-3  cursor-pointer">
                <div
                    class="w-[40px] h-[40px] min-h-[40px] min-w-[40px] rounded-full bg-[--examples-btn-hover] flex justify-center items-center">
                    <i class="fa-solid fa-circle-exclamation text-[--add-btn]"></i>
                </div>
                <p class="text-[16px] text-[--add-btn] font-medium">Report a problem</p>
            </div>
        </div>
    </div>
@endsection
