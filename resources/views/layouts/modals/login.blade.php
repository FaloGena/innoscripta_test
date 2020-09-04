<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Log in</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(null);" method="POST" class="login-form">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="login-form__phone-input">
                        <label for="login-form__phone-input">Phone</label>
                        <input type="tel" name="phone" id="login-form__phone-input">
                    </div>
                    <div class="login-form__password-input">
                        <label for="login-form__password-input">Password</label>
                        <input type="password" name="password" id="login-form__password-input">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>
