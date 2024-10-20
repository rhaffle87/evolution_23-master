@extends('guest/template/main_template')


@section('container')
    <section class="h-screen bg-black">
        <div class="px-6 h-full text-white">
            <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6">
                <div class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0">
                    <img src="/images/logo/logoevolution.png" class=" mx-auto" alt="Sample image" width="50%" />
                </div>
                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
                    {{-- notification when user has succeed register --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ url('/forget-password/submit') }}", method="POST">
                        @csrf
                        <div class="flex flex-row items-center justify-center lg:justify-start">

                        </div>


                        <!-- Email input -->
                        <div class="mb-6">
                            <input type="text"
                                class="form-control block w-full px-4 py-2 text-xl font-normal bg-black bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlInput2" placeholder="Email address" name="email" />
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <input type="password"
                                class="form-control block w-full px-4 py-2 text-xl font-normal bg-black bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlInput2" placeholder="Confirm New Password" name="new_password" />
                        </div>

                        <div class="mb-6">
                            <input type="password"
                                class="form-control block w-full px-4 py-2 text-xl font-normal bg-black bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlInput2" placeholder="Confirm New Password"
                                name="confirm_new_password" />
                        </div>

                        <div class="text-center
                                lg:text-left">
                            <button type="submit"
                                class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                Change Password
                            </button>
                            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                                Don't have an account?
                                <a href="{{ url('/register') }}"
                                    class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out">Register</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
