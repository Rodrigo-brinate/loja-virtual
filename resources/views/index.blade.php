
@include('partials.header')

<link rel="stylesheet" href="./css/index.css">

<nav>

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="./img/spotligth.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="./img/spotligth.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/spotligth.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="products">
@foreach ($product as $item)
<div class="card">
  <img class="img-card"  src="{{ url("storage/{$item->photo_main}") }}" alt="">
  <br>
  <a href="product/{{$item->id}}"><h2 class="title-card">{{$item->product_name}}</h2></a>
  <p class="valor-card">{{$item->value}}</p>
  <p class="description-card">{{$item->product_description}}</p>
</div>
   
@endforeach




</div>
</nav>


<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>