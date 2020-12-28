<x-master>
    <section class="container d-flex" style="height: 10em; position: relative">
        <main class="container mx-auto" style="position: absolute; top: 200%">
            <div class="lg:flex lg:justify-between">
                <div class="ml-14">
                    <a href="/login"><button type="button" class="btn btn-lg btn-primary">Login</button></a>
                </div>

                <div class="mb-12">
                    <img src="{{asset('logo.png')}}" alt="Qchan logo">
                </div>

                <div class="mr-14">
                    <a href="/register"><button type="button" class="btn btn-lg btn-primary">Register</button></a>
                </div>
            </div>
        </main>
    </section>
</x-master>
