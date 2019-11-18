
    <div class="form-group">
        <label for="exampleInputEmail1">Book Name</label>
        <input type="text" name="name" id="name" placeholder="Enter The Name Of The Book" value="{{old('name') ?? $book->name}}" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Book Author</label>
        <input type="text" name="author" id="author" placeholder="Enter Author Name" value="{{old('author') ?? $book->author}}" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Book Information</label>
        <textarea name="info" class="form-control" id="info" placeholder="Informations About The Book">{{old('info') ?? $book->info}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1"> Select The Book Category </label>
        <select class="form-control" name="category" id="category">
            @if (count($categories) > 0)
                @foreach($categories as $category)
                    <option id="category" name="category" value="{{$category->id}}" {{$category->id == $book->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Book Image</label>
        <img src="{{asset('storage/Book/Images/' . $book->image)}}" alt="Book-image" class="mx-auto d-block m-1">
        <input type="file" accept="application/jpg" name="image" id="image"  class="form-control"/>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Book File</label>
            <input type="file" accept="application/pdf" name="bookFile" id="bookFile"  class="form-control"/>

    </div>

