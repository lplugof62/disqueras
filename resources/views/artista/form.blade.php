<div class="mb-3">
    <label for="noDocumento" class="form-label">Ingrese el N° de identificación:</label>
    <input type="text" name="noDocumento" class="form-control" id="noDocumento" placeholder="Identificacion"
        value="{{ isset($artista->noDocumento) ? $artista->noDocumento : old('noDocumento') }}"
        aria-describedby="noDocumentohelp" required>
    @error('noDocumento')
        <small id="noDocumentohelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="tipoDocumento" class="form-label">Tipo de documento:</label>
    <select name="tipoDocumento" class="form-control" id="tipoDocumento"
        value="{{ isset($artista->tipoDocumento) ? $artista->tipoDocumento : old('tipoDocumento') }}"
        aria-describedby="tipoDocumentohelp" required>
        <option value="CC" selected>CC</option>
        <option value="TI">TI</option>
        <option value="CE">CE</option>
    </select>
    @error('tipoDocumento')
        <small id="tipoDocumentohelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="nombreArtista" class="form-label">Ingrese nombre:</label>
    <input type="text" name="nombreArtista" class="form-control" id="nombreArtista" placeholder="Nombre"
        value="{{ isset($artista->nombreArtista) ? $artista->nombreArtista : old('nombreArtista') }}"
        aria-describedby="nombreArtistahelp" required>
    @error('nombreArtista')
        <small id="nombreArtistahelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="apellidoArtista" class="form-label">Ingrese apellido:</label>
    <input type="text" name="apellidoArtista" class="form-control" id="apellidoArtista" placeholder="Apellido"
        value="{{ isset($artista->apellidoArtista) ? $artista->apellidoArtista : old('apellidoArtista') }}"
        aria-describedby="apellidoArtistahelp" required>
    @error('apellidoArtista')
        <small id="apellidoArtistahelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="nombreArtistico" class="form-label">Ingrese Nombre Artístico:</label>
    <input type="text" name="nombreArtistico" class="form-control" id="nombreArtistico" placeholder="Nombre Artístico"
        value="{{ isset($artista->nombreArtistico) ? $artista->nombreArtistico : old('nombreArtistico') }}"
        aria-describedby="nombreArtisticohelp" required>
    @error('nombreArtistico')
        <small id="nombreArtisticohelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="fechaNacimArtista" class="form-label">Ingrese Fecha de nacimiento:</label>
    <input type="date" name="fechaNacimArtista" class="form-control" id="fechaNacimArtista"
        placeholder="Fecha de nacimiento"
        value="{{ isset($artista->fechaNacimArtista) ? $artista->fechaNacimArtista : old('fechaNacimArtista') }}"
        aria-describedby="fechaNacimArtistahelp" required>
    @error('fechaNacimArtista')
        <small id="fechaNacimArtistahelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="emailArtista" class="form-label">Ingrese su correo:</label>
    <input type="email" name="emailArtista" class="form-control" id="emailArtista" placeholder="Correo electrónico"
        value="{{ isset($artista->emailArtista) ? $artista->emailArtista : old('emailArtista') }}"
        aria-describedby="emailArtistahelp" required>
    @error('emailArtista')
        <small id="emailArtistahelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="foto" class="form-label">Agregue la foto del artista:</label>
    <input type="file" name="foto" class="form-control" id="foto"
        value="{{ isset($artista->foto) ? $artista->foto : old('foto') }}" aria-describedby="fotohelp" required>
    @error('foto')
        <small id="fotohelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="estadoArtista" class="form-label">Ingrese el Estado:</label>
    <input type="text" name="estadoArtista" class="form-control" id="estadoArtista" placeholder="Estado"
        value="{{ isset($artista->estadoArtista) ? $artista->estadoArtista : old('estadoArtista') }}"
        aria-describedby="estadoArtistahelp" required>
    @error('estadoArtista')
        <small id="estadoArtistahelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="idDisqueraFK" class="form-label">Seleccione la disquera con la que está relacionado:</label>
    <select name="idDisqueraFK" class="form-control" id="idDisqueraFK"
        value="{{ isset($artista->idDisqueraFK) ? $artista->idDisqueraFK : old('idDisqueraFK') }}"
        aria-describedby="idDisqueraFKhelp" required>
        <option selected>Seleccione una disquera</option>
        @foreach ($disquera as $d)
            <option value="{{$d->id}}">{{$d->nombreDisquera}}</option>
        @endforeach
        {{-- <option value="1" selected>Codiscos</option>
        <option value="2">Discos Fuentes</option>
        <option value="3">Sony Music</option>
        <option value="5">EMI</option> --}}
    </select>
    @error('idDisqueraFK')
        <small id="idDisqueraFKhelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
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
