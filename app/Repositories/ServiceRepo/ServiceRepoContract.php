<?php

namespace St\Repositories\ServiceRepo;
use Illuminate\Foundation\Http\FormRequest;

interface ServiceRepoContract
{
	public function getAll();

	public function paginate(int $limit);

	public function getById(int $id);

	public function store(FormRequest $request);

	public function update(FormRequest $request, int $id);

	public function delete(int $id);
}