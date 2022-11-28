<section>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
        <div class="mb-6 md:mb-0">
            <a href="/" class="flex-shrink-0">
                {{ $logo }}
            </a>
        </div>
        <div class="w-full md:mt-0 sm:max-w-md rounded-2xl border dark:border-gray-800">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div class="text-center">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-700 md:text-2xl dark:text-gray-200">
                        {{ $tittle }}
                    </h1>
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
  </section>