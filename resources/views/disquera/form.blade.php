{{-- @if (count($errors) > 0)
    @foreach ($errors->all() as $e)
        {{ $e }}
    @endforeach

@endif --}}
<div class="mb-3">
    <label for="nitDisquera" class="form-label">Ingrese el Nit de la disquera:</label>
    <input type="text" name="nitDisquera" class="form-control" id="nitDisquera" placeholder=" Nit de la disquera"
        value="{{ isset($disquera->nitDisquera) ? $disquera->nitDisquera : old('nitDisquera') }}"
        aria-describedby="nitDisquerahelp" required>
    @error('nitDisquera')
        <small id="nitDisquerahelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
    {{-- <div class="valid-feedback">
        Correcto!
    </div>
    <div class="invalid-feedback">
        * El campo es obligatorio
    </div> --}}
</div>

<div class="mb-3">
    <label for="nombreDisquera" class="form-label">Ingrese el nombre de la disquera:</label>
    <input type="text" name="nombreDisquera" class="form-control" id="nombreDisquera"
        placeholder="Nombre de la disquera"
        value="{{ isset($disquera->nombreDisquera) ? $disquera->nombreDisquera : old('nombreDisquera') }}"
        aria-describedby="nombreDisquerahelp" required>
    @error('nombreDisquera')
        <small id="nombreDisquerahelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror

</div>
<div class="mb-3">
    <label for="telefonoDisquera" class="form-label">Ingrese el teléfono:</label>
    <input type="text" name="telefonoDisquera" class="form-control" id="telefonoDisquera"
        placeholder="Teléfono de la disquera"
        value="{{ isset($disquera->telefonoDisquera) ? $disquera->telefonoDisquera : old('telefonoDisquera') }}"
        aria-describedby="nombreDisquerahelp" required>
    @error('telefonoDisquera')
        <small id="telefonoDisquerahelp" class="form-text text-muted">
            *{{ $message }}
        </small>
    @enderror
</div>
<div class="mb-3">
    <label for="estadoDisquera" class="form-label">Ingrese el estado de la disquera:</label>
    <input type="text" name="estadoDisquera" class="form-control" id="estadoDisquera"
        placeholder="Estado de la disquera"
        value="{{ isset($disquera->estadoDisquera) ? $disquera->estadoDisquera : old('estadoDisquera') }}"
        aria-describedby="estadoDisquerahelp" required>
    @error('estadoDisquera')
        <small id="estadoDisquerahelp" class="form-text text-muted" style="color: red">
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
