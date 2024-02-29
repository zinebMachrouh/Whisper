
<x-app-layout>
    <div class="p-relative h-screen" style="background-color: #15202b;">
        <div class="flex justify-start">

            <div class="px-4 py-2 mx-2">
                <a href="{{route('dashboard')}}" class=" text-2xl font-medium rounded-full text-blue-400 hover:bg-gray-800 hover:text-blue-300 float-right">
                    <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <g>
                            <path d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                            </path>
                        </g>
                    </svg>
                </a>
            </div>
            <main role="main">
                <div class="flex" style="width: 1100px;">
                    @include('components.sidebar')
                    <section class="flex flex-row justify-center items-center mt-30">
                        
                    </section>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>