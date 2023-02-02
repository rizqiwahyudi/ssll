<div class="form-group">
    <label class="form-control-label">{{ __('Old Password') }}</label>
    <div class="input-group input-group-merge">
        <input class="form-control" placeholder="Old Password" id="old_password" type="password" name="password"
            required>
        <div class="input-group-append">
            <span class="input-group-text" id="eyeSlash" onclick="old_password()"><i class="fa fa-eye-slash"
                    aria-hidden="true"></i></span>
            <span class="input-group-text" id="eyeShow" style="display: none;" onclick="old_password()"><i
                    class="fa fa-eye" aria-hidden="true"></i></span>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="form-control-label">{{ __('New Password') }}</label>
    <div class="input-group input-group-merge">
        <input class="form-control" placeholder="New Password" id="new_password" type="password" name="new_password"
            required>
        <div class="input-group-append">
            <span class="input-group-text" id="eyeSlashNew" onclick="new_password()"><i class="fa fa-eye-slash"
                    aria-hidden="true"></i></span>
            <span class="input-group-text" id="eyeShowNew" style="display: none;" onclick="new_password()"><i
                    class="fa fa-eye" aria-hidden="true"></i></span>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="form-control-label">{{ __('Confirm Password') }}</label>
    <div class="input-group input-group-merge">
        <input class="form-control" placeholder="Confirm Password" id="confirm_password" type="password"
            name="password_confirmation" required>
        <div class="input-group-append">
            <span class="input-group-text" id="eyeSlashConfirm" onclick="confirm_password()"><i class="fa fa-eye-slash"
                    aria-hidden="true"></i></span>
            <span class="input-group-text" id="eyeShowConfirm" style="display: none;" onclick="confirm_password()"><i
                    class="fa fa-eye" aria-hidden="true"></i></span>
        </div>
    </div>
</div>
<button class="btn btn-primary" type="submit">{{ __('Reset Password') }}</button>

<script type="text/javascript">
    function old_password() {
        var x = document.getElementById('old_password');
        if (x.type === 'password') {
            x.type = "text";
            $('#eyeShow').show();
            $('#eyeSlash').hide();
        } else {
            x.type = "password";
            $('#eyeShow').hide();
            $('#eyeSlash').show();
        }
    }

    function new_password() {
        var x = document.getElementById('new_password');
        if (x.type === 'password') {
            x.type = "text";
            $('#eyeShowNew').show();
            $('#eyeSlashNew').hide();
        } else {
            x.type = "password";
            $('#eyeShowNew').hide();
            $('#eyeSlashNew').show();
        }
    }

    function confirm_password() {
        var x = document.getElementById('confirm_password');
        if (x.type === 'password') {
            x.type = "text";
            $('#eyeShowConfirm').show();
            $('#eyeSlashConfirm').hide();
        } else {
            x.type = "password";
            $('#eyeShowNewConfirm').hide();
            $('#eyeSlashNewConfirm').show();
        }
    }
</script>