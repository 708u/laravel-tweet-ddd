<section class="tweet_form">
    <form method="POST" action="{{ route('frontend.tweet.create') }}">
        @csrf
        <div class="field form-group">
            <textarea name="content" placeholder="つぶやいてみましょう" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-block">
                つぶやく
            </button>
        </div>
    </form>
</section>
