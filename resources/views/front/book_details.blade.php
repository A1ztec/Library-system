<!DOCTYPE html>
<html lang="en">



@include('front.css')


<body>

<!-- ***** Preloader Start ***** -->
@include('front.header')
<!-- ***** Header Area End ***** -->

<!-- ***** Main Banner Area Start ***** -->
<div class="item-details-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h2>View Details <em>For Item</em> Here.</h2>
                </div>
                @include('flash::message')
            </div>
            <div class="col-lg-2">
                <div class="left-image">
                    <img src="{{asset($book->book_img)}}" alt=""  style="border-radius: 20px;">
                </div>
            </div>
            <div class="col-lg-5 align-self-center">
                <h4>{{$book->title}}</h4>
                <span class="author">
            <img src="{{asset($book->author_img)}}" alt="" style="max-width: 50px; border-radius: 50%;">
            <h6>{{$book->author_name}}</h6>
          </span>
                <p>{{$book->description}}</p>
                <div class="row">


                    <div class="col-5">
              <span class="ends">
                Total Quantity<br><strong>{{$book->quantity}}</strong><br>
              </span>
                        <div class="">
                            <a  class="btn btn-primary"  href="{{route('borrow_book' , $book)}}">Apply to Borrow</a>
                        </div>

                    </div>

                </div>


            </div>

        </div>
    </div>
</div>

@include('front.footer')

</body>
</html>
