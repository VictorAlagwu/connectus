<?php
/**
 * Victor Alagwu
 */

 namespace App;
 use Illuminate\Database\Eloquent\Model;

 trait Favoritable
 {
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }

 public function favorite()
    {
        $attributes = ['user_id' => auth()->id()];
        if (! $this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

/**
 * Determine if the current reply has been favorited.
 *
 * @return boolean
 */
public function isFavorited()
{
    return !! $this->favorites->where('user_id', auth()->id())->count();
}

public function getFavoritesCountAttribute(){
    return $this->favorites->count();
}
 }