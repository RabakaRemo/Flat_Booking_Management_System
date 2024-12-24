 @php
     $featuredFlats = DB::select("SELECT * FROM flats WHERE featured = 'true' AND status = 'approved' LIMIT 6");
     $forRent = DB::select("SELECT * FROM flats WHERE sale_status = 'Rent' AND status = 'approved' LIMIT 6");
     $forSale = DB::select("SELECT * FROM flats WHERE sale_status = 'Sale' AND status = 'approved' LIMIT 6");

     //  dd($forRent);

 @endphp

 <!-- Property List Start -->
 <div class="container-xxl py-5">
     <div class="container">
         <div class="row g-0 gx-5 align-items-end">
             <div class="col-lg-6">
                 <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                     <h1 class="mb-3">Property Listing</h1>
                     <p>Choose your Comfort Property.</p>
                 </div>
             </div>
             <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                 <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                     <li class="nav-item me-2">
                         <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                     </li>
                     <li class="nav-item me-2">
                         <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                     </li>
                     <li class="nav-item me-0">
                         <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                     </li>
                 </ul>
             </div>
         </div>
         <div class="tab-content">
             <div id="tab-1" class="tab-pane fade show p-0 active">
                 <div class="row g-4">
                     @foreach ($featuredFlats as $flat)
                         <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                             <div class="property-item rounded overflow-hidden">
                                 <div class="position-relative overflow-hidden">
                                     <a href=""><img class="img-fluid" src="{{ asset($flat->photo) }}"
                                             alt="" style="height: 300px; width: 100%; object-fit: cover;"></a>
                                     <div
                                         class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                         For {{ $flat->sale_status }}
                                     </div>
                                     <div
                                         class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                         {{ $flat->property_type }}
                                     </div>
                                 </div>
                                 <div class="p-4 pb-0">
                                     <h5 class="text-primary mb-3">{{ $flat->price }} TK</h5>
                                     <a class="d-block h5 mb-2"
                                         href="{{ route('public.flat.details', ['id' => $flat->flat_id]) }}">{{ $flat->title }}</a>
                                     <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $flat->address }},
                                         {{ $flat->location }}</p>
                                 </div>
                                 <div class="d-flex border-top">
                                     <small class="flex-fill text-center border-end py-2"><i
                                             class="fa fa-ruler-combined text-primary me-2"></i>{{ $flat->size }}
                                         Sqft</small>
                                     <small class="flex-fill text-center border-end py-2"><i
                                             class="fa fa-bed text-primary me-2"></i>{{ $flat->bed }} Bed</small>
                                     <small class="flex-fill text-center py-2"><i
                                             class="fa fa-bath text-primary me-2"></i>{{ $flat->bath }} Bath</small>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                     <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                         <a class="btn btn-primary py-3 px-5" href="{{ route('home.all.properties') }}">Browse More
                             Property</a>
                     </div>
                 </div>
             </div>
             <div id="tab-2" class="tab-pane fade show p-0">
                 <div class="row g-4">
                     @foreach ($forSale as $sale)
                         <div class="col-lg-4 col-md-6">
                             <div class="property-item rounded overflow-hidden">
                                 <div class="position-relative overflow-hidden">
                                     <a href="{{ route('public.flat.details', ['id' => $sale->flat_id]) }}"><img
                                             class="img-fluid" src="{{ asset($sale->photo) }}" alt=""
                                             style="height: 300px; width: 100%; object-fit: cover;"></a>
                                     <div
                                         class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                         For {{ $sale->sale_status }}</div>
                                     <div
                                         class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                         {{ $sale->property_type }}</div>
                                 </div>
                                 <div class="p-4 pb-0">
                                     <h5 class="text-primary mb-3">{{ $sale->price }} Tk</h5>
                                     <a class="d-block h5 mb-2"
                                         href="{{ route('public.flat.details', ['id' => $sale->flat_id]) }}">{{ $sale->title }}</a>
                                     <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $sale->address }},
                                         {{ $sale->location }}</p>
                                 </div>
                                 <div class="d-flex border-top">
                                     <small class="flex-fill text-center border-end py-2"><i
                                             class="fa fa-ruler-combined text-primary me-2"></i>{{ $sale->size }}
                                         Sqft</small>
                                     <small class="flex-fill text-center border-end py-2"><i
                                             class="fa fa-bed text-primary me-2"></i>{{ $sale->bed }} Bed</small>
                                     <small class="flex-fill text-center py-2"><i
                                             class="fa fa-bath text-primary me-2"></i>{{ $sale->bath }}
                                         Bath</small>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                     <div class="col-12 text-center">
                         <a class="btn btn-primary py-3 px-5" href="{{ route('home.all.properties') }}">Browse More
                             Property</a>
                     </div>
                 </div>
             </div>
             <div id="tab-3" class="tab-pane fade show p-0">
                 <div class="row g-4">
                     @foreach ($forRent as $rent)
                         <div class="col-lg-4 col-md-6">
                             <div class="property-item rounded overflow-hidden">
                                 <div class="position-relative overflow-hidden">
                                     <a href="{{ route('public.flat.details', ['id' => $rent->flat_id]) }}"><img
                                             class="img-fluid" src="{{ asset($rent->photo) }}" alt=""
                                             style="height: 300px; width: 100%; object-fit: cover;"></a>
                                     <div
                                         class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                         For {{ $rent->sale_status }}</div>
                                     <div
                                         class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                         {{ $rent->property_type }}</div>
                                 </div>
                                 <div class="p-4 pb-0">
                                     <h5 class="text-primary mb-3">{{ $rent->price }} Tk</h5>
                                     <a class="d-block h5 mb-2"
                                         href="{{ route('public.flat.details', ['id' => $rent->flat_id]) }}">{{ $rent->title }}</a>
                                     <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $rent->address }},
                                         {{ $rent->location }}</p>
                                 </div>
                                 <div class="d-flex border-top">
                                     <small class="flex-fill text-center border-end py-2"><i
                                             class="fa fa-ruler-combined text-primary me-2"></i>{{ $rent->size }}
                                         Sqft</small>
                                     <small class="flex-fill text-center border-end py-2"><i
                                             class="fa fa-bed text-primary me-2"></i>{{ $rent->bed }} Bed</small>
                                     <small class="flex-fill text-center py-2"><i
                                             class="fa fa-bath text-primary me-2"></i>{{ $rent->bath }}
                                         Bath</small>
                                 </div>
                             </div>
                         </div>
                     @endforeach

                     <div class="col-12 text-center">
                         <a class="btn btn-primary py-3 px-5" href="{{ route('home.all.properties') }}">Browse More
                             Property</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Property List End -->
