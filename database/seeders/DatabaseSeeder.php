<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\Group;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Discussion;
use App\Models\Event;
use App\Models\Institution;
use App\Models\Kanban;
use App\Models\KanbanGroup;
use App\Models\KanbanItem;
use App\Models\Like;
use App\Models\Message;
use App\Models\Placement;
use App\Models\Post;
use App\Models\Product;
use App\Models\Reply;
use App\Models\Report;
use App\Models\Response;
use App\Models\Review;
use App\Models\Subject;
use App\Models\Tag;
use App\Models\Task;
use App\Models\Ticket;
use App\Models\Timetable;
use App\Models\Webhook;
use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        Subject::factory(100)->create();
        Post::factory(100)->create();
        Blog::factory(100)->create();
        Comment::factory(100)->create();
        Discussion::factory(100)->create();
        Event::factory(100)->create();
        Group::factory(100)->create();
        Institution::factory(100)->create();
        Kanban::factory(100)->create();
        KanbanGroup::factory(100)->create();
        KanbanItem::factory(100)->create();
        Like::factory(100)->create();
        Message::factory(100)->create();
        Note::factory(100)->create();
        Placement::factory(100)->create();
        Product::factory(100)->create();
        Reply::factory(100)->create();
        Report::factory(100)->create();
        Response::factory(100)->create();
        Review::factory(100)->create();
        Tag::factory(100)->create();
        Task::factory(100)->create();
        Ticket::factory(100)->create();
        Timetable::factory(100)->create();
        Webhook::factory(100)->create();
    }
}
