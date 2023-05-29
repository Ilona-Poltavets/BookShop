<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->belongsToMany(Book::class)->withPivot('quantity');
    }

    public function increase($id, $count = 1)
    {
        $this->change($id, $count);
    }

    public function decrease($id, $count = 1)
    {
        $this->change($id, -1 * $count);
    }

    private function change($id, $count = 0)
    {
        if ($count == 0) {
            return;
        }

        if ($this->books->contains($id)) {

            $pivotRow = $this->books()->where('book_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + $count;
            if ($quantity > 0) {

                $pivotRow->update(['quantity' => $quantity]);
            } else {

                $pivotRow->delete();
            }
        } elseif ($count > 0) {
            $this->books()->attach($id, ['quantity' => $count]);
        }

        $this->touch();
    }

    public function remove($id)
    {

        $this->books()->detach($id);
        $this->touch();
    }
}
