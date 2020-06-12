@extends('layouts.app')
@section('content')
<div class="container intro-container" id="app">
    <router-view></router-view>
    <div class="row">

        <!-- Blog Entries Column -->
        {{-- <div class="col-md-8">

            <h1 class="my-4">Page Heading
                <small>Secondary Text</small>
            </h1> --}}
           
            <!-- Blog Post -->
           
           


            <!-- Pagination -->
            {{-- <nav aria-label="...">
                <ul class="pagination float-right">
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
              <span class="page-link">
                2
                <span class="sr-only">(current)</span>
              </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div> --}}

        
        

    </div>
    <!-- /.row -->
<!--modals-->
<!--register-->
<register></register>
<!--login-->
<login></login>
<!--modals-->
</div>
@endsection('content)
