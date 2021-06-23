<div class="mb-3">
    <label for="nombreAlbum" class="form-label">Ingrese el Nombre del Álbum:</label>
    <input type="text" name="nombreAlbum" class="form-control" id="nombreAlbum" placeholder="Nombre del Álbum"
        value="{{ isset($album->nombreAlbum) ? $album->nombreAlbum : old('nombreAlbum') }}"
        aria-describedby="nombreAlbumhelp" required>
    @error('nombreAlbum')
        <small id="nombreAlbumhelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="anioPublicacion" class="form-label">Año de publicación:</label>
    <?php $cont = date('Y'); ?>
    <select id="anioPublicacion" name="anioPublicacion" class="form-control"
        value="{{ isset($album->anioPublicacion) ? $album->anioPublicacion : old('anioPublicacion') }}"
        aria-describedby="anioPublicacionhelp" required>
        <?php while ($cont >= 1950) { ?>
        <option value="<?php echo $cont; ?>"><?php echo $cont; ?></option>
        <?php $cont = $cont - 1;} ?>
    </select>
    @error('anioPublicacion')
        <small id="anioPublicacionhelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="foto" class="form-label">Agregue la foto del álbum:</label>
    <input type="file" name="foto" class="form-control" id="foto" placeholder="Nombre del Álbum"
        value="{{ isset($album->foto) ? $album->foto : old('foto') }}" aria-describedby="fotohelp" required>
    @error('foto')
        <small id="fotohelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="idArtistaFK" class="form-label">Seleccione el artista:</label>
    <select name="idArtistaFK" class="form-control" id="idArtistaFK"
        value="{{ isset($album->idArtistaFK) ? $album->idArtistaFK : old('idArtistaFK') }}"
        aria-describedby="idArtistaFKhelp" required>
        <option selected>Seleccione una opción</option>
        @foreach ($artista as $a)
            <option value="{{ $a->id }}">{{ $a->nombreArtistico }}</option>
        @endforeach
    </select>
    @error('idArtistaFK')
        <small id="idArtistaFKhelp" class="form-text text-muted">
            * El campo artista es obligatorio
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="idGeneroFK" class="form-label">Seleccione el género musical:</label>
    <select name="idGeneroFK" class="form-control" id="idGeneroFK"
        value="{{ isset($album->idGeneroFK) ? $album->idGeneroFK : old('idGeneroFK') }}"
        aria-describedby="idGeneroFKhelp" required>
        <option selected>Seleccione una opción</option>
        @foreach ($genero as $g)
            <option value="{{ $g->id }}">{{ $g->nombreGenero }}</option>
        @endforeach
    </select>
    @error('idGeneroFK')
        <small id="idGeneroFKhelp" class="form-text text-muted">
            * El campo género es obligatorio
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="estadoAlbum" class="form-label">Ingrese el Estado:</label>
    <select name="estadoAlbum" class="form-control" id="estadoAlbum"
        value="{{ isset($album->estadoAlbum) ? $album->estadoAlbum : old('estadoAlbum') }}"
        aria-describedby="estadoAlbumhelp" required>
        <option value="Disponible" selected>Disponible</option>
        <option value="No disponible">No disponible</option>
    </select>

    @error('estadoAlbum')
        <small id="estadoAlbumhelp" class="form-text text-muted">
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
