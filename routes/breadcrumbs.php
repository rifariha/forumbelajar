<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Home > User
Breadcrumbs::register('users', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users', route('users.index'));
});

// Home > Bab
Breadcrumbs::register('bab', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Bab', route('chapters.index'));
});

// Home > Bab > [JudulBab] 
Breadcrumbs::register('materi', function ($breadcrumbs, $chapter) {
    $breadcrumbs->parent('bab');
    $breadcrumbs->push($chapter->chapter_name, route('topics.show', $chapter->id));
});
