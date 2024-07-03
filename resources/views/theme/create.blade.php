<x-layout>
    <link rel="stylesheet" href="{{ asset('css/forms/form.css') }}">
    <div class="form_body" style="background-color: blue;">
        <div class="form_container" style="background-color: green; width:540px; margin-left:-850px; height:50%">

            <!-- <a href="{{ url()->previous() }}" style="color:black; text-decoration:underline">Home</a> -->
            <p style="font-size: 30px; margin-left:150px;">Kreiraj temu kao moderator</p>

            <!-- <div style="width: 80%; height:0.5px; background-color:grey;margin-bottom: 50px;"></div> -->

            <form method="POST" action="/themes" enctype="multipart/form-data">
                @csrf
                <label for="title" style="font-size: 30px; margin-left:150px; color:black;">NAZIV TEME KOJU KREIRATE</label>
                <input type="text" id="title" name="title" value="{{old('title')}}" style="width: 250px; margin-left:150px">

                @error('title')
                <p>{{$message}}</p>
                @enderror
                <br>

                <label for="description" style="font-size: 30px; margin-left:150px; color:black;">Opis za temu koju kreirate </label>
                <textarea id="description" style="width: 250px; margin-left:150px"  name="description" rows="6" required placeholder="">{{old('description')}}</textarea>

                @error('description')
                <p>{{$message}}</p>
                @enderror
                <br>

                <label for="image" class="custom-file-upload" style="color:black; margin-left:150px; font-size:30px;">
                     odaberite koju sliku zelite(ako zelite sa njom da olaksate korisnicima)
                </label>
                <input type="file" id="image" name="image" style="width: 135px; margin-left:150px;">

                <img id="preview-image" src="#" alt="Slika" style="max-width: 150px; max-height: 150px; margin-top: 10px; display: none;">

                <script>
                    const pictureInput = document.getElementById('image');
                    const previewImage = document.getElementById('preview-image');

                    pictureInput.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(event) {
                                previewImage.src = event.target.result;
                                previewImage.style.display = 'block';
                            }
                            reader.readAsDataURL(file);
                        }
                    });
                </script>

                @error('image')
                <p class="errorMessage">{{$message}}</p>
                @enderror
                <br>

                <div style="width: 100%; height:0.5px; background-color:grey;margin-top: 20px;margin-bottom: 50px;"></div>

                <button type="submit">NASTAVI</button>
            </form>
        </div>
    </div>
</x-layout>
