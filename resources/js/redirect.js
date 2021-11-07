window.onload = () => {
    if (REDIRECT_URL) {
        let counter = 10;
        const $counterSpan = document.getElementById('counter');
        const updateCounter = function() {
            $counterSpan.innerHTML = counter + ' seconds remaining to be redirected...';
        }
        updateCounter();
        const interval = setInterval(() => {
            if (counter == 0) {
                location.href = REDIRECT_URL;
                clearInterval(interval);
                return;
            }

            counter--;
            updateCounter();
        }, 1000);
    }
}
