<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: true }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div x-data="{ expand:false }" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

        <div x-data="{ adults:0, children:0, pets:0, dates:'When', show:true,white: true, where: false, checkIn: false, checkOut: false, guests: false }" x-on:click.outside="show = true; expand = false" class="flex w-2/3 justify-center">
            <div x-transition:enter.scale.20 x-show="show" x-on:click="show = false; expand = true" class="flex shrink-0 items-center border border-gray-300 px-2 rounded-full my-2 hover:cursor-pointer">

                <div x-on:click="where = true; white = false" class="px-4 border-r font-bold">Anywhere</div>

                <div x-text="dates" x-on:click="checkIn = true; white = false; document.getElementById('dates').focus()" class="px-4 border-r font-bold"></div>
                <div x-on:click="guests = true; white = false"class="px-4 text-gray-400">Guests</div>
                <div class="px-4">Q</div>
            </div>

            <div x-transition:enter.scale.20 class="flex w-full" x-show="expand">

                <div x-on:click="white = false" :class="white ? 'bg-white' : 'bg-gray-200'" class="flex items-center border border-gray-300 rounded-full hover:cursor-pointer w-full shadow-xl">

                    <div x-on:click.outside="where = false;" x-on:click="where = true; " :class="where ? 'bg-white shadow-xl hover:bg-white' : 'group hover:bg-gray-300'" class="hover:bg-gray-300  hover:rounded-full w-2/6 rounded-full flex items-center justify-center h-full  hover:cursor-pointer">
                        <div class="group">
                            <div class="text-xs px-4 text-gray-800  text-left">Where</div>
                            <div class="text-sm px-4 text-gray-400 ">@livewire('Search.search', ['active', ])</div>
                        </div>
                    </div>

                    <div x-on:click.outside="checkIn = false" x-on:click="checkIn = true;" :class="checkIn ? 'bg-white shadow-xl hover:bg-white' : 'hover:bg-gray-300'" class="group hover:rounded-full w-2/6 rounded-full flex items-center justify-center h-full  hover:cursor-pointer">
                        <x-calendarFrom>
                        </x-calendarFrom>
                    </div>

                    <div x-on:click.outside="guests = false" x-on:click="guests = true;" :class="guests ? 'bg-white shadow-xl hover:bg-white' : 'hover:bg-gray-300'" class="hover:rounded-full w-2/6 rounded-full flex items-center justify-center h-full  hover:cursor-pointer">
                        <div>
                            <div class="text-center text-xs px-4 text-gray-800">Who</div>
                            <div class="text-center text-sm px-4 text-gray-400">Add guests</div>
                            <x-guests></x-guests>
                        </div>
                    </div>

                </div>
            </div>

        </div>



            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
