<div>
    <div class=" flex justify-center items-center min-h-screen">
        <div class="py-6 text-gray-900 flex flex-col justify-center items-center w-screen md:w-[400px]    relative">
            <div class="flex flex-col justify-center items-center ">

                <div class="space-y-4">
                    <div class=" flex flex-col justify-center items-center space-y-4">

                        <div class="px-6 flex justify-center items-center ">

                            @if (file_exists('images/UserAvatar/' . $model->id . '.png'))
                                <div class="relative">
                                    <img src="{{ 'images/UserAvatar/' . $imgurl }}"
                                         class="rounded-full w-[100px] h-[100px] flex justify-center items-center ">
                                </div>
                            @endif
                        </div>


                        <div class="px-5  cursor-pointer text-center">
                            @if (!empty($title) or !empty($description))
                                <div class="space-y-4 ">
                                    <h1 class="font-bold text-3xl font-headings ">{{ $title }}</h1>
                                    <h6 class="font-footer font-medium  text-base ">{{ $description }}</h6>
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="space-y-5 mt-8">
                        <div class="w-screen md:w-[400px] h-fit flex justify-center px-4">
                            @if (!empty($messengers->toArray()))
                                <div class="w-full flex justify-center flex-wrap-reverse gap-x-[18px] gap-y-4">
                                    @foreach ($messengers as $messenger)
                                        @switch($messenger->name)
                                            @case('messenger')
                                                <a target="_blank"
                                                   href="https://www.messenger.com/t/{{$messenger->value}}/"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-facebook-messenger text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('phone')
                                                <a href="tel:%2B{{$messenger->value}}"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fas fa-phone text-2xl text-white"></i>
                                                </a>
                                                @break
                                            @case('email')
                                                <a href="mailto:{{$messenger->value}}?subject={{$messenger->message}}"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="far fa-envelope text-2xl text-white"></i>
                                                </a>
                                                @break
                                            @case('telegram')
                                                <a target="_blank" href="https://t.me/{{$messenger->value}}"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-telegram text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('whatsapp')
                                                <a href="https://api.whatsapp.com/send?phone={{$messenger->value}}&text={{urlencode($messenger->message)}}"
                                                   target="_blank"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-whatsapp text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('viber')
                                                <a href="viber://chat?number=%2B{{$messenger->value}}"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-viber text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('skype')
                                                <a href="skype:{{$messenger->value}}?chat"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-skype text-3xl text-white"></i>
                                                </a>
                                                @break
                                        @endswitch
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div>
                            @if($SecretMessage)
                                <a href="{{route('message.create', $model->username)}}"
                                        class=" grow bg-black min-w-full h-[54px] rounded-xl flex justify-center items-center gap-5">

                                    <i class="fa-solid fa-message  text-3xl text-white"></i>
                                    <h1 class="text-lg font-bold text-white">Secret Messages🤫🔐</h1>

                                </a>
                            @endif
                        </div>
                        <div class="w-400 h-fit flex justify-center px-2">
                            @if (!empty($socialLinks->toArray()))
                                <div class="w-full flex justify-center flex-wrap gap-x-5 gap-y-2">
                                    @foreach ($socialLinks as $socialLink)
                                        @switch($socialLink->name)
                                            @case('facebook')
                                                <a href="https://www.facebook.com/{{$socialLink->value}}"
                                                   target="_blank"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-facebook text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('snapchat')
                                                <a href="https://www.snapchat.com/add/{{$socialLink->value}}"
                                                   target="_blank"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-snapchat text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('twitter')
                                                <a href="https://twitter.com/{{$socialLink->value}}" target="_blank"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-twitter text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('instagram')
                                                <a href="https://instagram.com/_u/{{$socialLink->value}}/"
                                                   target="_blank"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-instagram text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('tiktok')
                                                <a href="https://tiktok.com/{{$socialLink->value}}" target="_blank"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-tiktok text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('pinterest')
                                                <a href="https://www.pinterest.com/{{$socialLink->value}}"
                                                   target="_blank"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-pinterest text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('linkedin')
                                                <a href="https://www.linkedin.com/in/{{$socialLink->value}}"
                                                   target="_blank"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-linkedin text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('patreon')
                                                <a href="https://www.patreon.com/{{$socialLink->value}}" target="_blank"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-patreon text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('youtube')
                                                <a href="https://www.youtube.com/{{'@'.$socialLink->value}}"
                                                   target="_blank"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-youtube text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('github')
                                                <a href="https://www.github.com/{{$socialLink->value}}" target="_blank"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-github text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                        @endswitch
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="mt-10 w-full h-fit flex justify-center px-2">
                        <footer class="flex gap-x-1 justify-center items-center">
                            <span class="font-footer ">made by <a href="{{env('app_url')}}"><strong>shor.ly</strong></a></span>
                        </footer>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
