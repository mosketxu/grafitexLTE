<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Inicio
Breadcrumbs::for('home', function ($trail) {
    $trail->push('home', route('home'));
});

// Home > Blog
Breadcrumbs::for('campaign', function ($trail) {
  $trail->parent('home');
  $trail->push('Campañas', route('campaign.index'));
 });


 
// Home
// Breadcrumbs::for('home', function ($trail) {
//   $trail->push('Home', route('home'));
// });
 
// // Home > Blog
// Breadcrumbs::for('posts.index', function ($trail) {
//   $trail->parent('home');
//   $trail->push('Blog', route('posts.index'));
// });
 
// // Home > Blog > [Category]
// Breadcrumbs::for('posts.category', function ($trail, $category) {
//   $trail->parent('posts.index');
//   $trail->push($category->name, route('posts.category', $category->id));
// });
 
// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('posts.show', function ($trail, $post) {
//     $trail->parent('posts.category', $post->category);
//     $trail->push($post->title, route('posts.show', $post->id));
// });