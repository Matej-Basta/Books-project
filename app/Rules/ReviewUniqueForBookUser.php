<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Review;

class ReviewUniqueForBookUser implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($book_id)
    {
        $this->book_id = $book_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $duplicated_review = Review::where("book_id", $this->book_id)->where("user_id", auth()->id())->first();

        return !$duplicated_review;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You have already submitted a review for this book.';
    }
}
