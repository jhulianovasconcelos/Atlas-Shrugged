<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;


class PostController extends Controller {
    public function index(): Response {
        return Inertia::render('Posts/List', [
            'posts' => Post::with('user:id,name')->latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([
            'message' => 'required|string|max:280',
        ]);

        $request->user()->posts()->create($validated);

        return redirect(route('posts.index'));
    }

    public function update(Request $request, Post $post): RedirectResponse {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'message' => 'required|string|max:280',
        ]);

        $post->update($validated);

        return redirect(route('posts.index'));
    }

    public function destroy(Post $post): RedirectResponse {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect(route('posts.index'));
    }
}
