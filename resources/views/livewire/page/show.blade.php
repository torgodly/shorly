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
                                  @if($model->verified)
                                        <button title="this user is verified by admin"
                                                class="absolute bottom-0 right-0 rounded-full text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-blue-600">
                                                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                  @endif
                                </div>
                            @endif
                        </div>


                        <div class="px-5  cursor-pointer text-center">
                            @if (!empty($title) or !empty($description))
                                <div class="space-y-1 ">
                                    <h1 class="font-bold text-3xl font-headings " dir="auto">{{ $title }}</h1>
                                    <h6 class="font-footer font-medium  text-base " dir="auto">{{ $description }}</h6>
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
                                                <a target="_blank" rel="nofollow"
                                                   href="https://www.messenger.com/t/{{$messenger->value}}/"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-facebook-messenger text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('phone')
                                                <a href="tel:%2B{{$messenger->value}}" rel="nofollow"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fas fa-phone text-2xl text-white"></i>
                                                </a>
                                                @break
                                            @case('email')
                                                <a href="mailto:{{$messenger->value}}?subject={{$messenger->message}}" rel="nofollow"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="far fa-envelope text-2xl text-white"></i>
                                                </a>
                                                @break
                                            @case('telegram')
                                                <a target="_blank" href="https://t.me/{{$messenger->value}}" rel="nofollow"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-telegram text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('whatsapp')
                                                <a href="https://api.whatsapp.com/send?phone={{$messenger->value}}&text={{urlencode($messenger->message)}}"
                                                   target="_blank" rel="nofollow"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-whatsapp text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('viber')
                                                <a href="viber://chat?number=%2B{{$messenger->value}}" rel="nofollow"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-viber text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('skype')
                                                <a href="skype:{{$messenger->value}}?chat" rel="nofollow"
                                                   class="grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-skype text-3xl text-white"></i>
                                                </a>
                                                @break
                                        @endswitch
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="space-y-5 mt-8 w-screen md:w-[400px] h-fit flex flex-col justify-center px-4">
                            @if($SecretMessage)
                                <a href="{{route('message.create', $model->username)}}"
                                   class=" grow bg-black min-w-full h-[54px] rounded-xl flex justify-center items-center gap-5">

                                    <i class="fa-solid fa-message  text-3xl text-white"></i>
                                    <h1 class="text-lg font-bold text-white">Secret Messages🤫🔐</h1>

                                </a>
                            @endif
                            @if(!empty($Buttons->toArray()))
                                @foreach($Buttons as $Button)
                                    <a href="{{$Button->url}}" rel="nofollow" target="_blank"
                                       class=" grow bg-black min-w-full h-[54px] rounded-xl flex justify-center items-center gap-5">

                                        <h1 class="text-lg font-bold text-white">{{$Button->title}}</h1>

                                    </a>
                                @endforeach

                            @endif
                        </div>
                        <div class="w-400 h-fit flex justify-center px-2">
                            @if (!empty($socialLinks->toArray()))
                                <div class="w-full flex justify-center flex-wrap gap-x-5 gap-y-2">
                                    @foreach ($socialLinks as $socialLink)
                                        @switch($socialLink->name)
                                            @case('facebook')
                                                <a href="https://www.facebook.com/{{$socialLink->value}}"
                                                   target="_blank" rel="nofollow"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-facebook text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('snapchat')
                                                <a href="https://www.snapchat.com/add/{{$socialLink->value}}"
                                                   target="_blank" rel="nofollow"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-snapchat text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('twitter')
                                                <a href="https://twitter.com/{{$socialLink->value}}" target="_blank" rel="nofollow"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-twitter text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('instagram')
                                                <a href="https://instagram.com/_u/{{$socialLink->value}}/"
                                                   target="_blank" rel="nofollow"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-instagram text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('tiktok')
                                                <a href="https://tiktok.com/@{{$socialLink->value}}" target="_blank" rel="nofollow"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-tiktok text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('pinterest')
                                                <a href="https://www.pinterest.com/{{$socialLink->value}}"
                                                   target="_blank" rel="nofollow"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-pinterest text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('linkedin')
                                                <a href="https://www.linkedin.com/in/{{$socialLink->value}}"
                                                   target="_blank" rel="nofollow"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-linkedin text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('patreon')
                                                <a href="https://www.patreon.com/{{$socialLink->value}}" target="_blank" rel="nofollow"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-patreon text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('youtube')
                                                <a href="https://www.youtube.com/{{'@'.$socialLink->value}}"
                                                   target="_blank" rel="nofollow"
                                                   class="min-w-[26%] h-[54px] rounded-xl flex justify-center items-center">
                                                    <i class="fab fa-youtube text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('github')
                                                <a href="https://www.github.com/{{$socialLink->value}}" target="_blank" rel="nofollow"
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
                            <span class="font-footer ">made on <a href="{{env('APP_URL')}}"><strong>shor.ly</strong></a></span>
                        </footer>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
