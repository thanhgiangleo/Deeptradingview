var loginJS = {
    checkValidationLogin: function () {
        var _email = $('#emailLogin').val();
        var _password = $('#passwordLogin').val();

        if (_email !== '' && _password !== '')
            return true;

        if (_email === '')
            $('#emailLogin').parent().addClass('is-focused');
        if (_password === '')
            $('#passwordLogin').parent().addClass('is-focused');
        return false;
    },

    checkValidationRegister: function () {
        var _email = $('#emailRegister').val();
        var _password = $('#passwordRegister').val();
        var _repassword = $('#cfpasswordRegister').val();

        if (_email !== '' && _password !== '' && _password === _repassword)
            return true;

        if (_email === '')
            $('#emailRegister').parent().addClass('is-focused');
        if (_password === '')
            $('#passwordRegister').parent().addClass('is-focused');
        if (_repassword === '')
            $('#cfpasswordRegister').parent().addClass('is-focused');
        if(_repassword !== _password)
        {
            $('#cfpasswordRegister').parent().addClass('is-focused');
            $('#passwordRegister').parent().addClass('is-focused');
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
                            alert("dang nhap thanh cong");
                        else
                            alert("dang nhap that bai");
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
                                    window.location.reload();
                                }
                            })
                        }
                        else {
                            $('#emailRegister').parent().addClass('is-focused');
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