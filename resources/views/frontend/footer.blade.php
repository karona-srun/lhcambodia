{{-- <div class="container">
    <footer class="mt-5">
        <div class="row">
            <div class="col-6 col-md-4 mb-3">
    <img src="{{ url($profile->photo)}}" class=" img-size-64" alt="" srcset="">
    <h5 class="mt-2">{{$profile->name}}</h5>
            </div>

            <div class="col-6 col-md-4 mb-3">
<h6>{{ __('app.phone')}}</h6>
                <p>{{$profile->tel}} <br> {{$profile->email}}</p>
            </div>

            <div class="col-6 col-md-4 mb-3">
                <h6>{{__('app.label_address')}}</h6>
                <p>{{$profile->address}}</p>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between border-top">
            <p class="mt-3"><strong>Copyright &copy; {{ now()->year - 1 }} - {{ now()->year }} <a
                        href="https://www.karonasrun.com" class=" text-white">Karona</a>.</strong> All rights
                reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24"
                            height="24">
                            <use xlink:href="#twitter"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24"
                            height="24">
                            <use xlink:href="#instagram"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24"
                            height="24">
                            <use xlink:href="#facebook"></use>
                        </svg></a></li>
            </ul>
        </div>
    </footer>
</div> --}}

<div class="container mt-5 pt-4">
    <footer class="py-1 mt-4">
        <div class="row">
            <div class="col-md-5 mb-3">
                <h5>{{ __('app.label_company_information') }}</h5>
                <p>{{ __('app.label_sub_company_information') }}</p>
                <ul class="nav flex-column">
                    <li class="nav-item nav-item-cus mb-2"><a href="#" class="nav-link p-0 text-body-secondary text-white"> <i class="fas fa-map-pin mr-2"></i> {{ $profile->address }}</a></li>
                    <li class="nav-item nav-item-cus mb-2"><a href="#" class="nav-link p-0 text-body-secondary text-white"> <i class="fas fa-phone-volume mr-2"></i> {{ $profile->tel }}</a></li>
                    <li class="nav-item nav-item-cus mb-2"><a href="#" class="nav-link p-0 text-body-secondary text-white"> <i class="fas fa-envelope-open-text mr-2"></i> {{ $profile->email }}</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-2 mb-3">
                <h5>{{ __('app.label_policies') }}</h5>
                <ul class="nav flex-column">
                    <li class="nav-item nav-item-cus mb-2"><a href="#" class="btn btn-link p-0 text-white"><i
                                class="fas fa-exclamation-circle"></i> {{ __('app.label_warranty_policy') }}</a></li>
                    <li class="nav-item nav-item-cus mb-2"><a href="#" class="btn btn-link p-0 text-white"><i
                                class="fas fa-exclamation-circle"></i> {{ __('app.label_shopping_policy') }}</a></li>
                </ul>
            </div>

            <div class="col-md-5 mb-3">
                <form class="row g-3">
                    <h5>{{ __('app.label_register_as_and_agent') }}</h5>
                    <p>{{ __('app.label_sub_register_as_and_agent') }}</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        {{-- <label for="newsletter1" class="visually-hidden"> {{ __('app.email')}}</label> --}}
                        <input id="newsletter1" type="text" class="form-control" placeholder="{{ __('app.email')}}">
                        <button class="btn btn-sm btn-primary" type="button">{{__('app.btn_send')}}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p><strong>Copyright &copy; {{ now()->year - 1 }} - {{ now()->year }} <a href="https://www.karonasrun.com" class=" text-white">Karona</a>.</strong> All rights​ reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="btn btn-outline-light me-3" href="#"> <i class="fab fa-telegram"></i> </a></li>
                <li class="ms-3"><a class="btn btn-outline-light me-3" href="#"> <i class="fab fa-facebook-f"></i> </a></li>
                <li class="ms-3"><a class="btn btn-outline-light me-3" href="#"> <i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>
</div>
