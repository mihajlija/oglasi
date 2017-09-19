<?php

class AdminController extends Controller {
    public final function __pre() {
        if (!Session::exists('user_id')) {
            Misc::redirect('login');
        }
    }
}
