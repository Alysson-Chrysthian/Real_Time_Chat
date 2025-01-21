<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('send.message', function () {
    return true;
});
