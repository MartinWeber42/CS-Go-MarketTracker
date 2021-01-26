// set variables
let header = document.getElementById('header'),
    username = document.getElementById('username'),
    email = document.getElementById('email'),
    password = document.getElementById('password'),
    passwordRepeat = document.getElementById('passwordRepeat'),
    register = document.getElementById('register'),
    login = document.getElementById('login'),
    button = document.getElementById('button');

// focus Username on page load
username.focus();

// add animation for register
register.addEventListener('click', function() {
    var registerTl = gsap.timeline();

    registerTl.to(email, { duration: .5, height: '32px', border: 'solid 1px #636464', marginTop: '8px'})
            .to(passwordRepeat, { duration: .5, height: '32px', border: 'solid 1px #636464', marginBottom: '8px'}, '=-.5');

    header.innerText = 'Registrieren';
    email.focus();
    button.value = 'Registrieren';
    register.classList.add('hide');
    login.classList.remove('hide');
})

// add animation for login
login.addEventListener('click', function() {
    var registerTl = gsap.timeline();

    registerTl.to(email, { duration: .5, height: '0px', border: '0px', marginTop: '-8px'})
            .to(passwordRepeat, { duration: .5, height: '0px', border: '0px', marginBottom: '-8px'}, '=-.5');

    header.innerText = 'Einloggen';
    username.focus();
    button.value = 'Einloggen';
    login.classList.add('hide');
    register.classList.remove('hide');
})

// set event for submit button
button.addEventListener('click', function() {
    // if user wants to login
    if (login.classList.contains('hide')) {
        // call userController with action login
        $.ajax({
            url: './php/userController.php?action=login',
            type: 'POST',
            data: {
                username: username.value,
                password: password.value
            }, success: function() {
                // reload page
                location.reload();
            }
        });
    // if user wants to register
    } else {
        // call userController with actionLogin
        $.ajax({
            url: './php/userController.php?action=register',
            type: 'POST',
            data: {
                username: username.value,
                email: email.value,
                password: password.value
            }, success: function(data) {
                
            }
        });
    }
})