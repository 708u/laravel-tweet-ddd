<section class="tweet_form">
    <x-partial.error-messages :errors="$errors"/>
    <form method="POST" action="{{ route('frontend.tweet.create') }}" enctype="multipart/form-data">
        @csrf
        <div class="field form-group">
            <textarea name="content" placeholder="つぶやいてみましょう" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-block">
                つぶやく
            </button>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" name="posted_picture">
        </div>
    </form>
</section>
