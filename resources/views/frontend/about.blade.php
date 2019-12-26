@extends('frontend.layouts.app')
@section('content')
    <section class="section-product-categories">
        <h3 class="pre-title">
            <span>ABOUT US</span>
        </h3>
    </section>

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">ABOUT CADA FOOD</h2>
            <p class="lead">CADA FOOD 1976 yılında kuruldu.</p>
            <p class="lead">Butik bir kasap olmasına rağmen müşterilerine sunmuş olduğu ürünlerin katkısız ve lezzetli olmasından dolayı kısa sürede 'Et Ustası' ünvanının aldı. 41 yıldır iş hacmi, ürün yelpazesi, müşteriler, çalışanlar kısacası bir çok şey değişti. Ancak değişmeyen tek şey CADA FOOD'un sunduğu et ve et ürünlerinin lezzeti idi.</p>
            <p class="lead">CADA FOOD müşterilerinden aldığı talepler ile kalitesini hiç bozmadan büyüyebilen nadir et üreticilerindendir.İlerleyen yıllarda gücünü müşterilerinin sadakat ve övgülerinden alarak üretim bandını genişletti.</p>
            <p class="lead">İstanbul'un en köklü kasapları arasında yer alan CADA FOOD şu anda üretimine 1500m2 kapalı alana sahip CADA Et Entegre tesislerinde devam etmekte.</p>

        </div>
        <div class="col-md-5">
            <img src="{{ asset('uploads/about-us.jpg') }}" width="500px" height="800px">
        </div>
    </div>
@endsection
