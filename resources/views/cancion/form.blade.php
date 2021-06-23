<div class="mb-3">
    <label for="nombreCancion" class="form-label">Ingrese el Nombre de la canción:</label>
    <input type="text" name="nombreCancion" class="form-control" id="nombreCancion" placeholder="Nombre de la canción"
        value="{{ isset($cancion->nombreCancion) ? $cancion->nombreCancion : old('nombreCancion') }}"
        aria-describedby="nombreCancionhelp" required>
    @error('nombreCancion')
        <small id="nombreCancionhelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="fechaGrabacion" class="form-label">Fecha de grabación:</label>
    <input type="date" name="fechaGrabacion" class="form-control" id="fechaGrabacion" placeholder="Fecha de grabación"
        value="{{ isset($cancion->fechaGrabacion) ? $cancion->fechaGrabacion : old('fechaGrabacion') }}"
        aria-describedby="fechaGrabacionhelp" required>
    @error('fechaGrabacion')
        <small id="fechaGrabacionhelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="duracionCancion" class="form-label">Duración canción:</label>
    <input type="text" name="duracionCancion" class="form-control" id="duracionCancion" placeholder="Ej: 03:45"
        value="{{ isset($cancion->duracionCancion) ? $cancion->duracionCancion : old('duracionCancion') }}"
        aria-describedby="duracionCancionhelp" required>
    @error('duracionCancion')
        <small id="duracionCancionhelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="idAlbumFK" class="form-label">Seleccione el álbum al que pertenece la canción:</label>
    <select name="idAlbumFK" class="form-control" id="idAlbumFK"
        value="{{ isset($cancion->idAlbumFK) ? $cancion->idAlbumFK : old('idAlbumFK') }}"
        aria-describedby="idAlbumFKhelp" required>
        <option selected>Seleccione una disquera</option>
        @foreach ($album as $a)
            <option value="{{$a->id}}">{{$a->nombreAlbum}}</option>
        @endforeach
    </select>
    {{-- @error('idAlbumFK')
        <small id="idAlbumFKhelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror --}}
</div>

<input type="submit" value="Guardar" class="btn btn-primary">
{{-- <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script> --}}
