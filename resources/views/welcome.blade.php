<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shorly - All Your Links in One Place</title>
    <meta name="keywords" content="Shorly, links, organization, one place, landing page, social media, website, online presence, digital marketing, personal branding, portfolio, bio, contact information, networking, influencers, creators, bloggers, musicians, artists, entrepreneurs, small business">
    <link rel="canonical" href="https://shor.ly/">
    <meta property="og:title" content="Shorly - All Your Important Links in One Place">
    <meta property="og:description" content="Shorly is a platform that helps you collect and organize all your important links in one place. Create your custom Shorly page today!">
    <meta property="og:url" content="https://shor.ly/">
    <meta property="og:image" content="https://shor.ly/images/logo/logo.png">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Comfortaa+Light&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Circular:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body>
<div class="bg-gradient-to-r from-[#e2fef4] to-[#fdf5cf] h-screen ">
    <div class=" flex flex-col justify-center items-center">
        <nav class="flex justify-between items-center p-4 md:bg-white rounded-full w-full md:w-[75%] mt-6">
            <div class="flex items-center">
                <img src="{{asset('images/logo/logo.png')}}" alt="logo" class="w-10 h-10">
                <h1 class="text-2xl font-bold ml-2 font-comfortaa hidden md:block ">Shorly</h1>
            </div>
            <div class="flex justify-center items-center gap-5">
                <div>
                    <a class="hidden md:block" href="https://www.buymeacoffee.com/torgodly" target="_blank">
                        <img
                            src="https://img.buymeacoffee.com/button-api/?text=Buy me a coffee&emoji=&slug=torgodly&button_colour=FFDD00&font_colour=000000&font_family=Poppins&outline_colour=000000&coffee_colour=ffffff"
                            class="h-10"/>
                    </a>
                    <a class="md:hidden block" href="https://www.buymeacoffee.com/torgodly">
                        <img src="{{asset('images/icons/bmc-logo-yellow.png')}}" class="h-10 rounded-xl ">
                    </a>
                </div>
                <div>
                    <a href="{{route('login')}}" class="text-lg font-bold mr-4 font-comfortaa">Login</a>
                    <a href="{{route('register')}}"
                       class="bg-[#f9a826] text-white font-bold py-2 px-4 rounded-full font-comfortaa ">Sign Up
                    </a>
                </div>
            </div>
        </nav>

        <div class="flex flex-col justify-center items-center w-[80%]">
            <div class="md:w-[60%] md:mt-10">
                <h1 class="md:text-5xl text-3xl font-bold  md:font-comfortaa text-center     leading-tight md:mt-10 mt-5 ">Get
                    connected with our
                    shortcut to all
                    your important links.</h1>
                <p class="text-lg text-center mt-4">Shorly is a simple platform for creating a personalized landing page with all your links in one place, accessible through a single QR code.</p>

            </div>
            <form action="{{route('register')}}" method="get">

                <div class="flex flex-col md:flex-row gap-5 justify-center items-center mt-10 w-fit">
                    <div
                        class="flex justify-between items-center gap-5 p-2 bg-white rounded-full md:w-full w-full  h-[74px] ">
                        <div class="flex ">
                            <span class="md:text-3xl text-2xl font-bold text-black pl-6">Shor.ly/</span>
                            <input placeholder="username" name="username"
                                   class="md:text-2xl text-xl p-0 m-0 text-black border-none outline-none w-fit  ">
                        </div>
                        <button type="submit"
                                class="hidden md:block text-xl text-black bg-[#FFDD00] font-bold py-2 px-4 rounded-full   w-full h-full whitespace-nowrap transform hover:scale-95 transition duration-200">
                            Get Started
                        </button>
                    </div>
                    <button type="submit"
                            class="md:hidden block text-xl text-black bg-[#FFDD00] font-bold py-2 px-4 rounded-full   w-full h-full whitespace-nowrap transform hover:scale-95 transition duration-200">
                        Get Started
                    </button>
                </div>
            </form>
            <div class="mt-5 text-[16px] font-medium text-black text-center">It’s free, and takes less than a minute.
            </div>
            <div class="mt-5 text-[16px] font-medium text-black text-center"><span
                    class="md:text-3xl text-2xl font-bold text-black pl-6">Number of users: <span class="text-[#f4812a]">{{$users}}</span></span>

            </div>

        </div>


    </div>
</div>

</body>
</html>
