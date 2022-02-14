<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehículos Disponibles') }}
        </h2>
    </x-slot>

    <form action="{{route('catalogo')}}" method="GET">
                <div class="form-group d-inline-flex">
                    <input type="text" class="form-control" name="search" placeholder="Search here....." value="{{ request()->input('search') }}">
                    <span class="text-danger">@error('queryUser'){{ $message }} @enderror</span>
                    <button type="submit" class="bg-gray-500 rounded-full font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-gray-600 mr-6">{{trans('Buscar')}}</button>
                </div>
            </form>        
                         
                           <tbody>
                             @foreach ($products as $product)
                             <div class="w-full md:w-1/2 xl:w-1/3 px-4">
            <div class="bg-white rounded-lg overflow-hidden mb-10">
               <img
                  src="/image/{{$product->image}}" width="50%"
                  alt="image"
                  class="w-full"
                  />
               <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                  <h3>
                     <a
                        href="javascript:void(0)"
                        class="
                        font-semibold
                        text-dark text-xl
                        sm:text-[22px]
                        md:text-xl
                        lg:text-[22px]
                        xl:text-xl
                        2xl:text-[22px]
                        mb-4
                        block
                        hover:text-primary
                        "
                        >
                     {{$product->marca}} {{$product->linea}}
                     </a>
                  </h3>
                  <p class="text-base text-body-color leading-relaxed mb-7">
                     {{ $product->especificaciones }}
                  </p>
                  <a
                     href="javascript:void(0)"
                     class="
                     inline-block
                     py-2
                     px-7
                     border border-[#E5E7EB]
                     rounded-full
                     text-base text-body-color
                     font-medium
                     hover:border-primary hover:bg-primary hover:text-white
                     transition
                     "
                     >
                     {{ $product->price }}
                  </a>
               </div>
            </div>
         </div>  
                             @endforeach
                           </tbody>

                       <div class="pagination justify-content-end">
                         {!! $products->links() !!}
                       </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
