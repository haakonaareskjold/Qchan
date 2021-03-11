<?php

function current_user(): ?\Illuminate\Contracts\Auth\Authenticatable
{
    return auth()->user();
}

function isAdmin()
{
    return current_user()->adminStatus() === true;
}
