@if (count($books) > 0)
    <div class="card-body">
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-3 col-xl-6">
                    <div class="card">
                        <div class="card">
                        <a href="{{route('book.show' , $book->id)}}" >
                            <img class="card-img-top img-fluid" src="{{asset('/storage/Book/Images/' . $book->image)}}" alt="Show More" style="width: 450px ; height: 450px ">
                        </a>
                        </div>
                        <div class="card-body">
                            <label class="col-form-label"> Book Name  : {{$book->name}}</label><br>
                            <label class="col-form-label"> Author  : {{$book->author}}</label><br>
                            <a href="#" class="btn btn-info"> <i class="fa fa-book-open"> Read </i> </a>
                            <a href="{{asset('/storage/Book/PDF/' . $book->bookFile)}}" class="btn btn-bordred-dark float-right"> <i class="fa fa-download"> Download </i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <div class="row justify-content-center m-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h3 class="mt-3 mb-4">There is No Books 😟</h3>
                                @hasRole(['superadmin' , 'admin' , 'author'])
                                <a href="{{route('book.create')}}" class="btn btn-primary waves-effect waves-light float-left"><i class="fas fa-file-upload"></i> Upload One </a>
                                <a href="{{route('book.index')}}" class="btn btn-danger waves-effect waves-light float-right"><i class="fas fa-home mr-1"></i> Return Back </a>
                                @endhasRole
                            </div>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end row -->
            @endif
        </div>
        {{$books->links()}}
    </div>
