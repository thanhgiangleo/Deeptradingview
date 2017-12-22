var loginJS = {
    checkValidationLogin: function () {
        var _email = $('#emailLogin').val();
        var _password = $('#passwordLogin').val();

        if (_email !== '' && _password !== '')
            return true;

        if (_email === '')
        {
            $('#emailLogin').parent().addClass('is-focused');
            swal({
                title: "Email invalid",
                type: "error",
                showConfirmButton: false,
                allowOutsideClick: true,
                timer: 2000
            });
            return;
        }
        else if (_password === '')
        {
            $('#passwordLogin').parent().addClass('is-focused');
            swal({
                title: "Password invalid",
                type: "error",
                showConfirmButton: false,
                allowOutsideClick: true,
                timer: 2000
            });
        }
        return false;
    },

    checkValidationRegister: function () {
        var _email = $('#emailRegister').val();
        var _password = $('#passwordRegister').val();
        var _repassword = $('#cfpasswordRegister').val();

        if (_email !== '' && _password !== '' && _password === _repassword)
            return true;

        if (_email === '')
        {
            $('#emailRegister').parent().addClass('is-focused');
            swal({
                title: "Email invalid",
                type: "error",
                showConfirmButton: false,
                allowOutsideClick: true,
                timer: 2000
            });
        }
        else if (_password === '')
        {
            $('#passwordRegister').parent().addClass('is-focused');
            swal({
                title: "Password invalid",
                type: "error",
                showConfirmButton: false,
                allowOutsideClick: true,
                timer: 2000
            });
        }
        else if (_repassword === '')
        {
            $('#cfpasswordRegister').parent().addClass('is-focused');
            swal({
                title: "Confirm password invalid",
                type: "error",
                showConfirmButton: false,
                allowOutsideClick: true,
                timer: 2000
            });
        }
        if(_repassword !== _password)
        {
            $('#cfpasswordRegister').parent().addClass('is-focused');
            $('#passwordRegister').parent().addClass('is-focused');
            swal({
                title: "Confirm password invalid",
                type: "error",
                showConfirmButton: false,
                allowOutsideClick: true,
                timer: 2000
            });
        }
        return false;
    },

    handleLoginAction: function () {
        $('.btn-login').click(function () {
            if (loginJS.checkValidationLogin()) {
                var _email = $('#emailLogin').val();
                var _password = $('#passwordLogin').val();
                $.ajax({
                    method: 'POST',
                    url: '/loginAction/' + _email + '/' + _password,
                    success: function (isLogin) {
                        if(isLogin === "1")
                        {
                            swal({
                                title: "Login Success",
                                type: "success",
                                showCancelButton: false,
                                showConfirmButton: false,
                                allowOutsideClick: true,
                                timer: 2000
                            });

                            setTimeout(
                                function() {
                                    window.location.href = "/";
                                }, 2500);
                        }
                        else
                        {
                            swal({
                                title: "Email or password invalid",
                                type: "error",
                                showConfirmButton: false,
                                allowOutsideClick: true,
                                timer: 2000
                            });
                        }
                    }

                })
            }
        });
    },

    handleRegisterAction: function() {
        $('.btn-register').click(function () {
            if (loginJS.checkValidationRegister()) {
                var _email = $('#emailRegister').val();
                var _password = $('#passwordRegister').val();
                $.ajax({
                    method: 'GET',
                    url: '/isExistEmail/' + _email,
                    success: function (isExist) {
                        if (isExist === "0") {
                            $.ajax({
                                method: 'POST',
                                url: '/registerAction/' + _email + '/' + _password,
                                success: function (data) {
                                    swal({
                                        title: "Register Success",
                                        type: "success",
                                        showCancelButton: false,
                                        showConfirmButton: false,
                                        allowOutsideClick: true,
                                        timer: 2000
                                    });

                                    setTimeout(
                                        function() {
                                            window.location.reload();
                                        }, 2500);

                                }
                            })
                        }
                        else {
                            $('#emailRegister').parent().addClass('is-focused');
                            swal({
                                title: "Email invalid",
                                type: "error",
                                showConfirmButton: false,
                                allowOutsideClick: true,
                                timer: 2000
                            });
                        }
                    }
                })

            }
        });
    },


    init: function () {
        loginJS.handleLoginAction();
        loginJS.handleRegisterAction();
    }
};

$(document).ready(function () {
    loginJS.init();
});