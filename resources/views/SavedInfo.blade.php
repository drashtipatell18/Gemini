@extends('layouts.main')
@section('content')
    <style>
        .SavedInfo-chat-content-wrapper {
            max-width: 100%;
        }

        .savedInfo-gemini-data {
            height: 100%;
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

                    <form id="saveinfo-form"
                        class="bg-[--form-theme] lg:w-[40%] z-[999]     md:w-[60%] sm:w-[80%] w-[90%] p-5 rounded-2xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 absolute hidden rounded-2xl shadow-lg">
                        <h3 class="text-[--text-main] text-2xl "> What do you want YOYO to remember?</h3>

                        <textarea id="message"
                            class="w-full mt-8 font-semibold bg-[--input-bg] h-64 p-3 border text-lg text-[--textarea-text]  border-[--border-color]-300 rounded-xl focus:outline-none focus:ring focus:border-[--input-border-focus] focus:ring-[--input-border-focus] resize-none textarea"
                            name="textarea" placeholder="For example, “I prefer short, concise responses”"></textarea>

                        <div class="flex gap-2 justify-end mt-8">
                            <button id="saveform-cancle" type="reset"
                                class=" text-[--input-border-focus] text-md hover:bg-[--examples-btn-hover] py-2 px-3 rounded-3xl ">Cancel</button>
                            <button id="submitBtn" type="submit"
                                class=" bg-[--add-btn] text-[--add-btn-text] px-6 py-2 rounded-3xl disabled:bg-[--add-diseble-btn] disabled:text-[--add-diseble-btn-text] "
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
                        <ul class="list-disc block ml-5 text-[--sidebar-text] text-sm flex flex-col gap-2 ">
                            <li>Use simple language and avoid jargon</li>
                            <li>I’m vegetarian, so don’t suggest recipes with meat</li>
                            <li>After responding, include a Spanish translation</li>
                            <li>When trip planning, include the cost per day</li>
                            <li>I can only write code in JavaScript</li>
                            <li>I prefer short, concise responses</li>
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
                        <p class="text-[--sidebar-text] mb-4">Everything YOYO has saved about you and your
                            preferences
                            will be permanently deleted. You can still ask YOYO to save new info, unless you turn
                            off
                            this feature.</p>
                        <div class="flex justify-end mt-8">
                            <button id="confirm-delete-all"
                                class="text-[--input-border-focus] text-md hover:bg-[--examples-btn-hover] py-2 px-3 rounded-3xl font-semibold">Delete
                                all</button>
                            <button id="cancel-delete-all"
                                class="text-[--input-border-focus] text-md hover:bg-[--examples-btn-hover] py-2 px-3 rounded-3xl font-semibold">Cancel</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
