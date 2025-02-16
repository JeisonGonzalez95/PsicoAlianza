require('./bootstrap');
require('./sweetalert');

import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', function () {

    $('#tablaEmpleados').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json' // Traducción al español
        }
    });

    function actualizarHora() {
        const ahora = dayjs().format('HH:mm:ss');
        document.getElementById("hora").innerText = ahora;
    }

    setInterval(actualizarHora, 1000);

    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const contentWrapper = document.querySelector('.content-wrapper');
    const resizableContent = document.querySelector('.resizable-content');
    const listasToggle = document.getElementById('listasToggle');
    const listasSubmenu = document.getElementById('listasSubmenu');

    menuToggle.addEventListener('click', function () {
        const isHidden = sidebar.classList.toggle('hidden');

        if (isHidden) {
            contentWrapper.style.marginLeft = '0';
            contentWrapper.style.width = '100%';
            resizableContent.style.width = '100%';
        } else {
            contentWrapper.style.marginLeft = '100px';
            contentWrapper.style.width = 'calc(100% - 25px)';
            resizableContent.style.width = 'calc(100% - 25px)';
        }
    });

    listasToggle.addEventListener('click', function () {
        listasSubmenu.style.display = listasSubmenu.style.display === 'block' ? 'none' : 'block';
    });

    // ---- AJAX CARGA CIUDADES ----
    const stateSelect = $('#state');
    const citySelect = $('#city');
    const selectedCityId = citySelect.data('selected-city');

    function loadCities(stateId, selectedCityId = null) {
        if (stateId) {
            citySelect.prop('disabled', true).html('<option value="">Cargando...</option>');

            $.ajax({
                url: '/getCities/' + stateId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    citySelect.html('<option value="">Seleccione una ciudad...</option>');

                    $.each(data, function (index, city) {
                        let selected = (city.id == selectedCityId) ? 'selected' : '';
                        citySelect.append('<option value="' + city.id + '" ' + selected + '>' + city.name_city + '</option>');
                    });

                    citySelect.prop('disabled', false);
                }
            });
        } else {
            citySelect.prop('disabled', true).html('<option value="">Seleccione un departamento primero...</option>');
        }
    }

    stateSelect.change(function () {
        loadCities($(this).val());
    });

    if (stateSelect.val()) {
        loadCities(stateSelect.val(), selectedCityId);
    }


    // ---- AJAX CARGA POSICIONES (ÁREA + ROL) ----
    const areaSelect = $('#area');
    const roleSelect = $('#role');
    const positionSelect = $('#position');
    const selectedPositionId = positionSelect.data('selected-position'); // Si estás pasando el cargo seleccionado con data-selected-position

    function loadPositions(areaId, roleId, preselectPositionId = null) {
        if (areaId && roleId) {
            positionSelect.prop('disabled', true).html('<option value="">Cargando...</option>');

            $.ajax({
                url: `/getPositions/${areaId}/${roleId}`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    positionSelect.html('<option value="">Seleccione un puesto...</option>');

                    $.each(data, function (index, position) {
                        let selected = (position.id == preselectPositionId) ? 'selected' : '';
                        positionSelect.append(`<option value="${position.id}" ${selected}>${position.name_position}</option>`);
                    });

                    positionSelect.prop('disabled', false);
                },
                error: function () {
                    positionSelect.html('<option value="">Error al cargar posiciones</option>');
                    positionSelect.prop('disabled', true);
                }
            });
        } else {
            positionSelect.prop('disabled', true).html('<option value="">Seleccione área y rol...</option>');
        }
    }

    // Cambios en Área y Rol
    areaSelect.change(function () {
        loadPositions(areaSelect.val(), roleSelect.val());
    });

    roleSelect.change(function () {
        loadPositions(areaSelect.val(), roleSelect.val());
    });

    // Cargar posición automáticamente si ya hay valores seleccionados (edición)
    if (areaSelect.val() && roleSelect.val()) {
        loadPositions(areaSelect.val(), roleSelect.val(), selectedPositionId);
    }

});
