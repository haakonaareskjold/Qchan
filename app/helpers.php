<?php

function current_user(): ?\Illuminate\Contracts\Auth\Authenticatable
{
    return auth()->user();
}
