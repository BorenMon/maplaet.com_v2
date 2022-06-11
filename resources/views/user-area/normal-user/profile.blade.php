@extends('layouts.normal-user.app')
@section('header', 'Profile')

@section('css')
    
@endsection

@section('content')

    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        @livewire('profile.update-profile-information-form')

        <x-jet-section-border />
    @endif

    <div class="mt-10 sm:mt-0">
        <div wire:id="FojWI0A7NIE8cw9r6nDW" class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">Link Telegram</h3>
        
                <p class="mt-1 text-sm text-gray-600">
                    Update your telegram account id and let maplaet telegram bot can send messages and files by following provided tutorial video <a href="https://www.youtube.com/channel/UCXVSw-JowZpjR9GZHjQwckQ" target="_blank" class="underline text-maplaet-2">here</a>.
                </p>
            </div>
        
            <div class="px-4 sm:px-0">
                
            </div>
        </div>
        
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('user.update.telegram_id') }}" method="POST">
                    @csrf
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Profile Photo -->
                
                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <label class="block font-medium text-sm text-gray-700" for="telegram_id">
            Telegram ID
        </label>
                    <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="telegram_id" type="text" autocomplete="telegram_id" value="{{ old('telegram_id', Auth::user()->telegram_id) }}" name="telegram_id">
                    @error('telegram_id')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                            </div>
        <p class="col-span-6 sm:col-span-4">If you haven't chat with maplaet bot yet, please click <a href="//t.me/maplaet_bot" target="_blank" class="underline text-maplaet-2">here</a>.</p>
                        </div>
                    </div>
        
                                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            
        
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-maplaet-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-maplaet-1 active:bg-maplaet-1 focus:outline-none focus:bg-maplaet-1 focus:ring focus:ring-maplaet-1 disabled:opacity-25 transition" wire:loading.attr="disabled" wire:target="photo">
            Save
        </button>
                        </div>
                            </form>
            </div>
        </div>
    </div>
    <x-jet-section-border />

    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        <div class="mt-10 sm:mt-0">
            @livewire('profile.update-password-form')
        </div>

        <x-jet-section-border />
    @endif

    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        <div class="mt-10 sm:mt-0">
            @livewire('profile.two-factor-authentication-form')
        </div>

        <x-jet-section-border />
    @endif

    <div class="mt-10 sm:mt-0">
        @livewire('profile.logout-other-browser-sessions-form')
    </div>

    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
        <x-jet-section-border />

        <div class="mt-10 sm:mt-0">
            @livewire('profile.delete-user-form')
        </div>
    @endif

@endsection

@section('js')
    
@endsection
