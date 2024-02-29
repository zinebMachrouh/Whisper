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
                    
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Update Password') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-slate-200">
                                {{ __('Ensure your account is using a long, random password to stay secure.') }}
                            </p>
                        </header>
                    
                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')
                    
                            <div>
                                <x-input-label class="text-slate-200" for="update_password_current_password" :value="__('Current Password')" />
                                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>
                    
                            <div>
                                <x-input-label class="text-slate-200" for="update_password_password" :value="__('New Password')" />
                                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>
                    
                            <div>
                                <x-input-label class="text-slate-200" for="update_password_password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                    
                                @if (session('status') === 'password-updated')
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
                    </section>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>