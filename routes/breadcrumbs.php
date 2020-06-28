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

// Home > Dokumentasi
Breadcrumbs::register('gallery', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Dokumentasi', route('galleries.index'));
});

// Home > Slider
Breadcrumbs::register('slider', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Slider', route('sliders.index'));
});

// Home > Cms
Breadcrumbs::register('cms', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('CMS', route('cms.index'));
});

// Home > Bab
Breadcrumbs::register('bab', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Bab', route('chapters.index'));
});

// Home > Bab > [JudulBab] 
Breadcrumbs::register('materi', function ($breadcrumbs, $chapter) {
    $breadcrumbs->parent('bab');
    $breadcrumbs->push($chapter->chapter_name, route('chapters.show', $chapter->id));
});