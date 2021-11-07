@extends('layouts.base')

@section('body')
    <div class="flex two-columns-layout flex-col lg:flex-row">
        <div class="lg:flex-1 flex-initial px-5 md:pl-10 lg:pl-32 pt-16 pb-5 first-column">
            <h1 readonly="Logo" class="mb-5">
                <img src="{{ asset('img/logo.svg') }}" alt="Site Logo - Short URL"/>
            </h1>

            <h2 class="font-bold mb-5 mt-10 text-xl">Enter a long URL to make it shorter</h2>

            <form novalidate>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                        <input type="text" name="url" id="url" autocomplete="url" class="py-2 px-4 focus:ring-gray-500 focus:border-gray-500 block w-full border-black border-2 border-radius-none">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border-2 border-transparent font-bold text-white bg-black hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Shorten
                        </button>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-4">
                        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700 mt-2" role="alert">
                            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <div>
                                <span class="font-bold">Danger alert!</span> Change a few things up and try submitting again.
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <p class="mt-16 text-xs">
                By clicking shorten, I agree to the <a href="#" class="font-bold underline">Terms of Service, Privacy Policy</a>
            </p>
        </div>
        <div class="flex-1 px-5 md:pr-10 lg:pr-32 xl:pl-32 py-16 bg-black text-white second-column">
            <h2 class="font-bold mb-5 mt-0 lg:mt-20 text-xl text-left lg:text-right ">Top 100 most visited URLs</h2>

            <div class="mt-10">
                <div class="flex item-start py-5 border-dashed border-b border-white border-opacity-25 ">
                    <div class="flex-1 font-bold text-sm">
                        <a href="http://google.com">http://google.com</a>
                        <p class="text-gray-500  mt-2">10 minutes ago</p>
                    </div>
                    <div class="flex-1 text-right">
                        <p class="text-lg font-bold">100</p>
                    </div>
                </div>
                <div class="flex item-start py-5 border-dashed border-b border-white border-opacity-25 ">
                    <div class="flex-1 font-bold text-sm">
                        <a href="http://google.com">http://google.com</a>
                        <p class="text-gray-500  mt-2">10 minutes ago</p>
                    </div>
                    <div class="flex-1 text-right">
                        <p class="text-lg font-bold">100</p>
                    </div>
                </div>
                <div class="flex item-start py-5 border-dashed border-b border-white border-opacity-25 ">
                    <div class="flex-1 font-bold text-sm">
                        <a href="http://google.com">http://google.com</a>
                        <p class="text-gray-500  mt-2">10 minutes ago</p>
                    </div>
                    <div class="flex-1 text-right">
                        <p class="text-lg font-bold">100</p>
                    </div>
                </div>
                <div class="flex item-start py-5 border-dashed border-b border-white border-opacity-25 ">
                    <div class="flex-1 font-bold text-sm">
                        <a href="http://google.com">http://google.com</a>
                        <p class="text-gray-500  mt-2">10 minutes ago</p>
                    </div>
                    <div class="flex-1 text-right">
                        <p class="text-lg font-bold">100</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@endpush
