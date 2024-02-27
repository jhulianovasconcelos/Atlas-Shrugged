<?php


use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa a criação do post pelo usuário e espera por um redirecionamento.
     */
    public function test_create_post(): void
    {
        $user = User::factory()->create();

        $message = [
           'message' => 'test message'
        ];

        $response = $this
            ->actingAs($user)
            ->post('/posts', $message);

        $response->assertFound();
    }

    public function test_edit_post(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($user)
            ->patch('/posts/' . $post->id, [
                'message' => 'test message',
            ]);

        $response->assertFound();
    }

    public function test_delete_post(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($user)
            ->delete('/posts/' . $post->id);

        $response->assertFound();
    }
}
