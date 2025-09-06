import './bootstrap';
import {renderErrorEvent} from "./lib/utils";

document.addEventListener('htmx:load', () => {
    // @ts-ignore
    htmx.config.globalViewTransitions = true;

    document.addEventListener('htmx:responseError', renderErrorEvent)
});
