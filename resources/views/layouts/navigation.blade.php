<?php
$user=Auth::user()->first_name??null;
?>

<nav class="navbar navbar-expand-lg navbar-dark shadow bg-primary sticky-top ">
    <div class="container-fluid">
        <a class="navbar-brand nav-link">
            <i class="fab fa-bootstrap"></i>
            miniVK
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    @component('components.search-form')
                    @endcomponent
                </li>

            </ul>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="ml-1 text-white">
                                <span>
                                    <span>
                                        {{ $user }}
                                    </span>
                                    <i class="fas fa-user-circle"></i>
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </div>
                        </button>
                    </x-slot>


                    <x-slot name="content">
                        <!-- Settings -->
                        <form method="get" action="{{ route('settings') }}">
                            @csrf
                            <x-dropdown-link :href="route('settings')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Settings') }}
                            </x-dropdown-link>
                        </form>
                        <!-- Log out -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
