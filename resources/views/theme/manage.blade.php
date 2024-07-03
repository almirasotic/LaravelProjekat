<link rel="stylesheet" href="{{ asset('css/tables/manage.css') }}">
<x-layout>

    @unless ($themes->isEmpty())
    <div class="manage_container" style="height: 66vh">

        <table>
            <thead>
                <tr>
                    <th>Teme</th>
                    <th class="actions">Opcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($themes as $theme)
                <tr class="theme_rows">
                    <td ><a href="/themes/{{$theme->id}}" class="theme-name">{{$theme->title}}</a></td>
                    <td class="actions">
                        <a href="/themes/{{$theme->id}}/edit" class="edit-button">Uredi</a>
                        <form style="display: inline;" method="POST" action="/themes/{{$theme->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="delete-button">Brisanje</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @else
    <div class="no_theme">
        <p style="font-size: 40; color:white; margin-left:150px;">Kao moderator nemate kreiranih tema</p>
    </div>
    @endunless

</x-layout>
