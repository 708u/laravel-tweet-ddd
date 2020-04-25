<nav class="uk-section-primary uk-navbar">
    <div class="uk-navbar-left uk-margin-small-left">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="/">Laravel-tweet-ddd</a></li>
        </ul>
    </div>
    {{-- navbar for PC --}}
    <div class="uk-navbar-right uk-margin-right uk-visible@m">
        <ul class="uk-navbar-nav">
            <x-partial.header-nav/>
        </ul>
    </div>
    {{-- navbar for less than 960px --}}
    <div class="uk-navbar-right uk-margin-right uk-hidden@m" uk-toggle="target: #offcanvas-overlay">
        <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#"></a>
    </div>
    <div id="offcanvas-overlay" class="uk-hidden@m" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <ul class="uk-nav uk-nav-default">
                <li class="uk-nav-header">Menu</li>
                <x-partial.header-nav/>
            </ul>
        </div>
    </div>
</nav>
