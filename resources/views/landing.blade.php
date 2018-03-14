<!DOCTYPE html>
<html class="overflow-y-scroll h-full" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">

    <style media="screen">
        .font-sans {
            font-family: 'Source Sans Pro', apple-system, BlinkMacSystemFont, 'Helvetica Neue', arial, sans-serif;
        }
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='%234dc0b5' fill-opacity='0.09'%3E%3Cpath fill-rule='evenodd' d='M11 0l5 20H6l5-20zm42 31a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM0 72h40v4H0v-4zm0-8h31v4H0v-4zm20-16h20v4H20v-4zM0 56h40v4H0v-4zm63-25a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM53 41a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-30 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-28-8a5 5 0 0 0-10 0h10zm10 0a5 5 0 0 1-10 0h10zM56 5a5 5 0 0 0-10 0h10zm10 0a5 5 0 0 1-10 0h10zm-3 46a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM21 0l5 20H16l5-20zm43 64v-4h-4v4h-4v4h4v4h4v-4h4v-4h-4zM36 13h4v4h-4v-4zm4 4h4v4h-4v-4zm-4 4h4v4h-4v-4zm8-8h4v4h-4v-4z'/%3E%3C/g%3E%3C/svg%3E");
        }
        .bg-pattern-2 {
            background-image: url("data:image/svg+xml,%3Csvg width='42' height='44' viewBox='0 0 42 44' xmlns='http://www.w3.org/2000/svg'%3E%3Cg id='Page-1' fill='none' fill-rule='evenodd'%3E%3Cg id='brick-wall' fill='%239C92AC' fill-opacity='0.2'%3E%3Cpath d='M0 0h42v44H0V0zm1 1h40v20H1V1zM0 23h20v20H0V23zm22 0h20v20H22V23z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>

    @if (app()->environment('production'))
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115774748-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-115774748-1');
        </script>
    @endif
</head>

<body class="font-sans text-black h-full border-t-2 border-teal">
    <header class="absolute pin-t pin-l w-full py-4">
        <div class="flex items-center justify-between px-8">
            <span class="text-2xl tracking-tight font-semibold">
                {{ config('app.name') }}
            </span>
            <div class="">
                <div class="flex items-center">
                    <a class="text-lg leading-normal text-teal hover:text-teal-dark no-underline ml-8" href="{{ route('login') }}">Login</a>
                    <a class="text-lg leading-normal text-teal hover:text-teal-dark no-underline ml-8" href="{{ route('register') }}">Register</a>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-blue-lightest bg-pattern h-full py-8">
        <div class="w-5/6 max-w-lg ml-auto mr-auto h-full">
            <div class="flex items-center justify-center text-center h-full">
                <div>
                    <h1 class="text-4xl sm:text-5xl font-semibold leading-none tracking-tight mb-4">Explain BMT in a sentnce</h1>
                    <h2 class="text-2xl sm:text-3xl text-blue-darker opacity-75 font-normal leading-tight">And explain it a little more below.</h2>
                    <div class="flex flex-col sm:flex-row justify-center pt-8">
                        <button class="bg-blue hover:bg-blue-dark text-2xl leading-none text-white font-semibold h-12 px-8 rounded-full whitespace-no-wrap mb-2 sm:mb-0 sm:mr-2">
                            Main CTA
                        </button>
                        <button class="bg-transparent text-2xl leading-none text-blue font-semibold hover:text-blue-dark h-12 px-8 border border-blue-lighter hover:border-blue-light rounded-full whitespace-no-wrap mt-2 sm:mt-0 sm:ml-2">
                            Another CTA
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-8">
        <div class="w-5/6 max-w-lg ml-auto mr-auto mt-8 mb-4">
            <div class="flex flex-col justify-center text-center pb-4">
                <h2 class="text-5xl font-semibold leading-none tracking-tight mb-4">Explain something using a FAQ section</h2>
                <h3 class="text-3xl text-blue-darker opacity-75 font-normal leading-none mb-4">And add a tagline.</h3>
            </div>
        </div>

        <div class="w-5/6 max-w-md ml-auto mr-auto pt-8 mb-8">
            <div class="flex flex-wrap -mx-6 -my-6">
                <div class="w-full sm:w-1/2 px-6 py-6">
                    <h3 class="text-xl font-semibold leading-tight mb-3">Can I use this for blah blah?</h3>
                    <p class="text-lg leading-normal text-grey-darker mb-8">Yes you can!.</p>
                </div>
                <div class="w-full sm:w-1/2 px-6 py-6">
                    <h3 class="text-xl font-semibold leading-tight mb-3">Can I use this for blah blah?</h3>
                    <p class="text-lg leading-normal text-grey-darker mb-8">Yes you can!.</p>
                </div>
                <div class="w-full sm:w-1/2 px-6 py-6">
                    <h3 class="text-xl font-semibold leading-tight mb-3">Can I use this for blah blah?</h3>
                    <p class="text-lg leading-normal text-grey-darker mb-8">Yes you can!.</p>
                </div>
                <div class="w-full sm:w-1/2 px-6 py-6">
                    <h3 class="text-xl font-semibold leading-tight mb-3">Can I use this for blah blah?</h3>
                    <p class="text-lg leading-normal text-grey-darker mb-8">Yes you can!.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-grey-lightest py-8">
        <div class="w-5/6 max-w-lg ml-auto mr-auto mt-8 mb-4">
            <div class="flex flex-col justify-center text-center pb-4">
                <h2 class="text-4xl font-semibold leading-none tracking-tight mb-4">Popular proposals</h2>
            </div>
        </div>
        <div class="w-5/6 max-w-2xl ml-auto mr-auto mt-8">
            <div class="flex flex-wrap -mx-6 -my-6">
                <div class="w-full lg:w-1/3 px-6 py-6">
                    <a class="no-underline" href="#">
                        <div class="bg-pink-dark rounded shadow-lg overflow-hidden p-8">
                            <h5 class="text-2xl text-white mb-4">Proposal #1</h5>
                            <p class="text-lg text-white leading-tight">Here lies a descriptive description. It explains things, as explanations do.</p>
                        </div>
                    </a>
                </div>
                <div class="w-full lg:w-1/3 px-6 py-6">
                    <a class="no-underline" href="#">
                        <div class="bg-red-light rounded shadow-lg overflow-hidden p-8">
                            <h5 class="text-2xl text-white mb-4">Proposal #2</h5>
                            <p class="text-lg text-white leading-tight">Here lies a descriptive description. It explains things, as explanations do.</p>
                        </div>
                    </a>
                </div>
                <div class="w-full lg:w-1/3 px-6 py-6">
                    <a class="no-underline" href="#">
                        <div class="bg-purple-light rounded shadow-lg overflow-hidden p-8">
                            <h5 class="text-2xl text-white mb-4">Proposal #3</h5>
                            <p class="text-lg text-white leading-tight">Here lies a descriptive description. It explains things, as explanations do.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
<section class="bg-white bg-pattern-2 py-8">
    <div class="w-5/6 max-w-lg ml-auto mr-auto mt-8 mb-4">
        <div class="flex flex-col justify-center text-center pb-4">
            <h2 class="text-4xl font-semibold leading-none tracking-tight mb-4">Recently updated</h2>
        </div>
    </div>
    <div class="w-5/6 max-w-2xl ml-auto mr-auto mt-8">
        <div class="flex flex-wrap -mx-6 -my-6">
            <div class="w-full lg:w-1/3 px-6 py-6">
                <a class="no-underline" href="#">
                    <div class="bg-pink-dark rounded shadow-lg overflow-hidden p-8">
                        <h5 class="text-2xl text-white mb-4">Proposal #1</h5>
                        <p class="text-lg text-white leading-tight">Here lies a descriptive description. It explains things, as explanations do.</p>
                    </div>
                </a>
            </div>
            <div class="w-full lg:w-1/3 px-6 py-6">
                <a class="no-underline" href="#">
                    <div class="bg-red-light rounded shadow-lg overflow-hidden p-8">
                        <h5 class="text-2xl text-white mb-4">Proposal #2</h5>
                        <p class="text-lg text-white leading-tight">Here lies a descriptive description. It explains things, as explanations do.</p>
                    </div>
                </a>
            </div>
            <div class="w-full lg:w-1/3 px-6 py-6">
                <a class="no-underline" href="#">
                    <div class="bg-purple-light rounded shadow-lg overflow-hidden p-8">
                        <h5 class="text-2xl text-white mb-4">Proposal #3</h5>
                        <p class="text-lg text-white leading-tight">Here lies a descriptive description. It explains things, as explanations do.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

    <section class="bg-grey-lightest py-8">
        <div class="w-5/6 max-w-xl ml-auto mr-auto my-8">
            <div class="flex md:items-center flex-col md:flex-row md:justify-between">
                <div class="mb-8 md:mb-0 md:pr-4">
                    <h3 class="text-4xl font-normal tracking-tight leading-none mb-3">CTA for users who scrolled to the end</h3>
                    <h4 class="text-3xl text-grey-dark font-normal leading-tight">Remember to explain things!</h4>
                </div>
                <div class="md:pl-4">
                    <div class="flex items-center">
                        <button class="bg-blue hover:bg-blue-dark text-xl leading-none text-white font-semibold h-10 px-6 rounded-full whitespace-no-wrap mr-2">
                            Submit a proposal
                        </button>
                        <button class="bg-transparent text-xl leading-none text-blue font-semibold hover:text-blue-dark h-10 px-6 border border-blue-lighter hover:border-blue-light rounded-full whitespace-no-wrap ml-2">
                            CTA #2
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-grey-lightest py-8">
        <div class="flex flex-col-reverse md:flex-row md:items-center md:justify-between px-8">
            <small class="block text-sm text-grey">
                &copy; {{ config('app.name' )}}
            </small>
            <div class="mb-4 md:mb-0">
                <div class="flex flex-col md:flex-row md:items-center">
                    <a class="text-xl md:text-base leading-normal text-grey-dark hover:text-black no-underline mb-4 md:mb-0 md:ml-8" href="{{ route('login') }}">Login</a>
                    <a class="text-xl md:text-base leading-normal text-grey-dark hover:text-black no-underline mb-4 md:mb-0 md:ml-8" href="{{ route('register') }}">Register</a>
                    <a class="text-xl md:text-base leading-normal text-grey-dark hover:text-black no-underline mb-4 md:mb-0 md:ml-8" href="https://github.com/assertchris/borrow-my-topic" target="_blank noopener noreferer">GitHub</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
