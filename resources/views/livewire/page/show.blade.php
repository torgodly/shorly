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
                                <div class=" w-full flex justify-center flex-wrap-reverse  gap-x-[18px] gap-y-4 ">
                                    @foreach ($messengers as $messenger)
                                        @switch($messenger->name)
                                            @case('messenger')
                                                <a target="_blank"
                                                   href="https://www.messenger.com/t/{{$model->MessengerValue('messenger')}}/"
                                                   class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center "><i
                                                        class="fa-brands fa-facebook-messenger text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('phone')
                                                <a href="tel:%2B{{$model->MessengerValue('phone')}}"
                                                   class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center"><i
                                                        class="fa-solid fa-phone text-2xl text-white"></i>
                                                </a>
                                                @break
                                            @case('email')
                                                <a href="mailto:{{$model->MessengerValue('email')}}?subject={{$model->MessengerMessage('email')}}"
                                                   class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center"><i
                                                        class="fa-regular fa-envelope text-2xl text-white"></i>
                                                </a>
                                                @break
                                            @case('telegram')
                                                <a target="_blank"
                                                   href="https://t.me/{{$model->MessengerValue('telegram')}}"
                                                   class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center"><i
                                                        class="fa-brands fa-telegram text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('whatsapp')
                                                <a href="https://api.whatsapp.com/send?phone={{$model->MessengerValue('whatsapp')}}&text={{urlencode($model->MessengerMessage('whatsapp'))}}"
                                                   target="_blank"
                                                   class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center"><i
                                                        class="fa-brands fa-whatsapp text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('viber')
                                                <a href="viber://chat?number=%2B{{$model->MessengerValue('viber')}}"
                                                   class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center"><i
                                                        class="fa-brands fa-viber text-3xl text-white"></i>
                                                </a>
                                                @break
                                            @case('skype')
                                                <a href="skype:{{$model->MessengerValue('skype')}}?chat"
                                                   class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl flex justify-center items-center"><i
                                                        class="fa-brands fa-skype text-3xl text-white"></i>
                                                </a>
                                                @break

                                        @endswitch
                                    @endforeach
                                </div>
                            @endif

                        </div>
                        <div class="w-400 h-fit flex justify-center px-2">
                            @if (!empty($sociallinks->toArray()))
                                <div class=" w-full flex justify-center flex-wrap gap-x-5  gap-y-2 ">
                                    @foreach ($sociallinks as $sociallink)
                                        @switch($sociallink->name)

                                            @case('facebook')
                                                <a href="https://www.facebook.com/{{$model->SocialLink('facebook')}}"
                                                   target="_blank"
                                                   class=" min-w-[26%] h-[54px]  rounded-xl flex justify-center items-center ">
                                                    <i class="fa-brands fa-facebook text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('snapchat')
                                                <a href="https://www.snapchat.com/add/{{$model->SocialLink('snapchat')}}"
                                                   target="_blank"
                                                   class=" min-w-[26%] h-[54px]  rounded-xl flex justify-center items-center ">
                                                    <i class="fa-brands fa-snapchat text-3xl cursor-pointer"></i>
                                                </a>

                                                @break
                                            @case('twitter')
                                                <a href="https://twitter.com/{{$model->SocialLink('twitter')}}"
                                                   target="_blank"
                                                   class=" min-w-[26%] h-[54px]  rounded-xl flex justify-center items-center ">
                                                    <i class="fa-brands fa-twitter text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('instagram')
                                                <a href="https://instagram.com/{{$model->SocialLink('instagram')}}"
                                                   target="_blank"
                                                   class=" min-w-[26%] h-[54px]  rounded-xl flex justify-center items-center ">
                                                    <i class="fa-brands fa-instagram text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('tiktok')
                                                <a href="https://tiktok.com/{{'@'.$model->SocialLink('tiktok')}}"
                                                   target="_blank"
                                                   class=" min-w-[26%] h-[54px]  rounded-xl flex justify-center items-center ">
                                                    <i class="fa-brands fa-tiktok text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('pinterest')
                                                <a href="https://www.pinterest.com/{{$model->SocialLink('pinterest')}}"
                                                   target="_blank"
                                                   class=" min-w-[26%] h-[54px]  rounded-xl flex justify-center items-center ">
                                                    <i class="fa-brands fa-pinterest text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('linkedin')
                                                <a href="https://www.linkedin.com/in/{{$model->SocialLink('linkedin')}}"
                                                   target="_blank"
                                                   class=" min-w-[26%] h-[54px]  rounded-xl flex justify-center items-center ">
                                                    <i class="fa-brands fa-linkedin text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('patreon')
                                                <a href="https://www.patreon.com/{{$model->SocialLink('patreon')}}"
                                                   target="_blank"
                                                   class=" min-w-[26%] h-[54px]  rounded-xl flex justify-center items-center ">
                                                    <i class="fa-brands fa-patreon text-3xl cursor-pointer"></i>
                                                </a>
                                                @break
                                            @case('youtube')
                                                <a href="https://www.youtube.com/{{'@'.$model->SocialLink('youtube')}}"
                                                   target="_blank"
                                                   class=" min-w-[26%] h-[54px]  rounded-xl flex justify-center items-center ">
                                                    <i class="fa-brands fa-youtube text-3xl cursor-pointer"></i>
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
