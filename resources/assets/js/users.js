$(document).ready(function () {

        /*******************************
         Para el UserController
         *******************************/

         cargarTable(1);

        $(document).on('click', '.pagination a', function (e) { //Tiene que ser declarado con "$(document).on" para que asi pueda escuchar desde la raiz
            e.preventDefault();                                  // del documento cualquier elemento dinamico que se cree, en este caso el componente
            var page = $(this).attr('href').split('page=')[1];    // de paginacion. De ponerse asi "$('.pagination a').on" jamas se ejecutara.
            cargarTable(page);
        });

        function cargarTable(page) {
            $.ajax({
                url: '/admin/user',
                type: 'GET',
                dataType: 'json',
                data: {page: page},
                success: function (data) {
                    $("#tabla-user").html(data);
                },
                error: function (msj) {
                }
            });
        }

        $("input[type=checkbox]").attr('checked', false);

        $('#collapseOne').on('hidden.bs.collapse', function () {
            $('#direction').val('');
            $('#expertise_area').val('');
            $('#direction').removeAttr('required');
            $('#expertise_area').removeAttr('required');
        });

        $('#collapseOne').on('shown.bs.collapse', function () {
            $('#direction').attr('required', '');
            $('#expertise_area').attr('required', '');
        });

        function cleanAll() {
            $('#edit-state').hide();
            $("input[type=checkbox]").prop('checked', false);
            $('#collapseOne').collapse('hide');
            $('#name').val('');
            $('#email').val('');
            $('#password').val('');
            $('#password_confirmation').val('');
        }

        /**************************************
         UserController ---- Create and Update
         *************************************/

        $("input[type=checkbox]").on("click", function () {
            $('#collapseOne').collapse('toggle');
        });

        $('#form-user-employee').on('submit', function (e) {
            e.preventDefault();
            var user = {
                'name': $('#name').val(),
                'email': $('#email').val(),
                'password': $('#password').val(),
                'password_confirmation': $('#password_confirmation').val(),
                'direction': $('#direction').val(),
                'expertise_area': $('#expertise_area').val()
            };

            var edit = $('#edit-state').is(':visible') ? true : false;

            if (edit && !user.password) { //Asi garantizo que no me de error con el UserEmployeeUpdateRequest en caso de no pasar la contraseña. Esta no se puede pasar ni como null ni como '', sencillamante no se pasa
                delete user.password;
                delete user.password_confirmation;
            }

            var url = edit ? '/admin/user/' + $('#edit-state > span > span').text() : '/admin/user';
            var type = edit ? 'PUT' : 'POST';
            var pagination = edit ? $('.pagination .active > span').text() : 1;

            $.ajax({
                url: url,
                headers: {'X-CSRF-TOKEN': $("input[name='_token']").val()},
                type: type,
                dataType: 'json',
                data: user,
                success: function (msj) {
                    cargarTable(pagination);
                    $('#password').attr('required', '');
                    $('#cancel').hide();
                    $("#msj1").empty();
                    $("#msj1").append(msj['message']);
                    if (!$("#msj-success").is(":visible")) {
                        $("#msj-success").fadeIn();
                        $("#msj-success").delay(2000).fadeOut(1000);
                    }
                    cleanAll();
                },
                error: function (msj) {
                    $("#msj2").empty();
                    $.each(msj.responseJSON, function (key, value) {
                        $("#msj2").append('<li>' + value + '</li>');
                    });
                    if (!$("#msj-error").is(":visible")) {
                        $("#msj-error").fadeIn();
                        $("#msj-error").delay(2000).fadeOut(1000);
                    }
                }
            });
        });

        /*******************************
         UserController ---- Delete
         *******************************/

        $(document).on('click', '.open-modal-delete', function () {
            $('#delete-modal').modal('show');
        });

         $(document).on('click', '#delete-user', function () {
            var id = $('.open-modal-delete').attr('id');

            $.ajax({
                url: '/admin/user/' + id,
                headers: {'X-CSRF-TOKEN': $("input[name='_token']").val()},
                type: 'DELETE',
                dataType: 'json',

                success: function (msj) {
                    cargarTable(1);
                    $("#msj1").empty();
                    $("#msj1").append(msj['message']);
                    if (!$("#msj-success").is(":visible")) {
                        $("#msj-success").fadeIn();
                        $("#msj-success").delay(2000).fadeOut(1000);
                    }
                },
                error: function (msj) {
                    $("#msj2").empty();
                    $.each(msj.responseJSON, function (key, value) {
                        $("#msj2").append('<li>' + value + '</li>');
                    });
                    if (!$("#msj-error").is(":visible")) {
                        $("#msj-error").fadeIn();
                        $("#msj-error").delay(2000).fadeOut(1000);
                    }
                }
            });

            $('#delete-modal').modal('hide');
        });

        /*******************************
         UserController ---- Edit
         *******************************/

        $(document).on('click', '.edit-user', function () {
            var id = $(this).attr('id');

            $.get('/admin/user/' + id + '/edit', function (data) {
                //$('#name').val($(this).parents().eq(2).children().eq(0).text());
                $('#name').val(data.user.name);
                $('#email').val(data.user.email);
                if (data.employee) {
                    $("input[type=checkbox]").prop('checked', true);
                    $('#collapseOne').collapse('show');
                    $('#direction').val(data.employee.direction);
                    $('#expertise_area').val(data.employee.expertise_area);
                } else {
                    $("input[type=checkbox]").prop('checked', false);
                    $('#collapseOne').collapse('hide');
                }
                $('#edit-state').show();
                $('#edit-state > span > span').text(data.user.id);
                $('#cancel').show();
                $('#password').removeAttr('required');
            });
        });

        $('#cancel').on('click', function () {
            cleanAll()
            $(this).hide();
        })

    }
)
;