
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

                             <div class="h-full">

                                <div class="border-b-2 block md:flex mt-32">
                                    
                                        <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white shadow-md">
                                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                            <span class="text-gray-600">This information is secret so be careful</span>
                                            <div class="w-full p-8 mx-2 flex justify-center">
                                                <img id="showImage" class="max-w-xs w-32 items-center border" src="{{asset('' . $user->image)}}" alt="">                          
                                            </div>
                                            <input type="hidden" value="{{$user->username}}" name="username" required>
                                            <input type="hidden" value="{{$user->name}}" name="name" required>
                                            <input type="hidden" value="{{$user->email}}" name="email" required>
                                            <input type="hidden" name="identifiant" value="{{$user->identifiant}}" required>
                                            <input type="hidden" value="{{$user->identifiant_unique}}" name="identifiant_unique" required>
                                            <div class="flex justify-between">
                                                <input type="file" value="{{$user->image}}" name="image" placeholder="Change your photo profile" required>
                                                <button type="submit" class="-mt-2 text-md font-bold text-white bg-gray-700 rounded-full px-5 py-2 hover:bg-gray-800">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                  
                                  <div class="w-full md:w-3/5 p-8 bg-gray-600 lg:ml-4 shadow-md">
                                    <div class="rounded bg-slate-200 shadow p-6">
                                        <form action="{{ route('profile.update') }}" method="POST">
                                            @csrf
                                            @method('put')
                                            
                                            <div class="pb-6">
                                                <label for="name" class="font-semibold text-gray-700 block pb-1">Name</label>
                                                <div class="flex">
                                                    <input
                                                    class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                                                    type="text" value="{{$user->name}}" name="name" required/>
                                                </div>
                                            </div>
                                            <div class="pb-4">
                                                <label for="about" class="font-semibold text-gray-700 block pb-1">Email</label>
                                                <input
                                                class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                                                type="email" value="{{$user->email}}" name="email" required/>
                                            </div>
                                            <div class="pb-4">
                                                <label for="about" class="font-semibold text-gray-700 block pb-1">Identifiant unique</label>
                                                <input
                                                class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                                                type="number" value="{{$user->identifiant}}" name="identifiant" required/>
                                            </div>
                                            <div class="pb-4">
                                                <label for="about" class="font-semibold text-gray-700 block pb-1">user Name</label>
                                                <input
                                                class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                                                type="text" value="{{$user->username}}" name="username" required/>
                                            </div>
                                            <input type="hidden" name="image" value="{{$user->image}}" required>
                                            <div class="flex items-center gap-4">
                                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                    
                                                @if (session('status') === 'profile-updated')
                                                    <p
                                                        x-data="{ show: true }"
                                                        x-show="show"
                                                        x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-sm text-gray-600"
                                                    >{{ __('Saved.') }}</p>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                              
                                </div>
                               
                              </div>
                    </section>

                </div>
            </main>
        </div>
    </div>
</x-app-layout>