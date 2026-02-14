@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center">
        <div class="relative">
            <!-- Background decoration -->
            <div class="absolute inset-0 bg-gradient-to-r from-red-500 to-red-600 rounded-2xl blur-lg opacity-20"></div>
            
            <!-- Main container -->
            <div class="relative bg-white rounded-2xl shadow-2xl border border-red-100 overflow-hidden">
                <div class="flex items-center">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center px-5 py-3 text-sm font-medium text-gray-400 bg-gradient-to-r from-gray-50 to-gray-100 border-r border-red-100 cursor-not-allowed transition-all duration-300">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-5 py-3 text-sm font-medium text-red-600 bg-white border-r border-red-100 hover:bg-gradient-to-r hover:from-red-50 hover:to-red-100 transition-all duration-300 group">
                            <i class="fas fa-chevron-right group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span class="relative inline-flex items-center px-4 py-3 text-sm font-medium">
                                <div class="flex space-x-1">
                                    <span class="w-2 h-2 bg-gradient-to-r from-red-400 to-red-500 rounded-full animate-pulse"></span>
                                    <span class="w-2 h-2 bg-gradient-to-r from-red-400 to-red-500 rounded-full animate-pulse" style="animation-delay: 0.2s"></span>
                                    <span class="w-2 h-2 bg-gradient-to-r from-red-400 to-red-500 rounded-full animate-pulse" style="animation-delay: 0.4s"></span>
                                </div>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page" class="relative z-10 inline-flex items-center px-5 py-3 text-sm font-bold text-white bg-gradient-to-r from-red-500 to-red-600 shadow-lg transform scale-110 transition-all duration-300">
                                        <span class="absolute inset-0 bg-white opacity-20 rounded-lg"></span>
                                        <span class="relative">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-5 py-3 text-sm font-medium text-gray-700 bg-white border-r border-red-100 hover:bg-gradient-to-r hover:from-red-50 hover:to-red-100 hover:text-red-600 transition-all duration-300 group">
                                        <span class="relative">{{ $page }}</span>
                                        <span class="absolute inset-0 bg-gradient-to-r from-red-500 to-red-600 opacity-0 group-hover:opacity-10 rounded-lg transition-opacity duration-300"></span>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-5 py-3 text-sm font-medium text-red-600 bg-white hover:bg-gradient-to-r hover:from-red-50 hover:to-red-100 transition-all duration-300 group">
                            <i class="fas fa-chevron-left group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                    @else
                        <span class="relative inline-flex items-center px-5 py-3 text-sm font-medium text-gray-400 bg-gradient-to-r from-gray-50 to-gray-100 cursor-not-allowed transition-all duration-300">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </nav>
@endif
