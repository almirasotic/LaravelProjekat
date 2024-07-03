<x-layout>

<style>
        .moving-text {
            font-weight: bold;
            font-size: 40px;
            color: red;
            font-family: 'Roboto', sans-serif;
            position: relative;
            display: inline-block;
            animation: moveText 3s infinite;
        }

        @keyframes moveText {
            0% { transform: translateX(0); }
            50% { transform: translateX(20px); }
            100% { transform: translateX(0); }
        }
    </style>
    @include('partials._search')
    <link rel="stylesheet" href="{{ asset('css/themes.css') }}">

    <div class="themes_Body">
        <div class="new_theme">
            @if (auth()->check() && auth()->user()->role === 'moderator')
                @php
                    $moderatorId = auth()->user()->id;
                    $maxThemesAllowed = 2;
                    $currentThemesCount = app('App\Http\Controllers\ThemeController')->countThemes($moderatorId);
                @endphp

                <label style="padding-bottom: 50px; color:black;">
                    <br><br></label>

                @if ($currentThemesCount < $maxThemesAllowed)
                    <div class="create_new_theme">
                        <a href="/themes/create">Kreiraj novu temu kao moderator</a>
                    </div>
                @else
                <p class="moving-text" >Unet je maksimalni broj tema</p>
                @endif
            @endif
        </div>
        <div class="themes_Grid">
            @unless (count($themes) == 0)
                @foreach ($themes as $theme)
                    <x-theme-card :theme="$theme" />
                @endforeach
            @else
            <div class="no_theme">
                <p style="font-weight: 50px; margin-top:-20px; color: white;">Niste kreirali temu kao moderator</p>
            </div>
            @endunless

        </div>
    </div>
</x-layout>
