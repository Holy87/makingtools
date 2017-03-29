<!--suppress EqualityComparisonWithCoercionJS -->
<div class="container">
    <title>Registrati</title>
    <form id="regform">
        <div class="form-group row">
            <div class="form-group">
                <label class="form-control-label" for="user">Nome utente</label>
                <input type="text" class="form-control" id="user" name="user" placeholder="" required>
                <div class="form-control-feedback" id="user-result"></div>
                <small class="form-text text-muted">Inserisci il tuo nickname o nome d'arte con cui ti fai conoscere.</small>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="mail">Indirizzo email</label>
                <input type="email" class="form-control" id="mail" name="mail" placeholder="mail@example.com" required>
                <div class="form-control-feedback" id="mail-result"></div>
                <small class="form-text text-muted">Inserisci un indirizzo e-mail valido per ricevere contatti e recuperare la password in caso di smarrimento.</small>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                <div class="form-control-feedback" id="password-result"></div>
                <small class="form-text text-muted">La password dev'essere di almeno 8 caratteri.</small>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="verify">Verifica password</label>
                <input type="password" class="form-control" id="verify" placeholder="" required>
                <div class="form-control-feedback" id="password-result"></div>
            </div>
            <div class="form-group">
                <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                    <input type="checkbox" class="custom-control-input" required>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Ho letto e accettato le <a href="#" onclick="show_conditions();">condizioni</a>.</span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Registrati</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    var username_valid = false;
    var mail_valid = false;
    var password_valid = false;
    var password_verified = false;
    var accepted = false;

    function check_username(e) {
        var name = e.val();
        $.ajax({
            url: "application/controllers/user_check.php",
            data: '{check: "user", value: "'+name+'"}',
            dataType: 'html';
            success = function(msg) {
                if(msg == "free") {
                    $('#usdiv').prop("class", "form-group has-success");
                    $('#uscheck').prop("value", "Questo nome utente è disponibile.");
                    username_valid = true;
                } else {
                    $('#usdiv').prop("class", "form-group has-success");
                    $('#uscheck').prop("value", "Questo nome utente è disponibile.");
                    username_valid = false;
                }
            }
        })
    }

    function check_mail(e) {
        var mail = e.val();
        var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (patt.test(mail) == true) {
            $.ajax({
                url: "application/controllers/user_check.php",
                data: '{check: "mail", value: "'+mail+'"}',
                dataType: 'html';
                success = function(msg) {
                    if(msg == "free") {
                        $('#madiv').prop("class", "form-group has-success");
                        $('#macheck').prop("value", "Questo indirizzo è valido.");
                        mail_valid = true;
                    } else {
                        $('#madiv').prop("class", "form-group has-error");
                        $('#macheck').prop("value", "Questa email è già utilizzata.");
                        mail_valid = false;
                    }
                }
            })
        } else {
            $('#madiv').prop("class", "form-group has-error");
            $('#macheck').prop("value", "L'indirizzo inserito non è corretto.");
            mail_valid = false;
        }

    }

    function check_password(e) {
        if (e.val().length >= 8) {
            $('#pwdiv').prop("class", "form-group has-success");
            $('#pwcheck').prop("value", "");
            pssword_valid = true;
        } else {
            $('#pwdiv').prop("class", "form-group has-error");
            $('#pwcheck').prop("value", "La password inserita non è sufficiente.");
            password_valid = false;
        }
    }

    function check_password_valid(e) {
        if (e.val() == $('#password').val()) {
            $('#pcdiv').prop("class", "form-group has-success");
            $('#pccheck').prop("value", "");
            pssword_verified = true;
        } else {
            $('#pcdiv').prop("class", "form-group has-error");
            $('#pccheck').prop("value", "Le password non coincidono.");
            password_verified = false;
        }
    }

    $(document).ready(function() {
        $('#user').onblur(function(e) {
            check_username(e);
        });
        $('#mail').onblur(function(e) {
            check_mail(e);
        });
        $('#password').onblur(function(e) {
            check_password(e);
        });
        $('#verify').onblur(function (e) {
            check_password_valid(e);
        });
        $('#regform').submit(function() {
            //TODO: inviare la richiesta di registrazione
        })
    }
</script>