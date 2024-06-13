var codigoPostalInput = document.getElementById('codigo_postal');
var colonias = document.getElementById('colonia');
var municipios = document.getElementById('municipio');
var estados = document.getElementById('estado');

codigoPostalInput.addEventListener('input', async () => {
    var codigoPostal = codigoPostalInput.value;
    if (codigoPostal.length === 5) {
        var coloniasPorCP = await fetch(`https://api.copomex.com/query/info_cp/${codigoPostal}?token=pruebas`);
        var coloniasJson = await coloniasPorCP.json();
        colonias.innerHTML = '';
        municipios.innerHTML = '';
        estados.innerHTML = '';
        var municipioAgregado = '';
        var estadoAgregado = '';
        for (var colonia of coloniasJson) {
            var option = document.createElement('option');
            option.value = colonia.response.asentamiento;
            option.textContent = colonia.response.asentamiento;
            colonias.appendChild(option);

            if(municipioAgregado != colonia.response.municipio){
                var option = document.createElement('option');
                option.value = colonia.response.municipio;
                option.textContent = colonia.response.municipio;
                municipios.appendChild(option);
                municipioAgregado = colonia.response.municipio;
            }
            
            if(estadoAgregado != colonia.response.estado){
                var option = document.createElement('option');
                option.value = colonia.response.estado;
                option.textContent = colonia.response.estado;
                estados.appendChild(option);
                estadoAgregado = colonia.response.estado;
            }

        }
    } else {
        colonias.innerHTML = '';
    }
});