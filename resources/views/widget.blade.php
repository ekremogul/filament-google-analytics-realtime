<x-filament::widget class="col-span-2">
    <div
        wire:poll.{{ config("filament-google-analytics-realtime.interval") }}
        wire:init="init"
        class="grid grid-cols-2 gap-4 lg:gap-8"
    >
        <x-filament::card class="col-span-1">
            <x-filament::card.heading>
                @lang('filament-google-analytics-realtime::realtime.right_now')
            </x-filament::card.heading>
            <div class=" flex justify-between items-center">
                <h3 class="text-2xl text-center">@lang('filament-google-analytics-realtime::realtime.active_visitors')</h3>
                <p style="font-size: 2.5rem;" class="text-center">{{ $totalVisitor }}</p>
            </div>
        </x-filament::card>
        <x-filament::card class="col-span-1">
            <x-filament::card.heading>
                @lang('filament-google-analytics-realtime::realtime.devices')
            </x-filament::card.heading>
            @if($loaded)
                <div class="grid grid-cols-2">
                    @foreach($visitors->sortByDesc('Total') as $visitor)
                        <div>
                            @lang('filament-google-analytics-realtime::realtime.' . $visitor["Device"])
                        </div>
                        <div>
                            {{ $visitor["Total"] }}
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex justify-center items-center flex-col gap-4">
                    <p>@lang('filament-google-analytics-realtime::realtime.please_wait')</p>
                    <svg class="animate-spin -ml-1 mr-3 h-auto w-auto text-primary" style="max-width: 50px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            @endif
        </x-filament::card>
        <x-filament::card class="col-span-2">
            <x-filament::card.heading>
                @lang('filament-google-analytics-realtime::realtime.pages')
            </x-filament::card.heading>
            @if($loaded)
                @foreach($pages as $page)
                    <div class="flex justify-between">
                        <p>{{ str($page["Path"])->limit(100) }}</p>
                        <p>{{ $page["Total"] }}</p>
                    </div>
                @endforeach
            @else
                <div class="flex justify-center items-center flex-col gap-4">
                    <p>@lang('filament-google-analytics-realtime::realtime.please_wait')</p>
                    <svg class="animate-spin -ml-1 mr-3 h-auto w-auto text-primary" style="max-width: 50px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            @endif
        </x-filament::card>
    </div>
</x-filament::widget>
