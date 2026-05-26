<!-- Main Navbar -->
<nav class="bg-white shadow sticky top-0 z-50">

    <!-- Top Navbar -->
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <a href="/" class="flex items-center">

                <img
                    src="{{ asset('images/maroon-logo.png') }}"
                    alt="MaroonPost"
                    class="h-8 w-auto"
                >

            </a>

            <!-- Dynamic Pages -->
            <div class="hidden md:flex items-center gap-6">

                <a href="/"
                    class="
                        relative
                        py-2
                        font-medium
                        transition
                        duration-300

                        {{ request()->is('/')
                            ? 'text-[#800000] after:absolute after:left-0 after:bottom-0 after:w-full after:h-[2px] after:bg-[#800000]'
                            : 'text-gray-700 hover:text-[#800000]'
                        }}
                    "
                >
                    Home
                </a>

                @foreach($pages as $page)

                     <a
                        href="/page/{{ $page->slug }}"
                        class="
                            relative
                            py-2
                            font-medium
                            transition
                            duration-300

                            {{ request()->is('page/' . $page->slug)
                                ? 'text-[#800000] after:absolute after:left-0 after:bottom-0 after:w-full after:h-[2px] after:bg-[#800000]'
                                : 'text-gray-700 hover:text-[#800000]'
                            }}
                        "
                    >
                        {{ $page->title }}
                    </a>

                @endforeach

            </div>

        </div>

    </div>

    <!-- Category Navbar -->
    <div class="border-t bg-gray-50">

        <div class="max-w-7xl mx-auto px-6">

            <div class="flex items-center gap-6 overflow-x-auto h-14">

                @foreach($categories as $category)

                    <a
                        href="/category/{{ $category->slug }}"
                        class="
                            relative
                            whitespace-nowrap
                            text-sm
                            font-semibold
                            py-2
                            transition
                            duration-300

                            {{ request()->is('category/' . $category->slug)
                                ? 'text-[#800000] after:absolute after:left-0 after:bottom-0 after:w-full after:h-[2px] after:bg-[#800000]'
                                : 'text-gray-700 hover:text-[#800000]'
                            }}
                        "
                    >
                        {{ $category->name }}
                    </a>

                @endforeach

            </div>

        </div>

    </div>

</nav>