<div class="
    md:flex sm:justify-between
">
    @foreach ($topics as $topic)
        @include('includes.topic-card', ['topic' => $topic, 'loop' => $loop])
    @endforeach
</div>
