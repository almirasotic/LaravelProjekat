<link rel="stylesheet" href="{{ asset('css/tables/manage.css') }}">
<x-layout>

    @unless ($users->isEmpty())
        <div class="manage_container" style="background-color: rgb(165, 232, 84); width: 65%; margin-left:150px; margin-top: 50px;height:100%;">
            <h1 class="heading" style="margin-left: 150px;">Admin ima prikaz samo ovoj stranici</h1>
            <label style="padding-bottom: 10px; font-style:italic"></label>

            <div class="line"></div>

            <table>
                <thead>
                    <tr>
                        <th>Korisnik-----</th>
                        <th>Uloga korisnika</th>
                        <th>Email</th>
                        <th> telefon</th>
                        <th>rodjenje</th>
                        <th>JMBG</th>
                        <th>Grad</th>
                        <th>Grzava</th>
                        <th class="actions">Brisanje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="users_rows">
                        <td class="user-name" style="text-align: center; vertical-align: middle;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <img src="{{ asset('storage/' . $user->picture) }}" alt="{{ $user->name }}" style="width: 70px; height: 70px; display: block; margin: 0 auto; background-color:red;"> <br><br>
                                <span style="display: block; color:red">{{ $user->name }}</span>
                            </div>
                        </td><td class="user-role">{{ $user->role }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->birth_date }}</td>
                        <td>{{ $user->personal_number }}</td>
                        <td>{{ $user->place_of_birth }}</td>
                        <td>{{ $user->country }}</td>
                        <td class="actions">
                            <form style="display: inline;" method="POST" action="/users/{{ $user->id }}" id="delete-form-{{ $user->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger " style="width: 90px;  background-color: rgb(165, 232, 84); border: none; color: black;" onclick="confirmDelete({{ $user->id }})">Izbrisi korisnika</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div>
                <p>Nema korisnika</p>
            </div>

        @if ($themes->isNotEmpty())
            <div class="manage_container">
                <h1 class="heading">Neodobrene teme</h1>
            </div>
        @else
            <div>
                <p>Nema neodobrenih tema</p>
            </div>
        @endif
    @endunless

</x-layout>


<script>
    function confirmDelete(userId) {
        if (confirm('Da ii ste siguri da zelite da izbrisite korisnika?')) {
            document.getElementById('delete-form-' + userId).submit();
        }
    }
</script>
