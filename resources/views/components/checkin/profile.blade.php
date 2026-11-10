<div class="text-center">
    @if ($result)
        <h1>{{ $result->fname }}</h1>
        <img src="{{ asset('storage/image/customer/img/' . $result->image) }}" width="auto" height="500" class="rounded mx-auto d-block" alt="Profile Image">
        <hr>
        <h3>{{ $result->fname }}</h3>
        <h3>{{ $result->phone }}</h3>
        <h3>{{ $result->sta_date }}</h3>
    @endif
</div>