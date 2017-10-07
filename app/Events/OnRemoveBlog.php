<?php

namespace St\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use St\Models\Blog;

class OnRemoveBlog
{
	use Dispatchable, InteractsWithSockets, SerializesModels;
	/**
	 * @var int
	 */
	public $blogId;

	/**
	 * @var Model
	 */
	public $specificBlogModel;

	/**
	 * Create a new event instance.
	 * @param  int $id id of blog article
	 */
	public function __construct(int $id)
	{
		$this->blogId = $id;
	}

	/**
	 * Set blog model found by id
	 * @param Blog $model
	 */
	public function setSpecificBlogModel(Blog $model)
	{
		$this->specificBlogModel = $model;
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return Channel|array
	 */
	public function broadcastOn()
	{
		return new PrivateChannel('channel-name');
	}
}
