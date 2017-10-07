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

class OnUpdateBlog
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	/**
	 * @var FormRequest;
	 */
	public $request;
	/**
	 * @type int
	 */
	public $updatedBlogId;

	/**
	 * Create a new event instance.
	 *
	 * @param \Illuminate\Foundation\Http\FormRequest $request
	 * @param type int  Id of updated article  $id
	 */
	public function __construct(FormRequest $request, int $id)
	{
		$this->request = $request;
		$this->updatedBlogId = $id;
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
