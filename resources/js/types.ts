/**
 * For example:
 * $form.addEventListener('htmx:xhr:progress', (event: HtmxProgressEvent) => {
 *     $progress.classList.add('opacity-100');
 *     $progress.setAttribute('value', (event.detail.loaded / event.detail.total * 100).toString());
 * });
**/
export interface HtmxProgressEvent extends CustomEvent {
    detail: {
        lengthComputable: boolean;
        loaded: number;
        total: number;
        elt: HTMLElement;
    }
}
