<x-app-layout>

    <body class="h-[70vh] overflow-hidden flex items-center justify-center" style="background: #edf2f7;">

        <style>
      /* can be configured in tailwind.config.js */
      .group:hover .group-hover\:block {
        display: block;
      }
      .hover\:w-64:hover {
        width: 45%;
        }

      /* NO NEED THIS CSS - just for custom scrollbar which can also be configured in tailwind.config.js*/
      ::-webkit-scrollbar {
        width: 2px;
        height: 2px;
      }
      ::-webkit-scrollbar-button {
        width: 0px;
        height: 0px;
      }
      ::-webkit-scrollbar-thumb {
        background: #2d3748;
        border: 0px none #ffffff;
        border-radius: 50px;
      }
      ::-webkit-scrollbar-thumb:hover {
        background: #2b6cb0;
      }
      ::-webkit-scrollbar-thumb:active {
        background: #000000;
      }
      ::-webkit-scrollbar-track {
        background: #1a202c;
        border: 0px none #ffffff;
        border-radius: 50px;
      }
      ::-webkit-scrollbar-track:hover {
        background: #666666;
      }
      ::-webkit-scrollbar-track:active {
        background: #333333;
      }
      ::-webkit-scrollbar-corner {
        background: transparent;
      }

    </style>

    <!-- Messenger Clone -->
    <div class="h-[91vh] w-full flex antialiased text-gray-200 bg-gray-900 overflow-hidden">
        <div class="flex-1 flex flex-col">

            <main class="flex-grow flex flex-row min-h-0">
                <section class="flex flex-col flex-none overflow-auto w-24 hover:w-64 group lg:max-w-sm md:w-2/5 transition-all duration-300 ease-in-out">
                    <div class="header p-4 flex flex-row justify-between items-center flex-none">
                        <div class="w-16 h-16 relative flex flex-shrink-0" style="filter: invert(100%);">
                            <img class="rounded-full w-full h-full object-cover" alt="ravisankarchinnam"
                                src="{{ Auth::user()->images }}"/>
                        </div>
                        <p class="text-md font-bold hidden md:block group-hover:block">Messenger</p>
                        <a href="#" class="block rounded-full hover:bg-gray-700 bg-gray-800 w-10 h-10 p-2  md:block group-hover:block">
                            <svg viewBox="0 0 24 24" class="w-full h-full fill-current">
                                <path
                                        d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="search-box p-4 flex-none">
                        <form onsubmit="">
                            <div class="relative">
                                <label>
                                    <input class="rounded-full py-2 pr-6 pl-10 w-full border border-gray-800 focus:border-gray-700 bg-gray-800 focus:bg-gray-900 focus:outline-none text-gray-200 focus:shadow-md transition duration-300 ease-in"
                                        type="text" value="" placeholder="Search Messenger"/>
                                    <span class="absolute top-0 left-0 mt-2 ml-3 inline-block">
                                        <svg viewBox="0 0 24 24" class="w-6 h-6">
                                            <path fill="#bbb"
                                                d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/>
                                        </svg>
                                    </span>
                                </label>
                            </div>
                        </form>
                    </div>

                    <div class="contacts p-2 flex-1 overflow-y-scroll">
                        <div class="flex justify-between items-center p-3 hover:bg-gray-800 rounded-lg relative">
                            <div class="w-16 h-16 relative flex flex-shrink-0">
                                <img class="shadow-md rounded-full w-full h-full object-cover"
                                    src="https://randomuser.me/api/portraits/women/61.jpg"
                                    alt=""
                                />
                            </div>
                            <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block">
                                <p>Angelina Jolie</p>
                                <div class="flex items-center text-sm text-gray-600">
                                    <div class="min-w-0">
                                        <p class="truncate">Ok, see you at the subway in a bit.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="flex flex-col flex-auto border-l border-gray-600">
                    <div class="chat-header border-gray-600 px-6 py-4 flex flex-row flex-none justify-between items-center shadow">
                        <div class="flex">
                            <div class="w-12 h-12 mr-4 relative flex flex-shrink-0">
                                <img class="shadow-md rounded-full w-full h-full object-cover"
                                     src="{{ Auth::user()->images }}"
                                     alt=""
                                />
                            </div>
                            <div class="text-sm">
                                <p class="font-bold mt-3">{{ Auth::user()->name }}</p>

                            </div>
                        </div>


                    </div>
                    <div class="chat-body p-4 flex-1 overflow-y-scroll">
                        <div class="flex flex-row justify-start">
                            <div class="w-8 h-8 relative flex flex-shrink-0 mr-4">
                                <img class="shadow-md rounded-full w-full h-full object-cover"
                                     src="https://randomuser.me/api/portraits/women/33.jpg"
                                     alt=""
                                />
                            </div>
                            <div class="messages text-sm text-gray-700 grid grid-flow-row gap-2">
                                <div class="flex items-center group">
                                    <p class="px-6 py-3 rounded-t-full rounded-r-full bg-gray-800 max-w-xs lg:max-w-md text-gray-200">Hey! How are you?</p>
                                </div>
                            </div>
                        </div>
                        <p class="p-4 text-center text-sm text-gray-500">FRI 3:04 PM</p>

                        <div class="flex flex-row justify-end">
                            <div class="messages text-sm text-white grid grid-flow-row gap-2">
                                <div class="flex items-center flex-row-reverse group">
                                    <p class="px-6 py-3 rounded-t-full rounded-l-full bg-blue-700 max-w-xs lg:max-w-md">Hey! How are you?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-footer flex-none">
                        <div class="flex flex-row items-center p-4">
                            <button type="button" class="flex flex-shrink-0 focus:outline-none mx-2  text-blue-600 hover:text-blue-700 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full fill-current" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4b80dd" d="M128 64c0-35.3 28.7-64 64-64H352V128c0 17.7 14.3 32 32 32H512V448c0 35.3-28.7 64-64 64H192c-35.3 0-64-28.7-64-64V336H302.1l-39 39c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l39 39H128V64zm0 224v48H24c-13.3 0-24-10.7-24-24s10.7-24 24-24H128zM512 128H384V0L512 128z"/></svg>
                            </button>
                            <button type="button" class="flex flex-shrink-0 focus:outline-none mx-2  text-blue-600 hover:text-blue-700 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full fill-current" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#3772d7" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                            </button>

                            <button type="button" class="flex flex-shrink-0 focus:outline-none mx-2  text-blue-600 hover:text-blue-700 w-6 h-6">
                                <svg viewBox="0 0 20 20" class="w-full h-full fill-current">
                                    <path d="M9,18 L9,16.9379599 C5.05368842,16.4447356 2,13.0713165 2,9 L4,9 L4,9.00181488 C4,12.3172241 6.6862915,15 10,15 C13.3069658,15 16,12.314521 16,9.00181488 L16,9 L18,9 C18,13.0790094 14.9395595,16.4450043 11,16.9378859 L11,18 L14,18 L14,20 L6,20 L6,18 L9,18 L9,18 Z M6,4.00650452 C6,1.79377317 7.79535615,0 10,0 C12.209139,0 14,1.79394555 14,4.00650452 L14,8.99349548 C14,11.2062268 12.2046438,13 10,13 C7.790861,13 6,11.2060545 6,8.99349548 L6,4.00650452 L6,4.00650452 Z" />
                                </svg>
                            </button>
                            <div class="relative flex-grow">
                                <label>
                                    <input class="rounded-full py-2 pl-3 pr-10 w-full border border-gray-800 focus:border-gray-700 bg-gray-800 focus:bg-gray-900 focus:outline-none text-gray-200 focus:shadow-md transition duration-300 ease-in"
                                        type="text" value="" placeholder="Aa"/>
                                </label>
                            </div>
                            <button type="button" class="flex flex-shrink-0 focus:outline-none mx-2  text-blue-600 hover:text-blue-700 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full fill-current" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4375d0" d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/></svg>
                            </button>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    </body>
</x-app-layout>
