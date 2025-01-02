<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_post()
    {
        // Data to create a new post
        $data = [
            'title' => 'Test Post',
            'content' => 'This is a test post',
            'author' => 'John Doe',
        ];

        // Make a POST request to the API to create the post
        $response = $this->postJson('/api/posts', $data);

        // Assert that the status is 201 (created) and the data is returned
        $response->assertStatus(201)
                 ->assertJsonFragment($data);
    }

    public function test_can_fetch_posts()
    {
        // Create 5 posts in the database
        Post::factory()->count(5)->create();

        // Make a GET request to the API to fetch the posts
        $response = $this->getJson('/api/posts');

        // Assert that the status is 200 (OK) and there are 5 posts
        $response->assertStatus(200)
                 ->assertJsonCount(5);
    }

    public function test_can_fetch_single_post()
    {
        // Create a post in the database
        $post = Post::factory()->create();

        // Make a GET request to the API to fetch the single post by its ID
        $response = $this->getJson("/api/posts/{$post->id}");

        // Assert that the status is 200 (OK) and the title of the post is in the response
        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => $post->title]);
    }

    public function test_can_update_post()
    {
    // Create a post in the database
    $post = Post::factory()->create();

    // Data to update the post
    $data = [
        'title' => 'Updated Title',
        'content' => 'Updated content', // Add the required 'content' field
    ];

    // Make a PUT request to the API to update the post by its ID
    $response = $this->putJson("/api/posts/{$post->id}", $data);

    // Assert that the status is 200 (OK) and the updated title is returned
    $response->assertStatus(200)
             ->assertJsonFragment($data);
}


    public function test_can_delete_post()
    {
        // Create a post in the database
        $post = Post::factory()->create();

        // Make a DELETE request to the API to delete the post by its ID
        $response = $this->deleteJson("/api/posts/{$post->id}");

        // Assert that the status is 200 (OK) and a success message is returned
        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Post deleted successfully']);
    }
}
