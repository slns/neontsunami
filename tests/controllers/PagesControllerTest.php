<?php

use NeonTsunami\Post;

use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;

class PagesControllerTest extends DbTestCase {

    public function testIndex()
    {
        Factory::times(2)->create(Post::class);

        $this->action('GET', 'PagesController@index');

        $this->assertResponseOk();
        $this->assertViewHas('latestPosts');
        $this->assertViewHas('popularPosts');
    }

    public function testAbout()
    {
        $this->action('GET', 'PagesController@about');

        $this->assertResponseOk();
    }

    public function testRss()
    {
        $this->action('GET', 'PagesController@rss');

        $this->assertResponseOk();
        $this->assertViewHas('posts');
    }

}
