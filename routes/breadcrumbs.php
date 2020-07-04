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

// Home > Profiler
Breadcrumbs::register('profile', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Profile', route('profile.edit'));
});

// Home > Log Backup
Breadcrumbs::register('log', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Log Backup', route('backupLogs.index'));
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

// Home > Forum
Breadcrumbs::register('forum', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Forum Diskusi', route('forums.index'));
});

// Home > Berita
Breadcrumbs::register('berita', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Berita', route('news.index'));
});

// Home > Pesan
Breadcrumbs::register('pesan', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Kelola Pesan', route('messages.index'));
});

// Home > Berita > Kategori Berita
Breadcrumbs::register('kategori_berita', function ($breadcrumbs) {
    $breadcrumbs->parent('berita');
    $breadcrumbs->push('Kategori Berita', route('newsCategories.index'));
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

// Home > Bab > [JudulBab] > Judul Materi
Breadcrumbs::register('lesson', function ($breadcrumbs, $topic) {
    $breadcrumbs->parent('materi', $topic->chapter);
    $breadcrumbs->push($topic->topic_name, route('topics.show', [$topic->chapter->id, $topic->id]));
});