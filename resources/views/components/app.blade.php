<x-master>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                <div class="lg:w-32">
                    @include('qchan._links')
                </div>

                <div>
                    {{ $slot }}
                </div>

                <div class="lg:w-1/6 bg-blue-100 rounded-lg p-4">
                    @include('qchan._followers-list')
                </div>
            </div>
        </main>
    </section>
</x-master>
