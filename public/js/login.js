function execute_login() {
    let username = $('#username').val();
    let password = $('#password').val();

    if (username === '' || password === '') {
        alert('Por favor, preencha todos os campos.');
        return;
    }

    $.ajax({
        url: '/api/login',
        type: 'POST',
        data: {
            username: username,
            password: password
        },
        success: function (response) {
            if (response.success) {
                window.location.href = '/web';
            } else {
                alert('Login falhou: ' + response.message);
            }
        },
        error: function (xhr, status, error) {
            alert('Erro ao tentar fazer login: ' + error);
        }
    });
}