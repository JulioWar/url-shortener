@extends('layouts.base')

@section('body')
    <div class="flex two-columns-layout flex-col lg:flex-row" >
        <div class="lg:flex-1 flex-initial px-5 md:pl-10 lg:pl-32 pt-16 pb-5 first-column" x-data="shorturl_generator">
            <h1 readonly="Logo" class="mb-5">
                <img src="{{ asset('img/logo.svg') }}" alt="Site Logo - Short URL"/>
            </h1>

            <h2 class="font-bold mb-5 mt-10 text-xl">Enter a long URL to make it shorter.</h2>

            <form @submit="submit($event)">

                <div class="flex items-start w-full lg:w-10/12 mb-3">
                    <div class="flex items-center h-5">
                        <input id="nsfw"
                            name="nsfw"
                            x-model="nsfw"
                            type="checkbox"
                            class="focus:ring-gray-500 h-4 w-4 text-gray-600 border-black border-2">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="comments" class="font-bold">Not Safe For Work</label>
                        <p class="text-gray-500">Please check this box if this link has a video, photo, or audio clip with inappropriate content.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-center w-full lg:w-10/12">
                    <div class="flex-auto">
                        <input type="text"
                            name="url"
                            id="url"
                            x-model="url"
                            required
                            autocomplete="url"
                            class="py-2 px-4 focus:ring-gray-500 focus:border-gray-500 block w-full border-black border-2 border-radius-none">
                    </div>

                    <div class="flex-2">
                        <button type="submit"
                            x-bind:disabled="!url || processing"
                            class="inline-flex justify-center py-2 px-4 border-2 border-transparent font-bold text-white bg-black disabled:opacity-50 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <span x-show="!processing">Shorten</span>
                            <span x-show="processing">Generating...</span>
                        </button>
                    </div>
                </div>
            </form>

            <div class="flex w-full lg:w-10/12 mt-5">
                <template x-if="showError">
                    <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700 mt-2 w-full" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                            <span class="font-bold" x-text="errorMessage"></span>
                            <ul>
                                <template x-for="(error, key) in errors" :key="key">
                                    <li x-text="error[0]"></li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </template>
                <template x-if="urlCreated">
                    <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700  w-full" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                            Here the shorter link: <a class="font-bold underline" x-bind:href="shortUrl" x-text="shortUrl"></a>
                        </div>
                    </div>
                </template>
            </div>

            <p class="mt-1 text-xs">
                By clicking shorten, I agree to the <a href="#" class="font-bold underline">Terms of Service, Privacy Policy</a>
            </p>
        </div>
        <div class="flex-1 px-5 md:pr-10 lg:pr-32 xl:pl-32 py-16 bg-black text-white second-column"
            x-data="shorturl_leader_board"
            @new-url.window="fetchPopularUrls()">
            <h2 class="font-bold mb-5 mt-0 lg:mt-20 text-xl text-left lg:text-right ">Top 100 most visited URLs</h2>

            <div class="mt-10">
                <template x-for="item in urls" :key="item.site_url">
                    <div class="flex item-start py-5 border-dashed border-b border-white border-opacity-25 ">
                        <div class="flex-2 font-bold text-sm">
                            <a x-bind:href="item.site_url" class="break-all" x-text="item.site_url"></a>
                            <p class="text-gray-500 mt-2" >
                                Visited <span x-text="item.last_visit"></span>
                            </p>
                        </div>
                        <div class="flex-1 text-right pl-5">
                            <p class="text-lg font-bold" x-text="item.visits"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
@endpush
