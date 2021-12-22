<div>
    <nav class="flex items-center justify-between flex-wrap bg-gray-800 p-2">
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                <a href="#responsive-header"
                   class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Города
                </a>
                <a href="#responsive-header"
                   class="block mr-4 mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
                    Отзывы
                </a>
                <x-tabler-location class="block w-4 h-5 lg:inline-block text-teal-200 hover:text-white"/>
                <a class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
                    {{$city}}
                </a>


            </div>
            @if (Route::has('login'))
                <div class="hidden top-0 right-0 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">тут
                            что-то будет</a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-sm text-gray-700 dark:text-gray-500 underline">Войти</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Зарегистрироваться</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>
    <section class="ml-5
    grid grid-cols-6 gap-4 grid-flow-row auto-rows-max mt-6">
        @foreach($reviews as $review)
            <div class="p-6 bg-blue-700 text-white">
                <div class="text-xl">{{$review->title}}</div>
                <ul class="rating flex">
                    @for ($i = 0; $i < 5; $i++)
                        @if (floor($review->rating) - $i >= 1)
                            <li>
                                <i class="fas fa-star fa-sm text-teal-200 mr-1"></i>
                            </li>
                        @else
                            <li>
                                <i class="far fa-star fa-sm mr-1"></i>
                            </li>
                        @endif
                    @endfor
                </ul>
                <div class="text-sm">{{$review->text}}</div>
                <div class="text-sm">{{$review->city->name}}</div>
                <div class="text-sm">{{$review->user->fio}}</div>
            </div>
        @endforeach
    </section>
</div>
