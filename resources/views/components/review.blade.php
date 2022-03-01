
<form action="{{ url('book/' . $book->id) }}" method="post">

    @csrf

    <textarea name="review" id="" cols="30" rows="10"></textarea>
    <br>
    <br>
    <button>Submit</button>
</form>