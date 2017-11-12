@if ( $screen->value == 1 )
    <!-- If the screen == 1 -> show questions -->
    <h1 class="name">{{ $question->names }}</h1>
    <div class="question">
        {{ $question->question }}
    </div>
    <div class="min-text">
        Задавайте своите въпроси в залата или чрез мобилния наръчник на guide.designweekend.co
    </div>
@elseif ( $screen->value == 2 )
    <!-- If the screen == 2 -> show sponsors -->
    <div class="sponsors">
        <img src="{{ asset('assets/img/guide-sponsors.png') }}" class="live-sponsors">
    </div>
@elseif ( $screen->value == 3 )
    <!-- If the screen == 3 -> show CTA -->
    <h1 class="name">Имате въпроси?</h1>
    <div class="question">
        Задавайте ги в залата или чрез мобилния наръчник за DC 2017 <br/> guide.designweekend.co
    </div>
@endif