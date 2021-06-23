<div class="mb-3">
    <label for="nombreGenero" class="form-label">Ingrese el nombre del género musical:</label>
    <input type="text" name="nombreGenero" class="form-control" id="nombreGenero"
        placeholder=" Nombre del género musical"
        value="{{ isset($genero->nombreGenero) ? $genero->nombreGenero : old('nombreGenero') }}" aria-describedby="nombreGenerohelp" required>
        @error('nombreGenero')
            <small id="nombreGenerohelp" class="form-text text-muted">
                *{{ $message }}
            </small>
        @enderror
</div>

<div class="mb-3">
    <label for="estadoGenero" class="form-label">Ingrese el estado del género musical:</label>
    <input type="text" name="estadoGenero" class="form-control" id="estadoGenero" placeholder="Estado"
        value="{{ isset($genero->estadoGenero) ? $genero->estadoGenero : old('estadoGenero') }}" aria-describedby="estadoGenerohelp" required>
        @error('estadoGenero')
            <small id="estadoGenerohelp" class="form-text text-muted">
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
