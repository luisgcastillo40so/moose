/**
 * @module
 * @description Some event functions for use in other modules
 */

/**
 * @function triggerCustomEvent
 * @description Trigger a custom event
 * @param {string} type   The event type
 * @param {Node}   el     The element on which to emit the event
 * @param {*}      detail Any details to pass along with the event
 */
const triggerCustomEvent = ( type, el = document, detail = {} ) => {
	// Event type is required
	if ( ! type ) return;

	// Create new event
	// eslint-disable-next-line no-undef
	const event = new CustomEvent( type, {
		bubbles: true,
		cancelable: true,
		detail,
	} );

	// Dispatch event
	return el.dispatchEvent( event );
};

export { triggerCustomEvent };
