<div aria-hidden="true" id="loading-indicator">
    <div class="progress"></div>
</div>
<script>
    (function () {
        /**
         * @type {number}
         */
        let progress = 0;

        const $element = document.querySelector('#loading-indicator');

        if (!$element) {
            return;
        }

        /**
         * @param {number} progress
         */
        function setProgress(progress) {
            $element.style.setProperty('--progress-amount', progress.toString());
        }

        document.addEventListener('htmx:xhr:loadstart', () => {
            progress = 10;
            setProgress(progress);
        });

        document.addEventListener('htmx:beforeRequest', () => {
            progress = 10;
            setProgress(progress);
        });

        document.addEventListener('htmx:xhr:loadend', () => {
            progress = 100;
            setProgress(progress);
        });

        document.addEventListener('htmx:afterRequest', () => {
            progress = 100;
            setProgress(progress);
        });

        document.addEventListener('htmx:xhr:progress', () => {
            progress += (80 - progress) * .15;
            setProgress(progress);
        });

    })();
</script>
