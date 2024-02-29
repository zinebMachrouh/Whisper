<x-app-layout>
<div>
    <div class="md:grid grid-cols-4 grid-rows-2  bg-white gap-2 p-4 rounded-xl">
         <div class="md:col-span-1 h-48 shadow-xl ">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                 <div class="flex w-full h-full relative">
                     <img src="{{asset('' . $user->image)}}" class="w-44 h-44 m-auto" alt="">
                 </div>
                <input type="file" value="{{$user->iamge}}" name="image" required>
                <input type="hidden" value="{{$user->username}}" name="username" required>
                <input type="hidden" value="{{$user->name}}" name="name" required>
                <input type="hidden" value="{{$user->email}}" name="email" required>
                <input type="hidden" name="identifiant" value="{{$user->identifiant}}" required>
                <input type="hidden" value="{{$user->identifiant_unique}}" name="identifiant_unique" required>
                <input type="hidden" name="age" value="{{$user->age}}">
                <input type="hidden" name="aboutMe" value="{{$user->aboutMe}}">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </form>
         </div>
         <div class="md:col-span-3 h-48 shadow-xl p-4 space-y-2 p-3">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('put')
                 <div class="flex">
                     <span
                         class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Name:</span>
                     <input
                         class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                         type="text" name="name" value="{{$user->name}}" required/>
                 </div>
                 <div class="flex">
                     <span
                         class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Email:</span>
                     <input 
                         class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                         type="email" name="email" value="{{$user->email}}" required/>
                 </div>
                  <div class="flex">
                     <span
                         class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">User Name:</span>
                     <input 
                         class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                         type="text" name="username" value="{{$user->username}}" required/>
                 </div>
                 <div class="flex">
                    <span
                        class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">identifiant unique:</span>
                    <input
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="number" name="identifiant" value="{{$user->identifiant}}" required/>
                </div>
                <div class="flex ">
                    <span
                        class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Age:</span>
                    <input 
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="date" name="age" value="{{$user->age}}" required/>
                </div>
                <div class="flex ">
                    <span
                        class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">About you:</span>
                    <input 
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="text" name="aboutMe" value="{{$user->aboutMe}}" required/>
                </div>
                <input type="hidden" name="image" value="{{$user->image}}" required>
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </form>
         </div>
     </div>
 </div>
</x-app-layout>