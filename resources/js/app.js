require('./bootstrap');
import Alpine from 'alpinejs'
import axios from 'axios';

window.Alpine = Alpine

document.addEventListener("alpine:init", () => {
    Alpine.data('shorturl_generator', () => ({
        url: '',
        showError: false,
        errorMessage: '',
        errors: [],
        processing: false,
        urlCreated: false,
        shortUrl: '',
        lastUrl: '',

        submit(event) {
            event.stopPropagation();
            event.preventDefault();

            if (this.processing || this.url === this.lastUrl) {
                return;
            }

            this.processing = true;
            this.showError = false;
            this.errorMessage = '';
            this.errors = [];
            this.urlCreated = false;
            this.shortUrl = '';

            axios.post('/api/url.json', { url: this.url})
            .then((res) => {
                this.urlCreated = true;
                this.lastUrl = this.url;
                this.shortUrl = window.origin + '/' + res.data.alias;
                this.$dispatch('new-url');
            })
            .catch((res) => {
                const error = res.response.data;
                this.showError = true;
                if (error.message) {
                    this.errorMessage = error.message
                }
                if (error.errors) {
                    this.errors = error.errors;
                }
                console.log(this.errorMessage, error)
            })
            .finally(() => {
                this.processing = false;
            })
        }
    }));

    Alpine.data('shorturl_leader_board', () => ({
        loading: false,
        urls: [],

        init() {
            this.fetchPopularUrls();
        },

        fetchPopularUrls() {
            console.log('fetching');
            if (this.loading) return;

            this.loading = true;

            axios.get('/api/top.json')
            .then((res) => {
                this.urls = res.data
            })
            .finally(() => {
                this.loading = false;
            })
        }
    }))
});

Alpine.start();
