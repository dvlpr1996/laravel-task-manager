@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center">
        <div class="flex justify-between flex-1 sm:hidden mt-16">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center p-2 text-sm font-medium  cursor-default leading-5 rounded-lg bg-slate-800">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center p-2 text-sm font-medium leading-5 rounded-lg bg-slate-800 transition ease-in-out duration-150">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center p-2 ml-3 text-sm font-medium  leading-5 rounded-lg bg-slate-800 transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center p-2 ml-3 text-sm font-medium cursor-default leading-5 rounded-lg bg-slate-800">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center mt-5">
            <div>
                <span class="relative z-0 inline-flex shadow-sm">
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center p-2 -ml-px text-sm font-medium bg-slate-800 cursor-default leading-5">
																	{{ $element }}
																</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 rounded-lg -ml-px text-sm font-medium bg-slate-500 cursor-default leading-5">
																					{{ $page }}
																				</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 rounded-lg -ml-px text-sm font-medium bg-slate-800 leading-5 hover:text-gray-500 active:text-gray-700 transition ease-in-out duration-150 cursor-pointer" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </span>
            </div>
        </div>
    </nav>
@endif