<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;
use App\Models\Post;
use App\Models\Role;
use App\Models\Photo;
use App\Models\Staff;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Taggable;
use App\Models\Video;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* |--------------------------------------------------------------------------
| One To One Relationship
|-------------------------------------------------------------------------- */


/* Route::get("/create", function () {
    $user = User::find(1);

    $address = new Address(["name" => "location Created"]);

    $create = $user->address()->save($address);

    return "<h1>$create->name</h1>";
});

Route::get("/read", function () {
    $user = User::findOrFail(1);

    $read = $user->address->name;

    echo "<h1>$read</h1>";
});

Route::get("/update", function () {
    $user = User::findOrFail(1);

    $update = $user->address()->update(["name" => "Updated Location"]);

    return "<h1>$update</h1>";
});

Route::get("/delete", function () {
    $user = User::findOrFail(1);

    $delete = $user->address()->delete();

    return "<h1>$delete</h1>";
});
 */

/* |--------------------------------------------------------------------------
| One To Many Relationship
|-------------------------------------------------------------------------- */

/* Route::get("/create", function () {
    $user = User::findOrFail(1);

    $post = new Post(["title" => "First Post", "body" => "This is the first post"]);

    $user->posts()->save($post);

    return "<h1>Post Created</h1>";

});

Route::get("/read", function () {
    $user = User::find(1);

    foreach($user->posts as $post) {
        echo "<h1>$post->title</h1>";
    }
});

Route::get("/update", function () {
    $user = User::findOrFail(1);

    foreach($user->posts as $post) {
        $post->where("id", 2)->update(["title" => "Update Post", "body" => "This is the update post"]);

        return "<h1>Updated</h1>";
    }
});

Route::get("/delete", function () {
    $user = User::find(1);

    $user->posts()->delete();

    return "<h1>Deleted</h1>";
}); */

/* |--------------------------------------------------------------------------
| Many To Many Relationship
|-------------------------------------------------------------------------- */

/* Route::get("/create", function () {
    $user = User::find(1);

    $role = new Role(["name" => "Subscriber"]);

    $user->roles()->save($role);

    return "<h1>Created</h1>";
});

Route::get("/read", function () {
    $user = User::findOrFail(1);

    foreach($user->roles as $role) {
        echo "<h1>$role->name</h1>";
    }
});

Route::get("/update", function () {
    $user = User::find(1);

    foreach($user->roles as $role) {
        $role->where("id", 1)->update(["name" => "User"]);
    }

    return "<h1>Updated Role</h1>";
});

Route::get("/delete", function () {
    $user = User::findOrFail(1);

    foreach($user->roles as $role) {
        $role->where("id", 1)->delete();
    }

    return "<h1>Deleted</h1>";
}); */

/* |--------------------------------------------------------------------------
| Polymorphic One To Many Relationship
|-------------------------------------------------------------------------- */

/* Route::get("/create", function () {
    $product = Product::findOrFail(1);

    $photo = new Photo(["path" => "product.jpg"]);

    $product->photos()->save($photo);

    return "<h1>Created</h1>";
});

Route::get("/read", function () {
    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo) {
        echo "<h1>$photo->path</h1>";
    }

});

Route::get("/update", function () {
    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo) {
        $photo->where("id", 1)->update(["path" => "update.jpg"]);
    }

    return "<h1>Updated</h1>";
});

Route::get("/delete", function () {
    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo) {
        $photo->delete();
    }
}); */

/* |--------------------------------------------------------------------------
| Polymorphic Many To Many Relationship
|-------------------------------------------------------------------------- */

Route::get("/create", function () {
    $post = Post::findOrFail(1);

    $tag = new Tag(["name" => "First tag"]);

    $post->tags()->save($tag);

    return "<h1>Created</h1>";
});

Route::get("/read", function () {
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag) {
        echo "<h1>$tag->name</h1>";
    }
});

Route::get("/update", function () {
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag) {
        $tag->where("id", 3)->update(["name" => "updated tag"]);
    }

    return "<h1>Updated Tag</h1>";
});

Route::get("/delete", function () {
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag) {
        $tag->where("id", 3)->delete();
    }

    return "<h1>Deleted</h1>";
});