<?php

namespace St\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $table = 'images';
	protected $fillable = [
		'file_name',
		'blog_id',
		'created_at',
		'updated_at'
	];

	public function scopeMultiInsert($query, int $blogId, array $NamesArr)
	{
		$dataArr = array_map(
			function ($imgName) use ($blogId) {
				return [
					'file_name' => $imgName,
					'blog_id' => $blogId,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				];
			}, $NamesArr);

		return $query->insert($dataArr);
	}

	public function scopeDeleteByFileName($query, string $column, array $removedImgsArr)
	{
		return $query->where($column, $removedImgsArr)->delete();
	}

	public function scopeDeleteByBlogId($query, int $blogId)
	{
		return $query->where('blog_id', $blogId)->delete();
	}
}
