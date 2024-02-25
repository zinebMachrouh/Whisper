<x-app-layout>
    <div class="bg-gray-800 h-screen">
    <div class=" flex justify-center items-center  bg-gray-800 gap-2 p-4 rounded-xl">
        <div class="px-4 py-2 mx-2">
            <a href="{{route('profile.edit')}}" class=" text-2xl font-medium rounded-full text-blue-400 hover:bg-gray-800 hover:text-blue-300 float-right">
                <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <g>
                        <path d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                        </path>
                    </g>
                </svg>
            </a>
        </div>
<!-- Profile Card -->

         <div class="md:col-span-1 h-80 shadow-xl bg-gray-700">
            <div class="flex flex-col w-full h-full relative">
                <img src="{{asset('' . $user->image)}}" class="w-44 h-44 m-auto" alt="photo profile">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="flex ">
                        <span
                            class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Photo Profile</span>
                        <input
                            class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                            type="file" value="{{$user->image}}" name="image" required/>
                            <input type="hidden" value="{{$user->username}}" name="username" required>
                            <input type="hidden" value="{{$user->name}}" name="name" required>
                            <input type="hidden" value="{{$user->email}}" name="email" required>
                            <input type="hidden" name="identifiant" value="{{$user->identifiant}}" required>
                            <input type="hidden" value="{{$user->identifiant_unique}}" name="identifiant_unique" required>
                    </div>
                    <button type="submit">Save</button>
                </form>
            </div>
         </div>
         <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('put')
         <div class="md:col-span-3 h-80 w-96 shadow-xl p-4 space-y-2 p-3 bg-gray-700">
                 <div class="flex ">
                     <span
                         class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Name:</span>
                     <input
                         class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                         type="text" value="{{$user->name}}" name="name" required/>
                 </div>
                 <input type="hidden" name="image" value="{{$user->image}}" required>
                 <div class="flex ">
                     <span
                         class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Email:</span>
                     <input
                         class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                         type="text" value="{{$user->email}}" name="email"  required/>
                 </div>
                 <div class="flex ">
                    <span
                        class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">User name:</span>
                    <input
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="text" value="{{$user->username}}" name="username" required/>
                </div>
                 <div class="flex ">
                    <span
                        class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">identifiant unique: {{$user->identifiant_unique}}</span>
                    <input
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="text" value="{{$user->identifiant}}" name="identifiant" required/>
                </div>
                  
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
         </div>
         </form>
             
     </div>
    </div>
</x-app-layout>