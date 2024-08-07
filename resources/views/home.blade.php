<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>

       .newsFeed {
            display: none;
            width: 300px; /* Adjust width as needed */
            background-color: white;
            border-right: 1px solid #ccc; /* Add border as needed */
            overflow-y: auto; /* Enable scrolling */
            padding: 20px; /* Adjust padding as needed */
            float: left; /* Float to the left side */
        }
        .show-news-feed .newsFeed {
            display: block;
        }
        #toggleNewsFeedBtn {
            padding: 5px 10px;
            font-size: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            width: 70px;
            height: 50px;
            margin-bottom: 20px; /* Add space below the button */
        }
        #toggleNewsFeedBtn:hover {
            background-color: #f0f0f0;
        }
        .themes_Body {
            overflow: hidden; /* Prevents float element from affecting the parent */
        }
    </style>
</head>
<body class="body">

    @include('partials._navbar')
    <x-flash-message/>

    <x-layout>

        <link rel="stylesheet" href="{{ asset('css/partials/search.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themes.css') }}">

        <div class="themes_Body">

            <button id="toggleNewsFeedBtn">procitajte jos</button>
            <div class="newsFeed" style=" background-color: rgb(165, 232, 84);">
                <h2>Novosti</h2>
                @foreach ($newsFeed as $item)
                <x-newsFeed  :item="$item"/>
                @endforeach
                @auth
                    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'moderator')
                        <div class="add-news-feed-form">
                            <form action="/add-news-feed" method="POST">
                                @csrf
                                <label for="content">Unesite </label>
                                <textarea name="content" rows="4" cols="50"></textarea>
                                <button type="submit" style="width: 150px;">Prikaz nove vesti</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="themes_Grid">
                @unless ($themes->isEmpty())
                    @foreach ($themes as $theme)
                        <x-theme-card :theme="$theme" />
                    @endforeach
                @else
                    <div>
                        <p>ne postoji tema po ovoj pretrazi</p>
                    </div>
                @endunless
            </div>
        </div>

        <div class="p-6" style="color:white">
            Klikom na dugme mozete preci na sledecu stranicu{{$themes->links()}}
        </div>

    </x-layout>
    <footer>
        @include('partials._footer')
    </footer>
    <script>
        document.getElementById('toggleNewsFeedBtn').addEventListener('click', function(event) {
            event.preventDefault();
            document.body.classList.toggle('show-news-feed');
            window.scrollTo(0, 0);
        });
    </script>
</body>
</html>
