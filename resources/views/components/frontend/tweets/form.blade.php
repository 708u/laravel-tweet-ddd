<section class="tweet_form">
    <x-partial.error-messages :errors="$errors"/>
    <form method="POST" action="{{ route('frontend.tweet.create') }}" enctype="multipart/form-data">
        @csrf
        <textarea name="content" placeholder="つぶやいてみましょう" class="uk-textarea" rows="4"></textarea>
        <button class="uk-button uk-button-primary uk-margin uk-width-1-1">つぶやく</button>
        <div class="js-upload uk-placeholder uk-text-center">
            <span uk-icon="icon: cloud-upload"></span>
            <span class="uk-text-middle">drop picture here or</span>
            <div uk-form-custom>
                <input type="file" multiple name="posted_picture">
                <span class="uk-link">selecting one</span>
            </div>
        </div>
    </form>
</section>
