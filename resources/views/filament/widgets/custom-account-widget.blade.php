@php
    $user = filament()->auth()->user();
@endphp

<x-filament-widgets::widget class="fi-account-widget">
    <x-filament::section>
        <x-filament-panels::avatar.user
            size="lg"
            :user="$user"
            loading="lazy"
        />

        <div class="fi-account-widget-main">
            <h2 class="fi-account-widget-heading">
                {{ __('filament-panels::widgets/account-widget.welcome', ['app' => config('app.name')]) }}
            </h2>

            <p class="fi-account-widget-user-name">
                {{ filament()->getUserName($user) }}
            </p>
        </div>

        <div class="mt-2">
            {{-- Home button --}}
            <div>
                <x-filament::button
                    color="gray"
                    icon="heroicon-m-home"
                    tag="a"
                    href="{{ url('/') }}"
                    class="w-full justify-center"
                >
                    Home
                </x-filament::button>
            </div>
            
            {{-- Spacer --}}
            <div style="height: 10px;"></div>
            
            {{-- Profile button --}}
            <div>
                <x-filament::button
                    color="gray"
                    icon="heroicon-m-user"
                    tag="a"
                    href="{{ route('profile.show') }}"
                    class="w-full justify-center"
                >
                    Profile
                </x-filament::button>
            </div>
            
            {{-- Spacer --}}
            <div style="height: 10px;"></div>
            
            {{-- Logout form --}}
            <div>
                <form
                    action="{{ filament()->getLogoutUrl() }}"
                    method="post"
                    class="fi-account-widget-logout-form"
                >
                    @csrf

                    <x-filament::button
                        color="gray"
                        icon="heroicon-m-arrow-right-on-rectangle"
                        tag="button"
                        type="submit"
                        class="w-full justify-center"
                    >
                        {{ __('filament-panels::widgets/account-widget.actions.logout.label') }}
                    </x-filament::button>
                </form>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>