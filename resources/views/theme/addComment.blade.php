<x-layout>
<style>
        .back-link {
            text-decoration: none;
            color: black;
            font-size: 38px;
            display: flex;
            align-items: center;
            animation: move 2s infinite;
            margin-left: -400px;
            margin-top: 50px;
        }
        @keyframes move {
            0%, 100% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(10px);
            }
        }


        .back-link i {
            margin-right: 8px;
            transition: transform 0.3s;
        }

        .back-link:hover {
            text-decoration: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/forms/form_comment.css') }}">


    <div class="form_body">

        <!-- <a href="{{ url()->previous() }}" style="color:black;text-decoration: none; margin-bottom:2%; font-size:20px; margin-left:-150px;">Home</a> -->

        <span style="font-size: 40px;color: white; margin-left:300px; margin-top:-50px;">Posalji odgovor na temu moderatora</span><br>

        <!-- <span style="color:black;  padding-bottom:50px; margin-left:350px; font-weight:1000;">Trebate da napravite nalog</span> -->

        <div class="form_container">

            @guest
                <div class="centered-message">
                    <div style="margin-bottom: 10px; color: black; font-weight:1000;">Napravite nalog da biste ostavili komentar</div>
                    <div><a href="/login" style="color: red; text-decoration:underline">Prijava</a></div>
                </div>
            @else
                <form method="POST" action="/comments/{{ $themeId }}" enctype="multipart/form-data">

                    @csrf
                    <div class="title">
                        <label for="title" style="font-size: 30px; color:white; margin-left:-10px;"></label>
                        <input type="text" id="title" name="title" value=" {{ $themeTitle }}" style=" background-color:yellow;">
                    </div>
                    <br>

                    <textarea id="comment" name="comment" rows="1" required placeholder="" style=" background-color:yellow;"></textarea>

                    @error('comment')
                        <p>{{$message}}</p>
                    @enderror
                    <br>

                    <button type="submit" class="button_comment" style="width:25%">
                        Dodajte komentar na temu moderatora</button>
                </form>
            @endguest

        </div>
    </div>

</x-layout>
