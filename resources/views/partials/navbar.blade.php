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


                    <!-- Expandable Search -->
                    <form
                        action="/search"
                        method="GET"
                        class="relative group"
                    >

                        <input
                            type="text"
                            name="q"
                            placeholder="Cari berita..."
                            value="{{ request('q') }}"
                            class="
                                w-11
                                group-hover:w-64
                                focus:w-64
                                transition-all
                                duration-300
                                ease-in-out

                                bg-white
                                border
                                border-gray-300
                                rounded-full

                                pl-11
                                pr-4
                                py-2.5

                                text-sm
                                text-gray-700

                                shadow-sm

                                focus:outline-none
                                focus:border-[#800000]
                                focus:ring-2
                                focus:ring-[#800000]/20
                            "
                        >

                        <!-- Search Icon -->
                        <button
                            type="submit"
                            class="
                                absolute
                                left-3
                                top-1/2
                                -translate-y-1/2
                                text-gray-400
                                hover:text-[#800000]
                                transition
                            "
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"
                                />
                            </svg>

                        </button>

                    </form>

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