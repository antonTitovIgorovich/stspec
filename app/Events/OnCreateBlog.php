<?php

namespace St\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OnCreateBlog
{
	use Dispatchable, InteractsWithSockets, SerializesModels;
	/**
	 * @var FormRequest
	 */
	public $request;
	/**
	 * @type int
	 */
	public $createdBlogId;

	/**
	 * Create a new event instance.
	 *
	 * @param \Illuminate\Foundation\Http\FormRequest $request
	 */
	public function __construct(FormRequest $request)
	{
		$this->request = $request;
	}

	/**
	 * Set id of Listeners\CreateBlog
	 * from Listeners\CreateImage.
	 * @param int $id
	 */
	public function setCreatedBlogId(int $id)
	{
		$this->createdBlogId = $id;
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
