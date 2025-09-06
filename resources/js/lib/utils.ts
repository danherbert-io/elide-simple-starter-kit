export function renderErrorEvent(event: CustomEvent) {
    const errorContent = event.detail?.xhr?.response || event.detail.error || 'Sorry, there was an error.';

    const $frame = document.createElement('iframe');
    $frame.src = 'about:blank';
    $frame.srcdoc = errorContent;
    $frame.classList.add('w-full');
    $frame.classList.add('h-full');
    $frame.classList.add('rounded-lg');


    const $container = document.createElement('div');
    $container.innerHTML = `
         <div class="bg-black/30 p-4 shadow-lg fixed inset-0"> </div>
    `;

    $container.querySelector('div').append($frame);

    $container.addEventListener('click', () => $container.remove());

    document.body.appendChild($container);
}
