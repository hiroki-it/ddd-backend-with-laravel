<?php

declare(strict_types=1);

Route::get('/healthcheck', function() {
    return response("ok", 200);
});
